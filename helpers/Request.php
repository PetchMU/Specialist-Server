<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Request
 *
 * @author User
 */
class Request {
    static function get($name, $default = null){
        if(isset($_GET[$name])){
            return $_GET[$name];
        }
        else{
            return $default;
        }
    }
}
