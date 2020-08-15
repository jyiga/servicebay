<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of myTable
 *
 * @author user
 */

class myTable {

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
              $this->tableTemplate->addHeader('<div style="position:relative; padding:5px; "><table border="0.1" width="100%" style="font-size: 15px; font-family: Tahoma; border:1px solid #a2a2a2; border-radius:4px;" cellpadding="0" cellspacing="0"><thead><tr style="background-color: #a2a2a2; border:1px solid darkgrey;"><th style="height:20px;">' .$array[$i].'</th>');
            }else if($i>0 && $i<(sizeof($array)-1))
            {
                $this->tableTemplate->addHeader("<th>".$array[$i]."</th>");  
            }else 
            {
               $this->tableTemplate->addHeader("<th>".$array[$i]."</th></tr><thead><tbody>");  
            }
        }
    }
    
    public function setTableData($str,$i,$length)
    {
        
        
            if($i==0)
            {
                $this->tableTemplate->addData("<tr><td style='height:30px;'>".$str."</td>");
            }else if($i > 0 && $i < $length-1)
            {
                $this->tableTemplate->addData("<td>".$str."</td>");  
            }else 
            {
               $this->tableTemplate->addData("<td>".$str."</td></tr>");  
            }
        
    }
    
     public function setTableData2($str,$i,$length,$style='item5')
    {
        
        
            if($i==0)
            {
                $this->tableTemplate->addData("<tr class='item6'><th class='".$style."'>".$str."</th>");
            }else if($i > 0 && $i < $length-1)
            {
                $this->tableTemplate->addData("<th class='".$style."'>".$str."</th>");
            }else 
            {
               $this->tableTemplate->addData("<th class='".$style."'>".$str."</th></tr>");
            }
        
    }


    public function setTableData3($str,$i,$length,$style='item5')
    {


        if($i==0)
        {
            $this->tableTemplate->addData("<tr class='item6'><th class='".$style."'>".$str."</th>");
        }else if($i > 0 && $i < $length-1)
        {
            $this->tableTemplate->addData("<th class='".$style."'>".$str."</th>");
        }else
        {
            $this->tableTemplate->addData("<th class='".$style."'>".$str."</th></tr>");
        }

    }

    
    
    public function setTableFooter($str,$i,$length,$style='item2')
    {
        
        
            if($i==0)
            {
                $this->tableTemplate->addFooter("<tr><th class='".$style."'>".$str."</th>");
            }else if($i > 0 && $i < $length-1)
            {
                $this->tableTemplate->addFooter("<th class='".$style."'>".$str."</th>");
            }else 
            {
               $this->tableTemplate->addFooter("<th class='".$style."'>".$str."</th></tr>");
            }
        
    }
    
    public function setTableClose()
    {
        $this->tableTemplate->addFooter("</table></div>");
    }

    public function setNotes($str)
    {
        $this->tableTemplate->addNotes($str);
    }
}
