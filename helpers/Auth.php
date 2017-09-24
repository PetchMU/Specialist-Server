<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth
 *
 * @author User
 */
class Auth {
    
    static function login($email, $password){
        $db = Database::create();
        $res = $db->read("select * from Users where email = '$email' and password = '$password' ");
        if(count($res) > 0){
            $_SESSION['user'] = $res[0];
            return true;
        }
        
        return false;
    }
    
    static function logout(){
        unset($_SESSION['user']);
    }
    
    static function isLogin(){
        return isset($_SESSION['user']);
    }
    
    static function getUser(){
        return isset($_SESSION['user']) ? $_SESSION['user'] : null;
    }
    
}
