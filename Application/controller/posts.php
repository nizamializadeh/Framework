<?php
class posts extends controller
{
    public function index()
    {
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL); die();}
        $this->render('welcome');
    }
    public function create()
    {
        if ($_POST) {
            $title = helper::cleaner($_POST['title']);
            $description = helper::cleaner($_POST['description']);
            $user_email=$_SESSION['email'];
            if ($title != "" and $description != "") {
                $insert = $this->model('post')->create($title,$description,$user_email);
                if ($insert) {
                    helper::flashData("statu", "Successfully create posts");
                    helper::redirect(SITE_URL . "/posts/index");
                } else {
                    helper::flashData("statu", "has not create");
                    helper::redirect(SITE_URL . "/posts/index");
                }
            } else {
                helper::flashData("statu", "Please Enter All Fields");
                helper::redirect(SITE_URL . "/posts/index");
            }
        } else {
            exit("Bad Request");
        }
    }
    public function show()
    {

        $data=$this->model('post')->show();
        $this->render('showpost',['data'=>$data]);


    }
}