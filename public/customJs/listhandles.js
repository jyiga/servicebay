

 function newlisthandle(){
$('#dlglisthandle').dialog('open').dialog('setTitle','Enter listhandle ');
$('#frmlisthandle').form('clear');
 url='add'; 
}

 function editlisthandle(){
 var row=$('#dglisthandle').datagrid('getSelected');
 if(row)
{
 $('#dlglisthandle').dialog('open').dialog('setTitle','Edit listhandle');
 $('#frmlisthandle').form('load',row); 
 url='edit/'+row.id;
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deletelisthandle(){
 var row=$('#dglisthandle').datagrid('getSelected');
 if(row)
{
 $.messager.confirm('Warning', 'Are you sure of the the act', function(r){ if (r){    $.post('delete/'+row.id,{},function(data){ $('#dglisthandle').datagrid('reload');});
 
}
});}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function savelisthandle(){
 saveForm('#frmlisthandle',url,'#dlglisthandle','#dglisthandle');
}
//dlglisthandleCopy

function newlisthandleDny(){
    $('#dlglisthandleCopy').dialog('open').dialog('setTitle','Create dynamic List');
    $('#frmlisthandleCopy').form('clear');
     url='add'; 
}

function loadTextVal(tableName){
    
    $('#idVal2').combobox('reload',"../entityfields/viewcombobox/"+tableName)
    $('#textVal2').combobox('reload',"../entityfields/viewcombobox/"+tableName)

}

function savelisthandleCopy()
{
    loadingBar('Save Dynamic List')
    var listName = $('#listName2').combobox('getValue');
    var idVal = $('#idVal2').combobox('getValue');
    var textVal=$('#textVal2').combobox('getValue');
    var isSync=$('#isSync').combobox('getValue');
    $.post(url,{listName:listName,idVal:idVal,textVal:textVal,isSync:isSync},function(data){
        var response = JSON.parse(data);
        
        if("success" in response)
        {
            $('#dlglisthandleCopy').dialog('close');
            $('#dglisthandle').datagrid('reload');
        }else
        {
            $('#dlglisthandleCopy').dialog('close');
            $('#dglisthandle').datagrid('reload');
            $.messager.alert("Warning",response.message)
        }
        closeBar();
    })
}