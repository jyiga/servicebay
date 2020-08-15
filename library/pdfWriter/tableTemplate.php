<?php
class TableTemplate
{
    public $caption;
    public $header;
    public $data;
    public $footer;
    public $pagination;
    public $notes;
    
    
    public function __construct()
    {
        
    }
    
    public function addHeader($header)
    {
       $this->header.=$header;
    }
    
    public function addData($data)
    {
        $this->data.=$data;
    }
    
    public function addFooter($footer)
    {
        $this->footer.=$footer;
    }
    
    public function addCaption($caption)
    {
       $this->caption.=$caption;
    }

    public function addNotes($notes)
    {
        $this->notes.=$notes;
    }


    public function getHeaderInfo()
    {
        return $this->header;
    }
    
    public function getCaption()
    {
        return $this->caption;
    }
    
    public function getData()
    {
        
        return $this->data;
    }
    
    public function getFooter()
    {
        return $this->footer;
    }

    public function getNotes()
    {
        return $this->notes;
    }
}

?>