<?php
class users
{
    public function index()
    {
        echo "Welcome Users";
    }

    public function lists($id)
    {
        echo "Users List"."". $id;
    }
}