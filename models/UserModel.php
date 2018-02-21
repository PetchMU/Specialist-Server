<?php

class UserModel {

    const REGISTER_OK = 0;
    const REGISTER_ERROR_EMAIL_DUPLICATE = 1;

    //put your code here
    function login($email, $password) {
        $db = Database::create();
        $r = $db->read("select * from Users where email like '$email' and password = '$password'");

        if (empty($r)) {
            return FALSE;
        } else {
            unset($r[0]['password']);
            $_SESSION['user'] = $r[0];
            return TRUE;
        }
    }

    function logout() {
        unset($_SESSION['user']);
    }

    function isLogin() {
        return isset($_SESSION['user']);
    }

    function getUserInfoById($userid) {
        $db = Database::create();
        $r = $db->read("select * from Users where uid = $userid");
        if (empty($r)) {
            return null;
        } else {
            unset($r[0]['password']);
            return $r[0];
        }
    }

    function getInfo() {
        $data = $_SESSION['user'];
        $data['special_field'] = $this->getSpecialField();
        return $data;
    }

    function getThumbnailUrl() {
        return $this->getInfo()['picture'];
    }

    function getSpecialField() {
        $f = $_SESSION['user']['special_field'];
        return json_decode($f, true);
    }

    function setSpecialField($data) {
        $_SESSION['user']['special_field'] = json_encode($data);
    }

    function register($email, $password) {
        $db = Database::create();
        $r = $db->read("select 1 from Users where email like '$email'");

        if (!empty($r)) {
            return self::REGISTER_ERROR_EMAIL_DUPLICATE;
        }

        //echo("insert into Users (email, password) values ('$email', '$password') ");
        $e = $db->write("insert into Users (email, password, register_date) values ('$email', '$password', now() )");
        $uid = $db->insertId();

        $a_pos = strpos($email, '@');
        $username = substr($email, 0, min($a_pos, 20));
        $username = preg_replace('/([^A-Za-z0-9])/', '', $username);
        $check_username = $username;
        $i = '';
        while (!empty($db->read("select 1 from Users where username = '$check_username'"))) {
            $i = intval($i) + 1;
            $check_username = $username . $i;
        }

        $thumb = "/res/images/thumbnail/_default.png";

        $db->write("
            update Users set 
                username = '$check_username',
                fname = '$check_username',
                picture = '$thumb'
            where  uid  = $uid");

        $this->login($email, $password);
        return self::REGISTER_OK;
    }

    function edit($uid, $fname = null, $lname = null, $dob = null, $phone = null) {
        $db = Database::create();
        if($fname == null && $lname == null && $dob == null && $phone == null){
            return;
        }
        $statement = [];
        if($fname){
            $statement[] = "fname = '$fname'";
            $_SESSION['user']['fname'] = $fname;
        }
        if($lname){
            $statement[] = "lname = '$lname'";
            $_SESSION['user']['lname'] = $lname;
        }
        if($dob){
            $dob = date('Y-m-d',strtotime($dob));
            $statement[] = "dob = '$dob'";
            $_SESSION['user']['dob'] = $dob;
        }
        if($phone){
            $statement[] = "phone = '$phone'";
            $_SESSION['user']['phone'] = $phone;
        }
        
        
        
        $statement_sql = implode(',', $statement);
        $w = $db->write("
            update Users set 
                $statement_sql
            where  uid  = $uid"
        );
    }

}
