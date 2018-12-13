<?php
class login extends controller
{
    public function index()
    {
        $this->render('login');
    }
    public function send()
    {
        if($_POST)
        {
            $email = helper::cleaner($_POST['email']);
            $password = helper::cleaner($_POST['password']);
            if($email!="" and $password!="")
            {
                $control = $this->model('user')->control($email,md5($password));
                if($control == 0)
                {
                    var_dump($password);
                    helper::flashData("statu","Don't Found User");
                    helper::redirect(SITE_URL."/login");
                }
                else
                {
                    sessionManager::createSession(['email'=>$email,'password'=>md5($password)]);
                    helper::redirect(SITE_URL . "/users/index");
                }
            }
            else
            {
                helper::flashData("statu","Please Enter All Fields");
                helper::redirect(SITE_URL."/login");
            }
        }
        else
        {
            exit("Bad Request");
        }
    }
}