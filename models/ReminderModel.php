<?php

class ReminderModel {
    function getAll($uid){
        $db = Database::create();
        $r = $db->read("
            select *
            from reminder
            where uid = $uid
            order by remind_at
            ");
        return $r;
    }
    function add($uid, $topic, $desc, $at){
        $db = Database::create();
        $w = $db->write("
            insert into reminder
            set 
                uid = $uid,
                topic  = '$topic',
                description = '$desc',
                remind_at = '$at'
            ");
    }
    function clear($reid){
        $db = Database::create();
        $d = $db->write("
            delete from reminder
            where reid = $reid
            ");
    }
    function clearAll($uid){
        $db = Database::create();
        $d = $db->write("
            delete from reminder
            where uid = $uid
            ");
    }
}
