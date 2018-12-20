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
    public function showAll()
    {
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL); die();}
        $data=$this->model('post')->showAllPost();
        $this->render('showAllPost',['data'=>$data]);
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
        $this->render('rating',['data'=>$rating]);

//        if ($rating)
//        {
//            helper::flashData("statu", "Successfully ");
//            helper::redirect(SITE_URL . "/posts/show");
//        }
//        else{
//            helper::flashData("statu", "don't Successfully");
//            helper::redirect(SITE_URL . "/posts/show");
//        }
    }
    public function getComment($id)
    {
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL); die();}
        $comments = $this->model('post')->commentall($id);
//        if ($comments==null)
//        {
//            $this->render('comment',['com'=>$id]);
//        }
//        else {
//            $this->render('comment',['com'=>$comments]);
//        }
                   $this->render('comment',['com'=>$comments]);
    }
    public function comment()
    {
        if ($_POST) {
            $commit = $_POST['commit'];
            $user_email=$_SESSION['email'];
            $post_id=$_POST['post_id'];
            if ($comment_id=0)
            {
                $comment_id=0;
            }
            else{
                $comment_id=$_POST['comment_id'];
            }
            if ($commit != "" ) {
                $comments = $this->model('post')->comment($commit,$post_id,$user_email,$comment_id);
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