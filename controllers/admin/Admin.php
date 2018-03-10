<?php

class Admin {

    function __construct() {
        if (!isAdmin()) {
            View::load('401');
            exit();
        }
    }

    function console($flash_message = '') {
        View::load('admin_console', [
            'flash_message' => $flash_message
        ]);
    }

    function add_notice_to_all_group() {
        $topic = $_POST['topic'];
        $message = $_POST['message'];
        $uid = userInfo('uid');
        
        $model = Model::load('GroupModel');
        $count = $model->addNotiiceAllGroup($uid, $topic, $message);
        
        $flash_message = "a message sent to $count groups";
        
        return $this->console($flash_message);
    }

}
