<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FriendModel
 *
 * @author Kreangkrai
 */
class FriendModel {

    function getAll($uid = null) {

        if (is_null($uid)) {
            $uid = userInfo('uid');
        }

        $db = Database::create();
        return $r = $db->read("SELECT * FROM `Users` where uid in (select uid_recv from friends where uid_send = $uid and status = 2)");
    }

    function isFriend($uid1, $uid2) {
        $db = Database::create();
        $send = $db->read("SELECT * FROM friends where uid_send = $uid1 and uid_recv = $uid2");
        $recv = $db->read("SELECT * FROM friends where uid_send = $uid2 and uid_recv = $uid1");

        if (empty($send) && empty($recv)) {
            return 'not-friend';
        }

        if (!empty($send) && empty($recv)) {
            return 'waiting';
        }
        if (empty($send) && !empty($recv)) {
            return 'has-request';
        }

        return 'friend';
    }

    function getComingBirthdayFriends($uid) {
        $db = Database::create();
        $uid = userInfo('uid');
        $start = date('z');
        $end = ($start + 30) % 366;

        $start++;
        $end++;
        if ($start < $end) {
            $r = $db->read("
            select *
            from Users
            where  dayofyear(dob) >= $start and dayofyear(dob) <= $end 
                and uid in(SELECT uid_recv as uid FROM `friends` where uid_send = $uid and status = 2)
            order by dayofyear(dob)
            ");
        } else {
            $r = $db->read("
            select *
            from Users
            where  dayofyear(dob) >= $start or dayofyear(dob) <= $end 
                and uid in(SELECT uid_recv as uid FROM `friends` where uid_send = $uid and status = 2)
            order by dayofyear(dob)
            ");
        }
        return $r;
    }

}
