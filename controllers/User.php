<?php

class User {

    function main() {
        $db = Database::create();
        $res = $db->read("select * from Users");
        View::load('test', [
            'user_list' => $res
        ]);
    }

    function profile($userid) {
        $userModel = Model::load('UserModel');
        $userInfo = $userModel->getUserInfoById($userid);

        $friendModel = Model::load('FriendModel');
        $uid = userInfo('uid');
        $status = $friendModel->isFriend($uid, $userid);

        if ($userid == $uid) {
            $owner = TRUE;
        } else {
            $owner = FALSE;
        }
        
        $hasAuthorize = $status == 'friend' || $owner;

        if ($userInfo == null) {
            View::load('profile_not_found');
        } else {
            View::load('profile', [
                'userInfo' => $userInfo,
                'can_add_friend' => $status == 'not-friend',
                'can_accept_or_deny' => $status == 'has-request',
                'waiting_for_accept' => $status == 'waiting',
                'owner' => $owner,
                'has_authorize' => $hasAuthorize
            ]);
        }
    }

    function private_message($friend_uid) {
        Toolbar::showBackButton();
        MenuFooter::hide();
        $uid = userInfo('uid');
        $chatModel = Model::load('ChatModel');
        $notiModel = Model::load('NotifyModel');

        if (isset($_POST['new_message']) && !empty(trim($_POST['new_message']))) {
            $chatModel->addMessage($uid, $friend_uid, trim($_POST['new_message']));
            $notiModel->addFriendMessageNoti($friend_uid, trim($_POST['new_message']));
            return refresh();
        }

        $chatInfo = $chatModel->getMessages($uid, $friend_uid);
        //print_r($chatInfo);
        View::load('private_message', [
            'chatInfo' => $chatInfo
        ]);
    }

    function listAll() {

        //$page = Request::get("page", 1);
        //$limit = 1000;
        //$offset = (max(1, $page) - 1) * $limit;
        $uid = userInfo('uid');
        $model = Model::load('FriendModel');
        $friends = $model->getAll($uid);
//        $db = Database::create();
//        $r = $db->read("select * from Users limit $offset, $limit");
//        $c = $db->read("select count(*) as c from Users");
//        $total = intval($c[0]['c']);
//
//        $r = array_map([User::class, 'mapper_user_list'], $r);

        View::load('user_list', [
            'total' => count($friends),
            //'total_page' => ceil($total / $limit),
            'friend_list' => $friends
        ]);
    }

    function detail($id) {
        $db = Database::create();
        $r = $db->read("select * from Users where status = 1 and uid = " . $id);

        $r = array_map([User::class, 'mapper_user_detail'], $r);

        $status = count($r) > 0;

        Response::json([
            'status' => $status,
            'detail' => $status ? $r[0] : null
        ]);
    }

    function add($friend_uid) {
        $db = Database::create();
        $uid = userInfo('uid');
        $noti_model = Model::load('NotifyModel');

        $r = $db->read("select * from friends where uid_send = $friend_uid and uid_recv = $uid");
        if (empty($r)) {
            $w = $db->write("
            insert into friends 
            set uid_send = $uid,
                uid_recv = $friend_uid,
                status = 1,
                send_datetime = now()
            ");
            $noti_model->addFriendRequestNoti($friend_uid);
        } elseif ($r[0]['status'] == 1) {
            $w = $db->write("
            insert into friends 
            set uid_send = $uid,
                uid_recv = $friend_uid,
                status = 2,
                send_datetime = now()
            ");
            $w = $db->write("
            update friends 
            set 
                status = 2,
                send_datetime = now()
            where uid_send = $friend_uid and uid_recv = $uid
            ");
            $noti_model->addFriendAcceptNoti($friend_uid);
        }
        redirect("/user/$friend_uid");
    }

    function deny($friend_uid) {
        $uid = userInfo('uid');
        $db = Database::create();
        $r = $db->write("
            delete from friends 
            where uid_send = $friend_uid and uid_recv = $uid
            ");

        redirect('/user/' . $friend_uid);
    }

    function edit($uid = NULL) {
        MenuFooter::hide();

        $picture = $_FILES['picture'];

        $thumb = null;
        if ($picture['tmp_name'] && getimagesize($picture['tmp_name'])) {
            $thumb_db  =  THUMB_FLODER . '/'.userInfo('uid') . '-' . $picture['name'];
            $thumb = THUMB_PATH . '/'.userInfo('uid') . '-' . $picture['name'];
            move_uploaded_file($picture['tmp_name'], $thumb);
        }

        if (isset($_POST) && $_POST) {
            $model = Model::load('UserModel');
            $uid = userInfo('uid');
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $dob = $_POST['dob'];
            $phone = $_POST['phone'];
            $model->edit($uid, $fname, $lname, $dob, $phone);
            if ($thumb) {
                $model->changePicture($uid, $thumb_db);
            }
            $update_done = TRUE;
        } else {
            $update_done = FALSE;
        }

        $user = userInfo();
        View::load('profile_edit', [
            'user' => $user,
            'update_done' => $update_done
        ]);
    }

    function selectSendAllMessage() {
        $messagesend = FALSE;

        if (isset($_POST['message']) && isset($_POST['uids'])) {
            $uid = userInfo('uid');
            $message = $_POST['message'];
            $friend_uids = $_POST['uids'];
            $model = Model::load('ChatModel');

            foreach ($friend_uids as $friend_uid) {
                $model->addMessage($uid, $friend_uid, $message);
                $messagesend = true;
            }
        }

        $uid = userInfo('uid');
        $model = Model::load('FriendModel');
        $friends = $model->getAll($uid);


        View::load('user_all_message', [
            'total' => count($friends),
            'friend_list' => $friends,
            'messagesend' => $messagesend
        ]);
    }

    static function mapper_user_list($data) {
        return [
            'uid' => $data['uid'],
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'picture' => $data['picture']
        ];
    }

    static function mapper_user_detail($data) {
        unset($data["password"]);
        unset($data["status"]);
        return $data;
    }

}
