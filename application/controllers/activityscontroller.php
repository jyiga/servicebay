<?php

class ActivitysController extends Controller {

	function view()
	{
	

	}

	public function viewall()
	{
		//tehehehe
		//YYY
		$this->doNotRenderHeader=1;
		$sql="Select * from activity order by indexOrder ";
		$this->set('json',$this->_model->__viewSql($sql));

	}

	public function viewCombo()
	{
		$this->doNotRenderHeader=1;
		$this->set('json',$this->_model->__viewCombo());

	}

	public function edit($id)
	{
		$this->doNotRenderHeader=1;

		$this->_model->setid($id);
		$this->_model->setname($_REQUEST['name']);
		$this->_model->setindexOrder($_REQUEST['indexOrder']);
		$this->set('json',$this->_model->__update());

	}
	public function add()
	{
		$this->doNotRenderHeader=1;
		//$this->_model->setid($this->getGUID());
		$this->_model->setname($_REQUEST['name']);
		$this->_model->setindexOrder($_REQUEST['indexOrder']);
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

	public function moveup($id)
	{
		$this->doNotRenderHeader=1;
		$positionNew=$_REQUEST['position'];
		$positionBefore=$_REQUEST['positionBefore'];
//first update a handle position
		$this->_model->setindexOrder($positionBefore);
		$criteria="indexOrder='".$positionNew."'";
		$this->_model->__updateCriteria($criteria);

		$this->_model->setindexOrder($positionNew);
		$this->_model->setid($id);
		$this->set('json',$this->_model->__update());


	}


}
