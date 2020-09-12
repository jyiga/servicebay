<div class='col-lg-12'>
	<table id='dguser' title='Manage user' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>
                        	
			<tr>
				<th field='id' width='90'>Id</th>
				<th field='firstName' width='90'>First Name</th>
				<th field='lastName' width='90'>Last Name</th>
				<th field='mobileNumber' width='90'>Mobile Number</th>
				<th field='email' width='90'>Email</th>
				<th field='creationDate' width='90'>Creation Date</th>
				<th field='statusId' width='90'>Status</th>
			</tr>
		</thead>
	</table>
	<div id='toolbar' style:'padding:15px;'>
		<a href="#" class="btn btn-primary btn-sm" onclick="newuser()"><i class="fa fa-plus-circle"></i>Add</a>
		<a href="#" class="btn btn-link" onclick="edituser()"><i class="fa fa-pencil"></i>Edit</a>
		<a href="#" class="btn btn-link" onclick="deleteuser()"><i class="fa fa-times-circle"></i>Delete</a>
	</div>
</div>