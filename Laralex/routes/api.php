<?php
use Illuminate\Support\Facades\Route;
use MennenOnline\Laralex\Http\Controllers\LaralexController;


Route::prefix("api")->group(function() {
    Route::middleware("api")->group(function() {
        Route::get('getContacts', [LaralexController::class, 'getAllContacts']);
        Route::get("getRevenue", [LaralexController::class, 'getRevenue']);
    });

});