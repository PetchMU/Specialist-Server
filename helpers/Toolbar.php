<?php

class Toolbar {
    
    static $title = 'MindContact';

    static function setTitle($title){
        self::$title = $title;
    }

    static function display(){
        
        $userModel = Model::load('UserModel');
        $thumbUrl = $userModel->isLogin() ? $userModel->getThumbnailUrl() : null;
        
        View::load('toolbar', [
            'title' => self::$title,
            'thumbnail' => $thumbUrl
        ]);
    }
}
