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
    
    function getAll($uid = null){
        
        if(is_null($uid)){
            $uid = userInfo('uid');
        }
        
        $db = Database::create();
        return $r = $db->read("SELECT * FROM `Users` where uid in (select uid_recv from friends where uid_send = $uid and status = 2)");
    }
    
    
}
