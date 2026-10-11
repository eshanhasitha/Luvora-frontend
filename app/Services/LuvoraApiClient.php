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
        $query = array_filter($query, fn ($value) => $value !== null);
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

    public function patch(
        string $endpoint,
        array $data = []
    ): Response {
        return Http::acceptJson()->patch($this->baseUrl . $endpoint, $data);
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
        return $this->authenticatedRequest($token, 'GET', $endpoint, $query);
    }

    public function postWithToken(
        string $token,
        string $endpoint,
        array $data = []
    ): Response {
        return $this->authenticatedRequest($token, 'POST', $endpoint, $data);
    }

    public function putWithToken(string $token, string $endpoint, array $data = []): Response
    {
        return $this->authenticatedRequest($token, 'PUT', $endpoint, $data);
    }

    public function patchWithToken(string $token, string $endpoint, array $data = []): Response
    {
        return $this->authenticatedRequest($token, 'PATCH', $endpoint, $data);
    }

    public function deleteWithToken(string $token, string $endpoint, array $data = []): Response
    {
        return $this->authenticatedRequest($token, 'DELETE', $endpoint, $data);
    }

    private function authenticatedRequest(string $token, string $method, string $endpoint, array $data = []): Response
    {
        $send = function (string $accessToken) use ($method, $endpoint, $data): Response {
            $request = Http::withToken($accessToken)->acceptJson();
            $url = $this->baseUrl . $endpoint;
            return match (strtoupper($method)) {
                'GET' => $request->get($url, $data),
                'POST' => $request->post($url, $data),
                'PUT' => $request->put($url, $data),
                'PATCH' => $request->patch($url, $data),
                'DELETE' => $request->delete($url, $data),
                default => throw new \InvalidArgumentException('Unsupported authenticated HTTP method.'),
            };
        };

        $response = $send($token);
        if ($response->status() !== 401 || ! session('refresh_token') || session('access_token') !== $token) {
            return $response;
        }

        try {
            $refresh = Http::acceptJson()->post($this->baseUrl . '/api/auth/refresh', [
                'refreshToken' => session('refresh_token'),
            ]);
        } catch (\Illuminate\Http\Client\ConnectionException) {
            return $response;
        }

        if ($refresh->failed()) return $response;
        $payload = $refresh->json();
        $newToken = data_get($payload, 'accessToken') ?? data_get($payload, 'access_token') ?? data_get($payload, 'data.accessToken') ?? data_get($payload, 'data.access_token');
        if (! is_string($newToken) || $newToken === '') return $response;

        session()->put('access_token', $newToken);
        return $send($newToken);
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
