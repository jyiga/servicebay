<?php 
 class serviceintervalsController extends Controller{

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
	 	 	 	 $this->_model->setintervalValue(htmlspecialchars($_REQUEST['intervalValue']));
	 	 	 	$this->set('json',$this->_model->__update()); 
 	 	}
 	 	  public function add($id)
 	 	 {
				   $this->doNotRenderHeader=1;
				 $this->_model->setid(htmlspecialchars($id)); 
					$this->_model->setintervalValue(htmlspecialchars($_REQUEST['intervalValue']));
					$criteria = "id=:param0";
					$bind=array($id);
	 	 	 	$this->set('json',$this->_model->__saveUnquie($criteria,$bind)); 
 	 	}
 	 	 public function delete($id)
 	 	{
	 	 	 	 $this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setid($id);
	 	 	 	 $this->set('json',$this->_model->__delete()); 
		  } 
		  public function getAutoId()
		  {
			$this->doNotRenderHeader=1;
			//$count= $this->_model->getNextId() + 1;
			$this->set('json',$this->_model->getNextId());

		  }
 	} ?>