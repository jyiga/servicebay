<?php
include_once('SqlBuilder.php');
class alterBuilder implements SqlBuilder{

    private $table;
    private $column_names=array();
    private $column_dataType=array();
    private $column_constraint=array();
    private $alter_action=array();
    private $constraint='';    
    public function getCommand(){
		return "ALTER table ";
	}
	public function getTable(){
		return $this->table;
	}
	//let us add columns and values:
    public function addColumn($column_name,$column_dataType,$constraint=' ',$action='add')
    {
		$this->column_names[]=$column_name;
        $this->column_dataType[]=$column_dataType;
        $this->column_constraint[]= $constraint;  
        $this->alter_action[]=$action;    
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
        $stringBuilder=" ";
        for($i=0;$i<sizeof($this->column_names);$i++)
        {
            $col=$this->column_names[$i];
            $colDataType=$this->column_dataType[$i];
            $column_constraint=$this->column_constraint[$i];
            $alterAction=$this->alter_action[$i];
            // Removed by JY NOT NEEDED 
            /*if(strpos($column_constraint,"AUTO_INCREMENT")!==false)
            {
                $this->constraint='PRIMARY KEY ('.$col.' ));';
            }else if(strpos($column_constraint,"PK")!==false)
            {
                $this->constraint='PRIMARY KEY ('.$col.' ));';
            }*/
            if($i==(sizeof($this->column_names)-1) && $this->constraint == '')
            {
                $stringBuilder.=$alterAction.' '.$col.' '.$colDataType.' '.$column_constraint.';';
            }else{

                $stringBuilder.=$alterAction.' '.$col.' '.$colDataType.' '.$column_constraint.',';
            }
        }
        return $stringBuilder.$this->constraint;
    }

}