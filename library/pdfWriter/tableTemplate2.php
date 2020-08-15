<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('tableTemplate.php');
class TableBuilder
{
    public $tableTemplate;
    
    public function __construct(TableTemplate $tt)
    {
        $this->tableTemplate=$tt;
        
    }
    
    public function setCaption($str)
    {
        
        $this->tableTemplate->addCaption($str);
    }
    
    public function setTableHeader($array)
    {
        
        for($i=0;$i<sizeof($array);$i++)
        {
            if($i==0)
            {
              $this->tableTemplate->addHeader("<table><tr><th>".$array[$i]."</th>");  
            }else if($i>0 && $i<(sizeof($array)-1))
            {
                $this->tableTemplate->addHeader("<th>".$array[$i]."</th>");  
            }else 
            {
               $this->tableTemplate->addHeader("<th>".$array[$i]."</th></tr>");  
            }
        }
    }
    
    public function setTableData($str,$i,$length)
    {
        
        
            if($i==0)
            {
                $this->tableTemplate->addData("<tr><td>".$str."</td>");  
            }else if($i > 0 && $i < $length-1)
            {
                $this->tableTemplate->addData("<td>".$str."</td>");  
            }else 
            {
               $this->tableTemplate->addData("<td>".$str."</td></tr>");  
            }
        
    }
    
     public function setTableData2($str,$i,$length,$style)
    {
        
        
            if($i==0)
            {
                $this->tableTemplate->addData("<tr style='".$style."'><td>".$str."</td>");  
            }else if($i > 0 && $i < $length-1)
            {
                $this->tableTemplate->addData("<td>".$str."</td>");  
            }else 
            {
               $this->tableTemplate->addData("<td>".$str."</td></tr>");  
            }
        
    }
    
    
    public function setTableFooter($str,$i,$length)
    {
        
        
            if($i==0)
            {
                $this->tableTemplate->addFooter("<tr><td>".$str."</td>");  
            }else if($i > 0 && $i < $length-1)
            {
                $this->tableTemplate->addFooter("<td>".$str."</td>");  
            }else 
            {
               $this->tableTemplate->addFooter("<td>".$str."</td></tr>");  
            }
        
    }
    
    public function setTableClose()
    {
        $this->tableTemplate->addFooter("</table>"); 
    }
    
    
    
}


