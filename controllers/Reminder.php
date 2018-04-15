<?php

class Reminder {
    function main($uid){
        if(!isLogin()){
            return redirect('/');
        }
        if($uid != userInfo('uid')){
            return redirect('/user/'.userInfo('uid').'/reminder');
        }
        
        $model = Model::load('ReminderModel');
        $r_list_all = $model->getAll($uid);
        
        
        View::load('reminder',[
            'uid' => $uid,
            'reminders' => $r_list_all
        ]);
    }
    function add($uid){
        $topic = $_POST['topic'];
        $desc = $_POST['desc'];
        $date = date("Y-m-d", strtotime($_POST['date']));
        $time = $_POST['time'];
        
        $at = "$date $time"; 
        
        $model = Model::load('ReminderModel');
        $model->add($uid, $topic, $desc, $at);
        return redirect("/user/$uid/reminder");
        
    }
    
    function clear($uid, $reid){
        $model = Model::load('ReminderModel');
        $model->clear($reid);
        return redirect("/user/$uid/reminder");
    }
}
