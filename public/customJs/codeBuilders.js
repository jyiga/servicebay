
var urlStatic;
function loadEditable(tableName) {

    var id = tableName;
    //prepare_fuelOrder();
    $('#dgentityform').edatagrid({
        url: '../entityforms/viewall/' + id,
        saveUrl: '../entityforms/add/' + id,
        updateUrl: '../entityforms/edit/' + id,
        destroyUrl: '../entityforms/delete/',
        onSuccess: function () {
            $('#dgentityform').datagrid('reload');
        },
       //onAdd: function (index, row) {


            //alert($('#headerId').combobox('getValue'));
           // var heading_id = $('#headerId').combobox('getValue') !== '' && $('#headerId').combobox('getValue') !== null ? $('#headerId').combobox('getValue') : '';

           // set_values(index);


            //alert(heading_id);
        //}
    });
 }

 function entryPoint(tableName)
 {
     $.post('../entityforms/addCols/'+tableName,{},function(data){
        loadEditable(tableName);
        //var result;
     })

 }

 function saveCodeBuilder()
 {
    saveFormNoDialog('#frmsubActivity', 'add');
    $('#frmsubActivity').form('clear');
    $('#dgentityform').datagrid('load','../entityforms/viewall/0');
 }

 function addStaticList()
 {
    var row=$('#dgentityform').datagrid('getSelected');
    if(row)
   {
     //find selected entity
    $('#dlglisthandle').dialog('open').dialog('setTitle','Select the Static List to use ');

        urlStatic='../entityforms/addListToEntityField/'+row.colName+'/';
        $('#searchIn').val('');
        $('#dglisthandle').datagrid('reload');
    }else{
    $.messager.show({title:'Warning!',msg:'A Field to add list'});
    } 
 }
 function addListInfo(){
    var row=$('#dglisthandle').datagrid('getSelected');
    if(row)
    {
        $.post(urlStatic+row.listName,{},function(data){
            var response=JSON.parse(data)
            //alert(response.success)
            if("success" in response)
            {
                //alert(response.success)
                $('#dglisthandle').datagrid('reload')
                $('#dlglisthandle').dialog('close')
                $('#dgentityform').datagrid('reload');
                $('#searchIn').val('')
            }else{
                $.messager.alert("Warning",response.message)
                $('#searchIn').val('')
            }

        })

    }else{
    $.messager.show({title:'Warning!',msg:''});
    } 
 }
 function findList(val)
 {
    $('#dglisthandle').datagrid('reload',{search:val});
 }