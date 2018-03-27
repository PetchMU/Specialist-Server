<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RejectionModel
 *
 * @author Kreangkrai
 */
class RejectionModel {

    function submit($uid_rejector, $uid_rejected, $gid, $reason) {
//        echo "
//            INSERT INTO rejection(uid_rejector, uid_rejected, request_datetime, reason, status) 
//            VALUES ($uid_rejector, $uid_rejected, now(), '$reason', 0)
//            ";
//        exit();
        $db = Database::create();
        $w = $db->write("
            INSERT INTO rejection(uid_rejector, uid_rejected, request_datetime, gid, reason, status) 
            VALUES ($uid_rejector, $uid_rejected, now(), $gid, '$reason', 0)
            ");
    }

    function seeWaiting() {
        $db = Database::create();
        $r = $db->read("
            select *
            from rejection
            where status = 0
            ");
        return $r;
    }

    function adminReject($rid) {
        $db = Database::create();
        $w = $db->write("
            UPDATE rejection
            set status = 1
            where rid = $rid
            ");
        $r = $db->read("
            select *
            from rejection
            where rid = $rid
            ");
        $uid = $r[0]['uid_rejected'];
        $gid = $r[0]['gid'];
        
        $model = Model::load('GroupModel');
        $model->userUnjoin($uid, $gid);
    }

    function adminCancel($rid) {
        $db = Database::create();
        $w = $db->write("
            UPDATE rejection
            set status = -1
            where rid = $rid
            ");
    }

}
