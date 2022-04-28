<?php

namespace MennenOnline\Laralex\Http\Controllers;

use MennenOnline\Laralex\Facades\Laralex;
use Illuminate\Routing\Controller;

class LaralexController extends Controller
{
    public static function getAllContacts()
    {
        $data = Laralex::getAllContacts();
        return (json_encode($data["content"]));
    }
    public function getRevenue()
    {
        return (Laralex::getRevenue());
    }

    public function getContactCount(): array {
        $data = Laralex::getAllContacts();
        $personCount = 0;
        $companyCount = 0;

        foreach($data as $entry) {
            if(array_key_exists("person", $entry)) {
                $personCount++;
            } else {
                $companyCount++;
            }
        }

        return ["personCount" => $personCount, "companyCount" => $companyCount];
    }


    public function viewCompanies()
    {
        $data = Laralex::getAllContacts();
        return view("laralex::companies")->with("data", $data['content']);

    }
}