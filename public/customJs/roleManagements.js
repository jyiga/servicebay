$(function () {
  // var htmlString = '<div class="progress"><div class="progress-bar progress-bar-success" data-transitiongoal="95"></div></div>';
  $('#userrole').html('<div class="progress"><div class="progress-bar progress-bar-success" data-transitiongoal="95"></div></div>')
  $.post('viewall', {}, function (data) {
    $('#userrole').html(data)
  })
})
function rollIn (x, y) {
  if ($('#' + x).is(':checked')) {
    $.messager.progress({ title: 'Progress', msg: 'Please wait activity will take alot while.........' })
    var str = y.split('*')
    $.post('add', { roleId: str[1], userId: str[0] }, function (data) {
      $.messager.progress('close')
    })
  } else {
    $.messager.progress({ title: 'Progress', msg: 'Please wait activity will take alot while.........' })
    	var str = y.split('*')
    	$.post('reverse', { roleId: str[1], userId: str[0] }, function (data) {
    		$.messager.progress('close')
    	})
  }
}
function newroleManagement () {
  $('#dlgroleManagement').dialog('open').dialog('setTitle', 'Enter roleManagement ')
  $('#frmroleManagement').form('clear')
  url = 'controller/roleManagementController.php?action=add'
}

function editroleManagement () {
  var row = $('#dgroleManagement').datagrid('getSelected')
  if (row) {
    $('#dlgroleManagement').dialog('open').dialog('setTitle', 'Edit roleManagement')
    $('#frmroleManagement').form('load', row)
    url = 'controller/roleManagementController.php?action=edit&id=' + row.id
  } else {
    $.messager.show({ title: 'Warning!', msg: 'Please select a item to to edit' }) 
}
}

function deleteroleManagement () {
  var row = $('#dgroleManagement').datagrid('getSelected')
  if (row) {
    $.post('controller/roleManagementController.php?action=delete&id=' + row.id, {}, function (data) { $('#dgroleManagement').datagrid('reload') })
  } else {
    $.messager.show({ title: 'Warning!', msg: 'Please select a item to to edit' }) 
}
}

function saveroleManagement () {
  saveForm('#frmroleManagement', url, '#dlgroleManagement', '#dgroleManagement')
}

function loadModule (id) {
  $('#userrole').html('<div class="progress"><div class="progress-bar progress-bar-success" data-transitiongoal="95"></div></div>')
  $.post('viewall', { 'module': id }, function (data) {
    $('#userrole').html(data)
  })
}
