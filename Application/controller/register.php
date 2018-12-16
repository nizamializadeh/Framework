<?php
class register extends controller
{
    public function index()
    {
        $this->render('register');
    }

    public function send()
    {

        if ($_POST) {
            $name = helper::cleaner($_POST['name']);
            $email = helper::cleaner($_POST['email']);
            $password = helper::cleaner($_POST['password']);
            if ($name != "" and $email != "") {
                $insert = $this->model('user')->create($name,$email,$password);
                if ($insert) {
                    var_dump($password);

                    helper::flashData("statu", "Successfully Registered");
                    helper::redirect(SITE_URL . "/register/index");
                } else {
                    helper::flashData("statu", "has not registered");
                    helper::redirect(SITE_URL . "/register/index");
                }
            } else {
                helper::flashData("statu", "Please Enter All Fields");
                helper::redirect(SITE_URL . "/register/index");
            }

        } else {
            exit("Bad Request");
        }
    }
}