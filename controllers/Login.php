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
        $userModel = Model::load('UserModel');
        if(isset($_GET['email']) && isset($_GET['password'])){
            $userModel->login($_GET['email'], $_GET['password']);
        }
        View::load('login');
    }
        
    
}
