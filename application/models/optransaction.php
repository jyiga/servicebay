<?php 
 class optransaction extends Model{
private $id;
private $creationDate;
private $userId;
private $transType;
private $operationId;
private $amount;


		public function getid()
		{
 		return $this->id;
}

		public function getcreationDate()
		{
 		return $this->creationDate;
}

		public function getuserId()
		{
 		return $this->userId;
}

		public function gettransType()
		{
 		return $this->transType;
}

		public function getoperationId()
		{
 		return $this->operationId;
}

		public function getamount()
		{
 		return $this->amount;
}

		public function setid($id)
		{
		  $this->id=$id;
		}

		public function setcreationDate($creationDate)
		{
		  $this->creationDate=$creationDate;
		}

		public function setuserId($userId)
		{
		  $this->userId=$userId;
		}

		public function settransType($transType)
		{
		  $this->transType=$transType;
		}

		public function setoperationId($operationId)
		{
		  $this->operationId=$operationId;
		}

		public function setamount($amount)
		{
		  $this->amount=$amount;
		}

		//SELECT RealDate,operationName,Sum(amount) totalSales,count(*) itemNo FROM `vw_optransaction` group by RealDate,operationName
		public function getStats($date)
		{

			$data=array();
			$opList= new operationlist();
			$totalSales=0;
			$totalCount=0;
			foreach($opList->__resultSetBind() as $row){
				$opsName=$row['operationName'];
				$opsId=$row['id'];
				$sql="SELECT RealDate,operationName,Sum(amount) totalSales,count(*) itemNo FROM `vw_optransaction` where RealDate =:param0 and operationName=:param1 group by RealDate,operationName";
				$bind=array($date,$opsName);
				//"RealDate":"2020-09-09","operationName":"CarWash","totalSales":"1000","itemNo":"1"
				$array=array();
				$array['RealDate']=$date;
				$array['operationName']=$opsName;
				$i=0;
				foreach ($this->__resultSetBind($sql,$bind) as $row2) {
					$totalSales=$totalSales+$row2['totalSales'];
					$totalCount=$totalCount+$row2['itemNo'];
					$i=1;
					$array['totalSales']=number_format($row2['totalSales'],0);
					$array['itemNo']=$row2['itemNo']<10?'0'.$row2['itemNo']:$row2['itemNo'];
				}
				if($i==0){
					$array['totalSales']=number_format(0,0);
					$array['itemNo']='00';
				}

				
				array_push($data,$array);

			}

			$array=array();
			$array['RealDate']=$date;
			$array['operationName']="Total Sales";
			$array['totalSales']=number_format($totalSales,0);
			$array['itemNo']=$totalCount<10?"0".$totalCount:$totalCount;;
			array_push($data,$array);

			return $data;

		}
} 
 ?>