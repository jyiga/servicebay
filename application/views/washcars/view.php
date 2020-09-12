<div class='col-lg-12'>
	<table id='dgwashcar' title='Manage washcar' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>
                        	
			<tr>
				<th field='id' width='90'>Id</th>
				<th field='vehiclePlate' width='90'>Vehicle Plate</th>
				<th field='optransactionId' width='90'>Optransaction</th>
			</tr>
		</thead>
	</table>
	<div id='toolbar' style:'padding:15px;'>
		<a href="#" class="btn btn-primary btn-sm" onclick="newwashcar()"><i class="fa fa-plus-circle"></i>Add</a>
		<a href="#" class="btn btn-link" onclick="editwashcar()"><i class="fa fa-pencil"></i>Edit</a>
		<a href="#" class="btn btn-link" onclick="deletewashcar()"><i class="fa fa-times-circle"></i>Delete</a>
	</div>
</div>