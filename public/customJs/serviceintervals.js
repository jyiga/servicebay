
var serviceIntervalId=-1;
var urlInterval;
 function newserviceinterval(){
    //getServiceIntervalId();
    $('#dlgserviceinterval').dialog('open').dialog('setTitle','Enter Service Interval ');
    $('#frmserviceinterval').form('clear');
    urlInterval='add/'+serviceIntervalId; 
}

 function editserviceinterval(){
    var row=$('#dgserviceinterval').datagrid('getSelected');
    if(row)
    {
    $('#dlgserviceinterval').dialog('open').dialog('setTitle','Edit serviceinterval');
    $('#frmserviceinterval').form('load',row); 
    urlInterval='edit/'+row.id;
    alert(urlInterval)
    serviceIntervalId=row.id
    //closeBar()
    //alert(serviceIntervalId)
    prepareRoutine(serviceIntervalId)
    //newserviceinterval();

    }
    else{
    $.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function deleteserviceinterval(){
 var row=$('#dgserviceinterval').datagrid('getSelected');
 if(row)
{
 $.messager.confirm('Warning', 'Are you sure of the the act', function(r){ if (r){    $.post('delete/'+row.id,{},function(data){ $('#dgserviceinterval').datagrid('reload');});
 
}
});}
 else{
$.messager.show({title:'Warning!',msg:'Please select a item to to edit'});} 
}

 function saveserviceinterval(){
     alert(urlInterval)
 saveForm('#frmserviceinterval',urlInterval,'#dlgserviceinterval','#dgserviceinterval');
}

function loadRoutine()
{
     var serviceIntervalVal=$('#intervalValue').val()
    $.post('add/'+serviceIntervalId,{intervalValue:serviceIntervalVal},function(data){
        var response = JSON.parse(data)
        if('msg' in response)
        {
            $.messager.alert('Error','Some thing want wrong')

        }else{
            $('#dlgroutineactive').dialog('open').dialog('setTitle','Enter Service Interval');
        }
        
    })
    

}

function saveServiceRoutine()
{
    loadingBar('Wait....')
    var ids=''
    var rows = $('#dgroutineactive').datagrid('getSelections');
    //alert('Lenght:'+rows.length)
    for(var i=0;i<rows.length;i++)
    {
        row=rows[i];
        if(i==0)
        {
            ids+=row.id;
        }else{
            ids+= '-'+row.id;
        }
        //ids+=row.id;
        
    }
    $.post('../serviceintervalroutines/add/'+serviceIntervalId,{ids:ids},function(data){
        var response = JSON.parse(data);
        closeBar()
        if('msg' in response){
            $.messager.alert('Error','Some Thing wrong occurred Call Support, <br> '+response.msg)
        }else{
            $('#dlgroutineactive').dialog('close')
            $('#dgserviceintervalroutine').edatagrid('reload')

        }
       // closeBar()
    })

}

function getServiceIntervalId(){
    let dataVal;
    $.post('getAutoId',{},function(data){
        //alert(data)
        dataVal=data
        serviceIntervalId=dataVal
        closeBar()
        alert(serviceIntervalId)
        prepareRoutine(serviceIntervalId)
        newserviceinterval();
        return dataVal
      
    })
    
    

}

function openDialogWithID()
{
    return new Promise(resolve =>{
        setTimeout(()=>{
            let id=getServiceIntervalId()
            resolve(id)
        },2000);
    })
}

async function asyncGetId(){
    loadingBar('Wait');
    const result = await openDialogWithID();
    serviceIntervalId=result;
    
    
    
}



function prepareRoutine(id)
{
    var queryString='../serviceintervalroutines/'
    $('#dgserviceintervalroutine').edatagrid({
        url:queryString+'viewall/'+id,
        saveUrl:queryString+'add/'+id,
        updateUrl:queryString+'edit/'+id,
        destroyUrl:queryString+'delete',
        onSuccess:function(index,row){
            $('#dgserviceintervalroutine').edatagrid('reload')
        },
        onDestroy:function(index,row){
            $('#dgserviceintervalroutine').edatagrid('reload')
        }
    })

}


