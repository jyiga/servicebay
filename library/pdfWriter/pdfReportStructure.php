<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//require_once ('../dompdf/src/Autoloader.php');
require_once(ROOT . DS . 'library' . DS . 'dompdf' . DS .'src'. DS. 'Autoloader.php');
require_once(ROOT . DS . 'library' . DS . 'dompdf' . DS .'src'. DS. 'Dompdf.php');
//require_once ('../dompdf/src/Dompdf.php');
use Dompdf\Dompdf;
\Dompdf\Autoloader::register();

class PdfreportStructure
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
	font-size: 10px;
}
div{ position:relative;}
tb{
 padding: 5px;
 border-color: #acacac;
}
table{
margin-bottom: 20px;
border-color: #acacac;
}
.item5
{
    background-color: #cccccc;
    border:0px;
}
.item6{
border:1px solid #040203;
}
th{
 height:30px;
 text-align: center;
 font-family: Tahoma;
 font-weight: bolder;
}
td{
text-align: center;
}
</style>
</head>
<body>' .'<div style="position:relative;"><div style="position:relative;border:0px solid black; margin-bottom: 20px;">'.'<div style="position:relative; width:40%;float:left;border:0px solid black;"><img src="../public/images/'.$_SESSION["logo"].'" style="width:100px; height:100px;"/></div><div style="position:relative; width:60%; float:right;border:0px solid black; height:100px; ">'.$this->formatAddress($_SESSION["companyAddress"]).'</div></div>';
        //return $this->pdfHeader.$this->getPdfFooter();
        return $this->pdfHeader;
    }
    
    public function getPdfFooter()
    {
        //$this->pdfFooter='






        /*$this->pdfFooter='
<div style="border-top: 1px solid #000000; font-size: 5pt; text-align: center; padding-top: 3mm; "><i>Ntinda junction, martrys way, Plot 139,P.O BOX 22683, Kampala Tel +256 (0) 772 366 390  |  Mobile +256 (0) 701 082 909  |  Email maria.n@markhinvestments.com| www.markhinvestments.com</i><br />
Page  of 
</div>';*/
        //return $this->pdfFooter;
        return "</div>";
    }
    
    public function setPdfBody($str)
    {
        $this->pdfBody=$str;
    }    
    
    public function getPdfBody()
    {
        return $this->pdfBody;
    }
    /*public function printOut($file)
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
    }*/
    public function printOut($file,$layout="portrait",$outputfile=true)
    {
        $html=$this->getPdfHeader().$this->getPdfBody().$this->getPdfFooter();
        /* $mpdf=new mPDF('c','A4','','',20,15,10,25,10,10);
         $mpdf->SetTitle('Report');
         $mpdf->SetAuthor("code360 data solution");
         $mpdf->SetWatermarkText("");

         $mpdf->showWatermarkText = true;
         $mpdf->watermark_font = 'Markh investment safety first.. binox fleet wise solution';
         $mpdf->watermarkTextAlpha = 0.01;
         $mpdf->SetDisplayMode('fullpage');
         $mpdf->WriteHTML($html);

         $mpdf->Output($file);*/
        //---------------------------------------------------------
        //---------------------------------------------------------
        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);
        /*$pdf=$dompdf;
        if (isset($dompdf)) {
            // open the PDF object - all drawing commands will
            // now go to the object instead of the current page
            $footer = $dompdf->open_object();

            // get height and width of page
            $w = $dompdf->get_width();
            $h = $dompdf->get_height();

            // get font
            $font = Font_Metrics::get_font("helvetica", "normal");
            $txtHeight = Font_Metrics::get_font_height($font, 8);

            // draw a line along the bottom
            $y = $h - 2 * $txtHeight - 24;
            $color = array(0, 0, 0);
            $dompdf->line(16, $y, $w - 16, $y, $color, 1);

            // set page number on the left side
            $dompdf->page_text(16, $y, "Page: {PAGE_NUM} of {PAGE_COUNT}", $font, 8, $color);
            // set additional text
            $text = "Dompdf is awesome";
            $width = Font_Metrics::get_text_width($text, $font, 8);
            $dompdf->text($w - $width - 16, $y, $text, $font, 8);

            // close the object (stop capture)
            $dompdf->close_object();

            // add the object to every page (can also specify
            // "odd" or "even")
            $dompdf->add_object($footer, "all");
        }
        */

// (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4',$layout);
// Render the HTML as PDF
        $dompdf->render();
// Output the generated PDF to Browser
        //$dompdf->setOptions()
        //
        if($outputfile)
        {
            $output = $dompdf->output();
            file_put_contents($file, $output);
        }else{
            $dompdf->stream($file,array('Attachment' => 0));
        }



    }

    public function formatAddress($address)
    {
        $addressString='';
        $blockAddress=explode(',',$address);
        if(is_array($blockAddress))
        {
            for($i=0;$i<sizeof($blockAddress);$i++)
            {
                $addressString.="<h4 style='text-align: left; text-space: 1px;padding-left:50%;'>".$blockAddress[$i]."</h4>";
            }

        }


        return $addressString;
    }
    
    
    
    
}
