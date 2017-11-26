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
        if ($userInfo == null) {
            View::load('profile_not_found');
        } else {
            View::load('profile', [
                'userInfo' => $userInfo
            ]);
        }
    }

    function private_message($friend_uid) {        
        Toolbar::showBackButton();
        MenuFooter::hide();
        $uid = userInfo('uid');
        $chatModel = Model::load('ChatModel');
        
        if(isset($_POST['new_message']) && !empty(trim($_POST['new_message']))){
            $chatModel->addMessage($uid,$friend_uid,trim($_POST['new_message']));
            return refresh();
        }
        
        $chatInfo = $chatModel->getMessages($uid ,$friend_uid);
        //print_r($chatInfo);
        View::load('private_message', [
            'chatInfo' => $chatInfo
        ]);
    }

    function listAll() {

        $page = Request::get("page", 1);
        $limit = 50;
        $offset = (max(1, $page) - 1) * $limit;

        $db = Database::create();
        $r = $db->read("select * from Users limit $offset, $limit");
        $c = $db->read("select count(*) as c from Users");
        $total = intval($c[0]['c']);

        $r = array_map([User::class, 'mapper_user_list'], $r);

        Response::json([
            'status' => true,
            'total' => $total,
            'total_page' => ceil($total / $limit),
            'list' => $r
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
