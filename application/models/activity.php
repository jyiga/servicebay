<?php 

class Activity extends Model{
    private $id;
    private $name;
    private $indexOrder;
    private $isActive;

    public function getid()
    {
     return $this->id;
    }

    public function getname()
    {
     return $this->name;
    }

    public function getindexOrder()
    {
        return $this->indexOrder;
    }

    public function getisActive()
    {
     return $this->isActive;
    }

    public function setid($id)
    {
      $this->id=$id;
    }

    public function setname($name)
    {
      $this->name=$name;
    }

    public function setindexOrder($indexOrder)
    {
        $this->indexOrder=$indexOrder;
    }
    public function setisActive($isActive)
    {
      $this->isActive=$isActive;
    }

} 
 ?>