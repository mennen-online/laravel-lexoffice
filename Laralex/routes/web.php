<?php



Route::get("/", "LaralexController@viewContact");
Route::get("test", function() {
    return view("laralex::index");
});

Route::get("contacts", "LaralexController@viewContact");