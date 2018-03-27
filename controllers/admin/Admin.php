<?php

class Admin {

    function __construct() {
        if (!isAdmin()) {
            View::load('401');
            exit();
        }
    }

    function console($flash_message = '') {

        $group_model = Model::load('GroupModel');
        $all_group = $group_model->getGroupHierarchy();

        $reject_model = Model::load('RejectionModel');
        $waitinglist = $reject_model->seeWaiting();

        $user_model = Model::load('UserModel');


        View::load('admin_console', [
            'flash_message' => $flash_message,
            'all_group' => $all_group,
            'waitinglist' => $waitinglist,
            'user_model' => $user_model,
            'group_model' => $group_model
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

    function submitReject() {
        $rid = $_POST['rid'];
        $reject = intval($_POST['reject']) == 1;
        $model = Model::load('RejectionModel');
        
        if($reject) {
            $model->adminReject($rid);
            return $this->console("Already reject");
        } 
        else {
            $model->adminCancel($rid);
            return $this->console();
        }
    }

}
