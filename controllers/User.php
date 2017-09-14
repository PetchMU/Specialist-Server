<?php

class User {
    
    function main(){
        $db = Database::create();
        $res = $db->read("select * from Users");
        View::load('test', [
            'user_list' => $res
        ]);
    }
    
    function main2($num){
        echo 'user: ' . $num;
        $db = Database::create();
        $res = $db->read("select * from Users where uid = $num");
        View::load('test');
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
