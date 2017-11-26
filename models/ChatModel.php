<?php
class ChatModel{
    function getMessages($uid, $friend_uid){
        $db = Database::create();
        $r = $db->read("
            select * 
            from chats
            where ((uid = $uid and relate_id = $friend_uid) or (relate_id = $uid and uid = $friend_uid)) and relate_type=1
            order by chat_datetime desc
            limit 0,50
        ");
        return array_reverse($r);
    }
    
    function addMessage($uid,$friend_uid,$message){
        $db = Database::create();
        $r = $db->read("
            insert into chats
            set uid = $uid,
            chat_datetime = now(),
            message = '$message',
            relate_id = $friend_uid,
            relate_type = 1
        ");
        
    }
}

