<?php 
 class configurationSetting extends Model{
private $id;
private $systemName;
private $systemValue;
private $mask;


		public function getid()
		{
 		return $this->id;
}

		public function getsystemName()
		{
 		return $this->systemName;
}

		public function getsystemValue()
		{
 		return $this->systemValue;
}

		public function getmask()
		{
 		return $this->mask;
}

		public function setid($id)
		{
		  $this->id=$id;
		}

		public function setsystemName($systemName)
		{
		  $this->systemName=$systemName;
		}

		public function setsystemValue($systemValue)
		{
		  $this->systemValue=$systemValue;
		}

		public function setmask($mask)
		{
		  $this->mask=$mask;
		}

		public function getCriteria($bind){
			$bindVal= array($bind);
			$criteria= "systemName=:param0";
			$this->__findCriteria($criteria,$bindVal);
		}
		
} 
 ?>