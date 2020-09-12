

 function newroutineactive(){
$('#dlgroutineactive').dialog('open').dialog('setTitle','Enter routineactive ');
$('#frmroutineactive').form('clear');
 url='add'; 
}

 function editroutineactive(){
 var row=$('#dgroutineactive').datagrid('getSelected');
 if(row)
{
 $('#dlgroutineactive').dialog('open').dialog('setTitle','Edit routineactive');
 $('#frmroutineactive').form('load',row); 
 url='edit/'+row.id;
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deleteroutineactive(){
 var row=$('#dgroutineactive').datagrid('getSelected');
 if(row)
{
 $.messager.confirm('Warning', 'Are you sure of the the act', function(r){ if (r){    $.post('delete/'+row.id,{},function(data){ $('#dgroutineactive').datagrid('reload');});
 
}
});}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function saveroutineactive(){
 saveForm('#frmroutineactive',url,'#dlgroutineactive','#dgroutineactive');
}