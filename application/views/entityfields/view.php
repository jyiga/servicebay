<div class='col-lg-12'>
	<table id='dgentityfield' title='Manage entityfield' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>        	
			<tr>
				<th field='id' width='90'>id</th>
				<th field='fieldName' width='90'>Field Name</th>
				<th field='fieldType' width='90'>Field Type</th>
				<th field='fieldLength' width='90'>Length</th>
				<th field='fieldConstraint' width='90'>Constraint</th>
				<th field='canBeNull' width='90'>Null</th>
				<th field='entityId' width='90'>Entity Name</th>
			</tr>
		</thead>
	</table>
	<div id='toolbar' style:'padding:15px;'>
		<a href="#" class="btn btn-primary btn-sm" onclick="newentityfield()"><i class="fa fa-plus-circle"></i>Add</a>
		<a href="#" class="btn btn-link" onclick="editentityfield()"><i class="fa fa-pencil"></i>Edit</a>
		<a href="#" class="btn btn-link" onclick="deleteentityfield()"><i class="fa fa-times-circle"></i>Delete</a>
	</div>
</div>