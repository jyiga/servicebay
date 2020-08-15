<?php

class RoleManagementsController extends Controller {
	public function index()
	{

	}

	public function view()
	{
	

	}

	public function login()
	{

	}

	public function viewall()
	{
		$this->doNotRenderHeader=1;
		$this->set('json',$this->_model->__view());
		$htmlString="";
		$criteria=null;
		if(isset($_REQUEST['module']))
		{
			$criteria=$_REQUEST['module'];

		}
		//$roleManagement=new roleManagementService();
		$sql="select su.* from systemuser su inner join user u on su.id !=u.id";
		$htmlString.= "<table class='table table-bordered table-striped table-hover'><tr><td></td>";
		$userId=array();
		$userName=array();
		foreach($this->_model->__viewQuery($sql) as $row)
		{
			$userId[]=$row['id'];
			$userName[]=$row['username'];
			$htmlString.= "<td>".$row['firstName']."&nbsp;".$row['lastName']."</td>";
		}
		$htmlString.="</tr>";
		//ini_s
		set_time_limit(120);
		$sql4="select * from activity order by indexOrder";
		if($criteria!=null)
		{
			$sql4="select * from activity where id='".$criteria."' order by indexOrder";	
		}
		
        foreach($this->_model->__viewQuery($sql4) as $row4) {

            $actId=$row4['id'];
            $htmlString .= "<tr ><th colspan='".(sizeof($userId)+1)."'>" . $row4['name'] . "</th></tr>";
            $sql2 = "select * from subactivity where activityId='".$actId."' order by activityId,orderIndex";

            foreach ($this->_model->__viewQuery($sql2) as $row2) {
                $id = $row2['id'];
                $htmlString .= "<tr><td>" . $row2['name'] . "</td>";
                for ($i = 0; $i < sizeof($userId); $i++) {
                    if ($this->getExistance($id, "'" . $userId[$i] . "'")) {
                        $htmlString .= "<td><input type='checkbox' id='" . $userName[$i] . $id . "' value='" . $userId[$i] . "*" . $id . "' name='xx' onchange='rollIn(this.id,this.value)'  class='filled-in' checked  /></td>";
                    } else {
                        $htmlString .= "<td><input type='checkbox' id='" . $userName[$i] . $id . "' value='" . $userId[$i] . "*" . $id . "' name='xx' onchange='rollIn(this.id,this.value)' class='filled-in' /></td>";
                    }
                }
                $htmlString .= "</tr>";
            }
            $htmlString .= "<tr ><td colspan='".(sizeof($userId)+1)."'>.</td></tr>";
        }
		$htmlString.= "</table>";
		$this->set('htmlString',$htmlString);

	}

	public function viewcombox()
	{
		$this->doNotRenderHeader=1;
		$this->set('json',$this->_model->__view());

	}


	public function edit($id)
	{
		$this->doNotRenderHeader=1;
		$this->_model->setid($_REQUEST['id']);
		$this->_model->setroleId($_REQUEST['roleId']);
		$this->_model->setuserId($_REQUEST['userId']);
		$this->set('json',$this->_model->__update());
	}
	public function add()
	{
		$this->doNotRenderHeader=1;

		$this->_model->setroleId($_REQUEST['roleId']);
		$this->_model->setuserId($_REQUEST['userId']);

		$this->set('json',$this->_model->__save());

	}

	public function reverse()
	{
		$this->doNotRenderHeader=1;

		$this->_model->setroleId($_REQUEST['roleId']);
		$this->_model->setuserId($_REQUEST['userId']);
		if($this->getExistance($_REQUEST['roleId'],"'".$_REQUEST['userId']."'"))
		{
			$this->_model->__findCriteria('roleId='.$_REQUEST['roleId']." and userId='".$_REQUEST['userId']."'");
			$this->set('json',$this->delete($this->_model->getid()));
		}else
		{
            $this->_model->setroleId($_REQUEST['roleId']);
            $this->_model->setuserId($_REQUEST['userId']);
            $this->set('json',$this->_model->__save());
			//$this->set('json',array('message'=>'Missing Object'));
		}




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

	private function getExistance($roleId,$userId)
	{
		$exist=false;
		$criteria="roleId=".$roleId." and userId=".$userId;
		$exist=$this->_model->_countDefined($criteria)>0?true:false;
		return $exist;

	}

	/*public  function sideMenu(){
		$this->doNotRenderHeader=1;
		session_start();
		$_SESSION['userId']="{72231F4C-9219-C75B-6EEA-AB15A3B4DE84}";
		$userId=$_SESSION['userId'];
		$sql="select * from activitys where isActive='1' order by indexOrder";
		//$str='<li><a href="admin.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>';
		$str='<h3>General</h3>
                        <ul class="nav side-menu" id="menu-link"><li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a><ul class="nav child_menu"><li><a href="index.php">Dashboard</a></li><li><a href="index2.html">Dashboard2</a></li><li><a href="index3.html">Dashboard3</a></li></ul></li>';
		foreach($this->_model->__viewQuery($sql) as $row)
		{
			//check role
			$id=$row['id'];
			$sqlInner2="select * from  subactivitys sa inner join rolemanagements rm on rm.roleId=sa.id where sa.activityId='$id' and sa.isActive='1' and rm.userId='$userId' order by orderIndex ";

			$nox=$this->_model->_countSql($sqlInner2);
			if($nox>0)
			{
				$str.= '<li>';
				$str.='<a><i class="fa fa-folder-o"></i>'.$row['name'].'<span class="fa fa-chevron-down"></span></a>';

				$str.='<ul class="nav child_menu">';

				$sqlInner="select * from  subactivitys sa inner join rolemanagements rm on rm.roleId=sa.id where sa.activityId='$id' and sa.isActive='1' and rm.userId='$userId' order by orderIndex ";
				$strInner="";
				foreach($this->_model->__viewQuery($sqlInner) as $rowInner)
				{
					$strInner.='<li><a href="?'.$rowInner['link'].'">'.$rowInner['name'].'</a></li>';
				}
				$strInner.='</ul></li>';

				$str.=$strInner;
			}
		}
		 $str."</li></ul>";
		$this->set('htmlString',$str);
		//$sql="select sa.*,a.name nameActivity from  tblsubactivity sa inner join tblactivity a on sa.activityId=a.id";
		//return $this->con->getResultSet($sql);
	}
    */

}
