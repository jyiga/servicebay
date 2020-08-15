<?php 
 class entitysController extends Controller{

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
				$sql="Select ent.*,(SELECT count(*) FROM information_schema.tables WHERE table_schema = '".IConnectInfo::DBN."' AND table_name = ent.tableName LIMIT 1) tabexist,(SELECT count(*) FROM information_schema.columns WHERE table_schema = '".IConnectInfo::DBN."' AND table_name =ent.tableName) tabfield,(select count(*) from entityfield entf where entf.entityId=ent.id ) NsyncNo from entity ent";
	 	 	 	$this->set('json',$this->_model->__viewSql($sql));
		}

 	 	 public function edit($id)
 	 	{
			$this->doNotRenderHeader=1;
			$this->_model->setid($id);
			$this->_model->settableName($_REQUEST['tableName']);
				//$this->_model->setinSync(false);
			$this->set('json',$this->_model->__update()); 
		}
		  
		public function add()
		{
			$this->doNotRenderHeader=1;
			$this->_model->settableName($_REQUEST['tableName']);
			$this->_model->setinSync(false);
			$this->set('json',$this->_model->__save()); 
		}

 	 	 public function delete($id)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
				$this->_model->setid($id);
				$this->set('json',$this->_model->__delete()); 
		} 
		public function syncEntity($id)
		{
			$this->doNotRenderHeader=1;
			$this->set('json',$this->_model->syncStatus($id));
			

		}
		public function exportEntity($id)
		{
			$this->doNotRenderHeader=1;
			$id=htmlspecialchars($id);
			$this->_model->setid($id);
			$this->set('json',Utility::exportJsonFile($this->_model->exportJsonEntity()));
			
		}

		public function importSchemes()
		{
			$this->doNotRenderHeader=1;
			$this->_model->importfromDB();
			$this->set('json',array('success'=>true));
		}
		  
 	} ?>