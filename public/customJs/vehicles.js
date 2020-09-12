

 function newvehicle(){
$('#dlgvehicle').dialog('open').dialog('setTitle','Enter vehicle ');
$('#frmvehicle').form('clear');
 url='add'; 
}

 function editvehicle(){
 var row=$('#dgvehicle').datagrid('getSelected');
 if(row)
{
 $('#dlgvehicle').dialog('open').dialog('setTitle','Edit vehicle');
 $('#frmvehicle').form('load',row); 
 url='edit/'+row.vehiclePlate;
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deletevehicle(){
 var row=$('#dgvehicle').datagrid('getSelected');
 if(row)
{
 $.messager.confirm('Warning', 'Are you sure of the the act', function(r){ if (r){    $.post('delete/'+row.vehiclePlate,{},function(data){ $('#dgvehicle').datagrid('reload');});
 
}
});}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function savevehicle(){
 saveForm('#frmvehicle',url,'#dlgvehicle','#dgvehicle');
}