<?php 
 class usertype extends Model{

		private $id;
		private $userTypeName;
		private $isActive;
		
		public function getid()
		{
 		return $this->id;
}

		public function getuserTypeName()
		{
 		return $this->userTypeName;
}

		public function getisActive()
		{
 		return $this->isActive;
}

		public function setid($id)
		{
		  $this->id=$id;
		}

		public function setuserTypeName($userType)
		{
		  $this->userTypeName=$userType;
		}

		public function setisActive($isActive)
		{
		  $this->isActive=$isActive;
		}
} 
 ?>