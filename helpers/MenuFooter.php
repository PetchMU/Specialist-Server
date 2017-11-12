<?php

class MenuFooter {
    
    static $show = true;
    
    static function hide(){
        static::$show = FALSE;
    }

    static function display() {

        if(!static::$show || !isLogin()){
            return;
        }
        
        $noti = Model::load('NotifyModel');

        View::load('menu_footer', [
            'has_notify' => $noti->hasUnseen(),
            'notify_count' => $noti->getUnseenCount()
        ]);
    }

}
