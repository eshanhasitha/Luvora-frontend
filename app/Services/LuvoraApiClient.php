<?php

namespace App\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class LuvoraApiClient
{
    private string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = rtrim(
            config('services.luvora.base_url'),
            '/'
        );
    }

    public function get(
        string $endpoint,
        array $query = []
    ): Response {
        return Http::acceptJson()
            ->get(
                $this->baseUrl . $endpoint,
                $query
            );
    }

    public function post(
        string $endpoint,
        array $data = []
    ): Response {
        return Http::acceptJson()
            ->post(
                $this->baseUrl . $endpoint,
                $data
            );
    }

    public function put(
        string $endpoint,
        array $data = []
    ): Response {
        return Http::acceptJson()
            ->put(
                $this->baseUrl . $endpoint,
                $data
            );
    }

    public function delete(
        string $endpoint
    ): Response {
        return Http::acceptJson()
            ->delete(
                $this->baseUrl . $endpoint
            );
    }

    public function getWithToken(
    string $token,
    string $endpoint,
    array $query = []
    ): Response {
        return Http::withToken($token)
            ->acceptJson()
            ->get(
                $this->baseUrl . $endpoint,
                $query
            );
    }

    public function withToken(
        string $token
    ): self {
        $client = clone $this;

        Http::macro('luvoraAuthenticated', function () use ($token) {
            return Http::withToken($token)
                ->acceptJson();
        });

        return $client;
    }
}