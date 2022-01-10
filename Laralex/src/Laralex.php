<?php

namespace MennenOnline\Laralex;

use GuzzleHttp;

class Laralex
{
    private const apiURL = "https://api.lexoffice.io/";
    private const token = "§§§§§§§§§§§";

    public static function get(String $endpoint, String $payload) {
        $client = new GuzzleHttp\Client();

        $request = $client->request('GET', self::apiURL . $endpoint . $payload, [
            'headers' => [
                "Authorization" => "Bearer " . self::token,
                "Accept" => "application/json"
            ]
        ]);

        $response = $request->getBody();

        file_put_contents("output.json", $response);
    }

    public static function getContact(String $id) {
        Laralex::get("v1/contacts/", $id);
    }

    public static function getAllContacts() {
        Laralex::get("v1/contacts/", "?page=0");
    }

}