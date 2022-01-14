<?php

namespace MennenOnline\Laralex;

use GuzzleHttp;

/**
 * Class LaraLex
 * The LaraLex Class contains all main functions in order to retrieve data from the LexOffice API
 */
class Laralex
{
    private const DEBUG = true;
    private const apiURL = "https://api.lexoffice.io/";
//    private const token = ""; //REAL
    private const token = "mTGx6xlO1onKscoDBpgy1h98GK8"; //TEST

    public static function getContact(string $id): array
    {
        return Laralex::get("v1/contacts/", $id);
    }

    public static function get(string $endpoint, string $payload): array
    {
        $client = new GuzzleHttp\Client();

        $request = $client->request('GET', self::apiURL . $endpoint . $payload, [
            'headers' => [
                "Authorization" => "Bearer " . self::token,
                "Accept" => "application/json"
            ]
        ]);

        $response = $request->getBody();

        // Enable logging if DEBUG is true
        if (self::DEBUG) {
            file_put_contents("output.php", print_r(json_decode($response, true), true));
        }

        return json_decode($response, true);
    }

    public static function getAllContacts(): array
    {
        return Laralex::get("v1/contacts/", "?page=0");
    }

    public static function createPerson(array $role, array $person, string $note)
    {
        $merge = [
            'version' => 0,
            'roles' => $role,
            'person' => $person,
            'note' => $note
        ];

        if (self::DEBUG) {
            Laralex::log(json_encode($merge), "json");
        }

        Laralex::post("v1/contacts/", $merge);
    }

    private static function log($input, string $type)
    {
        file_put_contents("output." . $type, print_r($input, true));
    }

    private static function post($endpoint, $payload)
    {
        $client = new GuzzleHttp\Client();

        $request = $client->request("POST", self::apiURL . $endpoint, [
            'headers' => [
                "Authorization" => "Bearer " . self::token,
                "Accept" => "application/json",
                "Content-Type" => "application/json"
            ],
            "body" => json_encode($payload, JSON_FORCE_OBJECT)
        ]);

    }


}