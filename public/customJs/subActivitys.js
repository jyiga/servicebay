function newsubActivity(){
$('#dlgsubActivity').dialog('open').dialog('setTitle','Enter subActivity ');
$('#frmsubActivity').form('clear');
 url='add';
}

 function editsubActivity(){
       var row=$('#dgsubActivity').datagrid('getSelected');
       if(row)
      {
         $('#dlgsubActivity').dialog('open').dialog('setTitle','Edit subActivity');
         $('#frmsubActivity').form('load',row);
         url='edit/'+row.id;
      }
       else
       {
          $.messager.show({title:'Warning!',msg:'Please select a item to to edit'});
       }
}

 function deletesubActivity()
 {
   var row=$('#dgsubActivity').datagrid('getSelected');
   if(row)
   {
     $.post('delete/'+row.id,{},function(data){ $('#dgsubActivity').datagrid('reload');});
   }
   else
   {
     $.messager.show({title:'Warning!',msg:'Please select a item to to edit'});
   }
}

 function savesubActivity()
 {
 saveForm('#frmsubActivity',url,'#dlgsubActivity','#dgsubActivity');
 }
function getListOrderNumber(x)
{
    $.post("getListOrderNumber/"+x,{},function(data){
        $("#orderIndex").val(data);
        
    })
}