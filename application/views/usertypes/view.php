<div class='col-lg-12'>
	<table id='dgusertype' title='Manage User types' class='easyui-treegrid' data-options="url:'viewall',lines: true,idField: 'id',treeField: 'userTypeName'" style='height:auto; width:100%; '  pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>        	
			<tr>
				<th field='userTypeName' width='90'>User Type</th>
			</tr>
		</thead>
	</table>
	<div id='toolbar'>
		<a href="#" class="btn btn-primary btn-sm" onclick="newusertype()"><i class="fa fa-plus-circle"></i>Add</a>
		<a href="#" class="btn btn-link" onclick="editusertype()"><i class="fa fa-pencil"></i>Edit</a>
		<a href="#" class="btn btn-link" onclick="deleteusertype()"><i class="fa fa-times-circle"></i>Delete</a>
		<a href="#" class="btn btn-primary btn-sm" onclick="addRoles()"><i class="fa fa-plus-circle"></i>Add Roles</a>
	</div>
</div>