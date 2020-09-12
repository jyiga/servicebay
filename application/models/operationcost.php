<?php 
 class operationcost extends Model{
private $id;
private $amount;
private $isActive;
private $operationId;


		public function getid()
		{
 		return $this->id;
}

		public function getamount()
		{
 		return $this->amount;
}

		public function getisActive()
		{
 		return $this->isActive;
}

		public function getoperationId()
		{
 		return $this->operationId;
}

		public function setid($id)
		{
		  $this->id=$id;
		}

		public function setamount($amount)
		{
		  $this->amount=$amount;
		}

		public function setisActive($isActive)
		{
		  $this->isActive=$isActive;
		}

		public function setoperationId($operationId)
		{
		  $this->operationId=$operationId;
		}

		public function saveCost()
		{
			$amount=0;
			$amount= $this->amount;
			$count=0;
			$criteria= "operationId=:param0";
			$bind=array($this->operationId);
			$count=$this->_countDefined($criteria,$bind);
			if($count>0){
				//update all
				$this->isActive=0;
				$this->amount=null;
				$updateCriteria="operationId='".$this->operationId."'";
				$this->__updateCriteria($updateCriteria);
				$this->amount =$amount;
				$this->isActive=1;
				return $this->__save();
			}else {
				$this->isActive=1;
				return $this->__save();
			}

		}
} 
 ?>