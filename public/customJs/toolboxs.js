

 function newtoolbox(){
$('#dlgtoolbox').dialog('open').dialog('setTitle','Enter toolbox ');
$('#frmtoolbox').form('clear');
 url='add'; 
}

 function edittoolbox(){
 var row=$('#dgtoolbox').datagrid('getSelected');
 if(row)
{
 $('#dlgtoolbox').dialog('open').dialog('setTitle','Edit toolbox');
 $('#frmtoolbox').form('load',row); 
 url='edit/'+row.id;
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deletetoolbox(){
 var row=$('#dgtoolbox').datagrid('getSelected');
 if(row)
{
 $.messager.confirm('Warning', 'Are you sure of the the act', function(r){ if (r){    $.post('delete/'+row.id,{},function(data){ $('#dgtoolbox').datagrid('reload');});
 
}
});}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function savetoolbox(){
 saveForm('#frmtoolbox',url,'#dlgtoolbox','#dgtoolbox');
}