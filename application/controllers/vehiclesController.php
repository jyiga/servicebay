<?php 
 class vehiclesController extends Controller{

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
 	 	 public function edit($vehiclePlate)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setvehiclePlate(htmlspecialchars($vehiclePlate));
	 	 	 	 $this->_model->setcreationDate(htmlspecialchars($_REQUEST['creationDate']));
	 	 	 	$this->set('json',$this->_model->__update()); 
 	 	}
 	 	  public function add()
 	 	 {
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setcreationDate(htmlspecialchars($_REQUEST['creationDate']));
	 	 	 	$this->set('json',$this->_model->__save()); 
 	 	}
 	 	 public function delete($vehiclePlate)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setvehiclePlate($vehiclePlate);
	 	 	 	 $this->set('json',$this->_model->__delete()); 
 	 	} 
 	} ?>