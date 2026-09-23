<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
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

    private function client(): PendingRequest
    {
        return Http::acceptJson()
            ->timeout(10);
    }

    private function authenticatedClient(
        string $token
    ): PendingRequest {
        return $this->client()
            ->withToken($token);
    }

    public function get(
        string $endpoint,
        array $query = []
    ): Response {
        return $this->client()->get(
            $this->baseUrl . $endpoint,
            $query
        );
    }

    public function post(
        string $endpoint,
        array $data = []
    ): Response {
        return $this->client()->post(
            $this->baseUrl . $endpoint,
            $data
        );
    }

    public function put(
        string $endpoint,
        array $data = []
    ): Response {
        return $this->client()->put(
            $this->baseUrl . $endpoint,
            $data
        );
    }

    public function delete(
        string $endpoint
    ): Response {
        return $this->client()->delete(
            $this->baseUrl . $endpoint
        );
    }

    public function getWithToken(
        string $token,
        string $endpoint,
        array $query = []
    ): Response {
        return $this->authenticatedClient($token)
            ->get(
                $this->baseUrl . $endpoint,
                $query
            );
    }

    public function postWithToken(
        string $token,
        string $endpoint,
        array $data = []
    ): Response {
        return $this->authenticatedClient($token)
            ->post(
                $this->baseUrl . $endpoint,
                $data
            );
    }

    public function putWithToken(
        string $token,
        string $endpoint,
        array $data = []
    ): Response {
        return $this->authenticatedClient($token)
            ->put(
                $this->baseUrl . $endpoint,
                $data
            );
    }

    public function deleteWithToken(
        string $token,
        string $endpoint
    ): Response {
        return $this->authenticatedClient($token)
            ->delete(
                $this->baseUrl . $endpoint
            );
    }
}