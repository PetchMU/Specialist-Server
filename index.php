<?php

ini_set('display_errors', 1);
error_reporting(~0);

include 'helpers/Router.php';
include 'helpers/Response.php';
include 'helpers/Request.php';
include 'helpers/View.php';
include 'database/Database.php';


View::setViewPath(__DIR__ . "/views");

$router = new Router();
include 'router.php';

$router->setConteollerPath(__DIR__ . "/controllers");
$found = $router->run();

if(!$found){
	echo '404';
}