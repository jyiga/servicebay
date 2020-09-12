<?php 
 class receiptcopy extends Model{
private $id;
private $receiptContext;
private $vehiclePlate;
private $creationDate;


		public function getid()
		{
 		return $this->id;
}

		public function getreceiptContext()
		{
 		return $this->receiptContext;
}

		public function getvehiclePlate()
		{
 		return $this->vehiclePlate;
}

		public function getcreationDate()
		{
 		return $this->creationDate;
}

		public function setid($id)
		{
		  $this->id=$id;
		}

		public function setreceiptContext($receiptContext)
		{
		  $this->receiptContext=$receiptContext;
		}

		public function setvehiclePlate($vehiclePlate)
		{
		  $this->vehiclePlate=$vehiclePlate;
		}

		public function setcreationDate($creationDate)
		{
		  $this->creationDate=$creationDate;
		}

		public function printView($vehiclePlate){
			$date =date('Y-m-d');
			$sql="Select * from receiptcopy where vehiclePlate= :param0 and creationDate like :param1 order by id desc limit 0,1";
			$bind=array($vehiclePlate,'%'.$date.'%');
			$html="";
			foreach($this->__resultSetBind($sql,$bind) as $row){
					$html.="\n\n".base64_decode($row['receiptContext'])."\n\n\n";
			}
			
			return $html;

		}


} 
 ?>