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
$router->any("/user/edit", "User.edit");
$router->any("/user/:num/edit", "User.edit");
$router->any("/user/:num/message", "User.private_message");
$router->any("/user/:num/add", "User.add");
$router->any("/user/:num/deny", "User.deny");
$router->any("/user/search","Search.user");
$router->any("/user/list","User.listAll");
$router->any("/user/sendallmessage","User.selectSendAllMessage");


$router->any("/admin/console", "admin/Admin.console");
$router->any("/admin/console/add_notice_to_all_group", "admin/Admin.add_notice_to_all_group");
$router->any("/admin/console/submit_reject", "admin/Admin.submitReject");



$router->any("/group", "Group.main");
$router->any("/group/:num", "Group.home");
$router->any("/group/:num/readmore", "Group.readmore");
$router->any("/group/:num/member", "Group.member");
$router->any("/group/:num/addnotice", "Group.addNotice");
$router->any("/group/:num/join", "Group.addJoin");
$router->any("/group/:num/allow", "Group.allowing");
$router->any("/group/search", "Search.group");
$router->any("/group/create", "Group.create");
$router->any("/group/:num/edit", "Group.edit");
$router->any("/group/:num/member/:num/reject", "Group.reject");

$router->any("/event", "Event.main");
$router->any("/event/submit", "Event.submit");



$router->any("/notification", "Notification.main");
$router->any("/notification/:num/read", "Notification.read");
