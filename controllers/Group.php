<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Group
 *
 * @author Kreangkrai
 */
class Group {

    function main() {
        $model = Model::load('GroupModel');
        $uid = userInfo('uid');
        $groups = $model->joinedBy($uid);
        if (!empty($groups)) {
            View::load('group', [
                'groups' => $groups
            ]);
        } else {
            redirect('/group/search');
        }
    }
    
    function home($gid){
        $model = Model::load('GroupModel');
        $chats = $model->getGroupMessage($gid);
        $num = $count($chats);
        $max = 4;
        
        if($num > $max){
            $chats = array_slice($chats, 0, $max);
            $read_more = TRUE;
        }
        else{
            $read_more  = FALSE;
        }
        
        View::load('group_home',[
            'chats' => $chats,
            'read_more' => $read_more
        ]);
        
    }
    

}
