<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public $url = "https://online.moysklad.ru/api/remap/1.2/entity/service/";

    public function add(Request $request) {
        $body = $request->all();
        $token = getenv('TOKEN');
        $auth = 'Bearer ' . $token;

        $headers = [
            'Authorization' => $auth,
            'Content-Type' => 'application/json'
        ];
        $client = new Client(['verify' => false]);
        $promise = $client->postAsync($this->url, [
            'headers' => $headers,
            'json' => $body,
        ]);
        return $promise->then(function ($response) {
            $responseData = json_decode($response->getBody(), true);
            DB::insert('insert into assortments (foreignUUID, type) values (?, ?)', [$responseData["id"], "service"]);
            //some properties can be added here.
            $data = [
                'id' => $responseData["id"],
                'accountId' => $responseData["accountId"],
                'service' => $responseData["name"],
                'code' => $responseData["code"]
            ];
            $result = new Response($data, $response->getStatusCode());
            return $result;
        })->wait();

    }

    public function edit(Request $request, $id) {
        $body = $request->all();
        $joinedUrl = $this->url . $id;
        $token = getenv('TOKEN');
        $auth = 'Bearer ' . $token;
        $headers = [
            'Authorization' => $auth,
            'Content-Type' => 'application/json'
        ];
        $client = new Client(['verify' => false]);

        $promise = $client->putAsync($joinedUrl, [
            'headers' => $headers,
            'json' => $body,
        ]);
        return $promise->then(function ($response) {
            $responseData = json_decode($response->getBody(), true);
            $result = new Response($responseData, $response->getStatusCode());
            return $result;
        })->wait();


    }
}
