<?php
class  sessionManager extends model
{
    static function createSession($array =[])
    {
     foreach ($array as $key=>$value)
     {
         $_SESSION[$key]=helper::cleaner($value);
     }
    }
    static  function deleteSession($key)
    {
       unset( $_SESSION[$key]);
    }
    static function allSessionDelete()
    {
        session_destroy();
    }
    public function isLogged()
    {
        if (isset($_SESSION['email']) and isset($_SESSION['password']))
        {
          $sqlQuery=$this->db->query("select *from where email=?,password=?");
          $sqlQuery->execute(array($_SESSION['email'],$_SESSION['password']));
          if ($sqlQuery->rowCount()!=0)
          {
              return true;
          }
          else
              {
                  return false;

              }
        }
        else
        {
           false;
        }
    }
    public  function getUserInfo()
    {
        if ($this->isLogged())
        {
            $sqlQuery=$this->db->query("select *from where email=?,password=?");
            $sqlQuery->execute(array($_SESSION['email'],$_SESSION['password']));
            return $sqlQuery->fetch(PDO::FETCH_ASSOC);
        }
        else
        {
            return false;
        }
    }
}