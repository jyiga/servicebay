
function newcfs () {
  $('#dlgcfs').dialog('open').dialog('setTitle', 'Enter cfs ')
  $('#frmcfs').form('clear')
  url = 'add'
}

function editcfs () {
  var row = $('#dgcfs').datagrid('getSelected')
  if (row) {
    $('#dlgcfs').dialog('open').dialog('setTitle', 'Edit cfs')
    $('#frmcfs').form('load', row)
    url = 'edit/' + row.id
  } else {
    $.messager.show({ title: 'Warning!', msg: 'Please select a item to to edit' })
  }
}

function deletecfs () {
  var row = $('#dgcfs').datagrid('getSelected')
  if (row) {
    $.messager.confirm('Warning', 'Are you sure of the the act', function (r) {
      if (r) {
        $.post('delete/' + row.id, {}, function (data) { $('#dgcfs').datagrid('reload') })
      }
    })
  } else {
    $.messager.show({ title: 'Warning!', msg: 'Please select a item to to edit' })
  }
}

function savecfs () {
  saveForm('#frmcfs', url, '#dlgcfs', '#dgcfs')
}

function addCart (x) {
  // $.messager.progress('open');
  $.post('../../customerorders/add/' + x, {}, function (data) {
    var val = parseInt(data)
    $('#cartNo').html('(' + val + ')')
    var r = confirm('Would like to check it out this item ?')
    if (r == true) {
      window.location.replace('../../cfs/cart/1')
      //
    }

    // $.messager.progress('close');
    // change the new on the chart image
  })
}

function openModelNow ()
{
  $('#exampleModal').modal('toggle')
}
