<?php 
 class apiroutesController extends Controller{

 	 	 public function view()
 	 	{
            

			
         }
        //Fialured Receipt
        public function failureReceipt($apiKey=null,$userId=null)
        {
           $this->doNotRenderHeader = 1;
           $data = json_decode(file_get_contents('php://input'));
           if($apiKey!=null && $apiKey!="")
           {
               $hasKey=false;
               $userapiKey = new userapikey();
               $hasKey=$userapiKey->hasApiKey($apiKey,$userId);
               //add the action
               if($hasKey){

                   $rc = new receiptcopy();
                   $str=$rc->printView($data->vehiclePlate);
                   //===
                   $this->set('json',array('status'=>0,'msg'=>array('msg'=>'Was successfull Print Starting','receipt'=>$str)));

               }else{
                   $this->set('json',array('status'=>1,'msg'=>array('msg'=>'Invalid Key please contact support')));
               }
           }else{
               $this->set('json',array('status'=>1,'msg'=>array('msg'=>'Invalid Key please contact support')));
           }


        }



         //pay for a service
         public function payforservice($apiKey=null,$userId=null)
         {
            $this->doNotRenderHeader = 1;
            $data = json_decode(file_get_contents('php://input'));
            if($apiKey!=null && $apiKey!="")
            {
                $hasKey=false;
                $userapiKey = new userapikey();
                $hasKey=$userapiKey->hasApiKey($apiKey,$userId);
                //add the action
                if($hasKey){
                    $vehicle = new vehicle();
                    $vehicle->setvehiclePlate(htmlspecialchars($data->vehiclePlate));
                    $vehicle->setcreationDate(date('Y-m-d'));

                    $criteria ="vehiclePlate =:param0";
                    $bind =array($vehicle->getvehiclePlate());
                    $count = 0;
                    $count = $vehicle->_countDefined($criteria,$bind);
                    if($count == 0){
                       $vehicle->__save();
                    }
                    //
                    $seviceCard = new servicecard();
                    $seviceCard->setCreationDate(date('Y-m-d'));
                    $seviceCard->setvehiclePlate($data->vehiclePlate);
                    $seviceCard->setOdometer($data->odometer);

                    $servInt = new serviceinterval();
                    $criteria="intervalValue =:param0";
                    $criteriaBind=array($data->serviceIntervalId);
                    $servInt->__findCriteria($criteria,$criteriaBind);

                    $seviceCard->setServiceIntervalId($servInt->getid());
                    $jobcard=$seviceCard->__saveReturnId();

                    //
                    $serRout = new serviceintervalroutine();
                    $serRout->save($data->opn,$data->amt,$jobcard);

                    $operationList = new operationlist();
                    $criteria = "operationName = :param0";
                    $bindList = array("Service");
                    $operationList->__findCriteria($criteria,$bindList);

                    //Optransaction
                    $opTransaction = new optransaction();
                    $opTransaction->setoperationId($operationList->getid());
                    $opTransaction->setamount(htmlspecialchars($data->amount));
                    $opTransaction->setuserId($userId);
                    $opTransaction->settransType($data->tt);
                    $transId = $opTransaction->__saveReturnId();

                    $seviceCard->setoptransactionId($transId);
                    $seviceCard->setid($jobcard);
                    $seviceCard->__update();

                    //
                    $str=array();
                    $str =$seviceCard->receiptCopy($data->serviceIntervalId,$data->opn,$data->amt,$data->amount);

                    $this->set('json',array('status'=>0,'msg'=>array('msg'=>'Was successfull Print Starting','receipt'=>$str['hardcopy'],'receiptNo'=>$str['id'])));


                }else{
                    $this->set('json',array('status'=>1,'msg'=>array('msg'=>'Invalid Key please contact support')));
                }
            }else{
                $this->set('json',array('status'=>1,'msg'=>array('msg'=>'Invalid Key please contact support')));
            }


         }
         


         //Get getUI
         public function getRoutine($apiKey=null,$userId=null)
         {
            $this->doNotRenderHeader = 1;
            $data = json_decode(file_get_contents('php://input'));
            if($apiKey!=null && $apiKey!="")
            {
                $hasKey=false;
                $userapiKey = new userapikey();
                $hasKey=$userapiKey->hasApiKey($apiKey,$userId);
                //add the action
                if($hasKey)
                {
                    $routine = new routineactive();
                    $data=$routine->__viewCombo();
                    $this->set('json',array('status'=>0,'msg'=>array('msg'=>'successfully', 'obj'=>$data)));
                    

                }else{
                    $this->set('json',array('status'=>1,'msg'=>array('msg'=>'Invalid Key please contact support')));
                }
            }else{
                $this->set('json',array('status'=>1,'msg'=>array('msg'=>'Invalid Key please contact support')));
            }


         }
         
         //Get list
         public function getServiceInterval($apiKey=null,$userId=null)
         {
            $this->doNotRenderHeader = 1;
            $data = json_decode(file_get_contents('php://input'));
            if($apiKey!=null && $apiKey!="")
            {
                $hasKey=false;
                $userapiKey = new userapikey();
                $hasKey=$userapiKey->hasApiKey($apiKey,$userId);
                //add the action
                if($hasKey){

                    $serviceIntervial = new serviceinterval();
                    $serinvental = $serviceIntervial->getView();
                    $this->set('json',array('status'=>0,'msg'=>array('msg'=>'successfully', 'obj'=>$serinvental)));

                }else{
                    $this->set('json',array('status'=>1,'msg'=>array('msg'=>'Invalid Key please contact support')));
                }
            }else{
                $this->set('json',array('status'=>1,'msg'=>array('msg'=>'Invalid Key please contact support')));
            }


         }

         //TO PAYCATWASH
         public function paycarwash($apiKey=null,$userId=null)
         {
            $this->doNotRenderHeader = 1;
            $data = json_decode(file_get_contents('php://input'));
            if($apiKey!=null && $apiKey!="")
            {
                $hasKey=false;
                $userapiKey = new userapikey();
                $hasKey=$userapiKey->hasApiKey($apiKey,$userId);
                //add the action
                if($hasKey){

                    $vehicle = new vehicle();
                        $vehicle->setvehiclePlate(htmlspecialchars($data->vehiclePlate));
                        $vehicle->setcreationDate(date('Y-m-d'));

                        $criteria ="vehiclePlate =:param0";
                        $bind =array($vehicle->getvehiclePlate());
                        $count = 0;
                        $count = $vehicle->_countDefined($criteria,$bind);
                        if($count == 0){
                           $vehicle->__save();
                        }
                        //optransaction
                        $opTransaction = new optransaction();
                        $opTransaction->setoperationId($data->operationId);
                        $opTransaction->setamount(htmlspecialchars($data->amount));
                        $opTransaction->setuserId($userId);
                        $opTransaction->settransType($data->tt);
                        $transId = $opTransaction->__saveReturnId();



                        //register wash
                        $washcar = new washcar();
                        $washcar->setvehiclePlate($data->vehiclePlate);
                        $washcar->setoptransactionId($transId);
                        $washcar->__save();

                        $oper=new operationlist();
                        $oper->__find($data->operationId);
                        $str=array();
                        $str=$washcar->receiptCopy($oper->getoperationName(),$data->amount);
                        $this->set('json',array('status'=>0,'msg'=>array('msg'=>'Was successfull Print Starting','receipt'=>$str['hardcopy'],"receiptNo"=>$str['id'])));


                }else{
                    $this->set('json',array('status'=>1,'msg'=>array('msg'=>'Invalid Key please contact support')));
                }
            }else{
                $this->set('json',array('status'=>1,'msg'=>array('msg'=>'Invalid Key please contact support')));
            }


         }
         


         //change is to 
         public function getOperationList($apiKey=null,$userId=null){
            $this->doNotRenderHeader = 1;
            $data = json_decode(file_get_contents('php://input'));
            if($apiKey!=null && $apiKey!="")
            {
                $hasKey=false;
                $userapiKey = new userapikey();
                $hasKey=$userapiKey->hasApiKey($apiKey,$userId);
                //add the action
                if($hasKey){
                        $operationlist = new operationlist();
                        $op=$operationlist->getOperationList($data->operationName);
                        $this->set('json',array('status'=>0,'msg'=>array('msg'=>'successfully', 'obj'=>$op)));

                }else{
                    $this->set('json',array('status'=>1,'msg'=>array('msg'=>'Invalid Key please contact support')));
                }
            }else{
                $this->set('json',array('status'=>1,'msg'=>array('msg'=>'Invalid Key please contact support')));
            }

         }

         public function payParking($apiKey=null,$userId=null)
         {
            $this->doNotRenderHeader = 1;
            $data = json_decode(file_get_contents('php://input'));
            if($apiKey!=null && $apiKey!="")
            {
                $hasKey=false;
                $userapiKey = new userapikey();
                $hasKey=$userapiKey->hasApiKey($apiKey,$userId);
                //add the action
                if($hasKey){

                    //
                    $operationList = new operationlist();
                    $id=$operationList->getObjectId('Parking');

                    if($id>0)
                    {
                        $opTransaction = new optransaction();
                        $opTransaction->setoperationId($id);
                        $opTransaction->setamount(htmlspecialchars($data->amount));
                        $opTransaction->setuserId($userId);
                        $opTransaction->settransType($data->tt);
                        $transId = $opTransaction->__saveReturnId();

                        //parking 
                        $parkingList = new parkinglist();
                        $parkingList->__find(htmlspecialchars($data->id));
                        $parkingList->setoptransactionId($transId);
                        $parkingList->setexist(1);
                        $parkingList->__update();
                        $str=array();
                        $str=$parkingList->receiptCopy("",$data->hour,$data->cost,$data->amount);

                        
                        $this->set('json',array('status'=>0,'msg'=>array('msg'=>'Was successfull Print Starting','receipt'=>$str['hardcopy'],"receiptNo"=>$str['id'])));

                    }else
                    {
                        $this->set('json',array('status'=>1,'msg'=>array('msg'=>'Define the Parking Operation in the System')));
                    }
                   



                }else{
                    $this->set('json',array('status'=>1,'msg'=>array('msg'=>'Invalid Key please contact support')));
                }
            }else{
                $this->set('json',array('status'=>1,'msg'=>array('msg'=>'Invalid Key please contact support')));
            }


         }
         

         public function boilerPlate($apiKey=null,$userId=null)
         {
            $this->doNotRenderHeader = 1;
            $data = json_decode(file_get_contents('php://input'));
            if($apiKey!=null && $apiKey!="")
            {
                $hasKey=false;
                $userapiKey = new userapikey();
                $hasKey=$userapiKey->hasApiKey($apiKey,$userId);
                //add the action
                if($hasKey){

                    

                }else{
                    $this->set('json',array('status'=>1,'msg'=>array('msg'=>'Invalid Key please contact support')));
                }
            }else{
                $this->set('json',array('status'=>1,'msg'=>array('msg'=>'Invalid Key please contact support')));
            }


         }

         public function getDashBoard($apiKey=null,$userId=null)
         {
            $this->doNotRenderHeader = 1;
            $data = json_decode(file_get_contents('php://input'));
            if($apiKey!=null && $apiKey!="")
            {
                $hasKey=false;
                $userapiKey = new userapikey();
                $hasKey=$userapiKey->hasApiKey($apiKey,$userId);
                //add the action
                if($hasKey){
                    $opStat=new optransaction();
                    $date=date('Y-m-d');
                    $dataVal=$opStat->getStats($date);
                    $this->set('json',array('status'=>0,'msg'=>array('msg'=>'successfull','obj'=>$dataVal)));
                }else{
                    $this->set('json',array('status'=>1,'msg'=>array('msg'=>'Invalid Key please contact support')));
                }
            }else{
                $this->set('json',array('status'=>1,'msg'=>array('msg'=>'Invalid Key please contact support')));
            }


         }
         

         public function parkingList($apiKey=null,$userId=null){
             $this->doNotRenderHeader = 1;
             //VwParkingList
             $data = json_decode(file_get_contents('php://input'));
             if($apiKey!=null && $apiKey!=""){
                $hasKey=false;
                $userapiKey = new userapikey();
                $hasKey=$userapiKey->hasApiKey($apiKey,$userId);
                //add the action
                if($hasKey){
                    $parkingList = new parkinglist();
                    //$parkingList->viewParkingList();
                    $this->set('json',array('status'=>0,'msg'=>array('msg'=>'successfull','obj'=>$parkingList->viewParkingList())));

                }else{
                        $this->set('json',array('status'=>1,'msg'=>array('msg'=>'Invalid Key please contact support')));
                } 
                

             }else{
				$parkingList = new parkinglist();
                    //$parkingList->viewParkingList();
                $this->set('json',array('status'=>0,'msg'=>array('msg'=>'successfull','obj'=>$parkingList->viewParkingList())));
			}	
         }
		 

		 public function parkingRegistration($apiKey=null, $userId){
            $this->doNotRenderHeader=1;
            $data = json_decode(file_get_contents('php://input'));
			if($apiKey!=null && $apiKey!=""){
                    $hasKey=false;
                    $id=-1;
					//Get AP-KEY
                    $userapiKey = new userapikey();
                    $hasKey=$userapiKey->hasApiKey($apiKey,$userId);
                    //add the action
                    if($hasKey){
                        //
                        $vehicle = new vehicle();
                        $vehicle->setvehiclePlate(htmlspecialchars($data->vehiclePlate));
                        $vehicle->setcreationDate(htmlspecialchars($data->inDate));

                        $criteria ="vehiclePlate =:param0";
                        $bind =array($vehicle->getvehiclePlate());
                        $count = 0;
                        $count = $vehicle->_countDefined($criteria,$bind);
                        if($count == 0){
                           $vehicle->__save();
                        }
                        

                        $parkingList = new parkinglist();
                        $parkingList->setvehiclePlate($vehicle->getvehiclePlate());
                        $parkingList->setuserId($userId);
                        $parkingList->setInDate($vehicle->getcreationDate());

                        $date = $vehicle->getcreationDate();
                        $dtime = new DateTime($date);
                        $hour=intval($dtime->format("H"));
                        if($hour>18)
                        {
                            $parkingList->setSession("NIGHT");

                        }else{
                            $parkingList->setSession("DAY");
                        }
                        
                        $parkingList->setexist(0);
                        $returnArray=$parkingList->__save();

                        if(array_key_exists("msg",$returnArray)){
                            $this->set('json',array('status'=>0,'msg'=>array('msg'=>'Not Successful saved')));
                        }else{
                            $this->set('json',array('status'=>0,'msg'=>array('msg'=>'Successfull Saved')));
                        }
                    }else{
                        $this->set('json',array('status'=>1,'msg'=>array('msg'=>'Invalid Key please contact support')));
                    }


			}else{
				$this->set('json',array('status'=>1,'msg'=>array('msg'=>'Set Api key')));
			}	
		 }
 	 	public function viewcombobox()
 	 	 {
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	$this->set('json',$this->_model->__viewCombo());
	 	}	
 	 	 public function viewall()
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	$this->set('json',$this->_model->__view());
		}	
 	 	 public function edit($id)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setid(htmlspecialchars($id));
	 	 	 	 $this->_model->setuserId(htmlspecialchars($_REQUEST['userId']));
	 	 	 	 $this->_model->setcreationTime(htmlspecialchars($_REQUEST['creationTime']));
	 	 	 	 $this->_model->setresponseTime(htmlspecialchars($_REQUEST['responseTime']));
	 	 	 	 $this->_model->setactionQuery(htmlspecialchars($_REQUEST['actionQuery']));
	 	 	 	 $this->_model->settoken(htmlspecialchars($_REQUEST['token']));
	 	 	 	$this->set('json',$this->_model->__update()); 
 	 	}
 	 	  public function add()
 	 	 {
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setuserId(htmlspecialchars($_REQUEST['userId']));
	 	 	 	 $this->_model->setcreationTime(htmlspecialchars($_REQUEST['creationTime']));
	 	 	 	 $this->_model->setresponseTime(htmlspecialchars($_REQUEST['responseTime']));
	 	 	 	 $this->_model->setactionQuery(htmlspecialchars($_REQUEST['actionQuery']));
	 	 	 	 $this->_model->settoken(htmlspecialchars($_REQUEST['token']));
	 	 	 	$this->set('json',$this->_model->__save()); 
 	 	}
 	 	 public function delete($id)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setid($id);
	 	 	 	 $this->set('json',$this->_model->__delete()); 
		  } 
		  
		  public function mlogin()
    {
		$this->doNotRenderHeader=1;
		$systemUser = new systemUser();
        if(isset($_REQUEST['username']) && isset($_REQUEST['password']))
        {
            $systemUser->setusername(filter_var(htmlspecialchars(trim($_REQUEST['username'])),FILTER_SANITIZE_STRING));
            //$this->_model->setusername(filter_var($_REQUEST['username'],FILTER_SANITIZE_STRING));
            //$username=filter_var($_REQUEST['username'],FILTER_SANITIZE_STRING);
            //
            $systemUser->setpassword(htmlspecialchars(trim($_REQUEST['password'])));
        // $password=md5($_REQUEST['password']);
            //$criteria="username='".$this->_model->getusername()."' and password='".$this->_model->getpassword()."'";
            $reallogin=new reallogin();
            $reallogin->setPassword($systemUser->getpassword());
            $reallogin->setUsername($systemUser->getusername());

            $proxy=new proxy($reallogin);
            $userId=null;
            $userId=$systemUser->clientLogin($proxy);
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
              
                $response=array('status'=>0,'msg'=>array('userId'=>$userId,'login'=>true));
                $this->set('json',$response);

            }else{
                $response=array('status'=>0,'msg'=>array('userId'=>'null','login'=>false));
                $this->set('json',$response);
                //header('location:../?msg=supply the correct username or password');

            }
        }else {
            $data = json_decode(file_get_contents('php://input'));
            //$data->username
            $username =$data->username;
            $password =$data->password;
            $systemUser->setusername(filter_var(htmlspecialchars(trim($username)),FILTER_SANITIZE_STRING));
            //$this->_model->setusername(filter_var($_REQUEST['username'],FILTER_SANITIZE_STRING));
            //$username=filter_var($_REQUEST['username'],FILTER_SANITIZE_STRING);
            //
            $systemUser->setpassword(htmlspecialchars(trim($password)));
        // $password=md5($_REQUEST['password']);
            //$criteria="username='".$this->_model->getusername()."' and password='".$this->_model->getpassword()."'";
            $reallogin=new reallogin();
            $reallogin->setPassword($systemUser->getpassword());
            $reallogin->setUsername($systemUser->getusername());

            $proxy=new proxy($reallogin);
            $userId=null;
            $userId=$systemUser->clientLogin($proxy);
            //error_log(date('Y m d :g:i:s:a ') ."User id:".$userId. "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'proxy.log');
                

            if(!empty($userId))
            {
                //auto role check for auto users.
                
                $userrole=new usertyperole();
                $userrole->getCheckRoles($userId);
                //$systemUser = new systemUser();
				$systemUser->__find($userId);
				
				$userapikey= new userapikey();
				$apiCriteria = "userId=:param0";
				$bindapivalue=array($userId);
				$userapikey->__findCriteria($apiCriteria,$bindapivalue);

                $companyName='';
                $companylogo='';
                $companyAddress='';
                $tin='';
                $appName='';
				$username=$systemUser->getfirstName()." ".$systemUser->getlastName();
				$apiKey=$userapikey->getapiKey();
                $response=array('status'=>0,'msg'=>array('userId'=>$userId,'login'=>true,'username'=>$username,'apikey'=>$apiKey));
                $this->set('json',$response);

            }else{
                $response=array('status'=>0,'msg'=>array('userId'=>'null','login'=>false,'username'=>null,'apikey'=>null));
                $this->set('json',$response);
                //header('location:../?msg=supply the correct username or password');

            }
            //$this->set('json',array($username));
            
        }
    }


 	} ?>