<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of View
 *
 * @author User
 */
class View {

    static private $view_path = '';

    static function setViewPath($path) {
        View::$view_path = $path;
    }

    static function load($name, $data = []) {
        extract($data);
        include View::$view_path . '/' . $name . '.php';
    }

}
