

 function newuserapikey(){
$('#dlguserapikey').dialog('open').dialog('setTitle','Enter userapikey ');
$('#frmuserapikey').form('clear');
 url='add'; 
}

 function edituserapikey(){
 var row=$('#dguserapikey').datagrid('getSelected');
 if(row)
{
 $('#dlguserapikey').dialog('open').dialog('setTitle','Edit userapikey');
 $('#frmuserapikey').form('load',row); 
 url='edit/'+row.id;
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deleteuserapikey(){
 var row=$('#dguserapikey').datagrid('getSelected');
 if(row)
{
 $.messager.confirm('Warning', 'Are you sure of the the act', function(r){ if (r){    $.post('delete/'+row.id,{},function(data){ $('#dguserapikey').datagrid('reload');});
 
}
});}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function saveuserapikey(){
 saveForm('#frmuserapikey',url,'#dlguserapikey','#dguserapikey');
}