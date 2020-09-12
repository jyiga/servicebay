

 function newparkinglist(){
$('#dlgparkinglist').dialog('open').dialog('setTitle','Enter parkinglist ');
$('#frmparkinglist').form('clear');
 url='add'; 
}

 function editparkinglist(){
 var row=$('#dgparkinglist').datagrid('getSelected');
 if(row)
{
 $('#dlgparkinglist').dialog('open').dialog('setTitle','Edit parkinglist');
 $('#frmparkinglist').form('load',row); 
 url='edit/'+row.id;
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deleteparkinglist(){
 var row=$('#dgparkinglist').datagrid('getSelected');
 if(row)
{
 $.messager.confirm('Warning', 'Are you sure of the the act', function(r){ if (r){    $.post('delete/'+row.id,{},function(data){ $('#dgparkinglist').datagrid('reload');});
 
}
});}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function saveparkinglist(){
 saveForm('#frmparkinglist',url,'#dlgparkinglist','#dgparkinglist');
}