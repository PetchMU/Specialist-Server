<?php

//$router->any("/api/user/", "User.listAll");
//$router->any("/api/user/:num", "User.detail");
//$router->any("/api/search/user", "Search.user");

$router->any("/", "Home.main", true);
$router->any("/home", "Home.main", true);
$router->any("/welcome", "Welcome.main", true);

$router->any("/login", "Login.main", true);
$router->any("/logout", "Logout.main", true);
$router->any("/signup", "SignUp.main", true);

$router->any("/user", "User.main");
$router->any("/user/:num", "User.profile");
$router->any("/user/:num/message", "User.private_message");
$router->any("/user/:num/add", "User.add");
$router->any("/user/:num/deny", "User.deny");
$router->any("/user/search","Search.user");

$router->any("/admin", "admin/Admin");



$router->any("/group", "Group.main");
$router->any("/group/:num", "Group.home");
$router->any("/group/:num/readmore", "Group.readmore");
$router->any("/group/:num/member", "Group.member");
$router->any("/group/:num/addnotice", "Group.addNotice");





$router->any("/notification", "Notification.main");
$router->any("/notification/:num/read", "Notification.read");
