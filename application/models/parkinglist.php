<?php 
 class parkinglist extends Model{
private $id;
private $InDate;
private $OutDate;
private $Session;
private $exist;
private $userId;
private $vehiclePlate;
private $optransactionId;


		public function getid()
		{
 		return $this->id;
}

		public function getInDate()
		{
 		return $this->InDate;
}

		public function getOutDate()
		{
 		return $this->OutDate;
}

		public function getSession()
		{
 		return $this->Session;
}

		public function getexist()
		{
 		return $this->exist;
}

		public function getuserId()
		{
 		return $this->userId;
}

		public function getvehiclePlate()
		{
 		return $this->vehiclePlate;
}

		public function getoptransactionId()
		{
 		return $this->optransactionId;
}

		public function setid($id)
		{
		  $this->id=$id;
		}

		public function setInDate($InDate)
		{
		  $this->InDate=$InDate;
		}

		public function setOutDate($OutDate)
		{
		  $this->OutDate=$OutDate;
		}

		public function setSession($Session)
		{
		  $this->Session=$Session;
		}

		public function setexist($exist)
		{
		  $this->exist=$exist;
		}

		public function setuserId($userId)
		{
		  $this->userId=$userId;
		}

		public function setvehiclePlate($vehiclePlate)
		{
		  $this->vehiclePlate=$vehiclePlate;
		}

		public function setoptransactionId($optransactionId)
		{
		  $this->optransactionId=$optransactionId;
		}

		public function viewParkingList()
		{
			$sql="SELECT * FROM vwparkinglist where exist = 0 order by InDate desc";
			return $this->__viewQuery($sql);
		}

		
		public function receiptCopy($np,$h,$c,$amt){
			$buildString = "";

			$config  = new configurationSetting();
			$config->getCriteria("Company Name");
			$buildString.=$this->returnGivenLength($config->getsystemValue(),32)."\n";
			$config->getCriteria("address");
			$buildString.=$config->getsystemValue()."\n";
			$config->getCriteria("company contact");
			$buildString.=$config->getsystemValue()."\n";
			$config->getCriteria("Website");
			$buildString.=$config->getsystemValue()."\n";
			$buildString.=$this->returnGivenLength("-------------RECEIPT------------",32)."\n";
			$buildString.="Number Plate:      ".$this->vehiclePlate."\n";
			$buildString.="Park for:          ".$h." Hours\n";
			$buildString.="Costing:           ".$c." UGX\n";
			$buildString.="Paid:              ".$amt." UGX\n";
			$buildString.=$this->returnGivenLength("-------------THANK YOU----------",32)."\n";
			for($i=0;$i<5;$i++){
				$buildString.="\n";
			}
			$buildString.=$this->returnGivenLength("Design by",32)."\n";
			$buildString.=$this->returnGivenLength("Xonib Software Solution",32)."\n";
			$buildString.=$this->returnGivenLength("0781587081",32)."\n";

			$receipt= new receiptcopy();
			$receipt->setreceiptContext(base64_encode($buildString));
			$receipt->setvehiclePlate($this->vehiclePlate);
			$id=$receipt->__saveReturnId();


			return array("hardcopy"=>$buildString,"id"=>$id);

		}

		private function returnGivenLength($string, $len ){

			if(strlen($string)<$len){
				$newString="";
				$diff= $len-strlen($string);
				if($diff%2==0){
					$half=$diff/2;
					for($i=0;$i<=$half;$i++){
						$newString.=" ";
					}
					$newString.=$string;
					for($i=0;$i<=$half;$i++){
						$newString.=" ";
					}

				}else{
					$half=$diff/2;
					
					for($i=0;$i<=$half;$i++){
						$newString.=" ";
					}
					$half=$half+($diff%2);
					$newString.=$string;
					for($i=0;$i<=$half;$i++){
						$newString.=" ";
					}
				}
				$string=$newString;

			}else{
				$string=substr($string,0,$len);

			}

			return $string;

		}

		/*
		StringBuilder recepit = new StringBuilder();
            recepit.append("         Company Name        \n");
            recepit.append("PO BOX ###,Kampala,Uganda\n");
            recepit.append("Tel: 078 -1-000-0000,078 -1-000-0000 \n");
            recepit.append("Webiste: www.code360ds.com \n");
            recepit.append("-------------RECEIPT------------\n");
            recepit.append("Number Plate:      "+lblNumberPlate.getText()+"\n");
            recepit.append("Park for:          "+txtHours.getText()+" Hours"+"\n");
            recepit.append("Costing:           "+txtCost.getText() +"UGX"+"\n");
            recepit.append("Paid:              "+txtAmount.getText() +"UGX"+"\n");
            recepit.append("-------------THANK YOU---------\n");

		*/
} 
 ?>