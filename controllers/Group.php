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

    function main($parent_gid = 0) {

        if ($parent_gid == 0) {
            Toolbar::hideBackButton();
        }

        $model = Model::load('GroupModel');
        $uid = userInfo('uid');
        $groups = $model->joinedBy($uid, $parent_gid);
        if (!empty($groups)) {
            View::load('group', [
                'groups' => $groups,
                'parent_gid' => $parent_gid
            ]);
        } else {
            redirect('/group/search');
        }
    }

    function home($gid) {
        $model = Model::load('GroupModel');
        $uid = userInfo('uid');

        if ($model->hasSubGroup($gid)) {
            return $this->main($gid);
        }

        switch ($model->getAccessStatus($uid, $gid)) {
            case 'waiting':
                return View::load('group_cannot_access');
            case 'not_join':
                return View::load('group_will_join', [
                            'gid' => $gid
                ]);
            case 'joined':
            default:
        }

        $chats = $model->getGroupMessage($gid);
        $num = count($chats);
        $max = 4;

        if ($num > $max) {
            $chats = array_slice($chats, 0, $max);
            $read_more = TRUE;
        } else {
            $read_more = FALSE;
        }

        $waiting_people = $model->getTotalWantToJoin($gid);

        View::load('group_home', [
            'chats' => $chats,
            'read_more' => $read_more,
            'gid' => $gid,
            'waiting_people' => $waiting_people
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
            'total' => count($members),
            'gid' => $gid,
            'rejectsend' => isset($_GET['sent'])
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
        } else {
            View::load('group_addnotice', [
                'gid' => $gid
            ]);
        }
    }

    function addJoin($gid, $iid = 0) {
        $uid = userInfo('uid');
        $model = Model::load('GroupModel');
        $model->userWillJoin($uid, $gid, $iid);
        redirect("/group/$gid");
    }

    function allowing($gid) {
        $model = Model::load('GroupModel');

        if (isset($_GET['allow']) && $_GET['uid']) {
            if ($_GET['allow'] == "accept") {
                $model->userJoined($_GET['uid'], $gid);
            } else {
                $model->userDeny($_GET['uid'], $gid);
            }
            return redirect("/group/$gid/allow");
        }

        $users = $model->getWantToJoin($gid);
        View::load('group_allowing', [
            'users' => $users,
            'gid' => $gid
        ]);
    }

    function create() {
        $parent_gid = isset($_GET['parent_gid']) ? intval($_GET['parent_gid']) : 0;

        if (isset($_POST['group_name'])) {
            $group_name = $_POST['group_name'];
            $uid = userInfo('uid');
            $model = Model::load('GroupModel');
            $gid = $model->create($group_name, $parent_gid, $uid);
            redirect('/group/' . $gid);
        } else {
            View::load('group_create');
        }
    }

    function edit($gid) {
        $model = Model::load('GroupModel');
        $group = $model->get($gid);

        View::load('group_edit',[
            'group' => $group
        ]);
    }
    
    function reject($gid, $uid_rejected){
        $reason = $_POST['reason'];
        $uid_rejector = userInfo('uid');
        $model = Model::load('RejectionModel');
        $model->submit($uid_rejector, $uid_rejected, $gid, $reason);
        
        redirect("/group/$gid/member?sent");
                
    }

}
