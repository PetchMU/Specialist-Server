<?php


include 'helpers/Router.php';

$router = new Router();
include 'router.php';

$found = $router->setConteollerPath(__DIR__ . '/controllers');
$found = $router->run();

if(!$found){
	echo '404';
}