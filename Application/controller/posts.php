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
    public function getComment($id)
    {
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL); die();}
        $comments = $this->model('post')->commentall($id);
        $this->render('comment',['com'=>$comments,$id]);

    }
    public function comment()
    {
        if ($_POST) {
            $commit = $_POST['commit'];
            $user_email=$_SESSION['email'];
            $post_id=$_POST['post_id'];
            if ($commit != "" ) {
                $comments = $this->model('post')->comment($commit,$post_id,$user_email);
                if ($comments) {
                    helper::flashData("statu", "Successfully create posts");
                    helper::redirect(SITE_URL . "/posts/getComment/$post_id");
                } else {
                    helper::flashData("statu", "has not create");
                    helper::redirect(SITE_URL . "/posts/getComment/$post_id");
                }
            } else {
                helper::flashData("statu", "Please Enter All Fields");
                helper::redirect(SITE_URL . "/posts/getComment/$post_id");
            }
        } else {
            exit("Bad Request");
        }
    }
}