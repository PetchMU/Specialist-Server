<?php

class Home {

    function main() {
        $userModel = Model::load('UserModel');
        
        if ($userModel->isLogin()) {
            
            $friendModel = Model::load('FriendModel');
            
            View::load('home', [
                'friend_list' => $friendModel->getAll()
            ]);
        }
        else{
            redirect('/welcome');
        }
    }

}
