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
    function user(){
        $keyword = Request::get('k');
        
        
        $db = Database::create();
        $r = $db->read("select * from Users where fname like '%$keyword%' or lname like '%$keyword%' ");
        
        $r = array_map([User::class, 'mapper_user_list'], $r);
        
        Response::json([
            'status' => count($r)>0,
            'list' => $r
        ]);
    }
}
