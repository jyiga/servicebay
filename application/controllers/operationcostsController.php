<?php 
 class operationcostsController extends Controller{

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
	 	 	 	 $this->_model->setamount(htmlspecialchars($_REQUEST['amount']));
	 	 	 	 $this->_model->setisActive(htmlspecialchars($_REQUEST['isActive']));
	 	 	 	 $this->_model->setoperationId(htmlspecialchars($_REQUEST['operationId']));
	 	 	 	$this->set('json',$this->_model->__update()); 
 	 	}
 	 	  public function add($id)
 	 	 {
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setamount(htmlspecialchars($_REQUEST['amount']));
	 	 	 	 //$this->_model->setisActive(htmlspecialchars($_REQUEST['isActive']));
	 	 	 	 $this->_model->setoperationId(htmlspecialchars($id));
	 	 	 	$this->set('json',$this->_model->saveCost()); 
 	 	}
 	 	 public function delete($id)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setid($id);
	 	 	 	 $this->set('json',$this->_model->__delete()); 
 	 	} 
 	} ?>