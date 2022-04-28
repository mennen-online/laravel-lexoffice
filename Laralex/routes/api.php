<?php
use Illuminate\Support\Facades\Route;
use MennenOnline\Laralex\Http\Controllers\LaralexController;

Route::prefix("api")->group(function () {
    Route::middleware("api")->group(function () {
        Route::get("getAllContacts", [
            LaralexController::class,
            "getAllContacts",
        ]);
        Route::get("getContactsCount", [
            LaralexController::class,
            "getContactCount",
        ]);
        Route::get("getRevenue", [LaralexController::class, "getRevenue"]);
    });
});
