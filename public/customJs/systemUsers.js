

 function newsystemUser()
 {
$('#dlgsystemUser').dialog('open').dialog('setTitle','Enter systemUser ');
$('#frmsystemUser').form('clear');
 url='add';
}

 function editsystemUser(){
 var row=$('#dgsystemUser').datagrid('getSelected');
 if(row)
{
 $('#dlgsystemUser').dialog('open').dialog('setTitle','Edit systemUser');
 $('#frmsystemUser').form('load',row); 
 url='edit/'+row.id;
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deletesystemUser(){
 var row=$('#dgsystemUser').datagrid('getSelected');
 if(row)
{
$.post('delete/'+row.id,{},function(data){ $('#dgsystemUser').datagrid('reload');});
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function savesystemUser(){
 saveForm('#frmsystemUser',url,'#dlgsystemUser','#dgsystemUser');
}
 function confirmPasswordMatch() {
  var htmlString = '<div class="progress"><div class="progress-bar progress-bar-success" data-transitiongoal="95"></div></div>';
 var passwordCheck=$('#passwordCheck');
  passwordCheck.html(htmlString);
  var password = $("#password").val();
  var confirmPassword = $('#confirmpassword').val();
  htmlString = '<div class="progress"><div class="progress-bar progress-bar-success" data-transitiongoal="95"></div></div>';
  if (password == confirmPassword)
  {
   passwordCheck.html(htmlString);
  } else
  {
   $('#confirmpassword').val("");
   var innerHtml='<div role="alert" class="alert alert-danger alert-dismissible fade in"><button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span> </button> <strong>Error</strong>Password Mismatch</div>';
   $('#passwordCheck').html(innerHtml);
  }
 }
 function confirmPasswordFocus()
 {
  var htmlString = '<div class="progress"><div class="progress-bar progress-bar-success" data-transitiongoal="95"></div></div>';
  //var passwordCheck=$('#passwordCheck');
  $('#passwordCheck').html(htmlString);
 }