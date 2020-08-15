<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'reportTemplate.php';
require_once('tableTemplate.php');
require_once('myTable.php');
class Report extends ReportTemplate
{
    
    public $headerSection;
    public $bodySection;
    public $footerSection;
    public $noteSection;
    public $tableBuilder;
    
    public function __construct(myTable $tb)
    {
        $this->tableBuilder=$tb;
        $this->addReportHeader();
        $this->addReportBody();
        $this->addReportFooter();
        $this->addReportNote();
    } 
    
    public function addReportHeader()
    {
        $this->headerSection=$this->tableBuilder->tableTemplate->getCaption();
    }
    
    public function addReportBody()
    {
        $this->bodySection=$this->tableBuilder->tableTemplate->getHeaderInfo().$this->tableBuilder->tableTemplate->getData();
    }
    
    public function addReportFooter()
    {
        //JY25102018 Code changed due to deformed Reports
        //$this->footerSection=$this->tableBuilder->tableTemplate->getFooter().'</tbody></table>';
        $this->footerSection=$this->tableBuilder->tableTemplate->getFooter();
    }

    public function addReportNote()
    {
        $this->noteSection=$this->tableBuilder->tableTemplate->getNotes();
    }


    public function getHeaderSection()
    {
        return $this->headerSection;
    }
    
    public function getBodySection()
    {
        return $this->bodySection;
    }
    
    public function getFooterSection()
    {
        return $this->footerSection;
    }

    public function getNoteSection()
    {
        return $this->noteSection;
    }
    
    public function getReport()
    {
        return $this->getHeaderSection().$this->getBodySection().$this->getFooterSection().$this->getNoteSection();
    }
}
