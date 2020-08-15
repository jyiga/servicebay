<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class PdfreportStructureOld
{
    private $pdfHeader;
    private $pdfFooter;
    private $pdfBody;
    private $pdfNote;
    
    public function __construct() 
    {
        
    }
    
    public function getPdfHeader()
    {
        $this->pdfHeader= '<html>
<head>
<style>
body {font-family: Tahoma;
	font-size: 10pt;
}
</style>
</head>
<body><htmlpageheader name="myheader"><table width="100%">
<tr><td><img src="../images/logoDefault.png" width="100px" height="80px" style="margin-right:250px;" /><td align="left">
<p>Company Name<br/>P.O. BOX #####<br/>Building,<br/> Room No,<br/> Street:<br/>Kampala, Uganda<br/>Tel: 000 000 000</p></td> </td>
</tr>
</table>';
        return $this->pdfHeader.$this->getPdfFooter();
    }
    
    public function getPdfFooter()
    {
        $this->pdfFooter='<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 5pt; text-align: center; padding-top: 3mm; "><i>Building Room No,P.O BOX ####, Tel: 0000 000000</i><br />
Page {PAGENO} of {nb}
</div>
</htmlpagefooter><sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />';
        return $this->pdfFooter;
    }
    
    public function setPdfBody($str)
    {
        $this->pdfBody=$str."</body></html>";
    }    
    
    public function getPdfBody()
    {
        return $this->pdfBody;
    }
    public function printOut($file)
    {
        if (!file_exists($file))
        {

        }else
        {
            if(!unlink($file))
            {

            }else{


            }
        }
        $html=$this->getPdfHeader().$this->getPdfBody();
        $mpdf=new mpdf('c','A4','','',20,15,10,25,10,10);
        $mpdf->SetTitle('Report');
        $mpdf->SetAuthor("code360 data solution");
        $mpdf->SetWatermarkText("DVI");
        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->watermarkTextAlpha = 0.01;
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
        $mpdf->Output($file); 
    }
    
    
    
    
}
