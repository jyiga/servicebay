<div class='col-lg-12'>
	<table id='dguserapikey' title='Manage userapikey' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>
                        	
			<tr>
				<th field='id' width='90'>Id</th>
				<th field='apiKey' width='90'>Api Key</th>
				<th field='userId' width='90'>User Id</th>
				<th field='creationDate' width='90'>Creation Date</th>
				<th field='expiryDate' width='90'>Expiry Date</th>
				<th field='isActive' width='90'>Is Active</th>
			</tr>
		</thead>
	</table>
	<div id='toolbar' style:'padding:15px;'>
		<a href="#" class="btn btn-primary btn-sm" onclick="newuserapikey()"><i class="fa fa-plus-circle"></i>Add</a>
		<a href="#" class="btn btn-link" onclick="edituserapikey()"><i class="fa fa-pencil"></i>Edit</a>
		<a href="#" class="btn btn-link" onclick="deleteuserapikey()"><i class="fa fa-times-circle"></i>Delete</a>
	</div>
</div>