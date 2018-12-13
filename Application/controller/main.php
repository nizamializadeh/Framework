<?php

class main extends  controller
{
    public function index()
    {
        if (!$this->sessionManager->isLogged())
        {
            helper::redirect(SITE_URL."/login");
            die();
        }
//        $this->model("user")->useradd();
//        $this->render('main/index',['name'=>"Nizami",'surname'=>"alizadetest"]);
    }
}