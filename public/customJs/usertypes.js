var userTypeId = null
function newusertype () {
  $('#dlgusertype').dialog('open').dialog('setTitle', 'Enter usertype ')
  $('#frmusertype').form('clear')
  url = 'add'
}

function editusertype () {
  var row = $('#dgusertype').datagrid('getSelected')
  if (row) {
    $('#dlgusertype').dialog('open').dialog('setTitle', 'Edit usertype')
    $('#frmusertype').form('load', row)
    url = 'edit/' + row.id
  } else {
    $.messager.show({ title: 'Warning!', msg: 'Please select a item to to edit' })
  }
}

function deleteusertype () {
  var row = $('#dgusertype').datagrid('getSelected')
  if (row) {
    $.messager.confirm('Warning', 'Are you sure of the the act', function (r) {
      if (r) {
        $.post('delete/' + row.id, {}, function (data) { $('#dgusertype').datagrid('reload') })
      }
    })
  } else {
    $.messager.show({ title: 'Warning!', msg: 'Please select a item to to edit' })
  }
}

function saveusertype () {
  saveForm('#frmusertype', url, '#dlgusertype', '#dgusertype')
}

function addRoles () {
  var row = $('#dgusertype').datagrid('getSelected')
  if (row) {
    $('#dlgroles').dialog('open').dialog('setTitle', 'Assign Roles to Group.')
    userTypeId = row.id
  } else {
    $.messager.show({ title: 'Warning!', msg: 'Please select a item to to edit' })
  }
}

function insertRole () {
  var id = ''
  var rows = $('#dgsubActivity').datagrid('getSelections')
  if (rows.length == 0) {
    $.messager.show({ title: 'Help', msg: 'Select at list one row' })
  } else {
    for (var i = 0; i < rows.length; i++) {
      if (i == 0) {
        id = rows[i].id
      } else {
        id = id + '-' + (rows[i].id)
      }
    }
  }

  $.post('../usertyperoles/add/' + userTypeId, { id: id }, function (data) {
    alert('Done')
    $('#dgusertype').datagrid('reload')
    $('#dlgroles').dialog('close')
  })
}
