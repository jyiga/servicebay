<div class='col-lg-12'>
	<table id='dgconfigurationSetting' title='Manage configurationSetting' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
	<thead>
			<tr>		
				<th field='id' width='90'>id</th>
				<th field='systemName' width='90'>systemName</th>
				<th field='systemValue' width='90'>systemValue</th>
				<th field='mask' width='90'>mask</th>
			</tr>
		</thead>
	</table>
	<div id='toolbar'>
		<a href="#" class="btn btn-primary btn-sm" onclick="newconfigurationSetting()"><i class="fa fa-plus-circle"></i>Add</a>
		<a href="#" class="btn btn-link" onclick="editconfigurationSetting()"><i class="fa fa-pencil"></i>Edit</a>
		<a href="#" class="btn btn-link" onclick="deleteconfigurationSetting()"><i class="fa fa-times-circle"></i>Delete</a>
	</div></div>