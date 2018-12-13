<?php

class main extends  controller
{
    public function index()
    {
        $this->model("user")->useradd();
        $this->render('main/index',['name'=>"Nizami",'surname'=>"alizadetest"]);
    }
}