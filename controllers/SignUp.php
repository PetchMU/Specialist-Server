<?php

class SignUp {

    function main() {
        Toolbar::setTitle('Sign Up');
        
        $userModel = Model::load('UserModel');
        $uid = userInfo('uid');
        $err_email_exist = FALSE;
        $err_pass_miss_match = FALSE;
        $email = "";
        
        MenuFooter::hide();
        
        if(isset($_POST['email']) && isset($_POST['password']) && isset ($_POST['confirmpassword'])){
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $confirmpassword = $_POST['confirmpassword'];
            
            if($password != $confirmpassword){
                $err_pass_miss_match = true;
            }
            else{
                $result = $userModel->register($email, $password);
                if($result == UserModel::REGISTER_ERROR_EMAIL_DUPLICATE){
                    $err_email_exist = true;
                }
                elseif($result == UserModel::REGISTER_OK){
                    View::load('register_success',[
                        'uid' => $uid
                        
                        ]);
                    return;
                }
            }
        }
        
        //$p=[$_POST['email'] , $_POST['password'] , $_POST['confirmpassword']];
        //print_r(get_defined_vars());
        View::load('signup',[
            "err_email_exist" => $err_email_exist,
            "err_pass_miss_match" => $err_pass_miss_match,
            "email" => $email
        ]);
    }

}
