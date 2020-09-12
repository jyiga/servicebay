<?php 
 class servicecardsController extends Controller{

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
	 	 	 	$this->set('json',$this->_model->__view());
		}	
 	 	 public function edit($id)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setid(htmlspecialchars($id));
	 	 	 	 $this->_model->setCreationDate(htmlspecialchars($_REQUEST['CreationDate']));
	 	 	 	 $this->_model->setOdometer(htmlspecialchars($_REQUEST['Odometer']));
	 	 	 	 $this->_model->setServiceIntervalId(htmlspecialchars($_REQUEST['ServiceIntervalId']));
	 	 	 	 $this->_model->setvehiclePlate(htmlspecialchars($_REQUEST['vehiclePlate']));
	 	 	 	 $this->_model->setoptransactionId(htmlspecialchars($_REQUEST['optransactionId']));
	 	 	 	$this->set('json',$this->_model->__update()); 
 	 	}
 	 	  public function add()
 	 	 {
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setCreationDate(htmlspecialchars($_REQUEST['CreationDate']));
	 	 	 	 $this->_model->setOdometer(htmlspecialchars($_REQUEST['Odometer']));
	 	 	 	 $this->_model->setServiceIntervalId(htmlspecialchars($_REQUEST['ServiceIntervalId']));
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