

 function newusertyperole(){
$('#dlgusertyperole').dialog('open').dialog('setTitle','Enter usertyperole ');
$('#frmusertyperole').form('clear');
 url='add'; 
}

 function editusertyperole(){
 var row=$('#dgusertyperole').datagrid('getSelected');
 if(row)
{
 $('#dlgusertyperole').dialog('open').dialog('setTitle','Edit usertyperole');
 $('#frmusertyperole').form('load',row); 
 url='edit/'+row.id;
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deleteusertyperole(){
 var row=$('#dgusertyperole').datagrid('getSelected');
 if(row)
{
 $.messager.confirm('Warning', 'Are you sure of the the act', function(r){ if (r){    $.post('delete/'+row.id,{},function(data){ $('#dgusertyperole').datagrid('reload');});
 
}
});}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function saveusertyperole(){
 saveForm('#frmusertyperole',url,'#dlgusertyperole','#dgusertyperole');
}