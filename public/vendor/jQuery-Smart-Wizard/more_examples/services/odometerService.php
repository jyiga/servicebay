<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccountService
 *
 * @author plussoft
 */
include_once '../model/odometer.php';
class OdometerService extends Odometer {
  
    function __construct() {
        parent::__construct();          
    }


    public function save() 
	{
		$builder=new InsertBuilder();
		$builder->setTable("tblodmeterreading");
		if(!is_null(parent::getvehicleId())){
		$builder->addColumnAndData("vehicleId", parent::getvehicleId());
		}
		if(!is_null(parent::getreading())){
		$builder->addColumnAndData("reading", parent::getreading());
		}
		if(!is_null(parent::getCreationDate())){
		$builder->addColumnAndData("creationDate", parent::getCreationDate());
		}
		$this->con->setQuery(Director::buildSql($builder));
		return $this->con->execute_query2($builder->getValues());	  
    }
	
	public function firstSave()
	{
		$builder=new InsertBuilder();
		$builder->setTable("tblodometer");
        if(!is_null(parent::getvehicleId())){
		$builder->addColumnAndData("vehicleId", parent::getvehicleId());
		}
        if(!is_null(parent::getreading())){
		$builder->addColumnAndData("reading", parent::getreading());
		}
        if(!is_null(parent::getCreationDate())){
            $builder->addColumnAndData('creationDate',parent::getCreationDate());
        }
		
		$this->con->setQuery(Director::buildSql($builder));
		$sql="select * from tblodometer where vehicleId='".parent::getvehicleId()."'";
		$this->con->setSelect_query($sql);
		if($this->con->sqlCount()>0)
		{
			return $this->update();
		}else{
			return $this->con->execute_query2($builder->getValues());
		}

	}
	
   	public function update() 
	{
		
		
      	 	$builder=new UpdateBuilder();
			$builder->setTable("tblodometer");
			
			if(!is_null(parent::getreading())){
			$builder->addColumnAndData("reading", parent::getreading());
			}
			$builder->setCriteria("where vehicleId='".parent::getvehicleId()."'");
			$this->con->setQuery(Director::buildSql($builder));
			return $this->con->execute_query();
		
		
    }
	
	public function view() {
       $sql="select o.*,v.regNo,odr.creationDate lastUpdated from tblodometer o inner join tblvehicle v on o.vehicleId=v.id inner join tblodmeterreading odr on o.reading=odr.reading and o.vehicleId =odr.vehicleId";
	   $data=array();
	   foreach( $this->con->getResultSet($sql) as $row)
	   {
		   $data2=array();
		   $data2["id"]=$row["id"];
		   $data2["vehicleId"]=$row["regNo"];
		   $data2["reading"]=$row["reading"];
		   $data2['lastUpdated']=$row['lastUpdated'];
		   array_push($data,$data2);
	   }
	   return $data;
    }
	
	public function delete(){
		$builder=new DeleteBuilder();
		$builder->setTable("tblodometer");
		$builder->setCriteria("where id='".parent::getid()."'");
		$this->con->setQuery(Director::buildSql($builder));
		$this->con->execute_query();
	}
    public function view_query($sql)
    {
        return $this->con->getResultSet($sql);
    }

    public function getOdometerReading($val,$vid)
    {
	    $reading=0.00;
        $sql="select o.*,v.regNo from tblodometer o inner join tblvehicle v on o.vehicleId=v.id where o.vehicleId='".$vid."'";
        //$data=array();
        foreach($this->con->getResultSet($sql) as $row)
        {
            //$data2=array();
            //$data2["id"]=$row["id"];
            //$data2["vehicleId"]=$row["regNo"];
            if(is_null($row["reading"]))
            {

            }else{
                $reading=floatval($row["reading"])+$val;
            }

            //array_push($data,$data2);
        }
        return $reading;
    }


	public function SetForExcelvechileId($id) {
	$idx=-1;
       $sql="select v.id from tblvehicle v where v.regNo='$id'";
	   
	   foreach($this->con->getResultSet($sql) as $row)
	   {
		   $idx=$row["id"];
		   
	   }
	   return $idx;
    }

    public function setEndDate($month)
    {
        $monthVal='';
        $c=0;
        $y=intval(date('Y'));
        switch ($month)
        {
            case 'jan':
                $c=1;
                break;
            case 'feb':
                $c=2;
                break;
            case 'march':
                $c=3;
                break;
            case 'April':
                $c=4;
                break;
            case 'may':
                $c=5;
                break;
            case 'june':
                $c=6;
                break;
            case 'july':
                $c=7;
                break;
            case 'aug':
                $c=8;
                break;
            case 'sept':
                $c=9;
                break;
            case 'oct':
                $c=10;
                break;

        }
        $monthVal=$c>9?$c:'0'.$c;
        $endDate=date('Y')."-".$monthVal."-".cal_days_in_month(CAL_GREGORIAN,$c,$y);

        return  $endDate;

        //$endDate=date('Y')."-".$m."-".cal_days_in_month(CAL_GREGORIAN,$c,$y);
    }


}

	
