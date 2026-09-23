<?php

namespace App\Http\Controllers;

use App\Services\LuvoraApiClient;

class ApiTestController extends Controller
{
    public function test(LuvoraApiClient $api)
    {
        $response = $api->get('/api/products');

        return response()->json([
            'status' => $response->status(),
            'successful' => $response->successful(),
            'data' => $response->json(),
        ]);
    }
}