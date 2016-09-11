<?php

/*
|--------------------------------------------------------------------------
| Show All Errors
|--------------------------------------------------------------------------
|
*/

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(E_ALL);

/*
|--------------------------------------------------------------------------
| Start Sessions
|--------------------------------------------------------------------------
|
*/

session_start();

/*
|--------------------------------------------------------------------------
| Import Namespaces
|--------------------------------------------------------------------------
|
*/

use Vertex\Core\Router;
use Vertex\Core\View;
use Dotenv\Dotenv;

/*
|--------------------------------------------------------------------------
| Load Vendor Code
|--------------------------------------------------------------------------
|
*/

require __DIR__.'/../../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Load Enviroment Variables
|--------------------------------------------------------------------------
|
*/

(new Dotenv(__DIR__.'/../..'))->load();

/*
|--------------------------------------------------------------------------
| Load Routes
|--------------------------------------------------------------------------
|
| Include all the specified routes for the application
|
*/

$router = new Router(
    FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $route) {
        require __DIR__.'/../routes.php';
    })
);

$router->dispatch();
