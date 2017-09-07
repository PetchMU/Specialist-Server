<?php

include 'helpers/Router.php';

$router = new Router();
include 'router.php';

$found = $router->run();

if(!$found){
	echo '404';
}