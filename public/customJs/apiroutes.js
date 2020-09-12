

 function newapiroute(){
$('#dlgapiroute').dialog('open').dialog('setTitle','Enter apiroute ');
$('#frmapiroute').form('clear');
 url='add'; 
}

 function editapiroute(){
 var row=$('#dgapiroute').datagrid('getSelected');
 if(row)
{
 $('#dlgapiroute').dialog('open').dialog('setTitle','Edit apiroute');
 $('#frmapiroute').form('load',row); 
 url='edit/'+row.id;
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deleteapiroute(){
 var row=$('#dgapiroute').datagrid('getSelected');
 if(row)
{
 $.messager.confirm('Warning', 'Are you sure of the the act', function(r){ if (r){    $.post('delete/'+row.id,{},function(data){ $('#dgapiroute').datagrid('reload');});
 
}
});}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function saveapiroute(){
 saveForm('#frmapiroute',url,'#dlgapiroute','#dgapiroute');
}