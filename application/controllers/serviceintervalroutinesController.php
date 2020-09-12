<?php 
 class serviceintervalroutinesController extends Controller{

 	 	 public function view()
 	 	{
	 	}	
 	 	public function viewcombobox()
 	 	 {
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	$this->set('json',$this->_model->__viewCombo());
	 	}	
 	 	 public function viewall($id=0)
 	 	{
				$this->doNotRenderHeader=1;
				$sql="Select sr.*,ra.action from serviceintervalroutine sr inner join routineactive ra on sr.routineId = ra.id where sr.serviceIntervalId=:param0";
				$bind=array($id);
	 	 	 	$this->set('json',$this->_model->__viewSql($sql,$bind));
		}	
 	 	 public function edit($id)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setid(htmlspecialchars($_REQUEST['id']));
	 	 	 	 $this->_model->setamount(htmlspecialchars($_REQUEST['amount']));
	 	 	 	 $this->_model->setserviceIntervalId(htmlspecialchars($id));
	 	 	 	 $this->_model->setroutineId(htmlspecialchars($_REQUEST['routineId']));
	 	 	 	$this->set('json',$this->_model->__update()); 
 	 	}
 	 	  public function add($id)
 	 	 {
				   $this->doNotRenderHeader=1;
				   $successCount=0;
				   $failureCount=0;
				   $errorMsg="";
				   $ids=explode('-',$_REQUEST['ids']);
				   if(sizeof($ids))
				   {
					   for($i=0;$i<sizeof($ids);$i++)
					   {
						$this->_model->setamount(htmlspecialchars(0));
						$this->_model->setserviceIntervalId(htmlspecialchars($id));
						$this->_model->setroutineId(htmlspecialchars($ids[$i]));
						$array=array();
						$array=$this->_model->__save(); 
						if(array_key_exists('msg',$array)){
							$failureCount+=1;
							$errorMsg.=$array['msg'];
						}else{
							$successCount+=1;
						}
					   }

				   }else {
					$this->_model->setamount(htmlspecialchars(0));
					$this->_model->setserviceIntervalId(htmlspecialchars($id));
					$this->_model->setroutineId(htmlspecialchars($ids));
					$array=array();
					$array=$this->_model->__save(); 
					if(array_key_exists('msg',$array)){
						$failureCount+=1;
						$errorMsg.=$array['msg'];
					}else{
						$successCount+=1;
					}
					  
				   }

				   if($failureCount==0)
				   {
					$this->set('json',array('success'=>true));
				   }else {
					$this->set('json',array('msg'=>$errorMsg)); 
				   }
					
 	 	}
 	 	 public function delete($id)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setid($id);
	 	 	 	 $this->set('json',$this->_model->__delete()); 
 	 	} 
 	} ?>