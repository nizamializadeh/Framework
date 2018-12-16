<?php
class users extends controller
{
    public function index()
    {
        $this->render("welcome");
//        echo "Welcome Users";
        return 'welcome';
    }
    public function lists($id)
    {
        echo "Users List"."". $id;
    }
}