<?php 
 class usertypesController extends Controller{

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
				   $sql="Select * from usertype";
				   $data=array();
				   foreach ($this->_model->__resultset($sql) as $row)
				   {
						$dataRow=array();
						$dataRow['id']=intval($row['id']);
						$dataRow['userTypeName']=$row['userTypeName'];
						$dataRow['isActive']=$row['isActive'];
						
						//calculate 
						array_push($data,$dataRow);
						$sqlInner="Select utr.*,sa.name userTypeName,utr.userTypeId _parentId from usertyperole utr inner join subactivity sa on utr.subActivityId=sa.id where utr.userTypeId='".$dataRow['id']."'";
						foreach ($this->_model->__resultset($sqlInner) as $rowInner)
						{
							$dataRowInner=array();
							$dataRowInner['id']=intval($rowInner['id']);
							$dataRowInner['userTypeName']=$rowInner['userTypeName'];
							$dataRowInner['isActive']=$rowInner['isActive'];
							$dataRowInner['_parentId']=intval($rowInner['_parentId']);
							array_push($data,$dataRowInner);
						}

						
				   }

				$finalArray=array();
				$finalArray['rows']=$data;   
	 	 	 	$this->set('json',$finalArray);
		}	
 	 	 public function edit($id)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setid($id);
	 	 	 	 $this->_model->setuserTypeName($_REQUEST['userTypeName']);
	 	 	 	 $this->_model->setisActive(1);
	 	 	 	$this->set('json',$this->_model->__update()); 
 	 	}
 	 	  public function add()
 	 	 {
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setuserTypeName($_REQUEST['userTypeName']);
	 	 	 	 $this->_model->setisActive(1);
	 	 	 	$this->set('json',$this->_model->__save()); 
 	 	}
 	 	 public function delete($id)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setid($id);
	 	 	 	 $this->set('json',$this->_model->__delete()); 
 	 	} 
 	} ?>