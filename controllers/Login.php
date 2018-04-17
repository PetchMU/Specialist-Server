<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author User
 */
class Login {
    function main(){
        
        Toolbar::setTitle('Login');
        
        $userModel = Model::load('UserModel');
        if(isset($_POST['email']) && isset($_POST['password'])){
            $result = $userModel->login($_POST['email'], $_POST['password']);
            if($result){
                redirect('/home');
            } else {
                View::load('login', [
                    'err_user_password_wrong' => true
                ]);
            }
        }
        else{
            View::load('login');
        }
    }
        
    
}
