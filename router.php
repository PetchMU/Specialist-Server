<?php

//$router->any("/api/user/", "User.listAll");
//$router->any("/api/user/:num", "User.detail");
//$router->any("/api/search/user", "Search.user");

$router->any("/", "Home.main");
$router->any("/home", "Home.main");
$router->any("/welcome", "Welcome.main");

$router->any("/user", "User.main");
$router->any("/user/:num", "User.profile");
$router->any("/login", "Login.main");
$router->any("/logout", "Logout.main");
$router->any("/signup", "SignUp.main");

$router->any("/admin", "admin/Admin");



$router->any("/group", "Group.main");
