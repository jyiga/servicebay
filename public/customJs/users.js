

 function newuser(){
$('#dlguser').dialog('open').dialog('setTitle','Enter user ');
$('#frmuser').form('clear');
 url='add'; 
}

 function edituser(){
 var row=$('#dguser').datagrid('getSelected');
 if(row)
{
 $('#dlguser').dialog('open').dialog('setTitle','Edit user');
 $('#frmuser').form('load',row); 
 url='edit/'+row.id;
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deleteuser(){
 var row=$('#dguser').datagrid('getSelected');
 if(row)
{
 $.messager.confirm('Warning', 'Are you sure of the the act', function(r){ if (r){    $.post('delete/'+row.id,{},function(data){ $('#dguser').datagrid('reload');});
 
}
});}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function saveuser(){
 saveForm('#frmuser',url,'#dlguser','#dguser');
}