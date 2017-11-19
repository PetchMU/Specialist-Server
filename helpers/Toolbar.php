<?php

class Toolbar {

    static $title = 'MindContact';

    static function setTitle($title) {
        self::$title = $title;
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
            'user_info' => $user_info
        ]);
    }

}