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


    public function viewCompanies()
    {
        $data = Laralex::getAllContacts();
        return view("laralex::companies")->with("data", $data['content']);

    }
}