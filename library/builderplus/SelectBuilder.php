<?php

/**
 * Created by PhpStorm.
 * User: JYiga
 * Date: 20/04/2017
 * Time: 12:14 PM
 */
include_once('SqlBuilder.php');
class SelectBuilder implements SqlBuilder
{

    private $table;
    private $column_names=array();
    private $column=array();
    private $column_values=array();
    private $criteria=null;

    public function getCommand()
    {
        $list=$this->getcolumnList();
        $listing=(is_null($list)?'*':$list);
        return "SELECT  ".$listing.' FROM ';
    }
    public function getcolumnList()
    {
        $list=null;
        if(sizeof($this->column)>0)
        {
            for ($i = 0; $i < sizeof($this->column); $i++)
            {
                if($i==0)
                {
                   $list.=$this->column[$i] ;
                }else
                {
                    $list.=','.$this->column[$i];
                }
            }
        }
        return $list;
    }
    public function setCriteria($criteria)
    {
        return $this->criteria=$criteria;
    }
    public function getCriteria()
    {
        $returnVal="";
        $returnVal=!is_null($this->criteria)?" where ".$this->criteria:'';
        return $returnVal;
    }
    public function addColumnAndData($column_name,$column_value)
    {
        $this->column_names[]=$column_name;
        $this->column_values[]=$column_value;
    }

    public function setColumns($column)
    {
        if(is_array($column))
        {
            $this->column=$column;
        }
        else
        {


        }

    }

    public function setTable($table){
        $this->table=$table;
    }



    public function getTable()
    {
        return $this->table;
    }

    public function getWhat()
    {

    }
}