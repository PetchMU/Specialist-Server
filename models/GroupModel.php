<?php

class GroupModel {

    function create($group_name,$parent_gid,$uid){
        $db = Database::create();
        $w = $db ->write("
            INSERT INTO Groups
            set name = '$group_name',
                picture = '/res/images/group_thumbnail/1.jpg',
                parent_gid = $parent_gid,
                description = '',
                create_date = now()
            ");
        $gid = $db->insertId();
        $this->userWillJoin($uid, $gid);
        $this->userJoined($uid, $gid);
        return $gid;
    }
    
    function getAll() {
        $db = Database::create();
        return $r = $db->read("SELECT * FROM `Groups` ORDER BY name");
    }

    function get($gid) {
        $db = Database::create();
        $r = $db->read("SELECT * FROM `Groups` WHERE gid = $gid");
        //print_r($r);
        //echo"SELECT * FROM `Group` WHERE gid = $gid";exit;
        return empty($r) ? NULL : $r[0];
    }

    function joinedBy($uid, $parent_gid = 0) {
        //SELECT * FROM Groups join joins on Groups.gid = joins.gid WHERE uid = 20
        $db = Database::create();
        return $r = $db->read(" 
            SELECT *
            FROM Groups
            WHERE parent_gid = $parent_gid and
                gid IN(
                    SELECT gid
                    FROM joins
                    WHERE uid = $uid
                )
            ORDER BY name");
    }

    function hasSubGroup($gid) {
        $db = Database::create();
        $r = $db->read("
            SELECT *
            FROM Groups
            WHERE parent_gid = $gid
            
            ");
        return count($r)>0;
    }
    
    function getAccessStatus($uid, $gid){
        $db = Database::create();
        $r = $db->read("
            SELECT *
            FROM joins
            WHERE uid = $uid and gid = $gid           
            ");
        if(empty($r)){
            return 'not_join';
        }
        if($r[0]['status'] == 0){
            return 'waiting';
        }
        return 'joined';
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
    
    function addNoticeAllGroup($uid, $topic, $message){
        $groups = $this->getAll();
        $i = 0;
        foreach ($groups as $group){
            $this->addNotice($group['gid'], $uid, $topic, $message);
            $i++;
        }
        return $i;
    }
    
    function addNoticeGroup($uid, $topic, $message, $gids){
        $i = 0;
        foreach ($gids as $gid){
            $this->addNotice($gid, $uid, $topic, $message);
            $i++;
        }
        return $i;
    }
            
    function userWillJoin($uid, $gid, $iid = 0){
         $db = Database::create();
         $w = $db->write("
             REPLACE INTO joins(uid, gid, join_date, iid, status)
             VALUES ($uid, $gid, now(), $iid, 0)
             ");
         
         if($iid){
             $this->userJoined($uid, $gid);
         }
    }
    
    function userJoined($uid, $gid){
        $db = Database::create();
         $w = $db->write("
             UPDATE joins
             SET status = 1,
                join_date = now()
             WHERE uid = $uid and gid = $gid
             ");
    }
    
    function userUnjoin($uid, $gid){
        
        $db = Database::create();
        $w = $db->write("
            DELETE FROM joins
            WHERE uid = $uid and gid = $gid
            ");
    }
            
    function userDeny($uid, $gid){
        $db = Database::create();
         $w = $db->write("
             DELETE FROM joins
             WHERE uid = $uid and gid = $gid
             ");
    }
    
    function getTotalWantToJoin($gid){
        $db = Database::create();
        $r = $db->read("
            SELECT *
            FROM joins
            WHERE gid = $gid and status = 0
            ");
        return count($r);
    }
    
    function getWantToJoin($gid){
        $db = Database::create();
        $r = $db->read("
            SELECT *
            FROM Users 
            WHERE uid IN(
                SELECT uid
                FROM joins
                WHERE gid = $gid and status = 0
                )
            ");
        return $r;
    }
    
    function getGroupHierarchy(){
        $db = Database::create();
        $root_group = $db->read("
            SELECT *
            FROM Groups
            WHERE parent_gid = 0
            ");
        foreach ($root_group as $i => $root){
            $root_group[$i]['sub'] = $this->mergeSubGroup($root);
        }
        return $root_group;
    }
    
    private function mergeSubGroup($group){
        $db = Database::create();
        $sub_group = $db->read("
            SELECT *
            FROM Groups 
            WHERE parent_gid = {$group['gid']}
            ");
        foreach($sub_group as $i => $sub){
            if($sub['parent_gid'] > 0){
                $sub_group[$i]['sub'] = $this->mergeSubGroup($sub);
            }
        }
        return $sub_group;
    }
}
