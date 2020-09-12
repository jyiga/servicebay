<?php 
 class routineactive extends Model{
private $id;
private $action;


		public function getid()
		{
 		return $this->id;
}

		public function getaction()
		{
 		return $this->action;
}

		public function setid($id)
		{
		  $this->id=$id;
		}

		public function setaction($action)
		{
		  $this->action=$action;
		}
} 
 ?>