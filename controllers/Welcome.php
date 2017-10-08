<?php

class Welcome {

    function main() {
        $userModel = Model::load('UserModel');
        
         if ($userModel->isLogin()) {
            redirect('/home');
        }
        else{
            View::load('welcome');
        }
        
        
    }

}
