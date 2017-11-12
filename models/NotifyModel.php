<?php

class NotifyModel {
    
    function hasUnseen() {
        if(!isLogin()){
            return FALSE;
        }
        
        $db = Database::create();
        $uid = userInfo('uid');
        $r = $db->read("select count(*) as c from notification where uid = $uid and status = 0");
        //echo '---------------------->'. $r[0]['c'];
        return $r[0]['c'] > 0;
    }
    
    function getUnseenCount(){
        $count = 10;
        return $count < 100 ? $count : '99+';
    }
}