

 function newuserpge(){
$('#dlguserpge').dialog('open').dialog('setTitle','Enter userpge ');
$('#frmuserpge').form('clear');
 url='add'; 
}

 function edituserpge(){
 var row=$('#dguserpge').datagrid('getSelected');
 if(row)
{
 $('#dlguserpge').dialog('open').dialog('setTitle','Edit userpge');
 $('#frmuserpge').form('load',row); 
 url='edit/'+row.id;
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deleteuserpge(){
 var row=$('#dguserpge').datagrid('getSelected');
 if(row)
{
 $.messager.confirm('Warning', 'Are you sure of the the act', function(r){ if (r){    $.post('delete/'+row.id,{},function(data){ $('#dguserpge').datagrid('reload');});
 
}
});}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function saveuserpge(){
 saveForm('#frmuserpge',url,'#dlguserpge','#dguserpge');
}