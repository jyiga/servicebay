<?php 
 class optransactionsController extends Controller{

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
	 	 	 	 $this->_model->setcreationDate(htmlspecialchars($_REQUEST['creationDate']));
	 	 	 	 $this->_model->setuserId(htmlspecialchars($_REQUEST['userId']));
	 	 	 	 $this->_model->settransType(htmlspecialchars($_REQUEST['transType']));
	 	 	 	 $this->_model->setoperationId(htmlspecialchars($_REQUEST['operationId']));
	 	 	 	 $this->_model->setamount(htmlspecialchars($_REQUEST['amount']));
	 	 	 	$this->set('json',$this->_model->__update()); 
 	 	}
 	 	  public function add()
 	 	 {
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setcreationDate(htmlspecialchars($_REQUEST['creationDate']));
	 	 	 	 $this->_model->setuserId(htmlspecialchars($_REQUEST['userId']));
	 	 	 	 $this->_model->settransType(htmlspecialchars($_REQUEST['transType']));
	 	 	 	 $this->_model->setoperationId(htmlspecialchars($_REQUEST['operationId']));
	 	 	 	 $this->_model->setamount(htmlspecialchars($_REQUEST['amount']));
	 	 	 	$this->set('json',$this->_model->__save()); 
 	 	}
 	 	 public function delete($id)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setid($id);
	 	 	 	 $this->set('json',$this->_model->__delete()); 
 	 	} 
 	} ?>