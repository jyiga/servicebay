<div class='col-lg-12'>
	<table id='dgservicecard' title='Manage servicecard' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>
                        	
			<tr>
				<th field='id' width='90'>Id</th>
				<th field='CreationDate' width='90'> Creation Date</th>
				<th field='Odometer' width='90'> Odometer</th>
				<th field='ServiceIntervalId' width='90'> Service Interval</th>
				<th field='vehiclePlate' width='90'>Vehicle Plate</th>
				<th field='optransactionId' width='90'>Optransaction ID</th>
			</tr>
		</thead>
	</table>
	<div id='toolbar' style:'padding:15px;'>
		<a href="#" class="btn btn-primary btn-sm" onclick="newservicecard()"><i class="fa fa-plus-circle"></i>Add</a>
		<a href="#" class="btn btn-link" onclick="editservicecard()"><i class="fa fa-pencil"></i>Edit</a>
		<a href="#" class="btn btn-link" onclick="deleteservicecard()"><i class="fa fa-times-circle"></i>Delete</a>
	</div>
</div>