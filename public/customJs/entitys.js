var entityId

function newentity () {
  $('#dlgentity').dialog('open').dialog('setTitle', 'Enter entity ')
  $('#frmentity').form('clear')
  url = 'add'
}

function editentity () {
  var row = $('#dgentity').datagrid('getSelected')
  if (row) {
    $('#dlgentity').dialog('open').dialog('setTitle', 'Edit entity')
    $('#frmentity').form('load', row)
    url = 'edit/' + row.id
  } else {
    $.messager.show({ title: 'Warning!', msg: 'Please select a item to to edit' }) 
}
}

function deleteentity () {
  var row = $('#dgentity').datagrid('getSelected')
  if (row) {
    $.messager.confirm('Warning', 'Are you sure of the the act', function (r) {
      if (r) {
        $.post('delete/' + row.id, {}, function (data) { $('#dgentity').datagrid('reload') })
      }
    })
 }
  else {
    $.messager.show({ title: 'Warning!', msg: 'Please select a item to to edit' }) 
}
}

function saveentity () {
  saveForm('#frmentity', url, '#dlgentity', '#dgentity')
}

function addFieldEntity () {
  var row = $('#dgentity').datagrid('getSelected')
  if (row) {
    $('#dlgentityfield').dialog('open').dialog('setTitle', 'Manage Table Properties')
    // $('#frmentity').form('load',row);
    entityId = row.id
    prepareEntityFieldDatagrid(entityId)
    url = 'syncTable/' + row.id
  } else {
    $.messager.show({ title: 'Warning!', msg: 'Please select a item to to edit' }) 
}
}

function prepareEntityFieldDatagrid (id) {
  $('#dgentityfield').edatagrid({
    url: '../entityfields/viewall/' + id,
    saveUrl: '../entityfields/add/' + id,
    updateUrl: '../entityfields/edit/' + id,
    destroyUrl: '../entityfields/delete/',
    onSuccess: function () {
      $('#dgentityfield').datagrid('reload');
  },
  })
}
function syncEntity ()
{
  $.post('syncEntity/' + entityId, {}, function (data) {
    $('#dlgentityfield').dialog('close')
    $('#dgentity').datagrid('reload')
  })
}

function syncEntityTable()
{
  var row = $('#dgentity').datagrid('getSelected')
  if (row) 
  {
    $.post('syncEntity/' + row.id, {}, function (data) {
      //$('#dlgentityfield').dialog('close')
      $('#dgentity').datagrid('reload')
    })

  }else {
    $.messager.show({ title: 'Warning!', msg: 'Please select a item to to edit' }) 
  }
}

function exportTable()
{
  var row = $('#dgentity').datagrid('getSelected')
  if (row) 
  {
    $.post('exportEntity/' + row.id, {}, function (data) {
      //$('#dlgentityfield').dialog('close')
      data=data.replace('../','');
      var iframe = document.createElement("iframe");
      iframe.setAttribute("src", data);
      iframe.setAttribute("style", "display: none");
      document.body.appendChild(iframe);
      $('#dgentity').datagrid('reload')
    })

  }else {
    $.messager.show({ title: 'Warning!', msg: 'Please select a item to to edit' }) 
  }
}

function formatSync(val, row)
{
    
    var diff=parseInt(row.tabfield)-parseInt(row.NsyncNo)
    if(row.tabexist==1 && (diff==0))
    {
        return '<i class="fa fa-check" style="color:green"></i>';
    }else
    {
      return '<i class="fa fa-times" style="color:red"></i>';

    }
}
//exportEntity

//Import Scheme
function importScheme()
{
  $.post('importSchemes',{},function(data){

      $('#dgentity').datagrid('reload')
  })
}
