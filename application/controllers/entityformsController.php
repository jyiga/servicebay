<?php 
 class entityformsController extends Controller{

 	 	 public function view()
 	 	{
	 	}	
 	 	public function viewcombobox($tableName)
 	 	 {
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	$this->set('json',$this->getTableCol($tableName));
		 }	
		 
 	 	 public function viewall()
 	 	{
				$this->doNotRenderHeader=1;
				$sql="Select * from entityform order by orderIn";
	 	 	 	$this->set('json',$this->_model->__viewSql($sql));
		}	
 	 	 public function edit($colName)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
				$this->_model->setcolName($_REQUEST['colName']);
				$this->_model->setcontrolName($_REQUEST['controlName']);
				$this->_model->setlabelName($_REQUEST['labelName']);
				$this->_model->seturl($_REQUEST['url']);
				$this->_model->settxtVal($_REQUEST['txtVal']);
				$this->_model->setvalval($_REQUEST['valval']);
				$this->_model->setisActive($_REQUEST['isActive']);
				$this->_model->settableNme($colName);
				$this->_model->setisRequired($_REQUEST['isRequired']);
	 	 	 	$this->set('json',$this->_model->__update()); 
 	 	}
 	 	  public function add()
		{
				$this->doNotRenderHeader=1;
				$this->_model->setcolName($_REQUEST['colName']);
				$this->_model->setcontrolName($_REQUEST['controlName']);
				$this->_model->setlabelName($_REQUEST['labelName']);
				$this->_model->seturl($_REQUEST['url']);
				$this->_model->settxtVal($_REQUEST['txtVal']);
				$this->_model->setvalval($_REQUEST['valval']);
				$this->_model->setisActive($_REQUEST['isActive']);
				$this->_model->settableNme($_REQUEST['tableNme']);
				$this->_model->setisRequired(true);
				$this->set('json',$this->_model->__save()); 
		  }
		  
		private function insertToEntity($col,$tableName,$i=0)
		{
			$this->_model->setcolName($col);
			$this->_model->setcontrolName('textbox');
			//$this->_model->getRealNameCol($col);
			$this->_model->setlabelName($this->_model->getRealNameCol($col));
			$this->_model->seturl('');
			$this->_model->settxtVal('');
			$this->_model->setvalval('');
			$this->_model->setisActive(1);
			$this->_model->settableNme($tableName);
			$this->_model->setorderIn($i);
			$this->_model->setisRequired(true);
			$this->_model->__save();
		}

 	 	 public function delete($colName)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setcolName($colName);
	 	 	 	 $this->set('json',$this->_model->__delete()); 
		  } 
		  public function addCols($tableName)
		  {
			$this->doNotRenderHeader=1;
			$table=$this->getTableCol($tableName);
			$this->trucateTable($tableName);
			/*for($i=0;$i<sizeof($table);$i++)
			{
					//insert to the table
					$this->insertToEntity($table[$i],$tableName);

			}*/
			$i=0;
			foreach($table as $value)
			{
				$this->insertToEntity($value,$tableName,$i);
				$i=$i+1;
			}

			  $this->set('json',array('success'=>true)); 
		  }

		  private function getTableCol($tableName)
		  {
			  
			$conn=$this->_model->_conn->hookUp;
			$query=$conn->prepare("Describe ".$tableName);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_COLUMN);
		  }

		  private function trucateTable($tableName)
		  {
			  try
			  {
				$conn=$this->_model->_conn->hookUp;
				$conn->query("truncate table entityform");
			  }catch(PDOException $e)
			  {
				return array('msg'=>$e->getMessage());
			  }
			  
			
			//$query->execute();
			//return $query->fetchAll(PDO::FETCH_COLUMN);
		  }

		  public function addListToEntityField($id,$listName)
		  {
				$this->doNotRenderHeader=1;
				$this->_model->setcolName($id);
				$listhandle = new listhandle();
				$listhandle->__findCriteria("listName=:param0",array($listName));
				if($listhandle->getisSync()==0)
				{
					$this->_model->seturl('../listhandles/getList/'.$listName);
					$this->_model->settxtVal('textVal');
					$this->_model->setvalval('idVal');
					$this->set('json',$this->_model->__update()); 

				}else {
					$this->_model->seturl('../'.$listName.'s/viewcombobox');
					$this->_model->settxtVal($listhandle->gettextVal());
					$this->_model->setvalval($listhandle->getidVal());
					$this->set('json',$this->_model->__update()); 
				}
		  }
 	} ?>