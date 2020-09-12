

 function newoperationcost(){
$('#dlgoperationcost').dialog('open').dialog('setTitle','Enter operationcost ');
$('#frmoperationcost').form('clear');
 url='add'; 
}

 function editoperationcost(){
 var row=$('#dgoperationcost').datagrid('getSelected');
 if(row)
{
 $('#dlgoperationcost').dialog('open').dialog('setTitle','Edit operationcost');
 $('#frmoperationcost').form('load',row); 
 url='edit/'+row.id;
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deleteoperationcost(){
 var row=$('#dgoperationcost').datagrid('getSelected');
 if(row)
{
 $.messager.confirm('Warning', 'Are you sure of the the act', function(r){ if (r){    $.post('delete/'+row.id,{},function(data){ $('#dgoperationcost').datagrid('reload');});
 
}
});}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function saveoperationcost(){
 saveForm('#frmoperationcost',url,'#dlgoperationcost','#dgoperationcost');
}