<?php 
 class parkinglistsController extends Controller{

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
				$sql ="Select pl.*,concat(u.firstName, ' ', u.lastName) fname, u.mobileNumber from parkinglist pl inner join user u on pl.userId = u.id order by pl.InDate desc";
	 	 	 	$this->set('json',$this->_model->__viewSql($sql));
		}	
 	 	 public function edit($id)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setid(htmlspecialchars($id));
	 	 	 	 $this->_model->setInDate(htmlspecialchars($_REQUEST['InDate']));
	 	 	 	 $this->_model->setOutDate(htmlspecialchars($_REQUEST['OutDate']));
	 	 	 	 $this->_model->setSession(htmlspecialchars($_REQUEST['Session']));
	 	 	 	 $this->_model->setexist(htmlspecialchars($_REQUEST['exist']));
	 	 	 	 $this->_model->setuserId(htmlspecialchars($_REQUEST['userId']));
	 	 	 	 $this->_model->setvehiclePlate(htmlspecialchars($_REQUEST['vehiclePlate']));
	 	 	 	 $this->_model->setoptransactionId(htmlspecialchars($_REQUEST['optransactionId']));
	 	 	 	$this->set('json',$this->_model->__update()); 
 	 	}
 	 	  public function add()
 	 	 {
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setInDate(htmlspecialchars($_REQUEST['InDate']));
	 	 	 	 $this->_model->setOutDate(htmlspecialchars($_REQUEST['OutDate']));
	 	 	 	 $this->_model->setSession(htmlspecialchars($_REQUEST['Session']));
	 	 	 	 $this->_model->setexist(htmlspecialchars($_REQUEST['exist']));
	 	 	 	 $this->_model->setuserId(htmlspecialchars($_REQUEST['userId']));
	 	 	 	 $this->_model->setvehiclePlate(htmlspecialchars($_REQUEST['vehiclePlate']));
	 	 	 	 $this->_model->setoptransactionId(htmlspecialchars($_REQUEST['optransactionId']));
	 	 	 	$this->set('json',$this->_model->__save()); 
 	 	}
 	 	 public function delete($id)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setid($id);
	 	 	 	 $this->set('json',$this->_model->__delete()); 
 	 	} 
 	} ?>