<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author User
 */
class Model {

    static private $model_path = '';

    static function setModelPath($path) {
        Model::$model_path = $path;
    }

    static function load($name) {
        include Model::$model_path . '/' . $name . '.php';
        return new $name;
    }

}
