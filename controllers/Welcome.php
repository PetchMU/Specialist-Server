<?php

class Welcome {

    function main() {
        $userModel = Model::load('UserModel');
        
        Toolbar::hideToolbar();
        
         if ($userModel->isLogin()) {
            redirect('/home');
        }
        else{
            MenuFooter::hide();
            View::load('welcome');
        }
        
        
    }

}
