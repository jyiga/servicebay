<?php
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}else{
    if($status == PHP_SESSION_DISABLED){
        //Sessions are not available
    }else
        if($status == PHP_SESSION_ACTIVE){
            //Destroy current and start new one

        }
}

/**
 * Created by PhpStorm.
 * User: james
 * Date: 2/26/2017
 * Time: 11:27 PM
 */
class systemUsersController extends Controller
{
    public function index()
    {

    }
    public function view()
    {

    }

    public function logout()
    {
        session_destroy();
        header('location:../?msg=you logged out');
    }


    public function login()
    {
        $this->doNotRenderHeader=1;
        $this->_model->setusername(filter_var(htmlspecialchars(trim($_REQUEST['username'])),FILTER_SANITIZE_STRING));
        //$this->_model->setusername(filter_var($_REQUEST['username'],FILTER_SANITIZE_STRING));
        //$username=filter_var($_REQUEST['username'],FILTER_SANITIZE_STRING);
        //
        $this->_model->setpassword(htmlspecialchars(trim($_REQUEST['password'])));
       // $password=md5($_REQUEST['password']);
        //$criteria="username='".$this->_model->getusername()."' and password='".$this->_model->getpassword()."'";
        $reallogin=new reallogin();
        $reallogin->setPassword($this->_model->getpassword());
        $reallogin->setUsername($this->_model->getusername());

        $proxy=new proxy($reallogin);
        $userId=null;
        $userId=$this->_model->clientLogin($proxy);
        //error_log(date('Y m d :g:i:s:a ') ."User id:".$userId. "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'proxy.log');
            

        if(!empty($userId))
        {
            //auto role check for auto users.
            
            $userrole=new usertyperole();
            $userrole->getCheckRoles($userId);
        

            $companyName='';
            $companylogo='';
            $companyAddress='';
            $tin='';
            $appName='';
            $this->_model->__find($userId);
            $_SESSION['userId']=$this->_model->getid();
            $_SESSION['username']=$this->_model->getusername();
            $configuration=new configurationSetting();
            $configuration->__findCriteria("systemName='Company Names'");
            $companyName=$configuration->getsystemValue();
            $configuration->__findCriteria("systemName='Company logo'");
            $companylogo=$configuration->getsystemValue();
            $configuration->__findCriteria("systemName='Address'");
            $companyAddress=$configuration->getsystemValue();
            $configuration->__findCriteria("systemName='pictype'");
            $tin=$configuration->getsystemValue();
            $configuration->__findCriteria("systemName='app Name'");
            $appName=$configuration->getsystemValue();


            $_SESSION['appName']= $appName;
            $_SESSION['companyName']=$companyName;
            $_SESSION['companyAddress']=$companyAddress;
            $_SESSION['logo']=$companylogo;
            $_SESSION['picType']=$tin;
            $_SESSION['LAST_ACTIVITY']=time();
            session_write_close();
            header('location:../dashboard/index');

        }else{
            $this->set('msg','supply the correct username or password');
            header('location:../?msg=supply the correct username or password');

        }

    }


    //no proxy logic
    public function login_old()
    {
        $this->doNotRenderHeader=1;
        $this->_model->setusername(filter_var($_REQUEST['username'],FILTER_SANITIZE_STRING));
        //$username=filter_var($_REQUEST['username'],FILTER_SANITIZE_STRING);
        //
        $this->_model->setpassword($_REQUEST['password']);
       // $password=md5($_REQUEST['password']);
        $criteria="username='".$this->_model->getusername()."' and password='".$this->_model->getpassword()."'";
        if($this->_model->_countDefined($criteria)>0)
        {
            $companyName='';
            $companylogo='';
            $companyAddress='';
            $tin='';
            $appName='';
            $this->_model->__findCriteria($criteria);
            $_SESSION['userId']=$this->_model->getid();
            $_SESSION['username']=$this->_model->getusername();
            $configuration=new configurationSetting();
            $configuration->__findCriteria("systemName='Company Names'");
            $companyName=$configuration->getsystemValue();
            $configuration->__findCriteria("systemName='Company logo'");
            $companylogo=$configuration->getsystemValue();
            $configuration->__findCriteria("systemName='Address'");
            $companyAddress=$configuration->getsystemValue();
            $configuration->__findCriteria("systemName='TIN'");
            $tin=$configuration->getsystemValue();
            $configuration->__findCriteria("systemName='app Name'");
            $appName=$configuration->getsystemValue();


            $_SESSION['appName']= $appName;
            $_SESSION['companyName']=$companyName;
            $_SESSION['companyAddress']=$companyAddress;
            $_SESSION['logo']=$companylogo;
            $_SESSION['TIN']=$tin;
            $_SESSION['LAST_ACTIVITY']=time();



            session_write_close();
            header('location:../dashboard/index');
        }
        else
        {
            $this->set('msg','supply the correct username or password');
            header('location:../?msg=supply the correct username or password');
        }
    }

    public function driverentrypoint()
    {
        $this->doNotRenderHeader=1;

        $username=$_REQUEST['username'];
        $password=md5($_REQUEST['password']);
        //$criteria="username='".$username."' and password='".$password."'";
        $sql="Select * from systemuser where username='".$username."' and password='".$password."'";
        $count=-1;
        $count=intval($this->_model->_countSql($sql));
        $this->set('jsonx',$count);



    }

    public function viewall()
    {
        $this->doNotRenderHeader=1;
        $this->set('json',$this->_model->__view());

    }

    public function edit($id)
    {
        $this->doNotRenderHeader=1;

        $this->_model->setid($id);
        $this->_model->setfirstName($_REQUEST['firstName']);
        $this->_model->setlastName($_REQUEST['lastName']);
        $this->_model->setdob($_REQUEST['dob']);
        $this->_model->setcontact($_REQUEST['contact']);
        $this->_model->setemail($_REQUEST['email']);
        $this->_model->setisActive($_REQUEST['isActive']);
        $this->_model->setusername($_REQUEST['username']);
        $this->_model->setpassword($_REQUEST['password']);

        $this->set('json',$this->_model->__update());

    }
    public function add()
    {
        $this->doNotRenderHeader=1;


        $this->_model->setid($this->getGUID());
        $this->_model->setfirstName($_REQUEST['firstName']);
        $this->_model->setlastName($_REQUEST['lastName']);
        $this->_model->setdob($_REQUEST['dob']);
        $this->_model->setcontact($_REQUEST['contact']);
        $this->_model->setemail($_REQUEST['email']);
        $this->_model->setisActive($_REQUEST['isActive']);
        $this->_model->setusername($_REQUEST['username']);
        $this->_model->setpassword($_REQUEST['password']);

        $this->set('json',$this->_model->__save());

    }
    public function delete($id)
    {
        $this->doNotRenderHeader=1;

        $this->_model->setid($id);

        //$this->_model->__save();
        $this->set('json',$this->_model->__delete());

    }
    public function getGUID()
    {
        if (function_exists('com_create_guid'))
        {
            return com_create_guid();
        }else
        {
            mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = chr(123)// "{"
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);// "}"
            return $uuid;
        }
    }

    public function viewcombobox()
    {
        $this->doNotRenderHeader=1;
        $this->set('json',$this->_model->__viewCombo());
    }

    public function autoLoadDriverLogin()
    {
        /*try{
            $this->doNotRenderHeader=1;
            $driver=new tbldriver();
            foreach($driver->getDriverList() as $row)
            {
                $driverObj=new tbldriver();
                $driverObj->setfirstName($row['firstName']);
                $driverObj->setlastName($row['lastName']);
                $driverObj->setcontact($row['contact']);
                $driverObj->setisActive($row['isActive']);
                $driverObj->setdob($row['dob']);
                $systemUser=new systemUser();
                $systemUser->saveDriverUser($driverObj);
                //$this->_model->saveDriverUser($driverObj);
            }
            $this->set('json',array('status'=>0,'message'=>'Saved Successfully'));

        }catch(Exception $ex)
        {
            $this->set('json',array('status'=>0,'message'=>$ex->getMessage()));
        }*/

    }

}