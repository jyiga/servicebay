<!--<p style="font-family:Calibri;">-->
<?php
require_once '../services/invoiceService.php';
require_once '../services/accountService.php';
require_once '../services/analysisCodeService.php';
require_once '../services/transactionService.php';
require_once '../services/currencyService.php';
require_once'../model/pdfDocument.php';
require_once("../lib/phpqrcode/qrlib.php");
require_once 'controller.php';
$html = '
<html>
<head>
<style>
body {font-family: Tahoma;
	font-size: 10pt;
}
p {	margin: 0pt; }
table.items {
	border: 0.01mm solid #000000;
	border-radius:5px;
}
td { vertical-align: top; }
.items td {
	border-left: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
	text-align: center;
	border: 0.1mm solid #000000;
	font-variant: small-caps;
}
.items td.blanktotal {
	background-color: #EEEEEE;
	border: 0.1mm solid #000000;
	background-color: #FFFFFF;
	border: 0mm none #000000;
	border-top: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
.items td.totals {
	text-align: left;
	border: 0.1mm solid #000000;
}
.items td.cost {
	text-align: "." center;
}
</style>
</head>
<body>

<!--mpdf
<htmlpageheader name="myheader">
<table width="100%">
<tr><td width="70%"><img src="../image/logo.jpg" width="20%" height="70xp" /></td><td><p>Diamond Trust Build Suite 407</p>
<p>Plot 18/19 Kampala Road</p>
<p>Email:Info @ dviuganda.com</p>
<p>Tel:+256(0)772 699467</p>
</td></tr>
</table>
<table width="100%"><tr >
<td width="50%" style="color:#000; " align="center"><span style="font-weight: bold; font-size: 15pt;">'.$_REQUEST['title'].'</span><br /><br /><br /><br /><span style="font-family:dejavusanscondensed;"></span> </td>
</tr></table>
</htmlpageheader>

<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 5pt; text-align: center; padding-top: 3mm; "><i>Suite 407, Diamond Trust Building Plot 18/19 Kampala Road +256(0)772 699467 info@dviuganda.com www.dviuganda.com</i><br />
Page {PAGENO} of {nb}
</div>
</htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->';
$html2="";
        $subtotal=0;
        $vat=false;
        $vatValue=0.0;
		$total=0;
        $grandTotal=0;
        $invoiceNo="";
        $companyName="";
        $invoiceDate="";
        $invoiceAmount="";
        $invoiceId="";
        $attn="";
        $company="";
        $invoiceDate="";
        $invoiceNo="";
		$invoiceService=new InvoiceService();
        $currency="";
		//$invoiceService->setInvoice_no($controller_templet->filter_inputs($_REQUEST['invoiceNo']));
		$invoiceService->setJobid($_REQUEST['idx']);
		$invoiceId=$_REQUEST['idx'];
		$html2.= "<p style='margin-left:80%;'><b>".$_REQUEST['tin']."</b></p><table class='items' width='100%' style='font-size: 9pt; border-collapse: collapse;' cellpadding='8'><thead><tr ><td class='totals'>Invoice To:</td><td class='totals'>Invoice No:</td><td class='totals' colspan='2'>Date:</td></tr></thead><tbody>";
		$currencyObj=new currencyService();
		foreach($invoiceService->view_invoice_header() as $row){
		      $vat=$row['Vat']==0?false:true;
              $invoiceNo=$row['invoiceNo'];
              $companyName=$row['company'];
              $invoiceDate=$row['datex'];
              $attn=$row['attn'];
              //$company=$row['company'];
              
              if(!is_null($row['currencyId']))
              {
                $currencyObj->setId($row['currencyId']);
                $currencyObj->getObject();
                $currency=$currencyObj->getsymbol();
              }
              
            
		}
          
			$html2.= "<tr ><td rowspan='3' class='totals'>Mr/Ms ".$attn."<br /><u>".$companyName."</u></td><td class='totals'>".$invoiceNo."</td><td colspan='2'>".$invoiceDate."</td></tr>";
			$html2.= "<tr><td class='totals'>PO Number</td><td class='totals'>Terms</td><td class='totals'>Project</td></tr>";
			$html2.= "<tr><td class='totals'>&nbsp;</td><td class='totals'>&nbsp;</td><td class='totals'>&nbsp;</td></tr>";
		$html2.= "</tbody></table>";
		
		$html3="";
		
		$html3.='<div style="height:20px;"></div><table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8"><thead><tr><td >Description</td><td>Quanity</td><td>Rate</td><td>No Days</td><td>Total('.$currency.')</td></tr></thead><tbody>';
		$i=0;
		$sql2="select * from tblinvoiceheader where jobId='".$invoiceService->getJobid()."'";
            foreach($invoiceService->view_query($sql2) as $row2){
                $subtotal=0;
                $html3.="<tr><td colspan='5' class='totals'><h5>".$row2['item']."</h5></td></tr>";
                $invoiceService->setHeaderId($row2['id']);
		foreach($invoiceService->view_invoice_show() as $row2){
			if($row2['details']!=NULL){
			if($i % 2==0){
				$array=explode(',',$row2['details']);
				$detailVAL="";
				
				for($dt=0;$dt<sizeof($array);$dt++)
				{
					
					$detailVAL.=$array[$dt]."<br/>";
					
				}
			$html3.= "<tr><td><u>".$row2['item']."</u><br />".$detailVAL."</td><td>".$row2['qty']."</td><td>".number_format($row2['rate'],0)."</td><td>".$row2['noday']."</td><td>".number_format(($row2['noday']*$row2['qty']*$row2['rate']),0)."</td></tr>";
			}else{
			     $array=explode(',',$row2['details']);
				$detailVAL="";
				
				for($dt=0;$dt<sizeof($array);$dt++)
				{
					
					$detailVAL.=$array[$dt]."<br/>";
					
				}
				$html3.= "<tr><td><u>".$row2['item']."</u><br />".$detailVAL."</td><td>".$row2['qty']."</td><td>".number_format($row2['rate'],0)."</td><td>".$row2['noday']."</td><td>".number_format(($row2['noday']*$row2['qty']*$row2['rate']),0)."</td></tr>";
			}
			}else{
				
				if($i % 2==0){
			$html3.= "<tr ><td><u>".$row2['item']."</u><br /></td><td>".$row2['qty']."</td><td>".number_format($row2['rate'],0)."</td><td>".$row2['noday']."</td><td>".number_format(($row2['noday']*$row2['qty']*$row2['rate']),0)."</td></tr>";
			}else{
				$html3.= "<tr><td><u>".$row2['item']."</u></td><td>".$row2['qty']."</td><td>".number_format($row2['rate'],0)."</td><td>".$row2['noday']."</td><td>".number_format(($row2['noday']*$row2['qty']*$row2['rate']),0)."</td></tr>";
			}
				
			}
			$i=$i+1;
			$total=$total+($row2['noday']*$row2['qty']*$row2['rate']);
                        $subtotal=$subtotal+($row2['noday']*$row2['qty']*$row2['rate']);
		}
                $html3.="<tr><td colspan='3' class='totals'></td><td  class='totals'>Subtotal</td><td class='totals'>".number_format(($subtotal),0)."</td>";
        
            }
            //the old fasion invoice.
            $invoiceService->setHeaderId(0);
		foreach($invoiceService->view_invoice_show() as $row2){
			if($row2['details']!=NULL){
			if($i % 2==0){
				$array=explode(',',$row2['details']);
				$detailVAL="";
				
				for($dt=0;$dt<sizeof($array);$dt++)
				{
					
					$detailVAL.=$array[$dt]."<br/>";
					
				}
			$html3.= "<tr><td><u>".$row2['item']."</u><br />".$detailVAL."</td><td>".$row2['qty']."</td><td>".number_format($row2['rate'],0)."</td><td>".$row2['noday']."</td><td>".number_format(($row2['noday']*$row2['qty']*$row2['rate']),0)."</td></tr>";
			}else{
			     $array=explode(',',$row2['details']);
				$detailVAL="";
				
				for($dt=0;$dt<sizeof($array);$dt++)
				{
					
					$detailVAL.=$array[$dt]."<br/>";
					
				}
				$html3.= "<tr><td><u>".$row2['item']."</u><br />".$detailVAL."</td><td>".$row2['qty']."</td><td>".number_format($row2['rate'],0)."</td><td>".$row2['noday']."</td><td>".number_format(($row2['noday']*$row2['qty']*$row2['rate']),0)."</td></tr>";
			}
			}else{
				
				if($i % 2==0){
			$html3.= "<tr ><td><u>".$row2['item']."</u><br /></td><td>".$row2['qty']."</td><td>".number_format($row2['rate'],0)."</td><td>".$row2['noday']."</td><td>".number_format(($row2['noday']*$row2['qty']*$row2['rate']),0)."</td></tr>";
			}else{
				$html3.= "<tr><td><u>".$row2['item']."</u></td><td>".$row2['qty']."</td><td>".number_format($row2['rate'],0)."</td><td>".$row2['noday']."</td><td>".number_format(($row2['noday']*$row2['qty']*$row2['rate']),0)."</td></tr>";
			}
				
			}
			$i=$i+1;
			$total=$total+($row2['noday']*$row2['qty']*$row2['rate']);
                        
		}
            
                if($i<20){
		for($x=0;$x<(10-$i);$x++)
		{
			$html3.= "<tr><td></td><td></td><td></td><td></td><td></td></tr>";
		}
		}
		
        $vatValue=$vat?0.18*$total:'NIL';
        $vatStatement=$vat?"":"VAT 18% is exclusive on the quotation";
		//$html3.="<tr><td colspan='3' class='totals'></td><td class='totals'>SubTotal</td><td class='totals'>".number_format($total,0)."</td>";
        if($vat){
            $grandTotal=(0.18*$total)+$total;
            $html3.="<tr><td colspan='3' class='totals'></td><td  class='totals'>VAT 18%</td><td class='totals'>".number_format((0.18*$total),0)."</td>";
        }else{
            $grandTotal=$total;
            //$html3.="<tr><td colspan='3' class='totals'></td><td class='totals'>VAT 18%</td><td class='totals'>NIL</td>";
        }
        $html3.="<tr><td colspan='3' class='totals'></td><td class='totals'>Grand Total</td><td class='totals'>".number_format($grandTotal,0)."</td>";
		$html3.= "</tbody></table>";
		//$htm2.=$html3;
$html.=$html2.$html3.'<!-- END ITEMS HERE -->
<div style="text-align: left; font-style: italic;"><ol><li> Set up shall be a day before the Event</li>
<li>Cost includes Transport, Delivery, setup and technical support</li>
<li>Payment within 14 days from the day of that Event with a local purchase order prior</li></ol></div>';
$html.='
</body>
</html>
';
//==============================================================
//==============================================================
//==============================================================
//==============================================================
//==============================================================
//==============================================================
function getQrcode($invoiceNo,$companyName,$date,$amount,$jobId){
    $url='qrcode/';
    $content="Dvi invoice detail\n";
    $content.="inv:".$invoiceNo."\n";
    $content.="company:".$companyName."\n";
    $content.="Amount:".$amount."\n";
    $content.="Date:".$date."\n";
    
    QRcode::png($content,$url.$jobId.".png",QR_ECLEVEL_L,1);
    return $url.$jobId.".png";
}
define('_MPDF_PATH','../lib/mpdf60/');
include("../lib/mpdf60/mpdf.php");

$mpdf=new mPDF('c','A4','','',20,15,48,25,10,10); 
$mpdf->SetTitle('invoice');
$mpdf->SetAuthor("code360 data solution");
$mpdf->SetWatermarkText("DVI");
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = 'DejaVuSansCondensed';
$mpdf->watermarkTextAlpha = 0.01;
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($html);


$mpdf->Output(); 
exit;

exit;

?>