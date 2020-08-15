

 function newentityfield(){
$('#dlgentityfield').dialog('open').dialog('setTitle','Enter entityfield ');
$('#frmentityfield').form('clear');
 url='add'; 
}

 function editentityfield(){
 var row=$('#dgentityfield').datagrid('getSelected');
 if(row)
{
 $('#dlgentityfield').dialog('open').dialog('setTitle','Edit entityfield');
 $('#frmentityfield').form('load',row); 
 url='edit/'+row.id;
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deleteentityfield(){
 var row=$('#dgentityfield').datagrid('getSelected');
 if(row)
{
 $.messager.confirm('Warning', 'Are you sure of the the act', function(r){ if (r){    $.post('delete/'+row.id,{},function(data){ $('#dgentityfield').datagrid('reload');});
 
}
});}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function saveentityfield(){
 saveForm('#frmentityfield',url,'#dlgentityfield','#dgentityfield');
}