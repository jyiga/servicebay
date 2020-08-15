<div class='col-lg-12'>
	<table id='dgtoolbox' title='Manage toolbox' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>
                        	
			<tr>				<th field='id' width='90'>id</th>
				<th field='toolboxName' width='90'>toolboxName</th>

			</tr></thead>
		</table>
	<div id='toolbar'><a href="#" class="btn btn-primary btn-sm" onclick="newtoolbox()"><i class="fa fa-plus-circle"></i>Add</a><a href="#" class="btn btn-link" onclick="edittoolbox()"><i class="fa fa-pencil"></i>Edit</a>
                        <a href="#" class="btn btn-link" onclick="deletetoolbox()"><i class="fa fa-times-circle"></i>Delete</a></div></div>