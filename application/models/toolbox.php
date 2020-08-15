<?php 
 class toolbox extends Model{
private $id;
private $toolboxName;


		public function getid()
		{
 		return $this->id;
}

		public function gettoolboxName()
		{
 		return $this->toolboxName;
}

		public function setid($id)
		{
		  $this->id=$id;
		}

		public function settoolboxName($toolboxName)
		{
		  $this->toolboxName=$toolboxName;
		}
} 
 ?>