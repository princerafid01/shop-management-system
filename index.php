<?php
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpMethodNotAllowedException;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;


require_once 'vendor/autoload.php';
session_start();

// Database connection
require_once 'app/config.php';

// routing system
require_once 'app/routes.php';

$capsule->setAsGlobal();
$capsule->bootEloquent();

$dispatcher = new Dispatcher($router->getData());
try{
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
} catch(HttpRouteNotFoundException $e){
	echo $e->getMessage();
	die();
} catch(HttpMethodNotAllowedException $e){
	echo $e->getMessage();
	die();
}
// echo $response;
// The Routing System

?>