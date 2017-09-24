<?php

class UserModel {

    //put your code here
    function login($email, $password) {
        $db = Database::create();
        $r = $db->read("select * from Users where email like '$email' and password = '$password'");

        if (empty($r)) {
            return FALSE;
        } 
        else {
            unset($r[0]['password']);
            $_SESSION['user'] = $r[0];
            return TRUE;
        }
    }
    
    function logout(){
        unset($_SESSION['user']);
    }
    function isLogin(){
        return isset($_SESSION['user']);
    }
    

}
