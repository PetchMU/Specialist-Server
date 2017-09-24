<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author User
 */
class Logout {
    //put your code here
    function main (){
        $userModel = Model::load('UserModel');
        $userModel -> logout();
        
        redirect('/home');
    }
}
