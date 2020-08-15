

 function newconfigurationSetting(){
$('#dlgconfigurationSetting').dialog('open').dialog('setTitle','Enter configurationSetting ');
$('#frmconfigurationSetting').form('clear');
 url='add'; 
}

 function editconfigurationSetting(){
 var row=$('#dgconfigurationSetting').datagrid('getSelected');
 if(row)
{
 $('#dlgconfigurationSetting').dialog('open').dialog('setTitle','Edit configurationSetting');
 $('#frmconfigurationSetting').form('load',row); 
 url='edit/'+row.id;
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deleteconfigurationSetting(){
 var row=$('#dgconfigurationSetting').datagrid('getSelected');
 if(row)
{
 $.messager.confirm('Warning', 'Are you sure of the the act', function(r){ if (r){    $.post('delete/'+row.id,{},function(data){ $('#dgconfigurationSetting').datagrid('reload');});
 
}
});}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function saveconfigurationSetting(){
 saveForm('#frmconfigurationSetting',url,'#dlgconfigurationSetting','#dgconfigurationSetting');
}