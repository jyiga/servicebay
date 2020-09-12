<div class='col-lg-12'>
	<table id='dgvehicle' title='Manage vehicle' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>
                        	
			<tr>
				<th field='vehiclePlate' width='90'>Vehicle Plate</th>
				<th field='creationDate' width='90'>Creation Date</th>
			</tr>
		</thead>
	</table>
	<div id='toolbar' style:'padding:15px;'>
		<a href="#" class="btn btn-primary btn-sm" onclick="newvehicle()"><i class="fa fa-plus-circle"></i>Add</a>
		<a href="#" class="btn btn-link" onclick="editvehicle()"><i class="fa fa-pencil"></i>Edit</a>
		<a href="#" class="btn btn-link" onclick="deletevehicle()"><i class="fa fa-times-circle"></i>Delete</a>
	</div>
</div>