

 function newoperationlist(){
$('#dlgoperationlist').dialog('open').dialog('setTitle','Enter operationlist ');
$('#frmoperationlist').form('clear');
 url='add'; 
}

 function editoperationlist(){
 var row=$('#dgoperationlist').datagrid('getSelected');
 if(row)
{
 $('#dlgoperationlist').dialog('open').dialog('setTitle','Edit operationlist');
 $('#frmoperationlist').form('load',row); 
 url='edit/'+row.id;
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deleteoperationlist(){
 var row=$('#dgoperationlist').datagrid('getSelected');
 if(row)
{
 $.messager.confirm('Warning', 'Are you sure of the the act', function(r){ if (r){    $.post('delete/'+row.id,{},function(data){ $('#dgoperationlist').datagrid('reload');});
 
}
});}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function saveoperationlist(){
 saveForm('#frmoperationlist',url,'#dlgoperationlist','#dgoperationlist');
}

function updateAmount()
{
    var row=$('#dgoperationlist').datagrid('getSelected');
    if(row)
    {
        $('#dlgoperationcost').dialog('open').dialog('setTitle','Edit operationlist');
        $('#frmoperationcost').form('load',row); 
        url='../operationcosts/add/'+row.id;
    }
    else{
        $.messager.show({title:'Warning!',msg:'Please select a item to to edit'});
    } 

}

function saveoperationcost(){
    saveForm('#frmoperationcost',url,'#dlgoperationcost','#dgoperationlist');
}