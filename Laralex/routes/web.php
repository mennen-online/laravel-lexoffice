<?php



Route::get("/", "LaralexController@viewContact");
Route::get("test", function() {
    return view("laralex::index");
});