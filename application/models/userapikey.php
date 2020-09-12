<?php 
 class userapikey extends Model{
		private $id;
		private $apiKey;
		private $userId;
		private $creationDate;
		private $expiryDate;
		private $isActive;


		public function getid()
		{
 		return $this->id;
}

		public function getapiKey()
		{
 		return $this->apiKey;
}

		public function getuserId()
		{
 		return $this->userId;
}

		public function getcreationDate()
		{
 		return $this->creationDate;
}

		public function getexpiryDate()
		{
 		return $this->expiryDate;
}

		public function getisActive()
		{
 		return $this->isActive;
}

		public function setid($id)
		{
		  $this->id=$id;
		}

		public function setapiKey($apiKey)
		{
		  $this->apiKey=$apiKey;
		}

		public function setuserId($userId)
		{
		  $this->userId=$userId;
		}

		public function setcreationDate($creationDate)
		{
		  $this->creationDate=$creationDate;
		}

		public function setexpiryDate($expiryDate)
		{
		  $this->expiryDate=$expiryDate;
		}

		public function setisActive($isActive)
		{
		  $this->isActive=$isActive;
		}

		public function save()
		{
			$this->apiKey=$this->generateSingleKey();
			$this->creationDate=date('Y-m-d');
			$this->expiryDate=date('Y-m-d', strtotime('+2 years'));
			$this->isActive=1;
			return $this->__save();

		}

	
		public function generateSingleKey()
		{
					if (function_exists('com_create_guid'))
					{
						return com_create_guid();
					}else
					{
						mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
						$charid = strtoupper(md5(uniqid(rand(), true)));
						$uuid =  
							substr($charid, 0, 8)
							.substr($charid, 8, 4)
							.substr($charid,12, 4)
							.substr($charid,16, 4)
							.substr($charid,20,12)
							;
						return $uuid;
					}
		}

		public function hasApiKey($apiKey = null, $user = null){
			
			$rowNo = 0;
			
			$this->apiKey = htmlspecialchars($apiKey);
			$this->userId = $user;
			$this->expiryDate =date('Y-m-d');


			$criteria ="((apikey = :param0 and userId =:param1) and expiryDate > :param2)";
			$bind=array($this->apiKey, $this->userId,$this->expiryDate);
			$rowNo = $this->_countDefined($criteria,$bind);

			if($rowNo == 0){
				return false;
			}else{
				return true;
			}



		}
	
		
} 
 ?>