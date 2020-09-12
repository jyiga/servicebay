<div class='col-lg-12'>
	<table id='dgparkinglist' title='Manage parkinglist' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>
                        	
			<tr>
				
				<th field='vehiclePlate' width='90'>Vehicle Plate</th>
				<th field='InDate' width='90'> In Date</th>
				<th field='OutDate' width='90'> Out Date</th>
				<th field='Session' width='90'> Session</th>
				<th field='exist' width='90'>Exist</th>
				<th field='fname' width='90'>User</th>
			</tr>
		</thead>
	</table>
	<div id='toolbar' style='padding:15px;'>
		<a href="#" class="btn btn-primary btn-sm" onclick="newparkinglist()"><i class="fa fa-plus-circle"></i>Add</a>
		<a href="#" class="btn btn-link" onclick="editparkinglist()"><i class="fa fa-pencil"></i>Edit</a>
		<a href="#" class="btn btn-link" onclick="deleteparkinglist()"><i class="fa fa-times-circle"></i>Delete</a>
	</div>
</div>