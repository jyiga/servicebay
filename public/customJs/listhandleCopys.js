

 function newlisthandleCopy(){
$('#dlglisthandleCopy').dialog('open').dialog('setTitle','Enter listhandleCopy ');
$('#frmlisthandleCopy').form('clear');
 url='add'; 
}

 function editlisthandleCopy(){
 var row=$('#dglisthandleCopy').datagrid('getSelected');
 if(row)
{
 $('#dlglisthandleCopy').dialog('open').dialog('setTitle','Edit listhandleCopy');
 $('#frmlisthandleCopy').form('load',row); 
 url='edit/'+row.id;
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deletelisthandleCopy(){
 var row=$('#dglisthandleCopy').datagrid('getSelected');
 if(row)
{
 $.messager.confirm('Warning', 'Are you sure of the the act', function(r){ if (r){    $.post('delete/'+row.id,{},function(data){ $('#dglisthandleCopy').datagrid('reload');});
 
}
});}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function savelisthandleCopy(){
 saveForm('#frmlisthandleCopy',url,'#dlglisthandleCopy','#dglisthandleCopy');
}