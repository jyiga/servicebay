// JavaScript Document
//by yiga james call
var url;
		function newRoomType(){
			$('#dlgroomType').dialog('open').dialog('setTitle','New Room Type::');
			$('#fmroomType').form('clear');
			url='serviceEasyUi/roomType/addRoomType.php';
		}
		
		function saveRoomType(){
	 $('#fmroomType').form('submit',{ url: url, 
	 onSubmit: function(){
		 return $(this).form('validate');
		 },
		 success: function(result){
			 var result = eval('('+result+')');
				 if (result.msg){
					  $.messager.show({title: 'Error',
					  msg: result.msg});
					} else {
						$.messager.show({title: 'Action',
					  msg: 'Action Successfully'});
						$('#dlgroomType').dialog('close'); // close the dialog
						 $('#roomtypes').datagrid('reload'); // reload the user
		}
		
	}
}); 
}
function editRoomType(){
			var row=$('#roomtypes').datagrid('getSelected');
			if(row){
			$('#dlgroomType').dialog('open').dialog('setTitle','Edit Room Types::');
			$('#fmroomType').form('load',row);
			url='serviceEasyUi/roomType/updateRoomType.php?id='+row.roomType;
			}
		}
		
		function newRoomRate(){
			$('#dlgroomRate').dialog('open').dialog('setTitle','New Room Rating::');
			$('#fmroomRate').form('clear');
			url='serviceEasyUi/roomrate/addRoomRate.php';
		}
		function saveRoomRate(){
	 $('#fmroomRate').form('submit',{ url: url, 
	 onSubmit: function(){
		 return $(this).form('validate');
		 },
		 success: function(result){
			 var result = eval('('+result+')');
				 if (result.msg){
					  $.messager.show({title: 'Error',
					  msg: result.msg});
					} else {
						$.messager.show({title: 'Action',
					  msg: 'Action Successfully'});
						$('#dlgroomRate').dialog('close'); // close the dialog
						 $('#dgroomrate').datagrid('reload'); // reload the user
		}
		
	}
}); 
}

function editRoomRate(){
			var row=$('#dgroomrate').datagrid('getSelected');
			if(row){
			$('#dlgroomRate').dialog('open').dialog('setTitle','Edit Room Rate::');
			$('#fmroomRate').form('load',row);
			url='serviceEasyUi/roomrate/updateRoomRate.php?id='+row.rateid;
			}
		}
		
		function getRatePerHour(x){
			var rateperDay=parseInt(x);
			document.getElementById("rph").value=Math.round(rateperDay/24);
		}
		//facilities functions
		function newFacilities(){
			$('#dlgFacilities').dialog('open').dialog('setTitle','New Facilities');
			$('#fmfacilities').form('clear');
			url='serviceEasyUi/facilities/addFacilities.php';
		}
		function saveFacilities(){
	 $('#fmfacilities').form('submit',{ url: url, 
	 onSubmit: function(){
		 return $(this).form('validate');
		 },
		 success: function(result){
			 var result = eval('('+result+')');
				 if (result.msg){
					  $.messager.show({title: 'Error',
					  msg: result.msg});
					} else {
						$.messager.show({title: 'Action',
					  msg: 'Action Successfully'});
						$('#dlgFacilities').dialog('close'); // close the dialog
						 $('#dgFacilities').datagrid('reload'); // reload the user
		}
		
	}
}); 
}

function editFacilities(){
			var row=$('#dgFacilities').datagrid('getSelected');
			if(row){
			$('#dlgFacilities').dialog('open').dialog('setTitle','Edit Facilities');
			$('#fmfacilities').form('load',row);
			url='serviceEasyUi/facilities/updateFacilities.php?id='+row.factilityNo;
			}
		}
		//room function
		//facilities functions
		function newRoom(){
			$('#dlgRoom').dialog('open').dialog('setTitle','New Room');
			$('#fmRoom').form('clear');
			url='serviceEasyUi/room/addRoom.php';
		}
		function saveRoom(){
	 $('#fmRoom').form('submit',{ url: url, 
	 onSubmit: function(){
		 return $(this).form('validate');
		 },
		 success: function(result){
			 var result = eval('('+result+')');
				 if (result.msg){
					  $.messager.show({title: 'Error',
					  msg: result.msg});
					} else {
						$.messager.show({title: 'Action',
					  msg: 'Action Successfully'});
						$('#dlgRoom').dialog('close'); // close the dialog
						 $('#dgRoom').datagrid('reload'); // reload the user
		}
		
	}
}); 
}

function editRoom(){
			var row=$('#dgRoom').datagrid('getSelected');
			if(row){
			$('#dlgRoom').dialog('open').dialog('setTitle','Edit Facilities');
			$('#fmRoom').form('load',row);
			url='serviceEasyUi/room/updateRoom.php?id='+row.roomNo;
			}
		}
		//Reservation services
		function newRes(){
			$('#dlgRes').dialog('open').dialog('setTitle','New Reservation');
			$('#fmRes').form('clear');
			url='serviceEasyUi/reservation/addReservation.php';
		}
		function saveRes(){
	 $('#fmRes').form('submit',{ url: url, 
	 onSubmit: function(){
		 return $(this).form('validate');
		 },
		 success: function(result){
			 var result = eval('('+result+')');
				 if (result.msg){
					  $.messager.show({title: 'Error',
					  msg: result.msg});
					} else {
						$.messager.show({title: 'Action',
					  msg: 'Action Successfully'});
						$('#dlgRes').dialog('close'); // close the dialog
						 $('#dgRes').datagrid('reload'); // reload the user
		}
		
	}
}); 
}

function editRes(){
			var row=$('#dgRes').datagrid('getSelected');
			if(row){
			$('#dlgRes').dialog('open').dialog('setTitle','Edit Facilities');
			$('#fmRes').form('load',row);
			url='serviceEasyUi/reservation/updateReservation.php?id='+row.resNo;
			}
		}	
		//add clients
		
		function newClient2(){
			$('#dlgcustomer').dialog('open').dialog('setTitle','New Client');
			$('#fmcustomer').form('clear');
			url='serviceEasyUi/client/addClient.php';
		}
		function newCommission(){
			$('#dlgCommission').dialog('open').dialog('setTitle','Commission');
			$('#fmCommission').form('clear');
			url='serviceEasyUi/commission/addCommission.php';
		}
		//edit client
	function editClient2(){
			var row=$('#dgcustomer').datagrid('getSelected');
			if(row){
			$('#dlgcustomer').dialog('open').dialog('setTitle','Edit Client');
			$('#fmcustomer').form('load',row);
			url='serviceEasyUi/client/updateClient.php?id='+row.clientNo;
			}
		}
		//save client
	function saveClient2(){
	 $('#fmcustomer').form('submit',{ url: url, 
	 onSubmit: function(){
		 return $(this).form('validate');
		 },
		 success: function(result){
			 var result = eval('('+result+')');
				 if (result.msg){
					  $.messager.show({title: 'Error',
					  msg: result.msg});
					} else {
						$.messager.show({title: 'Action',
					  msg: 'Action Successfully'});
						$('#dlgcustomer').dialog('close'); // close the dialog
						 $('#dgcustomer').datagrid('reload'); // reload the user
		}
		
	}
}); 
}
	
		
		
		function getRatesx(x){
			var str;
			if(x!=""){
					if (window.XMLHttpRequest){
			xmlhttp=new XMLHttpRequest();
					}else
  					{// code for IE6, IE5
 					 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 					 }

					xmlhttp.onreadystatechange=function()
  				{
  					if (xmlhttp.readyState==4 && xmlhttp.status==200)
    			{
					str=xmlhttp.responseText;
	if(str!="bad"){
    //document.getElementById("vale").innerHTML=xc;
	var newstr=str.split("/");
	alert(str);
	document.getElementById("ratex").value=str
	
	}else{
	alert("Please Contract the system administrator!");
	}
	
	}
  
}


xmlhttp.open("GET","controller/ajaxController.php?action=getRate&id="+x,true);
xmlhttp.send();

}else{
	alert("Supply Customer Number");
	document.forms["transact"].elements["customerNo"].focus;  
	
  }
		}
	
	function oldClient(){
		var x="";
		x=prompt("Enter existing client Name?:","yiga james");
		
		if(x!=""){
					if (window.XMLHttpRequest){
			xmlhttp=new XMLHttpRequest();
					}else
  					{// code for IE6, IE5
 						 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 					 }

						xmlhttp.onreadystatechange=function()
  						{
  							if (xmlhttp.readyState==4 && xmlhttp.status==200)
    					{
								str=xmlhttp.responseText;
								var wayout=str.split("/");
								if(wayout[0]!="bad"){
    								
									var newstr=str.split("/");
									
									document.getElementById("clientname").value=newstr[0];
									document.getElementById("tel").value=newstr[1];
									document.getElementById("email").value=newstr[2];
									document.getElementById("nation").value=newstr[3];
									document.getElementById("company").value=newstr[4];
									document.getElementById("srequirement").value=newstr[5];
									
									}else{
											alert("Client does not exit");
										}
	
	}
  
}


xmlhttp.open("GET","controller/ajaxController.php?action=getClientDetails&id="+x,true);
xmlhttp.send();
		}else{
			alert("Supply a value in the search");
		}

	}
	
	
	function oldClient2(x){
		
		
		if(x!=""){
					if (window.XMLHttpRequest){
			xmlhttp=new XMLHttpRequest();
					}else
  					{// code for IE6, IE5
 						 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 					 }

						xmlhttp.onreadystatechange=function()
  						{
  							if (xmlhttp.readyState==4 && xmlhttp.status==200)
    					{
								str=xmlhttp.responseText;
								var wayout=str.split("/");
								if(wayout[0]!="bad"){
    								
									var newstr=str.split("/");
									
									document.getElementById("clientname").value=newstr[0];
									document.getElementById("tel").value=newstr[1];
									document.getElementById("email").value=newstr[2];
									document.getElementById("nation").value=newstr[3];
									document.getElementById("company").value=newstr[4];
									document.getElementById("srequirement").value=newstr[5];
									
									}else{
											alert("Client does not exit");
										}
	
	}
  
}


xmlhttp.open("GET","controller/ajaxController.php?action=getClientDetails&id="+x,true);
xmlhttp.send();
		}else{
			alert("Supply a value in the search");
		}

	}
	
		$("input#checkindate").datepicker();
		function calDate2(x){
			var datein=new Date(document.getElementById("checkindate").value);
			var dateout=new Date(x);
			if(datein!="" && dateout!=""){
				document.getElementById("noofDay").value=(parseInt(datein)-parseInt(dateout))/(3600*240);
			}else{
			}
		}
	function calDate(x){
		
		var x2=document.getElementById("checkindate").value;
		
		if(x!=""){
					if (window.XMLHttpRequest){
			xmlhttp=new XMLHttpRequest();
					}else
  					{// code for IE6, IE5
 						 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 					 }

						xmlhttp.onreadystatechange=function()
  						{
  							if (xmlhttp.readyState==4 && xmlhttp.status==200)
    					{
								str=xmlhttp.responseText;
								var wayout=str.split("/");
								if(wayout[0]!="bad"){
    								
									var newstr=str.split("/");
									
									document.getElementById("noofDay").value=newstr[0];
									
									
									}else{
											alert("Query not successefully exxcited!");
										}
	
	}
  
}


xmlhttp.open("GET","controller/ajaxController.php?action=getDuration&id="+x+"&id2="+x2,true);
xmlhttp.send();
		}else{
			alert("Supply a value in the search");
		}

	
	}
	function getFreeRooms(x){
	
		var x2=document.getElementById("checkindate").value;
		var x3=document.getElementById("checkoutdate").value;
		if(x!=""){
					if (window.XMLHttpRequest){
			xmlhttp=new XMLHttpRequest();
					}else
  					{// code for IE6, IE5
 						 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 					 }

						xmlhttp.onreadystatechange=function()
  						{
  							if (xmlhttp.readyState==4 && xmlhttp.status==200)
    					{
								str=xmlhttp.responseText;
								
								if(str!="bad"){
    								
									var newstr=str.split("*");
									
									document.getElementById("roomNo2").innerHTML=newstr[0];
									document.getElementById("roomrate").value=newstr[1];
									document.getElementById("cur").innerHTML=newstr[2];
									document.getElementById("currency").value=newstr[2];
									
									document.getElementById("total").value=parseInt(newstr[1])*parseInt(document.getElementById("noofDay").value);
									document.getElementById("vat").value=parseInt(document.getElementById("total").value)*0.18;
									document.getElementById("govtTax").value=parseInt(document.getElementById("noofDay").value)*2000;
									document.getElementById("service").value=0;
									
									
									}else{
											alert("error");
										}
	
	}
  
}


xmlhttp.open("GET","controller/ajaxController.php?action=getFreeRoom&id="+x+"&id2="+x2+"&id3="+x3,true);
xmlhttp.send();
		}else{
			alert("Supply a value in the search");
		}

		
	}
	
	function getTotal(){
		var total=parseFloat(document.getElementById("total").value);
		var discount=parseFloat(document.getElementById("discount").value);
		var vat=parseFloat(document.getElementById("vat").value);
		var service=parseFloat(document.getElementById("service").value);
		var gtax=parseFloat(document.getElementById("govtTax").value);
		var total2=0;
		if(!isNaN(total) && !isNaN(discount)&& !isNaN(vat)&& !isNaN(service)&& !isNaN(gtax)){
			document.getElementById("total2").value=((total-discount)+vat+service+gtax);
		}else{
			alert("!Please supply all values in the billing section");
		}
	}
	function getBalance(x){
		var total=parseFloat(document.getElementById("total2").value);
		document.getElementById("balance").value=total-parseInt(x);
	}
	function exchangeRate(x){
		var y=parseFloat(x);
		var total=parseFloat(document.getElementById("total").value);
		var discount=parseFloat(document.getElementById("discount").value);
		var vat=parseFloat(document.getElementById("vat").value);
		var service=parseFloat(document.getElementById("service").value);
		var gtax=parseFloat(document.getElementById("govtTax").value);
		document.getElementById("roomrate").value=parseFloat(document.getElementById("roomrate").value)*y;
		document.getElementById("total").value=total*y;
		document.getElementById("discount").value=discount*y;
		document.getElementById("vat").value=vat*y;
		document.getElementById("service").value=service*y;
		
		document.getElementById("currency").value="";
		document.getElementById("cur").innerHTML="Exchanged to UGX";
		
		
	}