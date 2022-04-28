<?php

namespace MennenOnline\Laralex;

use GuzzleHttp;

/**
 * Class LaraLex
 * The LaraLex Class contains all main functions in order to retrieve data from the LexOffice API
 */
class Laralex
{
    /**
     * Sets globals used within the Laralex Class
     */

    public function __construct()
    {
        define("APIURL", config("laralex.api-url"));
        define("TOKEN", config("laralex.api-token-live"));
        define("ENDPOINT_CONTACTS", config("laralex.endpoint-contacts"));
        define("DEBUG", config("laralex.debug"));
    }

    /**
     * Gets specified contact by UUID
     * @param string $id
     * @return array
     */

    public function getContact(string $id): array
    {
        return Laralex::get(ENDPOINT_CONTACTS, $id);
    }

    /**
     * Handles all operations that can be requested by GET commands via the LexOffice API
     * @param string $endpoint Endpoint of the API eg v1/contacts, etc
     * @param string $payload Operation to be exectued
     * @return array Returned data of the API
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    private function get(string $endpoint, string $payload): array
    {
        $client = new GuzzleHttp\Client();

        $request = $client->request("GET", APIURL . $endpoint . $payload, [
            "headers" => [
                "Authorization" => "Bearer " . TOKEN,
                "Accept" => "application/json",
            ],
        ]);

        $response = $request->getBody();

        // Enable logging if DEBUG is true
        if (DEBUG) {
            file_put_contents(
                "output.php",
                print_r(json_decode($response, true), true)
            );
        }

        return json_decode($response, true);
    }

    public function getRevenue()
    {
        $data = Laralex::get(
            "v1/voucherlist",
            "?voucherType=invoice&voucherStatus=open&size=250"
        )["content"];
        $totalOpen = 0;
        $count = 0;

        foreach ($data as $occurence) {
            $totalOpen += $occurence["totalAmount"];
            $count++;
        }

        return [
            "openRevenue" => $totalOpen,
            "countInvoices" => $count,
        ];
    }

    /**
     * Gets all contacts
     * @return array
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    public function getAllContacts($page = 0, $size = 250, $all = false)
    {

        $currentSet = Laralex::get(
            ENDPOINT_CONTACTS,
            "?page=" . $page . "&size=" . $size
        );
        $helperSet = [];

        if ($all == true) {
            if (isset($currentSet["last"])) {
                if ($currentSet["last"] === true) {
                    return $currentSet;
                } else {
                    while (true) {
                        $page++;
                        $helperSet = Laralex::get(
                            ENDPOINT_CONTACTS,
                            "?page=" . $page . "&size=" . $size
                        );
                        if ($helperSet["last"] === true) {
                            $currentSet = array_merge_recursive(
                                $currentSet,
                                $helperSet
                            );
                            break;
                        } else {
                            $currentSet = array_merge_recursive(
                                $currentSet,
                                $helperSet
                            );
                        }
                    }
                }
            }
        }

        return $currentSet;
    }

    /**
     * Creates a PERSON
     * @param array $role
     * @param array $person
     * @param string $note
     */
    public function createPerson(array $role, array $person, string $note)
    {
        $merge = [
            "version" => 0,
            "roles" => $role,
            "person" => $person,
            "note" => $note,
        ];

        if (DEBUG) {
            Laralex::log(json_encode($merge), "json");
        }

        Laralex::post(ENDPOINT_CONTACTS, $merge);
    }

    /**
     * Enables lacking logs
     * @param $input
     * @param string $type
     */
    private function log($input, string $type)
    {
        file_put_contents("output." . $type, print_r($input, true));
    }

    /**
     * Executes all operations which require POST
     * @param $endpoint
     * @param $payload
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    private function post($endpoint, $payload)
    {
        $client = new GuzzleHttp\Client();

        $request = $client->request("POST", APIURL . $endpoint, [
            "headers" => [
                "Authorization" => "Bearer " . TOKEN,
                "Accept" => "application/json",
                "Content-Type" => "application/json",
            ],
            "body" => json_encode($payload, JSON_FORCE_OBJECT),
        ]);
    }

    /**
     * @param array $roles
     * @param array $company
     * @param array $contacts
     */
    public function createCompany(array $roles, array $company, array $contacts)
    {
        $merge = [
            "version" => 0,
            "roles" => $roles,
            "company" => $company,
        ];
        /*
        $company_model = [
            'name' => $comName,
            'taxNumber' => $tax,
            'vatRegistrationId' => $vat,
            'allowTaxFreeInvoices' => $boolTax,
            'contactPersons' => []
        ];
        */

        if (DEBUG) {
            Laralex::log(json_encode($merge), "json");
        }

        Laralex::post(ENDPOINT_CONTACTS, $merge);
    }
}
