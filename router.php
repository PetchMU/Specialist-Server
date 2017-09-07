<?php

$router->any("/api/user/", "User.listAll");
$router->any("/api/user/:num", "User.detail");

$router->any("/admin", "admin/Admin");