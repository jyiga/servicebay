<?php 
 class vehicle extends Model{
private $vehiclePlate;
private $creationDate;


		public function getvehiclePlate()
		{
 		return $this->vehiclePlate;
}

		public function getcreationDate()
		{
 		return $this->creationDate;
}

		public function setvehiclePlate($vehiclePlate)
		{
		  $this->vehiclePlate=$vehiclePlate;
		}

		public function setcreationDate($creationDate)
		{
		  $this->creationDate=$creationDate;
		}
} 
 ?>