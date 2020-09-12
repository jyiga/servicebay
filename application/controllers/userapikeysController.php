<?php 
 class userapikeysController extends Controller{

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
	 	 	 	 $this->_model->setapiKey(htmlspecialchars($_REQUEST['apiKey']));
	 	 	 	 $this->_model->setuserId(htmlspecialchars($_REQUEST['userId']));
	 	 	 	 $this->_model->setcreationDate(htmlspecialchars($_REQUEST['creationDate']));
	 	 	 	 $this->_model->setexpiryDate(htmlspecialchars($_REQUEST['expiryDate']));
	 	 	 	 $this->_model->setisActive(htmlspecialchars($_REQUEST['isActive']));
	 	 	 	$this->set('json',$this->_model->__update()); 
 	 	}
 	 	  public function add()
 	 	 {
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setapiKey(htmlspecialchars($_REQUEST['apiKey']));
	 	 	 	 $this->_model->setuserId(htmlspecialchars($_REQUEST['userId']));
	 	 	 	 $this->_model->setcreationDate(htmlspecialchars($_REQUEST['creationDate']));
	 	 	 	 $this->_model->setexpiryDate(htmlspecialchars($_REQUEST['expiryDate']));
	 	 	 	 $this->_model->setisActive(htmlspecialchars($_REQUEST['isActive']));
	 	 	 	$this->set('json',$this->_model->__save()); 
 	 	}
 	 	 public function delete($id)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setid($id);
	 	 	 	 $this->set('json',$this->_model->__delete()); 
 	 	} 
 	} ?>