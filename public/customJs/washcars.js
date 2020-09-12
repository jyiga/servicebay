

 function newwashcar(){
$('#dlgwashcar').dialog('open').dialog('setTitle','Enter washcar ');
$('#frmwashcar').form('clear');
 url='add'; 
}

 function editwashcar(){
 var row=$('#dgwashcar').datagrid('getSelected');
 if(row)
{
 $('#dlgwashcar').dialog('open').dialog('setTitle','Edit washcar');
 $('#frmwashcar').form('load',row); 
 url='edit/'+row.id;
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deletewashcar(){
 var row=$('#dgwashcar').datagrid('getSelected');
 if(row)
{
 $.messager.confirm('Warning', 'Are you sure of the the act', function(r){ if (r){    $.post('delete/'+row.id,{},function(data){ $('#dgwashcar').datagrid('reload');});
 
}
});}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function savewashcar(){
 saveForm('#frmwashcar',url,'#dlgwashcar','#dgwashcar');
}