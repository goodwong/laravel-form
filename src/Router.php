<?php

namespace Goodwong\Form;

use Illuminate\Support\Facades\Route;

class Router
{
    /**
     * routes
     * 
     * @return void
     */
    public static function resource()
    {
        require __DIR__.'/routes.php';
    }
}
