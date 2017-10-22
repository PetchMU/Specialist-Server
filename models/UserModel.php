<?php

class UserModel {
    
    const REGISTER_OK = 0;
    const REGISTER_ERROR_EMAIL_DUPLICATE = 1;

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
    
    function getInfo(){
        $data = $_SESSION['user'];
        $data['special_field'] = $this->getSpecialField();
        return $data;
    }
    
    function getSpecialField(){
        $f = $_SESSION['user']['special_field'];
        return json_decode($f,true);
    }
    function setSpecialField($data){
        $_SESSION['user']['special_field'] = json_encode($data);
    }
    function register($email, $password){
        $db = Database::create();
        $r = $db->read("select 1 from Users where email like '$email'");
        
        if(!empty($r)){
            return self::REGISTER_ERROR_EMAIL_DUPLICATE;
        }
        
        //echo("insert into Users (email, password) values ('$email', '$password') ");
        $e = $db->write("insert into Users (email, password) values ('$email', '$password') ");
        $this->login($email, $password);
        return self::REGISTER_OK;
    }
    

}
