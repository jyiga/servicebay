

 function newactivity(){
$('#dlgactivity').dialog('open').dialog('setTitle','Enter activity ');
$('#frmactivity').form('clear');
 url='add';
}

 function editactivity(){
 var row=$('#dgactivity').datagrid('getSelected');
 if(row)
{
 $('#dlgactivity').dialog('open').dialog('setTitle','Edit activity');
 $('#frmactivity').form('load',row); 
 url='edit/'+row.id;
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deleteactivity(){
 var row=$('#dgactivity').datagrid('getSelected');
 if(row)
{
$.post('delete/'+row.id,{},function(data){ $('#dgactivity').datagrid('reload');});
}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function saveactivity(){
 saveForm('#frmactivity',url,'#dlgactivity','#dgactivity');
}

function moveupactivity()
{
    var row=$('#dgactivity').datagrid('getSelected');
 if(row)
{
 
 url='moveup/'+row.id;
    var position=parseInt(row.indexOrder);
    var positionBefore=-1;
    if(position>1)
    {
        positionBefore=position;
        position-=1;
        $.post(url,{positionBefore:positionBefore,position:position},function(data){
            $('#dgactivity').datagrid('reload');
        })



    }


}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

function movedownactivity()
{
    var row=$('#dgactivity').datagrid('getSelected');
    var totalVal=$('#dgactivity').datagrid('getRows').length;
    console.log(totalVal);
 if(row)
{
 
 url='moveup/'+row.id;
    var position=parseInt(row.indexOrder);
    //var totalVal=parseInt(row.totalPages);
    var positionBefore=-1;
    if(position<totalVal)
    {
        positionBefore=position;
        position+=1;
        $.post(url,{positionBefore:positionBefore,position:position},function(data){
            $('#dgactivity').datagrid('reload');
        })



    }


}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}