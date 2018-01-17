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

    function home($gid) {
        $model = Model::load('GroupModel');
        $chats = $model->getGroupMessage($gid);
        $num = count($chats);
        $max = 4;

        if ($num > $max) {
            $chats = array_slice($chats, 0, $max);
            $read_more = TRUE;
        } else {
            $read_more = FALSE;
        }

        View::load('group_home', [
            'chats' => $chats,
            'read_more' => $read_more,
            'gid' => $gid
        ]);
    }

    function readmore($gid) {
        $model = Model::load('GroupModel');
        $chats = $model->getGroupMessage($gid);
        View::load('group_readmore', [
            'chats' => $chats,
        ]);
    }

    function member($gid) {
        $model = Model::load('GroupModel');
        $members = $model->getAllMembers($gid);
        View::load('group_member', [
            'members' => $members,
            'total' => count($members)
        ]);
    }

    function addNotice($gid) {
        if (isset($_POST['topic']) && isset($_POST['message'])) {
            
            $model = Model::load('GroupModel');
            $uid = userInfo('uid');
            $topic = $_POST['topic'];
            $message = $_POST['message'];
            $model->addNotice($gid, $uid, $topic, $message);
            
            Model::load('NotifyModel')->addGroupNoti($gid);
            
            return redirect("/group/$gid");
        } 
        else {
            View::load('group_addnotice', [
                'gid' => $gid
            ]);
        }
    }

}
