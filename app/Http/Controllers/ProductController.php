<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use GuzzleHttp\Client;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Promise\Utils;

class ProductController extends Controller
{
    public function add(Request $request) {
        $body = $request->all();

        $url = "https://online.moysklad.ru/api/remap/1.2/entity/product";
        $token = getenv('TOKEN');
        $auth = 'Bearer ' . $token;
        $headers = [
            'Authorization' => $auth,
            'Content-Type' => 'application/json'
        ];
        $client = new Client(['verify' => false]);
        $promise = $client->postAsync($url, [
            'headers' => $headers,
            'json' => $body,
        ]);
        return $promise->then(function ($response) {
            $responseData = json_decode($response->getBody(), true);
            $data = [
                'id' => $responseData["id"],
                'accountId' => $responseData["accountId"],
                'product' => $responseData["name"],
                'code' => $responseData["code"]
            ];
            $result = new Response($data, $response->getStatusCode());
            return $data;
        })->wait();

    }

}
