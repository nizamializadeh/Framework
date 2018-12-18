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
    }

    public function delete($id)
    {
        $query = $this->db->prepare("delete from posts where id = ?");
        $query->execute(array($id));
    }
    public function rating($count,$user_email,$post_id)
    {

        $control = $this->db->prepare("SELECT * FROM posts WHERE user_email='$user_email' AND post_id='$post_id'");
        $test=$control->execute();
        if ($test) {
            $query = $this->db->prepare("insert into rating (count,user_email,post_id) values(?,?,?)");
            $rating = $query->execute(array($count,$user_email,$post_id));
        } else {
            return false;
        }
    }

}