
var id
function newguitoolbox () {
  $('#dlgguitoolbox').dialog('open').dialog('setTitle', 'Enter Gui Toolbox ')
$('#frmguitoolbox').form('clear')
 url = 'add/' + id 
}

function editguitoolbox () {
  var row = $('#dgguitoolbox').datagrid('getSelected')
 if (row)   {

    $('#dlgguitoolbox').dialog('open').dialog('setTitle', 'Edit guitoolbox')
 $('#frmguitoolbox').form('load', row) 
 loadattKeyDatagrid(row.id)
 url = 'edit/' + row.id
} else {
    $.messager.show({ title: 'Warning!', msg: 'Please select a item to to edit' })}
}

function deleteguitoolbox () {
  var row = $('#dgguitoolbox').datagrid('getSelected')
 if (row)   {
    $.messager.confirm('Warning', 'Are you sure of the the act', function (r) {
 if (r) {
 $.post('delete/' + row.id, {}, function (data) { $('#dgguitoolbox').datagrid('reload')})
 
}
    })}
  else {
    $.messager.show({ title: 'Warning!', msg: 'Please select a item to to edit' })}
}

function saveguitoolbox () {
  saveForm('#frmguitoolbox', url, '#dlgguitoolbox', '#dgguitoolbox')
}

function loadId () {
  $.post('getId', {}, function (data) {
      id=parseInt(data)
      closeBar();
      newguitoolbox ();
      loadattKeyDatagrid(id)

    return parseInt(data)
        
   })
}

function getId()
{
    return new Promise(resolve=>{
        setTimeout(()=>{
            
            const idv=loadId ();

            resolve(idv);
        },2000)
    })
}

async function loadDialog(){
    loadingBar('Contacting server. Please wait');
    const result= await getId()
}

//reload the datagrids
function loadattKeyDatagrid(idval)
{
    $('#dgattkey').datagrid('load',{'id':idval});
    //$('#dgattkeyval').datagrid('load',{'id':idval});
    prepareattkeyValDatagrid (idval)
}

function reloadGrid()
{
    $('#dgattkey').datagrid('reload')
    $('#dgattkeyval').datagrid('reload')
}

function prepareattkeyValDatagrid (id) {
    $('#dgattkeyval').edatagrid({
      url: '../attkeyvals/viewall/' + id,
      saveUrl: '../attkeyvals/add/' + id,
      updateUrl: '../attkeyvals/edit/' + id,
      destroyUrl: '../attkeyvals/delete/',
      onSuccess: function () {
        $('#dgattkeyval').datagrid('reload');
    },onDestroy:function()
    {
        $('#dgattkeyval').datagrid('reload');
        reloadGrid();
    }
    })
  }

  function addAttrubite()
  {
      const idval=''
      var rows=$('#dgattkey').datagrid('getSelections');
      $.ajax({
        type: "POST",
        url: "../attkeyvals/add/"+id,
        // The key needs to match your method's input parameter (case-sensitive).
        data: JSON.stringify({ row: rows }),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function(data){
            reloadGrid();
        },//alert(data);},
        failure: function(errMsg) {
            //alert(errMsg);
        }
    });

  }

  function closingTag()
  {
      var x=$('#openTag').val();
        var start=x.substring(0,1)
        var ending=x.substring(1,(x.length));
        //alert(start+"/"+ending);
        $('#closeTag').val(start+"/"+ending)
  }

  function formatterTags(value,row,index)
  {
      //alert(value)
      var vals=row.openTag;
      //var str=val;
      //var newVal=str.replace('<','&lt; ');
      //newVal=newVal.replace('/>',' &frasl; &gt;');
      return '('+vals+')';
  }

