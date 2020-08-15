<?php 
 class useroftypesController extends Controller{

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
 	 	 public function edit($userId)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setuserId($userId);
	 	 	 	 $this->_model->setuserTypeId($_REQUEST['userTypeId']);
	 	 	 	 $this->_model->setisActive($_REQUEST['isActive']);
	 	 	 	$this->set('json',$this->_model->__update()); 
 	 	}
 	 	  public function add()
 	 	 {
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setuserTypeId($_REQUEST['userTypeId']);
	 	 	 	 $this->_model->setisActive($_REQUEST['isActive']);
	 	 	 	$this->set('json',$this->_model->__save()); 
 	 	}
 	 	 public function delete($userId)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setuserId($userId);
	 	 	 	 $this->set('json',$this->_model->__delete()); 
 	 	} 
 	} ?>