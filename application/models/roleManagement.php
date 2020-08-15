<?php 

class roleManagement extends Model{
private $id;
private $roleId;
private $userId;

public function getid(){
 return $this->id;
}
public function getroleId(){
 return $this->roleId;
}
public function getuserId(){
 return $this->userId;
}
public function setid($id){
  $this->id=$id;
}
public function setroleId($roleId){
  $this->roleId=$roleId;
}
public function setuserId($userId){
  $this->userId=$userId;
}

public function getRoleManagementCount()
{
   $sql="Select * from rolemanagement where userId=:param0";
   $bind=array($this->getuserId());
   $result=$this->__resultSetBind($sql,$bind);
   return array('row'=>$result,'count'=>sizeof($result));
}

} 
 ?>