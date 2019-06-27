<?php
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\UserController;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\RouteParser; 

$router = new  RouteCollector(new RouteParser);
$router->controller('/',HomeController::class);
$router->controller('users',UserController::class);
$router->controller('login',LoginController::class);

?>