<?php

namespace MennenOnline\Laralex\Tests;

use Illuminate\Support\Facades\Config;
use MennenOnline\Laralex\Laralex;
use Orchestra\Testbench\TestCase;
use GuzzleHttp;

class LaralexTest extends TestCase
{
    public function test_init()
    {
        $this->assertTrue(true);
    }

    public function test_functions()
    {
        Laralex::getAllContacts();
    }

/*    public function test_create()
    {
        $client = new GuzzleHttp\Client();
        $apiURL = "https://api.lexoffice.io/v1/contacts";
        $token = "mTGx6xlO1onKscoDBpgy1h98GK8";
        $request = $client->request('POST', $apiURL, [
            'headers' => [
                "Authorization" => "Bearer " . $token,
                "Accept" => "application/json",
                "Content-Type" => "application/json"
            ],
            'body' => json_encode([
                "version" => 0,
                "roles" => [
                    "customer" => []
                ],
                "person" => [
                    "salutation" => "Herr",
                    "firstName" => "Max",
                    "lastName" => "Mustermann"
                ],
                "note" => "Notiz"
            ], JSON_FORCE_OBJECT)
        ]);

        $response = $request->getBody();

        dd($response);
    }*/
}