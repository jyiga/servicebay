<div class='col-lg-12'>
	<table id='dgoperationcost' title='Manage operationcost' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>
                        	
			<tr>
				<th field='id' width='90'>Id</th>
				<th field='amount' width='90'>Amount</th>
				<th field='isActive' width='90'>Is Active</th>
				<th field='operationId' width='90'>Operation</th>
			</tr>
		</thead>
	</table>
	<div id='toolbar' style:'padding:15px;'>
		<a href="#" class="btn btn-primary btn-sm" onclick="newoperationcost()"><i class="fa fa-plus-circle"></i>Add</a>
		<a href="#" class="btn btn-link" onclick="editoperationcost()"><i class="fa fa-pencil"></i>Edit</a>
		<a href="#" class="btn btn-link" onclick="deleteoperationcost()"><i class="fa fa-times-circle"></i>Delete</a>
	</div>
</div>