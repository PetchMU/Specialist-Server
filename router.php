<?php

$router->any("/", "User.listAll");
$router->any("/api/user/", "User.listAll");
$router->any("/api/user/:num", "User.detail");
$router->any("/api/search/user", "Search.user");

$router->any("/user", "User.main");
$router->any("/user/:num", "User.main2");

$router->any("/admin", "admin/Admin");
$router->any("/home", "Home.main");
$router->any("/login", "Login.main");
$router->any("/logout", "Logout.main");
