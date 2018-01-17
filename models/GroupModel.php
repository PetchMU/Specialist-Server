<?php

class GroupModel {

    function getAll() {
        $db = Database::create();
        return $r = $db->read("SELECT * FROM `Groups` ORDER BY name");
    }
    function get($gid){
        $db = Database::create();
        $r = $db->read("SELECT * FROM `Groups` WHERE gid = $gid");
        //print_r($r);
        //echo"SELECT * FROM `Group` WHERE gid = $gid";exit;
        return empty($r) ? NULL : $r[0];
    }

    function joinedBy($uid) {
        //SELECT * FROM Groups join joins on Groups.gid = joins.gid WHERE uid = 20
        $db = Database::create();
        return $r = $db->read(" 
            SELECT *
            FROM Groups
            WHERE gid IN(
                SELECT gid
                FROM joins
                WHERE uid = $uid
            )
            ORDER BY name");
    }

    function getGroupMessage($gid) {
        $db = Database::create();
        return $r = $db->read("
            SELECT * 
            FROM chats JOIN Users ON chats.uid = Users.uid 
            WHERE relate_id = $gid and relate_type = 2 
            ORDER BY chat_datetime DESC");
    }

    function getAllMembers($gid) {
        $db = Database::create();
        return $r = $db->read("
            SELECT *
            FROM Users
            WHERE uid in(
                SELECT uid
                FROM `joins` 
                WHERE gid = $gid
            )");
    }

    function addNotice($gid, $uid, $topic, $message) {
        $db = Database::create();
        $topic = $db->realEscapeString($topic);
        $message = $db->realEscapeString($message);
        $db->write("
            INSERT INTO chats(uid, relate_id, topic, message, relate_type, chat_datetime)
            VALUES ($uid, $gid, '$topic', '$message', 2, now())
            ");
        
    }

}
