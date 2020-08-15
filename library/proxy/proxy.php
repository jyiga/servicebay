<?php
class proxy implements login
{
    private $reallogin;
    private $row;
    private $count;
    private $msg;


    public function __construct(reallogin $reallogin)
    {
        $this->reallogin=$reallogin;
    }


    public function request()
    {
        if($this->checkAccess())
        {

            error_log(date('Y m d :g:i:s:a ') .$this->row[0]['id']."Size of array:". $this->count. "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'proxy.log');
            return $this->row[0]['id'];
        }else
        {
            return null;
        }

    }

    private function checkAccess()
    {
        $array=$this->reallogin->request();
        if(is_array($array))
        {
            $this->row=$array['row'];
            $this->count=$array['count'];
            $this->msg=$array['msg'];
            if($this->msg)
            {
                if($this->count>0)
                {
                    return $this->msg;

                }else
                {
                    return false;
                }
            }else{
                return false;
            }

        }else{
            return false;
        }



    }

    private function logAccess()
    {

    }

    

}