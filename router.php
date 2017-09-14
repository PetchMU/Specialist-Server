<?php

$router->any("/", "User.listAll");
$router->any("/api/user/", "User.listAll");
$router->any("/api/user/:num", "User.detail");
$router->any("/api/search/user", "Search.user");

$router->any("/user", "User.main");
$router->any("/user/:num", "User.main2");

$router->any("/admin", "admin/Admin");