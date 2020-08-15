<?php
//require 'universalconnect.class.php';
// this class is use to connection to the database
class SqlExecutor
{
    public $hookUp;//connection object
    private $query;//query
    public function __construct()
    {
        //Static method do connect.
        $this->hookUp=UniversalConnect::doconnet();
    }
    //setter for the query variable
    public function setQuery($query_string)
    {
		$this->query=$query_string;
	}
    //Execute the select ...
    public function execute_query(){
		try
        {
			$rs=$this->hookUp->query($this->query);
            //UniversalConnect::doconnet();
			return array('success'=>true);
		}catch(PDOException $e){
			 //mail('james2yiga@gmail.com','Query failure occured',$e->getMessage());
			return array('msg'=>$e->getMessage());
		}
	}
    //Execute sql query to return json
	public function execute_query2($array)
	{
		try{
            $this->hookUp->beginTransaction(); 
			$rs=$this->hookUp->prepare($this->query);
			if(is_array($array)){
				for($i=0;$i<sizeof($array);$i++)
				{
					$rs->bindValue(':param'.$i,$array[$i]);
				}
				$rs->execute();
                $this->hookUp->commit();
                
				return array('success'=>true);
			}else{
				//error_log("Not array\n",3,ROOT.DS.'tmp'.DS.'logs'.DS.'sqlerror.log') ;
				return array('msg'=>'set array');
			}
		}catch(PDOException $e)
        {
		      $this->hookUp->rollback();
			  //mail('james2yiga@gmail.com','Query failure occured',$e->getMessage());
			error_log($e->getMessage()."\n",3,ROOT.DS.'tmp'.DS.'logs'.DS.'sqlerror.log') ;
			//return array('msg'=>$e->getMessage());
		}
	}
    
    //any not using json
	public function execute_query3($array){
		try{
            $this->hookUp->beginTransaction(); 
			$rs=$this->hookUp->prepare($this->query);
			if(is_array($array)){
				for($i=0;$i<sizeof($array);$i++){
					$rs->bindValue('param'.$i,$array[$i]);
					
				}
				$rs->execute();
                $this->hookUp->commit();
				return true;
			}else{
			     //$this->hookUp->rollback();
				return 'set array';
			}
		}catch(PDOException $e){
		      $this->hookUp->rollback();
			  //mail('james2yiga@gmail.com','Query failure occured',$e->getMessage());
			return $e->getMessage();
		}
	}
    //get select query
    public function getResultSet($selectQuery)
    {
		//$array=Array();
		$row=NULL;
		
		try{
			//$resultSet=$this->conn->query($partSql);
			$stmt=$this->hookUp->prepare($selectQuery);
			$stmt->execute();
			$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e2){
			//mail('james2yiga@gmail.com','Query failure occured',$e->getMessage());
			error_log($e2->getMessage()."\n",3,ROOT.DS.'tmp'.DS.'logs'.DS.'sqlerror.log') ;
		}
		
		return $row;
	}

	//this to count sql
    /* public function sqlCount($sql)
	{
		$no=0;
		try{
			$resultSet=$this->hookUp->query($sql);
			$no=$resultSet->rowCount();
			return $no;
		}catch(PDOException $e){
			error_log($e->getMessage()."\n",3,ROOT.DS.'tmp'.DS.'logs'.DS.'sqlerror.log') ;
		  	//mail('james2yiga@gmail.com','Query failure occured',$e->getMessage()."stack:".$e->getTrace());
			return $no;
		}
	}*/
	public function sqlCount($sql,$bind=null)
	{
		$no=0;
		try{
			/* $resultSet=$this->hookUp->query($sql);
			$no=$resultSet->rowCount();
			return $no;*/

			$rs=$this->hookUp->prepare($sql);
			if(is_array($bind) && $bind!=null){
				for($i=0;$i<sizeof($bind);$i++)
				{
					$rs->bindValue(':param'.$i,$bind[$i]);
				}
			}
                
				$rs->execute();
				///$row=$rs->fetchAll(PDO::FETCH_ASSOC);
				$no=$rs->rowCount();
				$this->hookUp->commit();
				
                
				return $no;
			

		}catch(PDOException $e){
			error_log($e->getMessage()."\n",3,ROOT.DS.'tmp'.DS.'logs'.DS.'sqlerror.log') ;
		  	//mail('james2yiga@gmail.com','Query failure occured',$e->getMessage()."stack:".$e->getTrace());
			return $no;
		}
	}
    
    public function getId(){
		try
        {
			return $this->hookUp->lastInsertId();
		}catch(PDOException $e)
        {
			//mail('james2yiga@gmail.com','Query failure occured',$e->getMessage());
			echo $e->getMessage();
		}
	}
	//return getting id
	public function execute_query4($array){
		try{
			$id=-1;
            $this->hookUp->beginTransaction(); 
			$rs=$this->hookUp->prepare($this->query);
			if(is_array($array)){
				for($i=0;$i<sizeof($array);$i++)
				{
					$rs->bindValue(':param'.$i,$array[$i]);
					
				}
                
				$rs->execute();
				$id=$this->hookUp->lastInsertId();
                $this->hookUp->commit();
                
				return $id;
			}else{
				return array('msg'=>'set array');
			}
		}catch(PDOException $e){
		      $this->hookUp->rollback();
			return array('msg'=>$e->getMessage());
		}
	}

	//
	public function getResultSetBind($sql,$array)
	{
		try{
            $this->hookUp->beginTransaction(); 
			$rs=$this->hookUp->prepare($sql);
			if(is_array($array)){
				for($i=0;$i<sizeof($array);$i++)
				{
					$rs->bindValue(':param'.$i,$array[$i]);
				}
                
				$rs->execute();
				$row=$rs->fetchAll(PDO::FETCH_ASSOC);
                $this->hookUp->commit();
                
				return $row;
			}else{
				return array('msg'=>'set array');
			}
		}catch(PDOException $e){
		      $this->hookUp->rollback();
			return array('msg'=>$e->getMessage());
		}

	}


	public function dmlCopy()
    {
        return $this->hookUp->query("SHOW TABLES",PDO::FETCH_NUM);

    }
    
}

?>