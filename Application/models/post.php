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

    public function showAllPost()
    {
        $query = $this->db->prepare("SELECT * FROM posts");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
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

        $control = $this->db->prepare("SELECT * FROM rating WHERE user_email='$user_email' AND post_id='$post_id'");
        $test=$control->execute();
        $test= $control->fetchAll(PDO::FETCH_ASSOC);
        if ($test)
        {
//            $control = $this->db->prepare("UPDATE FROM rating WHERE count='$count' AND user_email='$user_email' AND post_id='$post_id'");
//            $test=$control->execute(array($count,$user_email,$post_id));
            return false;
        }
        else{
            $query = $this->db->prepare("insert into rating (count,user_email,post_id) values(?,?,?)");
            $rating = $query->execute(array($count,$user_email,$post_id));
            if ($rating) {
                return true;

            } else {
                return false;
            }
        }

//        $control = $this->db->prepare("SELECT * FROM posts WHERE user_email='$user_email' AND post_id='$post_id'");
//        $test=$control->execute();
//        $query = $this->db->prepare("insert into rating (count,user_email,post_id) values(?,?,?)");
//        $rating = $query->execute(array($count,$user_email,$post_id));
//        if ($rating) {
//            return true;
//
//        } else {
//            return false;
//        }
    }
    public function commentall($id)
    {
        $query = $this->db->prepare("SELECT * FROM comments WHERE post_id='$id'");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);

    }
    public function comment($commit, $post_id, $user_email,$comment_id)
    {
        $query = $this->db->prepare("insert into comments (commit,post_id,user_email,comment_id) values(?,?,?,?)");
        $comments = $query->execute(array($commit,$post_id, $user_email,$comment_id));
        if ($comments) {
            return true;
        } else {
            return false;
        }

    }

}