<div class='col-lg-12'>
	<table id='dgroutineactive' title='Manage routineactive' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>
                        	
			<tr>
				<th field='id' width='90'>Id</th>
				<th field='action' width='90'>Action</th>
			</tr>
		</thead>
	</table>
	<div id='toolbar' style='padding:15px;'>
		<a href="#" class="btn btn-primary btn-sm" onclick="newroutineactive()"><i class="fa fa-plus-circle"></i>Add</a>
		<a href="#" class="btn btn-link" onclick="editroutineactive()"><i class="fa fa-pencil"></i>Edit</a>
		<a href="#" class="btn btn-link" onclick="deleteroutineactive()"><i class="fa fa-times-circle"></i>Delete</a>
	</div>
</div>