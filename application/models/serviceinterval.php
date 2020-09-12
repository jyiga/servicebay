<?php 
 class serviceinterval extends Model{
private $id;
private $intervalValue;


		public function getid()
		{
 		return $this->id;
}

		public function getintervalValue()
		{
 		return $this->intervalValue;
}

		public function setid($id)
		{
		  $this->id=$id;
		}

		public function setintervalValue($intervalValue)
		{
		  $this->intervalValue=$intervalValue;
		}

		public function getNextId()
		{
			return  ($this->_count()+1);
		}

		public function getView(){
			return $this->__viewCombo();
		}
} 
 ?>