

 function newuseroftype(){
$('#dlguseroftype').dialog('open').dialog('setTitle','Enter useroftype ');
$('#frmuseroftype').form('clear');
 url='add'; 
}

 function edituseroftype(){
 var row=$('#dguseroftype').datagrid('getSelected');
 if(row)
{
 $('#dlguseroftype').dialog('open').dialog('setTitle','Edit useroftype');
 $('#frmuseroftype').form('load',row); 
 url='edit/'+row.userId;
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deleteuseroftype(){
 var row=$('#dguseroftype').datagrid('getSelected');
 if(row)
{
 $.messager.confirm('Warning', 'Are you sure of the the act', function(r){ if (r){    $.post('delete/'+row.userId,{},function(data){ $('#dguseroftype').datagrid('reload');});
 
}
});}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function saveuseroftype(){
 saveForm('#frmuseroftype',url,'#dlguseroftype','#dguseroftype');
}