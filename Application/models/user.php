<?php
class user extends model
{

//    public function useradd()
//    {
//        $query=$this->db->prepare("insert into users(name,surname)values (?,?)");
//        $insert=$query->execute(array('nizami','alizade'));
//    }

public function control($email,$password)
{
    $sqlQuery=$this->db->prepare("select * from user where email=? and password = ? ");
    $sqlQuery->execute(array($email,$password));
    return $sqlQuery->rowCount();
}

    public function create($name,$email,$password)
    {
        $query = $this->db->prepare("insert into users (name,email,password) values(?,?,?)");
        $insert = $query->execute(array($name,$email,$password));
        if($insert)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
