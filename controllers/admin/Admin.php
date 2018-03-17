<?php

class Admin {

    function __construct() {
        if (!isAdmin()) {
            View::load('401');
            exit();
        }
    }

    function console($flash_message = '') {

        $model = Model::load('GroupModel');
        $all_group = $model->getGroupHierarchy();

        View::load('admin_console', [
            'flash_message' => $flash_message,
            'all_group' => $all_group
        ]);
    }

    function add_notice_to_all_group() {
        $topic = $_POST['topic'];
        $message = $_POST['message'];
        $gids = $_POST['selected_group'];
        $uid = userInfo('uid');
        
        

        $model = Model::load('GroupModel');
        $count = $model->addNoticeGroup($uid, $topic, $message, $gids);

        $flash_message = "a message sent to $count groups";

        return $this->console($flash_message);
    }

}
