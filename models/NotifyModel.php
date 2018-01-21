<?php

class NotifyModel {

    function hasUnseen() {
        if (!isLogin()) {
            return FALSE;
        }

        $db = Database::create();
        $uid = userInfo('uid');
        $r = $db->read("select count(*) as c from notification where uid = $uid and status = 0");
        //echo '---------------------->'. $r[0]['c'];
        return $r[0]['c'] > 0;
    }

    function getUnseenCount() {
        $db = Database::create();
        $uid = userInfo('uid');
        $r = $db->read("select count(*) as c from notification where uid = $uid and status = 0");

        $count = $r[0]['c'];
        return $count < 100 ? $count : '99+';
    }

    function getAll() {
        $db = Database::create();
        $uid = userInfo('uid');
        $r = $db->read("select * from notification where uid = $uid order by create_at desc");

        return $r;
    }

    function seenAll() {
        $db = Database::create();
        $uid = userInfo('uid');
        $r = $db->write("update notification set status = 1 where uid = $uid and status = 0");
    }
    function read($nid){
        $db = Database::create();
        
        $r = $db->write("update notification set status = 2 where nid = $nid");
    }

    function addFriendRequestNoti($friend_uid) {
        $db = Database::create();
        $uid = userInfo('uid');
        $fname = userInfo('fname');
        $lname = userInfo('lname');

        $w = $db->write("
            insert into notification 
            set uid = $friend_uid,
                title = 'you have friend request',
                description = '$fname $lname send friend request to you',
                relate_id = $uid,
                relate_type = 1,
                status = 0,
                icon = 4
            ");
    }

    function addFriendAcceptNoti($friend_uid) {
        $db = Database::create();
        $uid = userInfo('uid');
        $fname = userInfo('fname');
        $lname = userInfo('lname');

        $w = $db->write("
            insert into notification 
            set uid = $friend_uid,
                title = 'friend request was accepted',
                description = '$fname $lname is your friend now',
                relate_id = $uid,
                relate_type = 1,
                status = 0,
                icon = 4
            ");
    }

    function addGroupNoti($gid) {
        $db = Database::create();
        $uid = userInfo('uid');
        $sender_name= userInfo('fname');
        
        $model = Model::load('GroupModel');
        $members = $model->getAllMembers($gid);
        $group = $model->get($gid);
        
        foreach ($members as $member){
            if($uid == $member['uid']){
                continue;
            }
            $db->write("
                INSERT INTO notification
                SET
                    uid = {$member['uid']},
                    title = 'you have new notice',
                    description = '$sender_name add notice to {$group['name']}',
                    relate_id = $gid,
                    status = 0,
                    icon = 1,
                    relate_type = 2,
                    create_at = now()
                ");
        }
    }

    function addFriendMessageNoti($friend_uid,$message) {
        $db = Database::create();
        $uid = userInfo('uid');
        $fname = userInfo('fname');
        $lname = userInfo('lname');
        
        if(strlen($message) > 20){
            $message = substr($message, 0,20)."...";
        }
        
        $d = $db->write("
            delete from notification
            where uid =$friend_uid
                and relate_id = $uid
                and icon = 2
            ");

        $w = $db->write("
            insert into notification 
            set uid = $friend_uid,
                title = '$fname $lname says',
                description = '\"$message\"',
                relate_id = $uid,
                relate_type = 1,
                status = 0,
                icon = 2,
                create_at = now()
            ");
    }

    function addFriendBirthdayNoti() {
        $db = Database::create();
        $uid = userInfo('uid');
    }

}
