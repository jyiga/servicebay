<?php

/**
 * Created by PhpStorm.
 * User: james
 * Date: 2/28/2017
 * Time: 4:24 AM
 */
 
 
 
class cpanelController extends Controller
{
        public function index()
        {

        }
        public  function home()
        {

        }
        public function login()
        {
                $appName="";
                $appVersion="";
                $coreLicenseKey="";
                $configureSetting =new configurationSetting();
                $criteria="systemName='Company Name'";
                $configureSetting->setid(-1);
                $configureSetting->__findCriteria($criteria);
                //$criteria="systemName='Company Name'";
                

                if($configureSetting->getid()>0)
                {
                        $_SESSION['companyName']=$configureSetting->getsystemValue();
                        $criteria="systemName='app Name'";
                        $configureSetting->__findCriteria($criteria);
                        $_SESSION['appName']=$configureSetting->getsystemValue();
                      
                        session_write_close();

                        $this->set('companyName',$_SESSION['companyName']);
                }else
                {
                        $_SESSION['companyName']="Company Name";
                        $criteria="systemName='app Name'";
                        $configureSetting->__findCriteria($criteria);
                        $_SESSION['appName']=$configureSetting->getsystemValue();
                        session_write_close();
                        $this->set('companyName',"Company Name");
                }

                

        }
}