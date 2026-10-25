<?php

namespace App\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;

class LuvoraAdminApiClient
{
    private string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = rtrim((string) config('services.luvora.base_url'), '/');
    }

    public function request(string $method, string $endpoint, string $token, array $data = []): Response
    {
        $request = Http::withToken($token)->acceptJson();
        $url = $this->baseUrl.$endpoint;

        return match (strtoupper($method)) {
            'GET' => $request->get($url, $data),
            'POST' => $request->post($url, $data),
            'PUT' => $request->put($url, $data),
            'PATCH' => $request->patch($url, $data),
            'DELETE' => $request->delete($url, $data),
            default => throw new \InvalidArgumentException('Unsupported HTTP method.'),
        };
    }

    public function upload(string $endpoint, string $token, UploadedFile $file): Response
    {
        $stream = fopen($file->getRealPath(), 'rb');

        try {
            return Http::withToken($token)
                ->acceptJson()
                ->attach('file', $stream, $file->getClientOriginalName(), [
                    'Content-Type' => $file->getMimeType() ?: 'application/octet-stream',
                ])
                ->post($this->baseUrl.$endpoint);
        } finally {
            if (is_resource($stream)) {
                fclose($stream);
            }
        }
    }

    public function login(array $data): Response
    {
        return Http::acceptJson()->post($this->baseUrl.'/api/admin/auth/login', $data);
    }
}
