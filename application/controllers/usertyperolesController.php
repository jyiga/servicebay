<?php 
 class usertyperolesController extends Controller{

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
	 	 	 	 $this->_model->setid($id);
	 	 	 	 $this->_model->setuserTypeId($_REQUEST['userTypeId']);
	 	 	 	 $this->_model->setsubActivityId($_REQUEST['subActivityId']);
	 	 	 	 $this->_model->setisActive($_REQUEST['isActive']);
	 	 	 	 $this->_model->setcreationDate($_REQUEST['creationDate']);
	 	 	 	$this->set('json',$this->_model->__update()); 
 	 	}
 	 	  public function add($id)
 	 	 {
				   $this->doNotRenderHeader=1;
				   
				 $idArray=explode('-',$_REQUEST['id']);
				 if(sizeof($idArray)>0)  
				 {
					 for($i=0;$i<sizeof($idArray);$i++)
					 {
						 //add and remove.
						 //count
						$criteriaCheck="userTypeId='".$id."' and subactivityId='".$idArray[$i]."'";
						$countCheck=$this->_model->_countDefined($criteriaCheck);

						if($countCheck>0)
						{
							$this->_model->__findCriteria($criteriaCheck);
							$this->_model->__delete();

						}else
						{
							$this->_model->setuserTypeId($id);
							$this->_model->setsubActivityId($idArray[$i]);
							$this->_model->setisActive(1);
							$this->_model->__saveUnquie($criteriaCheck);
						}

						
					 }


				 }else{

					$subActivityId=$_REQUEST['id'];
					$criteriaCheck="userTypeId='".$id."' and subActivityId='".$subActivityId."'";
					$countCheck=$this->_model->_countDefined($criteriaCheck);

					if($countCheck>0)
					{
						$this->_model->__findCriteria($criteriaCheck);
						$this->_model->__delete();

					}else
					{
						$this->_model->setuserTypeId($id);
						$this->_model->setsubActivityId($subActivityId);
						$this->_model->setisActive(1);
						//$this->_model->__save();
						$this->_model->__saveUnquie($criteriaCheck);
					}
					
					//$this->_model->setcreationDate($_REQUEST['creationDate']);
				 }


	 	 	 	
	 	 	 	$this->set('json',array('success'=>true)); 
 	 	}
 	 	 public function delete($id)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setid($id);
	 	 	 	 $this->set('json',$this->_model->__delete()); 
 	 	} 
 	} ?>