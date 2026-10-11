<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class SiteAnnouncement
{
    private const FILE = 'site-announcement.json';

    public function current(): ?array
    {
        $disk = Storage::disk('local');
        if (! $disk->exists(self::FILE)) {
            return null;
        }

        $announcement = json_decode($disk->get(self::FILE), true);
        if (! is_array($announcement) || trim((string) ($announcement['message'] ?? '')) === '') {
            return null;
        }

        return $announcement;
    }

    public function publish(string $message, string $staffName): void
    {
        Storage::disk('local')->put(self::FILE, json_encode([
            'message' => trim($message),
            'postedBy' => $staffName,
            'postedAt' => now()->toIso8601String(),
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    public function clear(): void
    {
        Storage::disk('local')->delete(self::FILE);
    }
}
