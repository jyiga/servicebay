<?php
abstract class ReportTemplate
{
    protected $reportHeader;
    protected $reportBody;
    protected $reportFooter;
    protected $reportNote;
   
   
   public function __construct()
   {
       
   }
   
   public function buildReport($reportHeader,$reportBody,$reportFooter,$reportNotes)
   {
       
        $this->addReportHeading();
        $this->addReportBody();
        $this->addReportFooter();
        $this->addReportNote();
        return $this->reportHeader.$this->reportBody.$this->reportFooter.$this->reportNote;
      
   }
   
   abstract function addReportHeader();
   abstract function addReportBody();
   abstract function addReportFooter();
   abstract function addReportNote();
   
    
    
    
    
    
    
    
    
    
    
    
}
?>
