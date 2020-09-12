

 function newreceiptcopy(){
$('#dlgreceiptcopy').dialog('open').dialog('setTitle','Enter receiptcopy ');
$('#frmreceiptcopy').form('clear');
 url='add'; 
}

 function editreceiptcopy(){
 var row=$('#dgreceiptcopy').datagrid('getSelected');
 if(row)
{
 $('#dlgreceiptcopy').dialog('open').dialog('setTitle','Edit receiptcopy');
 $('#frmreceiptcopy').form('load',row); 
 url='edit/'+row.id;
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deletereceiptcopy(){
 var row=$('#dgreceiptcopy').datagrid('getSelected');
 if(row)
{
 $.messager.confirm('Warning', 'Are you sure of the the act', function(r){ if (r){    $.post('delete/'+row.id,{},function(data){ $('#dgreceiptcopy').datagrid('reload');});
 
}
});}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function savereceiptcopy(){
 saveForm('#frmreceiptcopy',url,'#dlgreceiptcopy','#dgreceiptcopy');
}