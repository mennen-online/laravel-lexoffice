<?php

namespace MennenOnline\Laralex\Facades;

use Illuminate\Support\Facades\Facade;

class Laralex extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "Laralex";
    }
}