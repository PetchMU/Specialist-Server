<?php

class Home {

    function main() {
        $userModel = Model::load('UserModel');
        
        if ($userModel->isLogin()) {
            View::load('home');
        }
        else{
            redirect('/welcome');
        }
    }

}
