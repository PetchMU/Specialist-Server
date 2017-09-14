<?php

$router->any("/api/user/", "User.listAll");
$router->any("/api/user/:num", "User.detail");
$router->any("/api/search/user", "Search.user");

$router->any("/admin", "admin/Admin");