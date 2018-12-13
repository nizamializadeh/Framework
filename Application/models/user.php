<?php
class user extends model
{

    public function useradd()
    {
        $query=$this->db->prepare("insert into users(name,surname)values (?,?)");
        $insert=$query->execute(array('nizami','alizade'));
    }
}
