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
    function submit($uid_rejector, $uid_rejected, $gid, $reason){
        $db = Database::create();
        $w = $db->write("
            INSERNT INTO rejection(uid_rejector, uid_rejected, request_datetime, reason, status) 
            VALUES ($uid_rejector, $uid_rejected, now(), '$reason', 0)
            ");
    }
}
