<?php
class post extends model
{
    public function create($title, $description, $user_email)
    {
        $query = $this->db->prepare("insert into posts (title,description,user_email) values(?,?,?)");
        $insert = $query->execute(array($title, $description, $user_email));
        if ($insert) {
            return true;
        } else {
            return false;
        }
    }


    public function show()
    {
        $a = $_SESSION['email'];
        $query = $this->db->prepare("SELECT * FROM posts WHERE user_email='$a'");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
        return $query->fetch(PDO::FETCH_ASSOC);

    }
}