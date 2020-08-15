<?php 
 class entity extends Model{
private $id;
private $tableName;
private $inSync;


		public function getid()
		{
 		return $this->id;
}

		public function gettableName()
		{
 		return $this->tableName;
}

		public function getinSync()
		{
 		return $this->inSync;
}

		public function setid($id)
		{
		  $this->id=$id;
		}

		public function settableName($tableName)
		{
		  $this->tableName=$tableName;
		}

		public function setinSync($inSync)
		{
		  $this->inSync=$inSync;
		}

		public function syncStatus($id)
		{
			//number of field

			$entity=new entity();
			$entity->__find($id);

			$entityfield = new entityfield();
			$entityfield->setentityId($id); 
			
			
			$status=$entityfield->actionStatus();
			if($status==="Create")
			{
				//create the table;
				$create = new createBuilder();
				$create->setTable($entity->gettableName());
				$sql="Select * from entityfield where entityId=:param0";
				$bind=array($id);
				foreach($entityfield->__resultSetBind($sql,$bind) as $row )
				{
					$col=$row['fieldName'];
					$dataType=$row['fieldType'];
					if(intval($row['fieldLength'])>0)
					{
						$length=$row['fieldLength'];
						$dataType=$dataType.'('.$length.')';
					}
					
					$constraint=$row['fieldConstraint'];
					$isNull=intval($row['canBeNull'])===1?'NULL':'NOT NULL';
					$create->addColumn($col,$dataType,$isNull.' '.$constraint);
				}
				$sql = Director::buildSql($create);
				error_log(date('Y m d :g:i:s:a ') . $sql . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'tableCreation.log');
				$entity->setinSync(1);
				$entity->__update();
				return $this->createTable($sql);

			}else if($status=="Add" || $status=="Alter")
			{
				$executionCounter=0;
				//create the table;
				$alter = new alterBuilder();
				$alter->setTable($entity->gettableName());
				$sql="Select * from entityfield where entityId=:param0";
				$bind=array($id);
				foreach($entityfield->__resultSetBind($sql,$bind) as $row )
				{
					$col=$row['fieldName'];
					$data=$row['fieldType'];
					$dataType=$row['fieldType'];
					if(intval($row['fieldLength'])>0)
					{
						$length=$row['fieldLength'];
						$dataType=$dataType.'('.$length.')';
					}
					
					$constraint=$row['fieldConstraint'];
					$isNull=intval($row['canBeNull'])===1?'NULL':'NOT NULL';
					$action=$entityfield->columnActionGetter($col,$data,$dataType);
					if($action!="NONE")
					{
						$executionCounter=$executionCounter+1;
						$alter->addColumn($col,$dataType,$isNull.' '.$constraint,$action);
					}
					
				}
				if($executionCounter>0)
				{
					$sql = Director::buildSql($alter);
					error_log(date('Y m d :g:i:s:a ') . $sql . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'tableAtler.log');
					$entity->setinSync(1);
					$entity->__update();
					return $this->createTable($sql);
				}else
				{
					return array('success'=>true);

				}
				


			}
			//fields
			//conlusion

		}

		public function exportJsonEntity()
		{
			$array=array();
			$this->__find($this->getid());
			$array['tname']=$this->gettableName();
			$entityField=new entityField();
			$entityField->setentityId($this->getid());
			$array['fieldList']=$entityField->getFieldList();
			return $array;
		}

		public function importfromDB()
		{
			foreach($this->_DML() as $row)
			{
				$rowCount=0;
				$tableName=$row['tx'];
				$criteria="tableName=:param0";
				$bind=array($tableName);
				$rowCount=$this->_countDefined($criteria,$bind);
				if($rowCount==0)
				{
					$this->tableName=$tableName;
					$this->inSync=1;
					$id=$this->__saveReturnId();
					$entityfield = new entityfield();
					$entityfield->setentityId($id);
					$entityfield->addTableField();

				}
			}

		}
} 
 ?>