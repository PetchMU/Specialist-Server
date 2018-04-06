<?php

class Event {
    function main($flash_message = ''){
        $uid = userInfo('uid');
        $model = Model::load('FriendModel');
        $friend_birthday_soon = $model->getComingBirthdayFriends($uid);
        
        
        View::load('event',[
            'friend_list' => $friend_birthday_soon,
            'flash_message' => $flash_message
        ]);
        
    }
    
    function submit(){
        $flash_message = '';
        if($_GET['type']=="birthday"){
            $uid = userInfo('uid');
            $friend_uid = $_POST['uid'];
            $message = $_POST['birthday_message'];
            $model = Model::load('ChatModel');
            $model->addMessage($uid,$friend_uid,$message);
            $flash_message = 'Birthday message messaged';
        }
        $this->main($flash_message);
    }
}
