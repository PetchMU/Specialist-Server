<?php

class Toolbar {

    static $title = 'MindContact';
    static $show_back = TRUE;

    static function setTitle($title) {
        self::$title = $title;
    }
    
    static function showBackButton(){
        self::$show_back = TRUE;
    }
    
    static function hideBackButton(){
        self::$show_back = FALSE;
    }

    static function display() {

        $userModel = Model::load('UserModel');
        $is_login = $userModel->isLogin();

        if ($is_login) {
            $user_info = $userModel->getInfo();
            $user_info['thumbnail'] = $userModel->getThumbnailUrl();
        }
        else{
            $user_info = null;
        }

        View::load('toolbar', [
            'title' => self::$title,
            'user_info' => $user_info,
            'show_back' => self::$show_back
        ]);
    }

}
