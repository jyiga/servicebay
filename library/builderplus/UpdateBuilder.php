<?php
//this code is copy righted to individual Eng Yiga James 
//Purchase a Licensed verison at code360.com
include_once('SqlBuilder.php');
class UpdateBuilder implements SqlBuilder{
	
	private $table;
	private $column_names=array();
	private $column_values=array();
	private $criteria="";
	
	public function getCommand(){
		return "UPDATE ";
	}
	public function getTable(){
		return $this->table;
	}
	//let us add columns and values:
	public function addColumnAndData($column_name,$column_value){
		$this->column_names[]=$column_name;
		$this->column_values[]=$column_value;
	}
	
	public function getWhat(){
		$columns=" SET ";
		//changed because of sql injection incremented to 1 to jump the id.
		//for($i=0;$i<sizeof($this->column_names);$i++){
		for($i=0;$i<sizeof($this->column_names);$i++)
		{
			//let us append the columns
			//if($i==0)
			//{

			//}else
			//{
				if($i<sizeof($this->column_names)-1)
				{
					//$columns.=$this->column_names[$i]."='".$this->column_values[$i]."',";
					$columns.=$this->column_names[$i]." = ".":param".$i.",";
				}else
				{
					$columns.=$this->column_names[$i]." = ".":param".$i."  ";
					//$columns.=$this->column_names[$i]."='".$this->column_values[$i]."' ";
				}
			//}

		}
		
		
		return $columns;
	}
	
	public function setCriteria($criteria)
    {
		return $this->criteria=$criteria;
	}
	public function getCriteria()
	{
		return $this->criteria;
	}
	public function setTable($table)
	{
		$this->table=$table;
	}
	public function getValues()
	{
		return $this->column_values;
	}
	
}

?>