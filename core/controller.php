<?php
class controller
{
    public $sessionManager;
    public function __construct()
    {
        $this->sessionManager = new  sessionManager();
    }

    public function render($file,$params=[])
    {
        return view::render($file,$params);
    }
    public  function model($file)
    {
        if (file_exists(MODELS_PATH."/".$file.".php"))
        {
            require_once MODELS_PATH."/".$file.".php";
            if(class_exists($file))
            {
                return new $file;
            }
            else
            {
                exit($file." Dont Class");
            }
        }
        else
        {
            exit($file."Don't found Model");
        }
    }
}