<?php

class Home {

    function main() {
        $userModel = Model::load('UserModel');
        
        //$userModel->login('petch@gmail.com','Petch');
        
        if ($userModel->isLogin()) {
            View::load('home');
        }
        else{
            redirect('/login');
        }
    }

}
