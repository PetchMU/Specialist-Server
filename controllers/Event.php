<?php

class Event {
    function main(){
        $uid = userInfo('uid');
        $model = Model::load('FriendModel');
        $friend_birthday_soon = $model->getComingBirthdayFriends($uid);
        
        
        View::load('event',[
            'friend_list' => $friend_birthday_soon
        ]);
        
    }
}
