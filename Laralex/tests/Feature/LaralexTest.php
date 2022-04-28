<?php

namespace MennenOnline\Laralex\Tests;

use MennenOnline\Laralex\Facades\Laralex;
use GuzzleHttp;

class LaralexTest extends TestCase
{
    public function test_init()
    {
        $this->assertTrue(true);
    }

    public function test_functions()
    {
        Laralex::init();
        $array = Laralex::getAllContacts();
        //        $array = LaraLex::getContact("5f0bfb5a-f243-446f-87ba-ac5590bd9834");
        //        Laralex::createPerson(["customer" => []], ["salutation" => "Herr", "firstName" => "Testimus", "lastName" => "Prime"], "");
        dd($array);
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
