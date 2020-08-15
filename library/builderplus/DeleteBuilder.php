<?php
//this code is copy righted to individual Eng Yiga James 
//Purchase a Licensed verison 
//Dedicate is to my mother namuil
include_once('SqlBuilder.php');
class DeleteBuilder implements SqlBuilder{
	
	private $table;
	private $column_names=array();
	private $column_values=array();
	private $criteria="";
	
	public function getCommand(){
		return "DELETE FROM ";
	}
	public function getTable(){
		return $this->table ." ";
	}
	//let us add columns and values:
	
	
	public function getWhat(){
		return "";
	}
	
	public function setCriteria($criteria){
		return $this->criteria=$criteria;
	}
	public function getCriteria(){
		return $this->criteria;
	}
	
	public function setTable($table){
		$this->table=$table;
	}
	public function addColumnAndData($column_name,$column_value){
		$this->column_names[]=$column_name;
		$this->column_values[]=$column_value;
	}
	public function getValues()
	{
		return $this->column_values;
	}
	
}

?>