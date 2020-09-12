<div class='col-lg-12'>
	<table id='dgoptransaction' title='Manage optransaction' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>
                        	
			<tr>
				<th field='id' width='90'>Id</th>
				<th field='creationDate' width='90'>Creation Date</th>
				<th field='userId' width='90'>User</th>
				<th field='transType' width='90'>Trans Type</th>
				<th field='operationId' width='90'>Operation</th>
				<th field='amount' width='90'>Amount</th>
			</tr>
		</thead>
	</table>
	<div id='toolbar' style:'padding:15px;'>
		<a href="#" class="btn btn-primary btn-sm" onclick="newoptransaction()"><i class="fa fa-plus-circle"></i>Add</a>
		<a href="#" class="btn btn-link" onclick="editoptransaction()"><i class="fa fa-pencil"></i>Edit</a>
		<a href="#" class="btn btn-link" onclick="deleteoptransaction()"><i class="fa fa-times-circle"></i>Delete</a>
	</div>
</div>