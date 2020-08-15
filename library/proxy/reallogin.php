<?php
class reallogin implements login{
    private $username;
    private $password;
    public $userType;
    public function request(){
            $loginStatus=0;
            $conn=new SqlExecutor();
            if(!empty($this->username) && !empty($this->password))
            {
                $sql="Select * from systemuser where username =:param0 and password=:param1";
                $bind=array($this->username,$this->password);
                $row=$conn->getResultSetBind($sql,$bind);
                return array('row'=>$row,'msg'=>true,'count'=>intval(sizeof($row)));

            }else
            {
                return array('row'=>array(),'msg'=>false,'count'=>-1);

            }



    }

    public function setUsername($username)
    {
            $this->username=htmlspecialchars(trim($username));
    }

    public function setPassword($password)
    {
        $this->password=htmlspecialchars(trim($password));
    }



}