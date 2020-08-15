<?php 
 class cfsController extends Controller{

 	 	 public function view()
 	 	{
		 }	

		 public function signup (){


		 }

		 public function activate()
		 {

		 }

		 public function contactus($id)
 	 	{
		 }	

		 public function register()
		 {
			 //$errorCount=0;
			 $html="";
			 $errorMessage=array();
			 $user=new user();
			 $user->setid(utility::getGUID2());
			 if(isset($_POST['firstName']) && !empty($_POST['firstName']))
			 {
				 $firstName=htmlspecialchars(trim($_POST['firstName']));
				 if(strlen($firstName)<=50)
				 {
					$user->setfirstName($firstName);
				 }else{
					
					$errorMessage[]="Your first Name is longer than the allow length 50 abelow";

				 }
			 }else{
					$errorMessage[]="Please the first name";
			 }

			 if(isset($_POST['lastName']) && !empty($_POST['lastName']))
			 {
				 $lastName=htmlspecialchars(trim($_POST['lastName']));
				 if(strlen($lastName)<=50)
				 {
					$user->setlastName($lastName);
				 }else{
					
					$errorMessage[]="Your last Name is longer than the allow length 50 abelow";

				 }
			 }else{
					$errorMessage[]="Please supply your last Name  ";
			 }

			 if(isset($_POST['email'])&& !empty($_POST['email']))
			 {
				 $email=htmlspecialchars(trim($_POST['email']));
				 if(strlen($email)<=50)
				 {
					$user->setemail($email);
					$emailCriteria="email='".$email."'";
					$countExistance=0;
					$countExistance=$user->_countDefined($emailCriteria);
					if($countExistance>0)
					{
						$errorMessage[]="User account already exists, Just click on login.";
					}

				 }else{
					
					$errorMessage[]="Your email is longer than the allow length 50 abelow";

				 }
			 }else{
					$errorMessage[]="Please supply your email";
			 }

			 if(isset($_POST['tel']) && !empty($_POST['tel']))
			 {
				 $tel=htmlspecialchars(trim($_POST['tel']));
				 if(strlen($tel)<=50)
				 {
					$user->setmobileNumber($tel);
				 }else{
					
					$errorMessage[]="Your mobile number is longer than the allow length 50 abelow";

				 }
			 }else{
					$errorMessage[]="Please supply your mobile number ";
			 }

			 

			 $html="";

			 if(sizeof($errorMessage)==0)
			 {
				 $id=-1;
				 $statu=new statu();
				 $criteria='statusName="verify"';
				 $statu->__findCriteria($criteria);
				 $user->setstatusId($statu->getid());

				 

				 $user->__save();
				 $id=$user->getid();

				 if($id!=-1)
				 {
					 $userofType=new useroftype();
					 $userofType->setuserId($id);

					 if(isset($_POST['userTypeId']) && !empty($_POST['userTypeId']))
					{
						$userTypeId=htmlspecialchars(trim($_POST['userTypeId']));
						$userofType->setuserTypeId($userTypeId);
						$userofType->setisActive(1);
						$userofType->__save();
						//
						$verifyCode=new verifycode();
						$verifyCode->generateCode($id);

						$systemUser=new systemUser();
						$systemUser->setid($id);
						$systemUser->setfirstName($user->getfirstName());
						$systemUser->setlastName($user->getlastName());
						$systemUser->setcontact($user->getmobileNumber());
						$systemUser->setusername($user->getemail());
						$systemUser->setemail($user->getemail());
						$systemUser->setpassword($_REQUEST['password']);
						$systemUser->setisActive(1);
						$systemUser->__save();

						$config = new configurationSetting();
						$config->getCriteria('Webserver');
						$urlValue=$config ->getsystemValue();

						$builder=new htmlMailBuilder();
						$htmlHeader='<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">';
						$htmlHeader.='<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
						$htmlHeader.='<meta name="viewport" content="width=device-width, initial-scale=1"><meta http-equiv="X-UA-Compatible" content="IE=edge">';
						$htmlHeader.='<title></title><style type="text/css"></style><body style="margin:0; padding:20; background-color:#F2F2F2;"> <center>';
						$htmlHeader.='<table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">';
						$htmlHeader.='<tr><td valign="top" style="padding:14px;">';
						$htmlMsg='<h2>Activate your account</h2><p>Hey '.$user->getfirstName(). ' ' .$user->getlastName().', please click the link to activate you account</p><br>';
						$htmlMsg.='<p></p>';
						$htmlMsg.='<p><a href="'.$urlValue.'/members/activate/'.$verifyCode->getcode().'">Click Here</a><p>';
						$htmlfooter='</td></tr></table></center></body></html>';

						$builder->setHtmlHeader($htmlHeader);
						$builder->setHtmlBody($htmlMsg);
						$builder->setHtmlfooter($htmlfooter);

						$mail = new phpmailer();
						$mail->IsSMTP();
						$mail->From     = "info@code360ds.com";
						$mail->FromName = "Service On";
						$mail->Host     = "p3plcpnl0579.prod.phx3.secureserver.net";
						$mail->Mailer   = "smtp";
						$mail->Username="info@code360ds.com";
						$mail->Password="&Hajara1320";
						$mail->Port=465;
						$mail->SMTPSecure='ssl';
						$mail->SMTPAuth=true;
						$mail->Subject ="Activate Account";
						$mail->isHTML(true);


						$status=mailDirector::buildMail($builder,$mail,$user->getemail());

						//mail
						if($status)
						{
							$html.="<p>Check you email for the activation link. Send link</p>";
						}else{
							$html.="<p>Failed</p>";
						}
						



					}else{
							//$errorMessage[]="Please supply your mobile number ";
							$html.="<ul>";
							$html.='<li>Select you here as? </li>';
							$html.="</ul>";
					}
					 

				 }else{
					$html.="<ul>";
					$html.='<li>Error submitting information to server </li>';
					$html.="</ul>";
				 }

			 }else{

				$html.="<ul>";
				for($i=0; $i<sizeof($errorMessage);$i++)
				{
					$html.='<li>'.$errorMessage[$i].'</li>';

				}
				$html.="</ul>";

			 }

			 $this->set('content',$html);


		 }

		 public function cart()
		 {
			 $total=0;
			 $sessionId=$_SESSION['cartId'];
			 $sql="Select oi.*,ci.itemName,imf.path,ci.cost from orderitem oi inner join customerorder co on oi.orderId=co.id inner join clothitem ci on oi.itemId=ci.id left OUTER join imagefile imf on ci.id=imf.itemId where co.browseId='".$sessionId."'";
			 $htmlTemplate='';
			 $htmlTemplate.='<div class="cart-table-area section-padding-100">';
			 $htmlTemplate.='<div class="container-fluid"><div class="row"><div class="col-12 col-lg-8">';
			 $htmlTemplate.='<div class="cart-title mt-50"><h2>Shopping Cart</h2></div>';
			 $htmlTemplate.='<div class="cart-table clearfix"><table class="table table-responsive">';
			 $htmlTemplate.=' <thead><tr><th></th><th>Item</th><th>Price</th><th>Quantity</th><tbody>';
			 foreach($this->_model->__resultSet($sql) as $row)
			{

				$total=$total+($row['cost']*$row['qty']);
				$row['path']=str_replace('../','../../',$row['path']);
				if($row['path']==null)
				{
					$row['path']='../../public/img/user.png" alt=""';
				}else{
					$row['path']=$row['path'];
				}

				$htmlTemplate.='<tr><td class="cart_product_img"><a href="#"><img src="'.$row['path'].'" alt="Product"></a>';
				$htmlTemplate.='<td class="cart_product_desc" ><h5>'.$row['itemName'].'</h5></td>';
				$htmlTemplate.='<td class="price"><span>'.number_format($row['cost'],2).'</span></td>';
				$htmlTemplate.='<td class="qty"><div class="qty-btn d-flex"><p>Qty</p><div class="quantity">';
				$htmlTemplate.='<span class="qty-minus" onclick="var effect = document.getElementById(\'qty'.$row['id'].'\'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span><input type="number" class="qty-text" id="qty'.$row['id'].'" step="1" min="1" max="300" name="quantity" value="'.$row['qty'].'"><span class="qty-plus" onclick="var effect = document.getElementById(\'qty'.$row['id'].'\'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span></div></div></td></tr>';

			}

			$htmlTemplate.='</tbody></table></div></div><div class="col-12 col-lg-4">';
			$htmlTemplate.='<div class="cart-summary"><h5>Cart Total</h5><ul class="summary-table">';
			$htmlTemplate.='<li><span>subtotal:</span> <span>'.number_format($total).'</span></li>';
			$htmlTemplate.='<li><span>delivery:</span> <span>Free</span></li>';
			$htmlTemplate.='<li><span>total:</span> <span>'.number_format($total).'</span></li></ul>';
			//$htmlTemplate.='<div class="cart-btn mt-100"><a href="cart.html" class="btn amado-btn w-100">Pay with Momo pay</a></div>';
			$htmlTemplate.='<div class="cart-btn mt-100"><div class="mobile-money-qr-payment" data-api-user-id="b12d7b22-3057-4c8e-ad50-63904171d18c" data-amount="'.$total.'" data-currency="EUR" data-external-id="Receipt-2113"></div> </div>';
			$htmlTemplate.='</div></div></div></div></div></div>';

			$this->set('content',$htmlTemplate); 



			
			}
		 
		 public function loadContent($id)
		 {
			utility::checkTokenTime();
			$category= new category();
			$html=$category->getSideCategory($id);
			$item= new item();
			$item->getItemHtmlView($id);
			$html.=templatex::mainContentSection($id).$item->getItemHtmlView($id).templatex::closeMainContentSection();
			$this->set('content',$html); 
		 }



 	 	public function viewcombobox()
 	 	 {
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	$this->set('json',$this->_model->__viewCombo());
	 	}	
 	 	 public function viewall()
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	$this->set('json',$this->_model->__view());
		}	
 	 	 public function edit($id)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setid($id);
	 	 	 	$this->set('json',$this->_model->__update()); 
 	 	}
 	 	  public function add()
 	 	 {
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	$this->set('json',$this->_model->__save()); 
 	 	}
 	 	 public function delete($id)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setid($id);
	 	 	 	 $this->set('json',$this->_model->__delete()); 
		  }
		public function sendQuotation()
		{
			$this->doNotRenderHeader=1;

			$name=htmlspecialchars(trim($_REQUEST['firstname']));
			$companyName = htmlspecialchars(trim($_REQUEST['companyName1']));
			$email=htmlspecialchars(trim($_REQUEST['email1']));
			$contact=htmlspecialchars(trim($_REQUEST['contact1']));
			$quotationDetail=htmlspecialchars(trim($_REQUEST['quoteDetail']));

			$builder=new htmlMailBuilder();
			$htmlHeader='<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">';
			$htmlHeader.='<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
			$htmlHeader.='<meta name="viewport" content="width=device-width, initial-scale=1"><meta http-equiv="X-UA-Compatible" content="IE=edge">';
			$htmlHeader.='<title></title><style type="text/css"></style><body style="margin:0; padding:20; background-color:#F2F2F2;"> <center>';
			$htmlHeader.='<table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">';
			$htmlHeader.='<tr><td valign="top" style="padding:14px;">';
			$htmlMsg='<h2>Dear Customer,</h2><p> '.$name. ' is requesting for a Quotation. Please find his/her details below<br> <ul><li> Email: ' .$email.'</li><li> Contact:'.$contact.'</li><li> Company: '.$companyName.'</li><li> Quotation Detail:'.$quotationDetail.'</li></ul> </p><br>';
			
			//$htmlMsg.='<p><a href="http://localhost:9000/realityhouse/members/activate/'.$verifyCode->getcode().'">Click Here</a><p>';
			$htmlfooter='</td></tr></table></center></body></html>';

			$builder->setHtmlHeader($htmlHeader);
			$builder->setHtmlBody($htmlMsg);
			$builder->setHtmlfooter($htmlfooter);

			$mail = new phpmailer();
			$mail->IsSMTP();
			$mail->From     = "info@code360ds.com";
			$mail->FromName = "Xonib Software Customer Notification Service";
			$mail->Host     = "p3plcpnl0579.prod.phx3.secureserver.net";
			$mail->Mailer   = "smtp";
			$mail->Username="info@code360ds.com";
			$mail->Password="&Hajara1320";
			$mail->Port=465;
			$mail->SMTPSecure='ssl';
			$mail->SMTPAuth=true;
			$mail->Subject ="Send Quotation Notification";
			$mail->isHTML(true);

			$outEmail='james2yiga@gmail.com';
			$configureSetting =new configurationSetting();
			$criteria="systemName='defaultemail'";
			$configureSetting->__findCriteria($criteria);
			$emailToken=$configureSetting->getsystemValue();
			$emailAdd=explode(',',$emailToken);
			$status=false;
			for($i=0;$i<sizeof($emailAdd);$i++)
			{
				$status=mailDirector::buildMail($builder,$mail,$emailAdd[$i]);
			}
			

						//mail
						if($status)
						{
							$this->set('json','Sent Successful'); 
						}else{
							$this->set('json','Failed Try again'); 
						}
						

		}
		  
 	} ?>