<?php 
 class operationlistsController extends Controller{

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
				$sql="Select op.*,(Select amount from operationcost where operationId=op.id and isActive=1) amount from operationlist op ";
	 	 	 	$this->set('json',$this->_model->__viewSql($sql));
		}	
 	 	 public function edit($id)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setid(htmlspecialchars($id));
	 	 	 	 $this->_model->setoperationName(htmlspecialchars($_REQUEST['operationName']));
	 	 	 	 //$this->_model->setcreationDate(htmlspecialchars($_REQUEST['creationDate']));
	 	 	 	$this->set('json',$this->_model->__update()); 
 	 	}
 	 	  public function add()
 	 	 {
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setoperationName(htmlspecialchars($_REQUEST['operationName']));
	 	 	 	 //$this->_model->setcreationDate(htmlspecialchars($_REQUEST['creationDate']));
	 	 	 	$this->set('json',$this->_model->__save()); 
 	 	}
 	 	 public function delete($id)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setid($id);
	 	 	 	 $this->set('json',$this->_model->__delete()); 
 	 	} 
 	} ?>