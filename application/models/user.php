<?php 
 class user extends Model{
private $id;
private $firstName;
private $lastName;
private $mobileNumber;
private $email;
private $creationDate;
private $statusId;


		public function getid()
		{
 		return $this->id;
}

		public function getfirstName()
		{
 		return $this->firstName;
}

		public function getlastName()
		{
 		return $this->lastName;
}

		public function getmobileNumber()
		{
 		return $this->mobileNumber;
}

		public function getemail()
		{
 		return $this->email;
}

		public function getcreationDate()
		{
 		return $this->creationDate;
}

		public function getstatusId()
		{
 		return $this->statusId;
}

		public function setid($id)
		{
		  $this->id=$id;
		}

		public function setfirstName($firstName)
		{
		  $this->firstName=$firstName;
		}

		public function setlastName($lastName)
		{
		  $this->lastName=$lastName;
		}

		public function setmobileNumber($mobileNumber)
		{
		  $this->mobileNumber=$mobileNumber;
		}

		public function setemail($email)
		{
		  $this->email=$email;
		}

		public function setcreationDate($creationDate)
		{
		  $this->creationDate=$creationDate;
		}

		public function setstatusId($statusId)
		{
		  $this->statusId=$statusId;
		}
} 
 ?>