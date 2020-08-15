

 function newentityform(){
$('#dlgentityform').dialog('open').dialog('setTitle','Enter entityform ');
$('#frmentityform').form('clear');
 url='add'; 
}

 function editentityform(){
 var row=$('#dgentityform').datagrid('getSelected');
 if(row)
{
 $('#dlgentityform').dialog('open').dialog('setTitle','Edit entityform');
 $('#frmentityform').form('load',row); 
 url='edit/'+row.colName;
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deleteentityform(){
 var row=$('#dgentityform').datagrid('getSelected');
 if(row)
{
 $.messager.confirm('Warning', 'Are you sure of the the act', function(r){ if (r){    $.post('delete/'+row.colName,{},function(data){ $('#dgentityform').datagrid('reload');});
 
}
});}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function saveentityform(){
 saveForm('#frmentityform',url,'#dlgentityform','#dgentityform');
}