<?php

function redirect($url){
    header("Location: " . $url);
}

function isLogin(){
    return Model::load('UserModel')->isLogin();
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