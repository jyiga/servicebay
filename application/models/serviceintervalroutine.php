<?php 
 class serviceintervalroutine extends Model{
private $id;
private $amount;
private $serviceCardId;
private $routineId;


		public function getid()
		{
 		return $this->id;
}

		public function getamount()
		{
 		return $this->amount;
}

		public function getserviceCardId()
		{
 		return $this->serviceCardId;
}

		public function getroutineId()
		{
 		return $this->routineId;
}

		public function setid($id)
		{
		  $this->id=$id;
		}

		public function setamount($amount)
		{
		  $this->amount=$amount;
		}

		public function setserviceCardId($serviceIntervalId)
		{
		  $this->serviceCardId=$serviceIntervalId;
		}

		public function setroutineId($routineId)
		{
		  $this->routineId=$routineId;
		}

		public function save($opn,$amt,$jobCardId){

			$opnList = explode("-",$opn);

			$amtList =explode("-",$amt);

			$opListCount = sizeof($opnList);
			$amtListCount = sizeof($amtList);
			if($opListCount>0 && $amtListCount >0)
			{
				for($i=0;$i<$opListCount;$i++)
				{
					//get 
					$ra = new routineactive();
					$criteria = "action = :param0 ";
					$bind = array($opnList[$i]);
					$ra->__findCriteria($criteria,$bind);

					//get
					$this->routineId=$ra->getid();
					$this->serviceCardId = $jobCardId;
					$this->amount =$amtList[$i];
					$this->__save();

				}

			}
		}
} 
 ?>