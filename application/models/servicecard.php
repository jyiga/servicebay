<?php 
 class servicecard extends Model{
private $id;
private $CreationDate;
private $Odometer;
private $ServiceIntervalId;
private $vehiclePlate;
private $optransactionId;


		public function getid()
		{
 		return $this->id;
}

		public function getCreationDate()
		{
 		return $this->CreationDate;
}

		public function getOdometer()
		{
 		return $this->Odometer;
}

		public function getServiceIntervalId()
		{
 		return $this->ServiceIntervalId;
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

		public function setCreationDate($CreationDate)
		{
		  $this->CreationDate=$CreationDate;
		}

		public function setOdometer($Odometer)
		{
		  $this->Odometer=$Odometer;
		}

		public function setServiceIntervalId($ServiceIntervalId)
		{
		  $this->ServiceIntervalId=$ServiceIntervalId;
		}

		public function setvehiclePlate($vehiclePlate)
		{
		  $this->vehiclePlate=$vehiclePlate;
		}

		public function setoptransactionId($optransactionId)
		{
		  $this->optransactionId=$optransactionId;
		}

		public function receiptCopy($interval,$opnLst,$amtLst,$paidAmt){
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
			$buildString.=$this->returnGivenLength("--------SERVICE JOB CARD--------",32)."\n";
			$buildString.="Number Plate:      ".$this->vehiclePlate."\n";
			$buildString.="Odometer: ".$this->Odometer."\n";
			$buildString.="Next Service:".($this->Odometer+$interval)."\n";
			$buildString.="--------------------------------";
			$buildString.="Item                    Total   \n";
			$buildString.="--------------------------------\n";
			//$lenn=strlen($this->returnGivenLength2($opn,14).$this->returnGivenLength2($rate,10).$this->returnGivenLength2($rate,8));
			//$buildString.=$this->returnGivenLength2($opn,14).$this->returnGivenLength2($rate,10).$this->returnGivenLength2($rate,8)."\n";
			$opLstArray= explode("-",$opnLst);
			$amtLstArray=explode("-",$amtLst);
			$total =0;
			if(sizeof($opLstArray)>0){
				for($i=0;$i<sizeof($opLstArray);$i++)
				{
					$buildString.=$this->returnGivenLength2($opLstArray[$i],24).$this->returnGivenLength2($amtLstArray[$i],8)."\n";
					$total = $total + intval($amtLstArray[$i]);
				}

			}else{
				$buildString.=$this->returnGivenLength2($opnLst,24).$this->returnGivenLength2($amtLst,8)."\n";
				$total = $total + intval($amtLst);
			}

			$buildString.="--------------------------------\n";
			$buildString.="Total                ".$this->returnGivenLength($total,7)."\n";
			$buildString.="--------------------------------\n";
			$buildString.="Paid                ".$this->returnGivenLength($paidAmt,8)."\n";
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

		private function returnGivenLength2($string, $len ){

			if(strlen($string)<$len){
				$newString="";
				$diff= $len-strlen($string);
				if($diff%2==0){
					$half=$diff;
					
					$newString.=$string;
					for($i=0;$i<=$half;$i++){
						$newString.=" ";
					}

				}else{
					$half=$diff;
					
					
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

} 
 ?>