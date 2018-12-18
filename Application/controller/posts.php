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
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL); die();}
        $data=$this->model('post')->show();
        $this->render('showpost',['data'=>$data]);
    }
    public function delete($id)
    {
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL); die();}
        $delete=$this->model('post')->delete($id);
        helper::redirect(SITE_URL . "/posts/show");
    }
    public function getrating($id)
    {
        $this->render('rating',['data'=>$id]);
    }
    public function rating()
    {
        $count=$_POST['count'];
        $user_email=$_SESSION['email'];
        $post_id=$_POST['post_id'];
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL); die();}
        $rating=$this->model('post')->rating($count,$user_email,$post_id);
        if ($rating)
        {
            helper::flashData("statu", "Successfully ");
            helper::redirect(SITE_URL . "/posts/show");
        }
        else{
            helper::flashData("statu", "don't Successfully");
            helper::redirect(SITE_URL . "/posts/show");
        }
    }
}