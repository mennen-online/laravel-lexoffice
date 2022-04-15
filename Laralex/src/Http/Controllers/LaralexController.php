<?php

namespace MennenOnline\Laralex\Http\Controllers;

use MennenOnline\Laralex\Facades\Laralex;
use Illuminate\Routing\Controller;

class LaralexController extends Controller
{
    public function viewContact()
    {
        $data = Laralex::getAllContacts();
        return view("laralex::contacts")->with("data", $data['content']);

    }
}