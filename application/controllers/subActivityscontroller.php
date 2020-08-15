<?php

class SubActivitysController extends Controller {

	function view()
	{
	

	}

	public function viewall()
	{
		$this->doNotRenderHeader=1;
		$sql="SELECT sa.*,a.name title FROM `subactivity` sa inner join activity a on sa.activityId=a.id order by a.id, sa.orderIndex ";
		$this->set('json',$this->_model->__viewSql($sql));
	}

	public function viewcombox()
	{
		$this->doNotRenderHeader=1;
		$this->set('json',$this->_model->__view());

	}


	public function edit($id)
	{
		$this->doNotRenderHeader=1;
		$this->_model->setid($id);
		$this->_model->setname($_REQUEST['name']);
		$this->_model->setlink($_REQUEST['link']);
        $this->_model->seticon($_REQUEST['icon']);
		$this->_model->setactivityId($_REQUEST['activityId']);
		$this->_model->setorderIndex($_REQUEST['orderIndex']);
		$this->_model->setisActive(true);
		$this->set('json',$this->_model->__update());
	}
	public function add()
	{
		$this->doNotRenderHeader=1;

		//$this->_model->setid($this->getGUID());


		$this->_model->setname($_REQUEST['name']);
		$this->_model->setlink($_REQUEST['link']);
		$this->_model->setactivityId($_REQUEST['activityId']);
		$this->_model->seticon($_REQUEST['icon']);
		$this->_model->setorderIndex($_REQUEST['orderIndex']);
		$this->_model->setisActive(true);
		
		$this->set('json',$this->_model->__save());

	}
	public function delete($id)
	{
		$this->doNotRenderHeader=1;
		$this->_model->setid($id);
		//$this->_model->__save();
		$this->set('json',$this->_model->__delete());

	}
	public function getListOrderNumber($id)
	{
		$this->doNotRenderHeader=1;
		$criteria="activityId=".$id;
		$this->set('val',$this->_model->_countDefined($criteria)+1);
	}
	public function getfeaturename($id)
    {
        $this->doNotRenderHeader=1;
        $criteria="link = '../".trim($_REQUEST['urlv'])."'";
       $criteriaArray=explode('?',$criteria);
       if(is_array($criteriaArray))
       {
           $this->_model->__findCriteria($criteriaArray[0]);

       }else{
           $this->_model->__findCriteria($criteria);
       }

        $this->set('val',$this->_model->getname());
    }


}
