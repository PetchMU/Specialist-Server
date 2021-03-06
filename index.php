<?php

ini_set('display_errors', 1);
//error_reporting(0);

session_start();

define("THUMB_FLODER", '/res/images/thumbnail');
define("THUMB_PATH", __DIR__ . THUMB_FLODER);

include 'helpers/Router.php';
include 'helpers/Response.php';
include 'helpers/Request.php';
include 'helpers/View.php';
include 'helpers/Model.php';
include 'helpers/Auth.php';
include 'helpers/fn.php';
include 'helpers/Toolbar.php';
include 'helpers/MenuFooter.php';
include 'database/Database.php';


View::setViewPath(__DIR__ . "/views");
Model::setModelPath(__DIR__ . "/models");

$router = new Router();
include 'router.php';

$router->setConteollerPath(__DIR__ . "/controllers");
$found = $router->run();

if(!$found){
	echo '404';
}