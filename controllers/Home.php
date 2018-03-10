<?php

class Home {

    function main() {

        Toolbar::hideBackButton();
        $userModel = Model::load('UserModel');

        if ($userModel->isLogin()) {

            $friendModel = Model::load('FriendModel');
            $user = userInfo();
            /* View::load('home', [
              'friend_list' => $friendModel->getAll()
              ]); */
            View::load('home2',[
                'user' => $user
            ]);
        } else {
            redirect('/welcome');
        }
    }

}
