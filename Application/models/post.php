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
    public function commentall($id)
    {
        $query = $this->db->prepare("SELECT * FROM comments WHERE post_id='$id'");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);

    }
    public function comment($commit, $post_id, $user_email)
    {
        $query = $this->db->prepare("insert into comments (commit,post_id,user_email) values(?,?,?)");
        $comments = $query->execute(array($commit,$post_id, $user_email));
        if ($comments) {
            return true;
        } else {
            return false;
        }

    }
}