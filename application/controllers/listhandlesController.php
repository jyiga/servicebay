<?php 
 class listhandlesController extends Controller{

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
		public function viewlist()
 	 	{
			  		$bind=null;
				   $this->doNotRenderHeader=1;
				   if(isset($_REQUEST['search'])){
					   $seacrh=htmlspecialchars($_REQUEST['search']);
					   $bind=array('%'.$seacrh.'%');
					$sql="SELECT listName FROM `listhandle` where listName like :param0  group by listName";
				   }else{
					$sql="SELECT listName FROM `listhandle` group by listName";
				   }
				   
	 	 	 		$this->set('json',$this->_model->__viewSql($sql,$bind));
		}	
 	 	 public function edit($id)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
				$this->_model->setid($id);
				$this->_model->setidVal($_REQUEST['idVal']);
				$this->_model->settextVal($_REQUEST['textVal']);
				$this->_model->setlistName($_REQUEST['listName']);
				if(isset($_REQUEST['isSync']))
				{
					$this->_model->setisSync($_REQUEST['isSync']);
				}else{
					$this->_model->setisSync(0);
				}
				
	 	 	 	$this->set('json',$this->_model->__update()); 
 	 	}
 	 	  public function add()
 	 	 {
			    $dynamic = false;
	 	 	 	$this->doNotRenderHeader=1;
				$this->_model->setidVal($_REQUEST['idVal']);
				$this->_model->settextVal($_REQUEST['textVal']);
				$this->_model->setlistName($_REQUEST['listName']);
				if(is_numeric($_REQUEST['listName']))
				{
					$entity = new entity();
					$entity->__find($_REQUEST['listName']);
					$this->_model->setlistName($entity->gettableName());
					$dynamic=true;
				}
				
				if(isset($_REQUEST['isSync']))
				{
					$this->_model->setisSync($_REQUEST['isSync']);
				}else{
					$this->_model->setisSync(0);
				}
				if($dynamic){
					$criteria="listName=:param0";
					$bind = array($this->_model->getlistName());
					$this->set('json',$this->_model->__saveUnquie($criteria,$bind)); 
				}else
				{
					$this->set('json',$this->_model->__save()); 
				}
	 	 	 	
 	 	}
 	 	 public function delete($id)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
				$this->_model->setid($id);
				$this->set('json',$this->_model->__delete()); 
		  } 
		  public function getList($listName)
		  {
			$this->doNotRenderHeader=1;
			$list=htmlspecialchars($listName);
			$criteria="listName ='".$list."'";
			$this->set('json',$this->_model->__viewComboCriteria($criteria));

		  }
 	} ?>