<?php

namespace MennenOnline\Laralex\Tests;

use Orchestra\Testbench\TestCase;
use GuzzleHttp;

class LaralexTest extends TestCase
{
    public function test_init() {
        $this->assertTrue(true);
    }

    public function test_retrieve_contact() {
        $client = new GuzzleHttp\Client();
        $apiURL = "https://api.lexoffice.io/v1/contacts/";
        $id = "";
        $token = "";

        $request = $client->request("GET", $apiURL, [
           'headers' => [
               "Authorization: Bearer $token",
               "Accept: application/json"
           ]
        ]);

        $response = $request->getBody();

        dd($response);
    }
}