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
class Notification {

    const MAX_NOTI_DISPLAY = 20;

    function main() {
        Toolbar::hideBackButton();
        $model = Model::load('NotifyModel');
        $noti_list = $model->getAll();
        if (count($noti_list) > self::MAX_NOTI_DISPLAY) {
            $noti_list = array_slice($noti_list, 0, self::MAX_NOTI_DISPLAY);
        }

        $model->seenAll();

        View::load('notification', [
            'noti_list' => $noti_list
        ]);
    }

    function read($nid) {
        $model = Model::load('NotifyModel');
        $model->read($nid);
        if (isset($_GET['next'])) {
            redirect($_GET['next']);
        } else {
            redirect('/notification');
        }
    }

}
