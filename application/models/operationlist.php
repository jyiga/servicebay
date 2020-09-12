<?php 
 class operationlist extends Model{
private $id;
private $operationName;
private $creationDate;


		public function getid()
		{
 		return $this->id;
}

		public function getoperationName()
		{
 		return $this->operationName;
}

		public function getcreationDate()
		{
 		return $this->creationDate;
}

		public function setid($id)
		{
		  $this->id=$id;
		}

		public function setoperationName($operationName)
		{
		  $this->operationName=$operationName;
		}

		public function setcreationDate($creationDate)
		{
		  $this->creationDate=$creationDate;
		}

		public function getObjectId($str)
		{
			$criteria = "operationName = :param0";
			$bind =array($str);
			$this->__findCriteria($criteria,$bind);
			return $this->id != null ?$this->id:-1; 
		}

		public function getOperationList($str)
		{
			$criteria = "operationName LIKE :param0";
			$bind =array('%'.$str.'%');

			$sql="Select op.*,(Select amount from operationcost where operationId=op.id and isActive=1) amount from operationlist op  where op.operationName LIKE '%".$str."%'";
			return $this->__viewComboSql($sql);
			//return $this->id != null ?$this->id:-1; 
		}

} 
 ?>