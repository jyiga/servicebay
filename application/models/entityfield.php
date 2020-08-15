<?php 
 class entityfield extends Model{
private $id;
private $fieldName;
private $fieldType;
private $fieldLength;
private $fieldConstraint;
private $canBeNull;
private $entityId;


		public function getid()
		{
 		return $this->id;
}

		public function getfieldName()
		{
 		return $this->fieldName;
}

		public function getfieldType()
		{
 		return $this->fieldType;
}

		public function getfieldLength()
		{
 		return $this->fieldLength;
}

		public function getfieldConstraint()
		{
 		return $this->fieldConstraint;
}

		public function getcanBeNull()
		{
 		return $this->canBeNull;
}

		public function getentityId()
		{
 		return $this->entityId;
}

		public function setid($id)
		{
		  $this->id=$id;
		}

		public function setfieldName($fieldName)
		{
		  $this->fieldName=$fieldName;
		}

		public function setfieldType($fieldType)
		{
		  $this->fieldType=$fieldType;
		}

		public function setfieldLength($fieldLength)
		{
		  $this->fieldLength=$fieldLength;
		}

		public function setfieldConstraint($fieldConstraint)
		{
		  $this->fieldConstraint=$fieldConstraint;
		}

		public function setcanBeNull($canBeNull)
		{
		  $this->canBeNull=$canBeNull;
		}

		public function setentityId($entityId)
		{
		  $this->entityId=$entityId;
		}

		private function getFieldCount()
		{
			$count=0;
			$criteria='entityId=:param0';
			$bind=array($this->entityId);
			$count=$this->_countDefined($criteria,$bind);
			return $count;
		}

		private function getRealFieldCount()
		{
			$count=0;
			$entity=new entity();
			$entity->__find($this->entityId);
			$tableName=$entity->gettableName();
			$sql="SELECT count(*) fieldNo FROM information_schema.columns WHERE table_schema = '".IConnectInfo::DBN."' AND table_name = '".$tableName."'";
			/*SELECT * 
FROM information_schema.tables
WHERE table_schema = 'health_db' 
    AND table_name = 'testtable'
LIMIT 1;*/
			foreach($this->__resultSet($sql) as $row)
			{
				$count=$row['fieldNo'];
			}
			return $count;
		}


		// JY12062020 Add the get column action getter method this month
		public function columnActionGetter($column,$dataType,$columntype)
		{
			$action="None";
			$count=0;
			$entity=new entity();
			$entity->__find($this->entityId);
			$tableName=$entity->gettableName();
			$sql="SELECT *  FROM information_schema.columns WHERE table_schema = '".IConnectInfo::DBN."' AND table_name = '".$tableName."' and COLUMN_NAME='".$column."'";
			
			foreach($this->__resultSet($sql) as $row)
			{
				//$count=$row['fieldNo'];
				if(($column==$row['COLUMN_NAME'] && $dataType==strtoupper($row['DATA_TYPE'])) && $columntype==strtoupper($row['COLUMN_TYPE']))
				{
					$count=$count+1;//Do anything

					// the condition can not happen again
				}else if(($column==$row['COLUMN_NAME'] && $dataType!=strtoupper($row['DATA_TYPE'])) && $columntype!=strtoupper($row['COLUMN_TYPE'])){
					$count=$count+2;//alter modified 
				}else{
					$count=$count+0;
				}

				

			}

			switch ($count)
			{
				case 0:
					$action="ADD";
				break;
				case 1:
					$action="NONE";
				break;
				case 2:
					$action="MODIFY";
				break;
				default:
				break;
			}
			return $action;
		}


		public function actionStatus()
		{
			$action=null;
			$fieldCount=$this->getFieldCount();
			$realFieldCount=$this->getRealFieldCount();

			if($realFieldCount==0)
			{
				$action="Create";
			}else if($realFieldCount==$fieldCount)
			{
				$action="Alter";

			}else if($realFieldCount<$fieldCount)
			{
				$action="Add";
			}else if($realFieldCount>$fieldCount)
			{
				$action="Drop";
			}

			return $action;
			
		}

		public function getFieldList()
		{
			
			$sql="Select * from entityfield where entityId=:param0";
			$bind=array($this->getentityId());
			return $this->__resultSetBind($sql,$bind);
			
		}

		public  function addTableField()
		{
			$count=0;
			$entity=new entity();
			$entity->__find($this->entityId);
			$tableName=$entity->gettableName();
			$sql="SELECT * FROM information_schema.columns WHERE table_schema = '".IConnectInfo::DBN."' AND table_name = '".$tableName."'";
			
			foreach($this->__resultSet($sql) as $row)
			{
				$this->fieldName = $row['COLUMN_NAME'];
				$this->fieldType = $row['DATA_TYPE'];
				$this->fieldLength = $this->getLengthAt($row['COLUMN_TYPE'],$row['DATA_TYPE']);
				if($row['EXTRA']!='' || $row['EXTRA']!=NULL )
				{

					$this->fieldConstraint = $row['EXTRA'];
				}else{
					$this->fieldConstraint ='';
				}
				if($row['COLUMN_DEFAULT']=='NULL')
				{
					$this->canBeNull=1;
					
				}else{
					$this->canBeNull=0;
				}

				$this->__save();

			}
			
		}

		private function getLengthAt($string,$substring)
		{
			$substr = "";
			$lenOfSubStr = strlen($substring);
			$strlen = strlen($string);
			$startPos = strpos($string,"(");
			$endPos = strpos($string,")");
			$substr = substr($string,($lenOfSubStr+1),($endPos-$startPos)-1);
			error_log($string.'-'.$substring.'-'.$substr . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'sub.log');
			return $substr;

		}

		
} 
 ?>