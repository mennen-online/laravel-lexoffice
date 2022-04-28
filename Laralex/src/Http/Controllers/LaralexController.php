<?php

namespace MennenOnline\Laralex\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use MennenOnline\Laralex\Facades\Laralex;

class LaralexController extends Controller
{
    public function getRevenue()
    {
        return Laralex::getRevenue();
    }

    public function getContactCount(): array
    {
        $data = Laralex::getAllContacts(0,250, true);
        $data = $data['content'];
        $personCount = 0;
        $companyCount = 0;

        foreach ($data as $entry) {
            if (isset($entry["roles"]["customer"])) {
                if (isset($entry["person"])) {
                    $personCount++;
                } else {
                    $companyCount++;
                }
            }
        }

        return ["personCount" => $personCount, "companyCount" => $companyCount];
    }

    public static function getAllContacts(Request $request)
    {
        $page = $request->query("page");
        $size = $request->query("size");

        $data = Laralex::getAllContacts($page, $size);
        $pagecount = $data["totalPages"];
        $data = $data['content'];

        return json_encode(["data" => $data, "pages" => $pagecount-1]);
    }

    public function viewCompanies()
    {
        $data = Laralex::getAllContacts();
        return view("laralex::companies")->with("data", $data["content"]);
    }
}
