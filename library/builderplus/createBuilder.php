<?php
include_once('SqlBuilder.php');
class createBuilder implements SqlBuilder{

    private $table;
    private $column_names=array();
    private $column_dataType=array();
    private $column_constraint=array();
    private $constraint='';    
    public function getCommand(){
		return "Create table ";
	}
	public function getTable(){
		return $this->table;
	}
	//let us add columns and values:
	public function addColumn($column_name,$column_dataType,$constraint=' '){
		$this->column_names[]=$column_name;
        $this->column_dataType[]=$column_dataType;
        $this->column_constraint[]= $constraint;  
    }
    public function setTable($table){
		$this->table=$table;
    }
    public function setConstraint($constraint)
    {
        $this->constraint='"'.$constraint.';"';
    }
    public function getCriteria(){
		return "";
    }
    public function getWhat()
    {
        $stringBuilder="(";
        for($i=0;$i<sizeof($this->column_names);$i++)
        {
            
            $col=$this->column_names[$i];
            $colDataType=$this->column_dataType[$i];
            $column_constraint=$this->column_constraint[$i];
            if(strpos($column_constraint,"AUTO_INCREMENT")!==false)
            {
                $this->constraint='PRIMARY KEY ('.$col.' ));';
            }else if(strpos($column_constraint,"PK")!==false)
            {
                //REPLACE the PK with anything it not need at string formation
                $column_constraint=str_replace('PK','',$column_constraint);
                $this->constraint='PRIMARY KEY ('.$col.' ));';
            }
            if($i==(sizeof($this->column_names)-1) && $this->constraint == '')
            {
                $stringBuilder.=$col.' '.$colDataType.' '.$column_constraint.');';
            }else{
                $stringBuilder.=$col.' '.$colDataType.' '.$column_constraint.',';
            }
        }
        return $stringBuilder.$this->constraint;
    }

}