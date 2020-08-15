<div class='col-lg-12'>
	<table id='dguser' title='Manage user' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>
                        	
			<tr>
				<th field='id' width='90'>id</th>
				<th field='firstName' width='90'>firstName</th>
				<th field='lastName' width='90'>lastName</th>
				<th field='mobileNumber' width='90'>mobileNumber</th>
				<th field='creationDate' width='90'>creationDate</th>
				<th field='statusId' width='90'>statusId</th>
			</tr>
		</thead>
	</table>
	<div id='toolbar'>\n\t\t<a href="#" class="btn btn-primary btn-sm" onclick="newuser()"><i class="fa fa-plus-circle"></i>Add</a>\n\t\t<a href="#" class="btn btn-link" onclick="edituser()"><i class="fa fa-pencil"></i>Edit</a>
        \n\t\t<a href="#" class="btn btn-link" onclick="deleteuser()"><i class="fa fa-times-circle"></i>Delete</a>\n\t</div>\n</div>