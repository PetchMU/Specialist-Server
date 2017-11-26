<?php

function redirect($url){
    header("Location: " . $url);
}

function refresh(){
    header("Location: " . $_SERVER['REQUEST_URI']);
}

function isLogin(){
    return Model::load('UserModel')->isLogin();
}

function checkAuthenticationOrGoHome(){
    if(!isLogin()){
        return redirect("/");
    }
}

function userInfo($field = null){
    if( !isLogin() ){
        return null;
    }
    if(is_null($field)){
        return $_SESSION['user'];
    }
    if(!isset($_SESSION['user'][$field])){
        return null;
    }
    return $_SESSION['user'][$field];
}