<?php

class GroupModel {

    function getAll() {
        $db = Database::create();
        return $r = $db->read("SELECT * FROM `Group` ORDER BY name");
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
    function getGroupMessage($gid){
        $db = Database::create();
        return $r = $db->read("
            SELECT * 
            FROM chats JOIN Users ON chats.uid = Users.uid 
            WHERE relate_id = $gid and relate_type = 2 
            ORDER BY chat_datetime DESC");
    }

}
