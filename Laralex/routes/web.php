<?php

Route::get("/", function () {
    return view("laralex::index");
});

Route::get("contacts", "LaralexController@viewContacts");
Route::get("companies", "LaralexController@viewCompanies");
Route::get("create", function () {
    return view("laralex::addEntitiy");
});
