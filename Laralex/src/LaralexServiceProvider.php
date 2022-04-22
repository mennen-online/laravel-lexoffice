<?php

namespace MennenOnline\Laralex;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use MennenOnline\Laralex\Facades\Laralex;

class LaralexServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPublishing();
        $this->registerResources();
        Laralex::init();
    }

    public function register() {

    }

    protected function registerPublishing()
    {
        $this->publishes([
            __DIR__ . "/../config/laralex.php" => config_path("laralex.php")
        ], "laralex-config");

        $this->publishes([
            __DIR__ . "/../public" => public_path("mennen-online/laralex")
        ], "laralex-assets");
    }

    private function registerResources()
    {
        $this->loadViewsFrom(__DIR__ . "/../resources/views", "laralex");
        $this->registerFacades();
        $this->registerRoutes();
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . "/../routes/web.php");
        });
    }

    private function routeConfiguration(): array
    {
        return [
            "prefix" => config("laralex.web-path", "laralex"),
            "namespace" => "MennenOnline\Laralex\Http\Controllers"
        ];
    }

    protected function registerFacades()
    {
        $this->app->singleton("Laralex", function ($app) {
            return new \MennenOnline\Laralex\Laralex();
        });
    }


}