<?php
//this code is copy righted to individual Eng Yiga James 
//Purchase a Licensed verison at code360.com
include_once('SqlBuilder.php');
class InsertBuilder implements SqlBuilder{
	
	private $table;
	private $column_names=array();
	private $column_values=array();
	
	public function getCommand(){
		return "INSERT INTO ";
	}
	public function getTable(){
		return $this->table;
	}
	//let us add columns and values:
	public function addColumnAndData($column_name,$column_value){
		$this->column_names[]=$column_name;
		$this->column_values[]=$column_value;
	}
	
	
	
	
	//version 1.0 code
	/*
	public function getWhat(){
		$columns="(";
		$values="values('";
		for($i=0;$i<sizeof($this->column_names);$i++){
			//let us append the columns
			if($i<sizeof($this->column_names)-1){
			$columns.=$this->column_names[$i].",";
			}else{
			$columns.=$this->column_names[$i].")";
			}
		}
		
		for($i2=0;$i2<sizeof($this->column_values);$i2++){
			if($i2<sizeof($this->column_values)-1){
			$values.=$this->column_values[$i2]."','";
			}else{
			$values.=$this->column_values[$i2]."')";
			}
		}
		return $columns.$values;
	}
	*/
	//version 2.0 code
	
	public function getWhat(){
		$columns="(";
		$values="values(";
		for($i=0;$i<sizeof($this->column_names);$i++){
			//let us append the columns
			if($i<sizeof($this->column_names)-1){
			$columns.=$this->column_names[$i].",";
			}else{
			$columns.=$this->column_names[$i].")";
			}
		}
		
		for($i2=0;$i2<sizeof($this->column_values);$i2++){
			if($i2<sizeof($this->column_values)-1){
			$values.=":param".$i2.",";
			}else{
			$values.=":param".$i2.")";
			}
		}
		return $columns.$values;
	}
	public function getCriteria(){
		return "";
	}
	public function setTable($table){
		$this->table=$table;
	}
	public function getValues(){
		return $this->column_values;
	}
}

?>