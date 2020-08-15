<?php 
 class entityform extends Model{
private $colName;
private $controlName;
private $labelName;
private $url;
private $txtVal;
private $valval;
private $isActive;
private $tableNme;
private $orderIn;
private $positionIn;
private $isRequired;

public function getorderIn()
{
 		return $this->orderIn;
}

		public function getpositionIn()
		{
				return $this->positionIn;
		}
		public function getcolName()
		{
 		return $this->colName;
		}

		public function getcontrolName()
		{
 		return $this->controlName;
		}

public function getlabelName()
		{
 		return $this->labelName;
}

		public function geturl()
		{
 		return $this->url;
}

		public function gettxtVal()
		{
 		return $this->txtVal;
}

		public function getvalval()
		{
 		return $this->valval;
}

		public function getisActive()
		{
 		return $this->isActive;
}

		public function gettableNme()
		{
 		return $this->tableNme;
}

		public function setcolName($colName)
		{
		  $this->colName=$colName;
		}

		public function getRealNameCol($colName)
		{
			$list=$colName;
			$count=strlen($list);
			$colName='';
			
				for($i=0;$i<$count;$i++)
				{
					$char=$list{$i};
					if(ctype_upper($char)){
						$colName.=' '.$char;
					}else{
						$colName.=$char;
					}
					
				}
			return ucfirst($colName);
		

		}

		public function setcontrolName($controlName)
		{
		  $this->controlName=$controlName;
		}

		public function setlabelName($labelName)
		{
		  $this->labelName=$labelName;
		}

		public function seturl($url)
		{
		  $this->url=$url;
		}

		public function settxtVal($txtVal)
		{
		  $this->txtVal=$txtVal;
		}

		public function setvalval($valval)
		{
		  $this->valval=$valval;
		}

		public function setisActive($isActive)
		{
		  $this->isActive=$isActive;
		}

		public function settableNme($tableNme)
		{
		  $this->tableNme=$tableNme;
		}

		public function setorderIn($orderIn)
		{
		  $this->orderIn=$orderIn;
		}

		public function setpositionIn($positionIn)
		{
		  $this->positionIn=$positionIn;
		}

		public function getLabel($colName)
		{
			$label='';
			$sql="Select * from entityform where colName=:param0";
			$bind=array($colName);

			$result=$this->__resultSetBind($sql, $bind);
			foreach($result as $row)
			{
				$label=$row['labelName'];
			}
			
			return $label;
			

		}

		public function getisRequired()
		{
		return $this->isRequired;
		}


		public function setisRequired($isRequired)
		{
		$this->isRequired = $isRequired;

		return $this;
		}
} 
 ?>