

 function newserviceintervalroutine(){
$('#dlgserviceintervalroutine').dialog('open').dialog('setTitle','Enter serviceintervalroutine ');
$('#frmserviceintervalroutine').form('clear');
 url='add'; 
}

 function editserviceintervalroutine(){
 var row=$('#dgserviceintervalroutine').datagrid('getSelected');
 if(row)
{
 $('#dlgserviceintervalroutine').dialog('open').dialog('setTitle','Edit serviceintervalroutine');
 $('#frmserviceintervalroutine').form('load',row); 
 url='edit/'+row.id;
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deleteserviceintervalroutine(){
 var row=$('#dgserviceintervalroutine').datagrid('getSelected');
 if(row)
{
 $.messager.confirm('Warning', 'Are you sure of the the act', function(r){ if (r){    $.post('delete/'+row.id,{},function(data){ $('#dgserviceintervalroutine').datagrid('reload');});
 
}
});}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function saveserviceintervalroutine(){
 saveForm('#frmserviceintervalroutine',url,'#dlgserviceintervalroutine','#dgserviceintervalroutine');
}