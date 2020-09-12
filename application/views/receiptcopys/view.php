<div class='col-lg-12'>
	<table id='dgreceiptcopy' title='Manage receiptcopy' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>
                        	
			<tr>
				<th field='id' width='90'>RecordNo</th>
				<th field='receiptContext' width='90'>Receipt Context</th>
				<th field='vehiclePlate' width='90'>Vehicle Plate</th>
				<th field='creationDate' width='90'>Creation Date</th>
			</tr>
		</thead>
	</table>
	<div id='toolbar' style:'padding:15px;'>
		<a href="#" class="btn btn-primary btn-sm" onclick="newreceiptcopy()"><i class="fa fa-plus-circle"></i>Add</a>
		<a href="#" class="btn btn-link" onclick="editreceiptcopy()"><i class="fa fa-pencil"></i>Edit</a>
		<a href="#" class="btn btn-link" onclick="deletereceiptcopy()"><i class="fa fa-times-circle"></i>Delete</a>
	</div>
</div>