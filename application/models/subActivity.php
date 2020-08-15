<?php 

class SubActivity extends Model{
private $id;
private $name;
private $link;
private $icon;
private $activityId;
private $isActive;
private $orderIndex;

public function getid(){
 return $this->id;
}
public function getname(){
 return $this->name;
}
public function getlink(){
 return $this->link;
}
public function getactivityId(){
 return $this->activityId;
}
public function getisActive(){
 return $this->isActive;
}
public function setid($id){
  $this->id=$id;
}
public function setname($name){
  $this->name=$name;
}
public function setlink($link){
  $this->link=$link;
}
public function setactivityId($activityId){
  $this->activityId=$activityId;
}
public function setisActive($isActive){
  $this->isActive=$isActive;
}
public function setorderIndex($orderIndex){
  $this->orderIndex=$orderIndex;
}
public function getOrderIndex()
{
    return $this->orderIndex;
}

public function geticon()
{
    return $this->icon;
}

public function seticon($icon)
{
    $this->icon=$icon;

}

} 
 ?>