// JavaScript Document
var url;
var editIndex = 'undefined';
var tab_select;
var tab_index=0;
	
	function qs(key) {
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars[key];
}
	
	function openNewTab(tabname,url){
		var tab=$('#finance_tabs').tabs('getTab',tabname);
		if(tab==null){
		var your_content="<div style='padding:10px;'><?php require('"+url+"'); ?></div>";
		
		$('#finance_tabs').tabs('add',{title:tabname,href:url,closable:true});
		//$('#financeTab').tabs('select',tabname);
		}else{
		$('#financeTab').tabs('select',tabname);	
		}
	}
	function openNewTab2(tabname,url){
		//tab_index++;
		var tab=$('#operations_tabs').tabs('getTab',tabname);
		if(tab==null){
		var your_content="<div style='padding:5px;'><?php require('"+url+"'); ?></div>";
		$('#operations_tabs').tabs('add',{title:tabname,href:url,closable:true});
		//$('#financeTab').tabs('select',tabname);
		}else{
			$('#operations_tabs').tabs('select',tabname);
		}
	}
	/*
		function newAcademicYear(){
			$('#dlgAcademicYear').dialog('open').dialog('setTitle','');
			$('#frmAcademicYear').form('clear');
			$('#action').val('add');
			url='controller/academicYearController.php';
		}
		//activity 
		function activtyAcademicYear(){
			
	var row=$('#dgAcademicYear').datagrid('getSelected');
	if(row){
		$.messager.confirm('confirm','Are you sure you would like activite Academic Year',function(r){
			if(r){
				$.post('controller/academicYearController.php',{id:row.year_code,action:'activityYear'},function(result){
			if(result.success){
				$('#dgAcademicYear').datagrid('reload'); 
			}else{
				$.messager.show({title:'Help',msg:result.msg});
			}
				},'json');
				
			}
		});
	}else{
		$.messager.show({title:'Help',msg:'select an Academic Year Eg 	1991 or 1991/1992 '});
	}
	
}


function newAcademicTermActivity(){
			
	var row=$('#dgAcademicTerm').datagrid('getSelected');
	if(row){
		$.messager.confirm('confirm','Are you sure you would like activite Academic Term:',function(r){
			if(r){
				$.post('controller/academicTermController.php',{id:row.termCode,year_code:row.yearCode,action:'activityTerm'},function(result){
			if(result.success){
				$('#dgAcademicTerm').datagrid('reload'); 
			}else{
				$.messager.show({title:'Help',msg:result.msg});
			}
				},'json');
				
			}
		});
	}else{
		$.messager.show({title:'Help',msg:'select an Academic Year Eg: 1991 or 1991/1992 '});
	}
	
}
*/
		function myformatter(date){
			var y = date.getFullYear();
			var m = date.getMonth()+1;
			var d = date.getDate();
			var y2=$('#yearCode').val()==""?$('#year_code3').val():$('#yearCode').val();
			if(y==y2){
			return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
			}else{
				$.messager.show({title: 'Info',
					  msg: 'The year should be the same as the year code'});
			}
		}
		function myformatter2(date){
			var y = date.getFullYear();
			var m = date.getMonth()+1;
			var d = date.getDate();
			
			return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
			
		}
		function myparser(s){
			if (!s) return new Date();
			var ss = (s.split('-'));
			var y = parseInt(ss[0],10);
			var m = parseInt(ss[1],10);
			var d = parseInt(ss[2],10);
			if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
				return new Date(y,m-1,d);
			} else {
				return new Date();
			}
		}
		/*
		function saveAcademicYear(){
		
		$.messager.progress();
	 $('#frmAcademicYear').form('submit',{ url: url, 
	 onSubmit: function(){
		 return $(this).form('validate');
		 },
		 success: function(result){
			 $.messager.progress('close');
			 var result = eval('('+result+')');
				 if (result.msg){
					  $.messager.show({title: 'Info',
					  msg: result.msg});
					} else {
						$.messager.show({title: 'Info',
					  msg: 'Academic Year Saved'});
						$('#dlgAcademicYear').dialog('close'); // close the dialog
						 $('#dgAcademicYear').datagrid('reload'); // reload the user
		}
		
	}
}); 
		
}

function newAcademicTerm(){
			var row=$('#dgAcademicYear').datagrid('getSelected');
			if(row){
			$('#dlgAcademicTermView').dialog('open').dialog('setTitle','View Academic Term');
			$('#dgAcademicTerm').datagrid('load',{yearCode:row.year_code});
			//$('#frmAcademicTerm').form('clear');
			$('#year_code2').val(row.year_code);
			//$('#action').val('add');
			//url='controller/academicTermController.php';
			
			}else{
				$.messager.show({title:'Info',msg:'Please Select a row then click the button again'});
			}
		}
		
		function saveAcademicTerm(){
		$.messager.progress();
	 $('#frmAcademicTerm').form('submit',{ url: url, 
	 onSubmit: function(){
		 return $(this).form('validate');
		 },
		 success: function(result){
			 var result = eval('('+result+')');
				 if (result.msg){
					  $.messager.show({title: 'Help line: 0781587081',
					  msg: result.msg});
					  $.messager.progress('close');
					} else {
						$.messager.progress('close');
						$.messager.show({title: 'Info ',
					  msg: 'Action Successfully'});
						$('#dlgAcademicTerm').dialog('close');
						$('#dgAcademicTerm').datagrid('load',{yearCode:$('#year_code3').val()});// reload the user
						
		}
		
	}
}); 
}
	
	
	function newClass(){
			$('#dlgSchoolClass').dialog('open').dialog('setTitle','Set Classes');
			$('#frmSchoolClass').form('clear');
			$('#action').val('add');
			url='controller/schoolClassController.php';
		}	
		
		function editClass(){
			var row=$('#dgSchoolClass').datagrid('getSelected');
			
			if(row){
				$('#dlgSchoolClass').dialog('open').dialog('setTitle','Edit Class');
				$('#action').val('update');
				url='controller/schoolClassController.php?id='+row.class_code;
				$('#frmSchoolClass').form('load',row);
			}else{
				$.messager.show({title:'Info',msg:'Select the class to edit'});
			}
			
			
		}	
		
		function saveClass(){
		$.messager.progress();
	 $('#frmSchoolClass').form('submit',{ url: url, 
	 onSubmit: function(){
		 return $(this).form('validate');
		 },
		 success: function(result){
			 var result = eval('('+result+')');
				 if (result.msg){
					  $.messager.show({title: 'Help line: 0781587081',
					  msg: result.msg});
					  $.messager.progress('close');
					} else {
						
						$.messager.show({title: 'Info ',
					  msg: 'Action Successfully'});
						$('#dlgSchoolClass').dialog('close');
						$('#dgSchoolClass').datagrid('reload');
						$.messager.progress('close');// reload the user
						
		}
		
	}
}); 
}
function mapClassToSubject(){
	var row=$('#dgSchoolClass').datagrid('getSelected');
	if(row){
	$('#dlgSubjectClass').dialog('open').dialog('setTitle','Mapping Subject to Class');
	
	$('#class_code2').val(row.class_code);
	}else
	{
	$.messager.show({title:'Info',msg:'Please select a class to load subjects'});	
	}
	//load the subject Class Below
}

function included_formatter(val,row){
	if(row.status_show=='ON'){
		return "<input type='checkbox' name='status_show[]' value='"+row.status_show+"' checked/>";
	}else{
		return "<input type='checkbox' name='status_show[]' value='"+row.status_show+"' readonly/>";
	}
	
}

function saveMappedSubjectToClass(){
	$.messager.progress();
	var id="";
	var class_code_value=$('#class_code2').val();
	var rows=$('#dgSubjectClass').datagrid('getSelections');
	for(var i=0;i<rows.length;i++){
		id=id+rows[i].subject_code+"-";
	}
	if(rows.length==0){
		$.messager.show({title:'Help',msg:'Select at list one row'});
		}else {
			
			
				$.post('controller/subjectController.php',{ids:id,class_code:class_code_value,action:'mapSubject'},function(result){
			if(result.success){
				$.messager.progress('close');
				$.messager.alert('Info','subjects Posted');
				$('#dlgSubjectClass').dialog('close'); 
			}else{
				$.messager.progress('close');
				$.messager.show({title:'Help',msg:result.msg});
			}
				},'json');
				
			
		}
}
	
	//the subejct code
function newSubject(){
			$('#dlgSubject').dialog('open').dialog('setTitle','Set Subject');
			$('#frmSubject').form('clear');
			$('#action').val('add');
			url='controller/subjectController.php';
		}	
		
function editSubject(){
			var row=$('#dgSubject').datagrid('getSelected');
			
			if(row){
				$('#dlgSubject').dialog('open').dialog('setTitle','Edit Subject');
				$('#action').val('update');
				url='controller/subjectController.php?id='+row.subject_code;
				$('#frmSubject').form('load',row);
			}else{
				$.messager.show({title:'Info',msg:'Select the subject to edit'});
			}
			
			
		}	
		
function saveSubject(){
		$.messager.progress();
	 $('#frmSubject').form('submit',{ url: url, 
	 onSubmit: function(){
		 return $(this).form('validate');
		 },
		 success: function(result){
			 var result = eval('('+result+')');
				 if (result.msg){
					 $.messager.progress('close');
					  $.messager.show({title: 'Help line: 0781587081',
					  msg: result.msg});
					  $.messager.progress('close');
					} else {
						
						$.messager.show({title: 'Info ',
					  msg: 'Action Successfully'});
						$('#dlgSubject').dialog('close');
						$('#dgSubject').datagrid('reload');
						$.messager.progress('close');// reload the user
						
		}
		
	}
}); 
}
	//student
	
	
	
	function newStudent(){
			$('#dlgStudent').dialog('open').dialog('setTitle','Admission Form');
			$('#frmStudent').form('clear');
			//$('#action').val('add');
			//$('#admissiontab').tabs('select','Bio Info');
			url='controller/studentController.php';
		}	
		
function editStudent(){
			var row=$('#dgSubject').datagrid('getSelected');
			
			if(row){
				$('#dlgSubject').dialog('open').dialog('setTitle','Edit Subject');
				$('#action').val('update');
				url='controller/subjectController.php?id='+row.subject_code;
				$('#frmSubject').form('load',row);
			}else{
				$.messager.show({title:'Info',msg:'Select the subject to edit'});
			}
			
			
		}	
		
		function saveStudent(){
			//$.messager.alert('in')
			var surname=$('#surname').val();
			var othername=$('#othername').val();
			var dob=$('#dob').datebox('getValue');
			var cizitenship=$('#cizitenship').val();
			var district=$('#district').val();
			var county=$('#county').val();
			var subcounty=$('#subcounty').val();
			var zone=$('#zone').val();
			var contact=$('#contact').val();
			var str_url="surname="+surname+"&othername="+othername+"&dob="+dob+"&cizitenship="+cizitenship+"&district="+district+"&county="+county+"&subcounty="+subcounty+"&zone="+zone+"&contact="+contact;
			//surname:surname,othername:othername,dob:dob,cizitenship:cizitenship,district:district,county:county,subcounty:subcounty,zone:zone,contact:contact,
				$.post('controller/studentController.php?'+str_url,{action:'add'},function(result){
			if(result.success){
				//$.messager.alert('Result');
				$('#admissiontab').tabs('select','Bio Info');
				setSavedStudent();
				var std_no=document.getElementById('student_no3').value;
				$('#dgbiodata').datagrid('load',{student_no:std_no});
				//get saved student
			}else{
				$.messager.alert('Help',result.msg);
				$.messager.show({title:'Warning',msg:result.msg});
	}
				},'json');
				
			
		}
		
		
function saveStudent1(){
		$.messager.progress();
	 $('#frmSubject').form('submit',{ url: url, 
	 onSubmit: function(){
		 return $(this).form('validate');
		 },
		 success: function(result){
			 var result = eval('('+result+')');
				 if (result.msg){
					 $.messager.progress('close');
					  $.messager.show({title: 'Help line: 0781587081',
					  msg: result.msg});
					  $.messager.progress('close');
					} else {
						
						$.messager.show({title: 'Info ',
					  msg: 'Action Successfully'});
						$('#dlgSubject').dialog('close');
						$('#dgSubject').datagrid('reload');
						$.messager.progress('close');// reload the user
						
		}
		
	}
}); 
}
	
	
	//Bio data 
	
	
	//others
	//utilties function to out the no of the inserted students.	
	function setSavedStudent(){
		$.post('controller/studentController.php',{action:'getStudent'},
		function(data){
			document.getElementById('student_no3').value=data;
		});
	}
	
	//Biodata execution
	function addBioData(){
			$('#dlgBioData').dialog('open').dialog('setTitle','Add Bio Data');
			$('#frmBioData').form('clear');
			$('#student_no').val($("#student_no3").val());
			//$('#action').val('add');
			//$('#admissiontab').tabs('select','Bio Info');
			//url='controller/studentController.php';
		}	
	function saveBioData(){
		var guradian_name=$('#guardian_name').val();
		var student_no=$('#student_no').val();
		var contact2=$('#contact2').val();
		var email=$('#email').val();
		$.post('controller/bioDataController.php',{action:'add',student_no:student_no,contact:contact2,email:email,guardian_name:guradian_name},
		function(data){
			if(data){
				$('#dlgBioData').dialog('close')	//$('#admissiontab').tabs('select','School Info');		var std_no=document.getElementById('student_no3').value;
				$('#dgbiodata').datagrid('load',{student_no:student_no});
					
			}else{
				$.messager.alert('Help',data);
			}
			//document.getElementById('student_no3').value=data;
		});
	}
	
	function openFormalSchool(){
		$('#admissiontab').tabs('select','School Info');
				//setSavedStudent();
				var std_no=document.getElementById('student_no3').value;
				document.getElementById('student_no').value=std_no;
	}
	function saveFormalSchool(){
		
		var guradian_name=$('#guardian_name').val();
		var student_no=$('#student_no').val();
		var contact2=$('#contact2').val();
		var email=$('#email').val();
		$.post('controller/bioDataController.php',{action:'add',student_no:student_no,contact:contact2,email:email,guardian_name:guradian_name},
		function(data){
			if(data){
				$('#dlgBioData').dialog('close')	
				$('#dgbiodata').datagrid('load',{student_no:student_no});
				
					
			}else{
				$.messager.alert('Help',data);
			}
			
		});
	
		
	}
	function saveFormalSchool2(){
		
		var school_name=$('#school_name').val();
		var student_no=$('#student_no').val();
		var contact_no=$('#contact_no').val();
		var results=$('#results').val();
		var level_admission=$('#level_admission').val();
		//var recommendation_status=document.getElementById('recommendation_status').value;
		var recommendation_status=$('#recommendation_status').combobox('getValue');
		$.post('controller/formalSchoolController.php',{action:'add',student_no:student_no,contact:contact_no,results:results,level:level_admission,recommendation_status:recommendation_status,school_name:school_name},
		function(data){
			if(data){
				$('#admissiontab').tabs('select','Medical Info');
				$('#student_no5').val(student_no)
				$('#dgMedicalData').datagrid('load',{student_no:student_no});
				$.messager.show({title:'Message Box',msg:'Data Saved'});
					
			}else{
				$.messager.alert('Help',data);
			}
			
		});
	
		
	}
	//the medical
	function addMedical(){
			$('#dlgMedical').dialog('open').dialog('setTitle','');
			$('#frmMedicalInfo').form('clear');
			$('#student_no6').val($('#student_no5').val());
		
				//var std_no=document.getElementById('student_no4').value;
				//document.getElementById('student_no').value=std_no;
	}
	function saveMedical(){
		
		var disease_name=$('#disease_name').val();
		var student_no=$('#student_no6').val();
		var disease_description=$('#disease_description').val();
		var disease_status=$('#disease_status').combobox('getValue');
		
		$.post('controller/medicInfoController.php',{action:'add',student_no:student_no,disease_name:disease_name,disease_description:disease_description,disease_status:disease_status},
		function(data){
			if(data){
			//	$('#admissiontab').tabs('select','Medical Info');
				$('#dlgMedical').dialog('close');
				//$.messager.alert('ok',data);
				$('#dgMedicalData').datagrid('load',{student_no:student_no});
					
			}else{
				$.messager.alert('Help',data);
				
			}
			
		});
	
		
	}
	function newAccount(){
			$('#dlgAccount').dialog('open').dialog('setTitle','Optimus Tech');
			$('#frmAccount').form('clear');
			$('#action').val('add');
			//document.getElementById('action').value='add';
			url='controller/accountController.php';
		}
		function editAccount(){
			var row=$('#dgAccount').datagrid('getSelected');
			
			if(row){
				$('#dlgAccount').dialog('open').dialog('setTitle','Edit Account');
				
				url='controller/accountController.php?id='+row.account_code;
				$('#frmAccount').form('load',row);
				$('#action').val('update');
				
			}else{
				$.messager.show({title:'Info',msg:'Select the account to edit'});
			}
		}
	function saveAccount(){
		
		//$.messager.progress();
	 $('#frmAccount').form('submit',{ url: url, 
	 onSubmit: function(){
		 return $(this).form('validate');
		 },
		 success: function(result){
			 var result = eval('('+result+')');
				 if (result.msg){
					 //$.messager.progress('close');
					  $.messager.show({title: 'Help:',
					  msg: result.msg});
					 // $.messager.progress('close');
					} else {
						
						$.messager.show({title: 'Info ',
					  msg: 'Action Successfully'});
						$('#dlgAccount').dialog('close');
						$('#dgAccount').datagrid('reload');
						//$.messager.progress('close');// reload the user
						
		}
		
	}
}); 

	}
	function accountTypeFormatter(val,row){
		if(val=='ACA'){
			return 'Asset Current(Cash/Bank)';
		}else if(val=="ACU"){
			return 'Asset Current(Other)';
		}else if(val=="AFI"){
			return 'Asset Fixed';
		}else if(val=="CPT"){
			return 'Captial /Working Fund';
		}else if(val=='LIC'){
			return 'Current Liability';
		}else if(val=='LIO'){
			return 'Other Liability';
		}else if(val=='REN'){
			return 'Revenue/Imcome';
		}else if(val=='EXP'){
			return 'Expense';
		}
	}
	function newAnalysisCategory(){
			$('#dlgAnalysisCategory').dialog('open').dialog('setTitle','');
			$('#frmAnalysisCategory').form('clear');
			$('#action').val('add');
			//document.getElementById('action').value='add';
			url='controller/analysisCategoryController.php';
		}
		
		function saveAnalysisCategory(){
		
		$.messager.progress();
	 $('#frmAnalysisCategory').form('submit',{ url: url, 
	 onSubmit: function(){
		 return $(this).form('validate');
		 },
		 success: function(result){
			 var result = eval('('+result+')');
				 if (result.msg){
					 $.messager.progress('close');
					  $.messager.show({title: 'Help:',
					  msg: result.msg});
					 // $.messager.progress('close');
					} else {
						
						$.messager.show({title: 'Info ',
					  msg: 'Action Successfully'});
						$('#dlgAnalysisCategory').dialog('close');
						$('#dgAnalysisCategory').datagrid('reload');
						$.messager.progress('close');// reload the user
						
		}
		
	}
}); 

	}
	function newAnalysisCode(){
			$('#dlgAnalysisCode').dialog('open').dialog('setTitle','');
			$('#frmAnalysisCode').form('clear');
			$('#action').val('add');
			//document.getElementById('action').value='add';
			url='controller/analysisCodeController.php';
		}
		function saveAnalysisCode(){
		
		$.messager.progress();
	 $('#frmAnalysisCode').form('submit',{ url: url, 
	 onSubmit: function(){
		 return $(this).form('validate');
		 },
		 success: function(result){
			 var result = eval('('+result+')');
				 if (result.msg){
					 $.messager.progress('close');
					  $.messager.show({title: 'Help:',
					  msg: result.msg});
					 // $.messager.progress('close');
					} else {
						
						$.messager.show({title: 'Info ',
					  msg: 'Action Successfully'});
						$('#dlgAnalysisCode').dialog('close');
						$('#dgAnalysisCode').datagrid('reload');
						$.messager.progress('close');// reload the user
						
		}
		
	}
}); 

	}
	//the detail view account
	
function removeUser(){
	var row=$('#dgUser').datagrid('getSelected');
	if(row){
		$.messager.confirm('confirm','Are you sure you would like to delete the user',function(r){
			if(r){
				$.post('controller/usercontroller.php',{id:row.userid,action:'delete'},function(result){
			if(result.success){
				$('#dgUser').datagrid('reload'); 
			}else{
				$.messager.show({title:'Warning',msg:result.msg});
			}
				},'json');
				
			}
		});
	}else{
		$.messager.show({title:'Warning',msg:'select atleast a user'});
	}
	
}

function editLow(){
			var row=$('#dgLog').datagrid('getSelected');
			if(row){
			$('#dlgLog').dialog('open').dialog('setTitle','View Log Transaction');
			$('#dgLog2').datagrid('load',{log_id:row.log_id});
			//$('#frmUser').form('load',row);
			//$('#action').val('update');
			//$('#id').val(row.userid);
			//document.getElementById('dbLog').url='controller/usercontroller.php?action=viewLog_trans&log_id='+row.log_id);
			//url='controller/usercontroller.php?id='+row.userid;
			$('#dgLog').datagrid('reload');
			}
		}
		
//payment function
function newAcademicTerm2(){
			$('#dlgAcademicTerm').dialog('open').dialog('setTitle','Version 1.0');
			$('#frmAcademicTerm').form('clear');
			//$('#action').val('add');
			$('#year_code3').val($('#year_code2').val());
			url='controller/academicTermController.php?action=add';
		}
		
		

		
	function valid_plate(x){
		var size=x.length
		if(size==1){
			if(x=="U" || x=="u"){
				$('#vplate').val(x.toUpperCase());
			}else{
				alert('All number plates start with U');
				$('#vplate').val('');
				$('#vplate').focus();
				
			}
		}else{
			$('#vplate').val(x.toUpperCase());
		}
		
		
	}
	
	function toUppercase(){
		
	}
	//Rates functions
	function newRate(){
			$('#dlgRate').dialog('open').dialog('setTitle','kcc system');
			$('#frmRate').form('clear');
			$('#action').val('add');
			url='controller/ratecontroller.php';
		}
	function saveRate(){
	 $('#frmRate').form('submit',{ url: url, 
	 onSubmit: function(){
		 return $(this).form('validate');
		 },
		 success: function(result){
			 var result = eval('('+result+')');
				 if (result.msg){
					  $.messager.show({title: 'Alertion',
					  msg: result.msg});
					} else {
						$.messager.show({title: 'Message',
					  msg: 'Action Successfully'});
						$('#dlgRate').dialog('close'); // close the dialog
						 $('#dgRate').datagrid('reload'); // reload the user
		}
		
	}
}); 
}



function getRates(){
			var str;
			
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
	var newstr=str.split("-");
	//alert(str);
	document.getElementById("rate").value=newstr[0];
	$("#rate_id").val(newstr[1]);
	
	}else{
	alert("Please Contract the system administrator!");
	}
	
	}
  
}


xmlhttp.open("GET","controller/ratecontroller.php?action=getRate",true);
xmlhttp.send();


		}
		
		function getBal(){
			getPreviousBal();	
		}
		
		function getPreviousBal(){
			var str;
			var vplate=$('#vplate').val();
			
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
							var rate=$('#rate').val();
							var amount=$('#amount').val();
							var bal;
							bal=rate-amount;
							var array=str.split("-");
							var amount2=array[0];
							var month=parseInt(array[1]);
							var year=parseInt(array[2]);
							//var db_bal=getPreviousBal();
							//alert(db_bal+"/"+bal);
							var newbal=parseFloat(bal)+parseFloat(amount2);
							//alert(newbal);
							$('#bal').val(newbal);
							$('#month').val(setTaxMonth(month,amount2,amount));
							$('#year').val(checkYears(year,setTaxMonth(month,amount2,amount)));
							$('#details').val("Tax payment for the month of "+returnMouth(month,amount2,amount));
							
							
						//alert("x"+parseInt(str));
						
							
						}else{
						alert("Please Contract the system administrator:!");
						}
						
				}
  
}


xmlhttp.open("GET","controller/paymentcontroller.php?action=getbal&id="+vplate,true);
xmlhttp.send();
		}
		function setTaxMonth(x,bal,amt){
			var action=$('#action').val();
			if(action!="update"){
			var y=x+1;
			if(amt>bal){
			if(y==12 && y!=0){
				return 1;
			}else{
				return y;
			}
			}else if(amt<=bal){
				$('#bal').val(bal-amt);
				return x;
			}
			}else{
				return x;
			}
		}
		function checkYears(y,m){
			if(m==12){
				return y+1;
			}else{
				return y;
			}
		}
		function returnMouth(x){
			
			var array =Array('JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEPT','OCT','NOV','DEC');
			return array[x];
			
		}
		
		
		
		function editPayment(){
			var row=$('#dgPayment').datagrid('getSelected');
			if(row){
			$('#dlgPayment').dialog('open').dialog('setTitle','Edit Payment');
			$('#frmPayment').form('load',row);
			$('#action').val('update');
			$('#id').val(row.payment_id);
			url='controller/paymentcontroller.php?id='+row.payment_id;
			}
		}
		
		function deletePayment(){
	var row=$('#dgPayment').datagrid('getSelected');
	if(row){
		$.messager.confirm('confirm','This action will delete the payment permently is that ok:',function(r){
			if(r){
				$.post('controller/paymentcontroller.php',{id:row.payment_id,action:'delete'},function(result){
			if(result.success){
				$('#dgPayment').datagrid('reload'); 
			}else{
				$.messager.show({title:'Warning',msg:result.msg});
			}
				},'json');
				
			}
		});
	}else{
		$.messager.show({title:'Warning',msg:'select a payment?'});
	}
	
}
function verifyPayment(){
	var row=$('#dgPayment').datagrid('getSelected');
	if(row){
		$.messager.confirm('confirm','Are sure the payment exit on the bank statement:',function(r){
			if(r){
				$.post('controller/paymentcontroller.php',{id:row.payment_id,action:'verify'},function(result){
			if(result.success){
				$('#dgPayment').datagrid('reload'); 
			}else{
				$.messager.show({title:'Warning',msg:result.msg});
			}
				},'json');
				
			}
		});
	}else{
		$.messager.show({title:'Warning',msg:'select a payment?'});
	}
	
}
function paymentSearch(){
	//alert($('#vechile_plate').val()+"-"+$('#datefrom').val()+"-"+$('#dateto').val());
	$('#dgPayment').datagrid('load',{
		payment_id:$('#vechile_plate').val(),
		dateFrom:$('#datefrom').val(),
		dateTo:$('#dateto').val(),
		action:'viewPaid'
		});
	
}
function clearUp(x){
	var txt=document.getElementById(x);
	$('#'+x).val("");
	if(x=="password"){
		txt.type='password';
	}
	
	
}
function restoreTextFieldStatus(x){
	var txt=document.getElementById(x);
	if(x=="username" && txt.value==''){
		var str="USERNAME";
		txt.value=str;
	}else if(x=="password" && txt.value==''){
		var str="PASSWOPD";
		txt.value=str;
		txt.type='text';
	}
	
}
function totalFormatter(val,row){
	if(val=='Total'){
		return '<span style="color:red;">('+val+')</span>';
	}else{
		return val;
	}
}
*/
	function JSONToCSVConvertor(JSONData, ReportTitle, ShowLabel) {
    //If JSONData is not an object then JSON.parse will parse the JSON string in an Object
    var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;
    
    var CSV = '';    
    //Set Report title in first row or line
    
    CSV += ReportTitle + '\r\n\n';

    //This condition will generate the Label/Header
    if (ShowLabel) {
        var row = "";
        
        //This loop will extract the label from 1st index of on array
        for (var index in arrData[0]) {
            
            //Now convert each value to string and comma-seprated
            row += index + ',';
        }

        row = row.slice(0, -1);
        
        //append Label row with line break
        CSV += row + '\r\n';
    }
    
    //1st loop is to extract each row
    for (var i = 0; i < arrData.length; i++) {
        var row = "";
        
        //2nd loop will extract each column and convert it in string comma-seprated
        for (var index in arrData[i]) {
            row += '"' + arrData[i][index] + '",';
        }

        row.slice(0, row.length - 1);
        
        //add a line break after each row
        CSV += row + '\r\n';
    }

    if (CSV == '') {        
        alert("Invalid data");
        return;
    }   
    
    //Generate a file name
    var fileName = "MyReport_";
    //this will remove the blank-spaces from the title and replace it with an underscore
    fileName += ReportTitle.replace(/ /g,"_");   
    
    //Initialize file format you want csv or xls
    var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);
    
    // Now the little tricky part.
    // you can use either>> window.open(uri);
    // but this will not work in some browsers
    // or you will not get the correct file extension    
    
    //this trick will generate a temp <a /> tag
    var link = document.createElement("a");    
    link.href = uri;
    
    //set the visibility hidden so it will not effect on your web-layout
    link.style = "visibility:hidden";
    link.download = fileName + ".csv";
    
    //this part will append the anchor tag and remove it after automatic click
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}