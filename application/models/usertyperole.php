<?php 
 class usertyperole extends Model{
private $id;
private $userTypeId;
private $subActivityId;
private $isActive;
private $creationDate;


		public function getid()
		{
 		return $this->id;
}

		public function getuserTypeId()
		{
 		return $this->userTypeId;
}

		public function getsubActivityId()
		{
 		return $this->subActivityId;
}

		public function getisActive()
		{
 		return $this->isActive;
}

		public function getcreationDate()
		{
 		return $this->creationDate;
}

		public function setid($id)
		{
		  $this->id=$id;
		}

		public function setuserTypeId($userTypeId)
		{
		  $this->userTypeId=$userTypeId;
		}

		public function setsubActivityId($subActivityId)
		{
		  $this->subActivityId=$subActivityId;
		}

		public function setisActive($isActive)
		{
		  $this->isActive=$isActive;
		}

		public function setcreationDate($creationDate)
		{
		  $this->creationDate=$creationDate;
		}

		public function getCheckRoles($userId)
		{
			$userofType=new useroftype();
			$userofType->setuserId($userId);
			$userofType->getUserType();

			error_log(date('Y m d :g:i:s:a ') ."Type:".$userofType->getuserTypeId(). "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'proxy.log');

			if(!empty($userofType->getuserTypeId()))
			{
				$setRoleNumber=0;
				$actualRoleNumber=0;
				$sql="Select * from usertyperole where userTypeId=:param0";
				$bind=array($userofType->getuserTypeId());
				$result=$this->__resultSetBind($sql,$bind);
				$setRoleNumber=sizeof($result);

				error_log(date('Y m d :g:i:s:a ') ."User Type Number :".sizeof($result). "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'proxy.log');



				$rolemanagement=new roleManagement();
				$rolemanagement->setuserId($userId);
				$roleResult=$rolemanagement->getRoleManagementCount();
				$actualRoleNumber=intval($roleResult['count']);
				error_log(date('Y m d :g:i:s:a ') ."Role Number:".$actualRoleNumber. "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'proxy.log');

				//set > actual
				if($setRoleNumber>$actualRoleNumber)
				{
					error_log(date('Y m d :g:i:s:a ') ."Geared in: ".($setRoleNumber>$actualRoleNumber). "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'proxy.log');

					foreach($result as $row)
					{
						$role=new roleManagement();
						$criteria="Select * from rolemanagement where roleId=:param0 and userId=:param1";
						$criteriaBind=array($row['subActivityId'],$userId);
						$countValue=sizeof($role->__resultSetBind($criteria,$criteriaBind));
						
						error_log(date('Y m d :g:i:s:a ') ."cout val ".$countValue. "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'proxy.log');

						if($countValue==0)
						{
							$role->setroleId($row['subActivityId']);
							$role->setuserId($userId);
							$role->__save();

						}
						



					}

				}else if($setRoleNumber<$actualRoleNumber){
					//set < actual
					//remove
					foreach($roleResult['row'] as $row)
					{
						$role=new roleManagement();
						$usetyperole=new usertyperole();
						$usetyperole->setsubActivityId($row['roleId']);
						$usetyperole->setuserTypeId($userofType->getuserTypeId());
						$existanceArray=$usetyperole->checkforExistance();

						if($existanceArray['count']==0)
						{

							$role->setid($row['id']);
							$role->__delete();
						}


						


					}

				}


			}
			//Role Get the roles;
			

			//Check the rolemangement

			//Update the rolemanagement

		}


		public function checkforExistance()
		{
			$sql="Select * from usertyperole where subActivityId=:param0 and userTypeId=:param1";
			$bind=array($this->getsubActivityId(),$this->getuserTypeId());
			$result=$this->__resultSetBind($sql,$bind);
			return array('row'=>$result,'count'=>sizeof($result));
		}
} 
 ?>