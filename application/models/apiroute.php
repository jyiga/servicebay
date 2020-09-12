<?php 
 class apiroute extends Model{
		private $id;
		private $userId;
		private $creationTime;
		private $responseTime;
		private $actionQuery;
		private $token;

		public function getid()
		{
 			return $this->id;
		}

		public function getuserId()
		{
 			return $this->userId;
		}

		public function getcreationTime()
		{
 			return $this->creationTime;
		}

		public function getresponseTime()
		{
 			return $this->responseTime;
		}

		public function getactionQuery()
		{
 			return $this->actionQuery;
		}

		public function gettoken()
		{
 		return $this->token;
}

		public function setid($id)
		{
		  $this->id=$id;
		}

		public function setuserId($userId)
		{
		  $this->userId=$userId;
		}

		public function setcreationTime($creationTime)
		{
		  $this->creationTime=$creationTime;
		}

		public function setresponseTime($responseTime)
		{
		  $this->responseTime=$responseTime;
		}

		public function setactionQuery($actionQuery)
		{
		  $this->actionQuery=$actionQuery;
		}

		public function settoken($token)
		{
		  $this->token=$token;
		}

		public function save($userId,$actionQuery,$id){
			$this->userId=$userId;
			$this->actionQuery=$actionQuery;
			$this->token = null;
			return $this->__saveReturnId();
		}
		
} 
 ?>