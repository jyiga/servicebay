<?php
class htmlMailBuilder implements mailBuilder{

    
    
    private $htmlHeader;
    private $htmlBody;
    private $htmlfooter;
    private $fileName;

    public function getEmailHeader()
    {
        
        return $this->htmlHeader;
    }
    public function getEmailBody()
    {
        return $this->htmlBody;
    }

    public function getEmailFooter()
    {
        return $this->htmlfooter;
    }

    public function getAttachment()
    {
        return $this->fileName;
    }

    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

    }
    public function setHtmlfooter($htmlfooter)
    {
        $this->htmlfooter = $htmlfooter;
    }

    public function setHtmlBody($htmlBody)
    {
        $this->htmlBody = $htmlBody;
    }
    public function setHtmlHeader($htmlHeader)
    {
        $this->htmlHeader = $htmlHeader;
    }
}

