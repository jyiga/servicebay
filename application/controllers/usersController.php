<?php 
 class usersController extends Controller{

 	 	 public function view()
 	 	{
	 	}	
 	 	public function viewcombobox()
 	 	 {
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	$this->set('json',$this->_model->__viewCombo());
	 	}	
 	 	 public function viewall()
 	 	{
				   $this->doNotRenderHeader=1;
				   $sql="Select"
	 	 	 	$this->set('json',$this->_model->__view());
		}	
 	 	 public function edit($id)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setid(htmlspecialchars($id));
	 	 	 	 $this->_model->setfirstName(htmlspecialchars($_REQUEST['firstName']));
	 	 	 	 $this->_model->setlastName(htmlspecialchars($_REQUEST['lastName']));
	 	 	 	 $this->_model->setmobileNumber(htmlspecialchars($_REQUEST['mobileNumber']));
	 	 	 	 $this->_model->setemail(htmlspecialchars($_REQUEST['email']));
	 	 	 	 $this->_model->setcreationDate(htmlspecialchars($_REQUEST['creationDate']));
	 	 	 	 $this->_model->setstatusId(htmlspecialchars($_REQUEST['statusId']));
	 	 	 	$this->set('json',$this->_model->__update()); 
 	 	}
 	 	  public function add()
 	 	 {
				   $this->doNotRenderHeader=1;
				 $this->_model->setid($this->getGUID());
	 	 	 	 $this->_model->setfirstName(htmlspecialchars($_REQUEST['firstName']));
	 	 	 	 $this->_model->setlastName(htmlspecialchars($_REQUEST['lastName']));
	 	 	 	 $this->_model->setmobileNumber(htmlspecialchars($_REQUEST['mobileNumber']));
	 	 	 	 $this->_model->setemail(htmlspecialchars($_REQUEST['email']));
	 	 	 	 //$this->_model->setcreationDate(htmlspecialchars($_REQUEST['creationDate']));
	 	 	 	 $this->_model->setstatusId(htmlspecialchars($_REQUEST['statusId']));
				 $this->_model->__save();
				   
				$systemUser = new systemUser();
				$systemUser->setid($this->_model->getId());
				$systemUser->setfirstName(htmlspecialchars($_REQUEST['firstName']));
				$systemUser->setlastName(htmlspecialchars($_REQUEST['lastName']));
				$systemUser->setcontact($_REQUEST['mobileNumber']);
				$systemUser->setemail(htmlspecialchars($_REQUEST['email']));
				$systemUser->setusername($_REQUEST['mobileNumber']);
				$systemUser->setpassword(htmlspecialchars($_REQUEST['password']));
				$systemUser->__save();

				$userApiKey = new userapikey();
				$userApiKey->setuserId($this->_model->getId());
				$this->set('json',$userApiKey->save());
 	 	}
 	 	 public function delete($id)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setid($id);
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
 	} ?>