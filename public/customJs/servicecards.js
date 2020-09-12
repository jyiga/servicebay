

 function newservicecard(){
$('#dlgservicecard').dialog('open').dialog('setTitle','Enter servicecard ');
$('#frmservicecard').form('clear');
 url='add'; 
}

 function editservicecard(){
 var row=$('#dgservicecard').datagrid('getSelected');
 if(row)
{
 $('#dlgservicecard').dialog('open').dialog('setTitle','Edit servicecard');
 $('#frmservicecard').form('load',row); 
 url='edit/'+row.id;
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deleteservicecard(){
 var row=$('#dgservicecard').datagrid('getSelected');
 if(row)
{
 $.messager.confirm('Warning', 'Are you sure of the the act', function(r){ if (r){    $.post('delete/'+row.id,{},function(data){ $('#dgservicecard').datagrid('reload');});
 
}
});}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function saveservicecard(){
 saveForm('#frmservicecard',url,'#dlgservicecard','#dgservicecard');
}