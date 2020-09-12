<div class='col-lg-12'>
	<table id='dgoperationlist' title='Manage operationlist' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>
                        	
			<tr>
				<th field='id' width='90'>RecordNo</th>
				<th field='operationName' width='90'>Operation Name</th>
				<th field='amount' width='90'>Amount</th>
				<th field='creationDate' width='90'>Creation Date</th>
			</tr>
		</thead>
	</table>
	<div id='toolbar' style='padding:15px;'>
		<a href="#" class="btn btn-primary btn-sm" onclick="newoperationlist()"><i class="fa fa-plus-circle"></i>Add</a>
		<a href="#" class="btn btn-link" onclick="editoperationlist()"><i class="fa fa-pencil"></i>Edit</a>
		<a href="#" class="btn btn-link" onclick="deleteoperationlist()"><i class="fa fa-times-circle"></i>Delete</a>
		<a href="#" class="btn btn-link" onclick="updateAmount()"><i class="fa fa-pencil"></i>Change Cost</a>
	</div>
</div>