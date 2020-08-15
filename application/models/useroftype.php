<?php 
 class useroftype extends Model{
private $userId;
private $userTypeId;
private $isActive;


		public function getuserId()
		{
 		return $this->userId;
}

		public function getuserTypeId()
		{
 		return $this->userTypeId;
}

		public function getisActive()
		{
 		return $this->isActive;
}

		public function setuserId($userId)
		{
		  $this->userId=$userId;
		}

		public function setuserTypeId($userTypeId)
		{
		  $this->userTypeId=$userTypeId;
		}

		public function setisActive($isActive)
		{
		  $this->isActive=$isActive;
		}

		public function getUserType()
		{
			$sql="Select * from useroftype where userId=:param0";
			$bind=array($this->getuserId());

			foreach($this->__resultSetBind($sql,$bind) as $row)
			{
				$this->userTypeId=$row['userTypeId'];
				$this->isActive=$row['isActive'];
			}

		}
} 
 ?>