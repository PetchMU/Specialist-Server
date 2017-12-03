<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'User.php';

/**
 * Description of Search
 *
 * @author User
 */
class Search {

    function user() {
        $keyword = Request::get('k');

        $uid = userInfo('uid');

        $db = Database::create();
        $match_user = $db->read("select * from Users where (fname like '%$keyword%' or lname like '%$keyword%') and uid != $uid");

        $my_friend = $db->read("select * from friends where uid_send = $uid");
        /*
         * [
         *  0 => [1,2,done]
         * ]
         */
        $friend_index = [];
        foreach ($my_friend as $f) {
            $friend_index[$f['uid_recv']] = $f['status'];
        }
        /*
         * [
         *  21 => done
         * ]
         */

        View::load('user_search', [
            'user_list' => $match_user,
            'status_list' => $friend_index
        ]);
    }

}
