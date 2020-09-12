

 function newoptransaction(){
$('#dlgoptransaction').dialog('open').dialog('setTitle','Enter optransaction ');
$('#frmoptransaction').form('clear');
 url='add'; 
}

 function editoptransaction(){
 var row=$('#dgoptransaction').datagrid('getSelected');
 if(row)
{
 $('#dlgoptransaction').dialog('open').dialog('setTitle','Edit optransaction');
 $('#frmoptransaction').form('load',row); 
 url='edit/'+row.id;
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deleteoptransaction(){
 var row=$('#dgoptransaction').datagrid('getSelected');
 if(row)
{
 $.messager.confirm('Warning', 'Are you sure of the the act', function(r){ if (r){    $.post('delete/'+row.id,{},function(data){ $('#dgoptransaction').datagrid('reload');});
 
}
});}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function saveoptransaction(){
 saveForm('#frmoptransaction',url,'#dlgoptransaction','#dgoptransaction');
}