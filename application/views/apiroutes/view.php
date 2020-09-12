<div class='col-lg-12'>
	<table id='dgapiroute' title='Manage apiroute' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>       	
			<tr>
				<th field='id' width='90'>Id</th>
				<th field='userName' width='90'>User</th>
				<th field='creationTime' width='90'>Creation Time</th>
				<th field='responseTime' width='90'>Response Time</th>
				<th field='actionQuery' width='90'>Action Query</th>
			</tr>
		</thead>
	</table>
	<div id='toolbar' style='padding:15px;'>
		<a href="#" class="btn btn-primary btn-sm" onclick="newapiroute()"><i class="fa fa-plus-circle"></i>Advanced Search</a>
		<a href="#" class="btn btn-link" onclick="editapiroute()"><i class="fa fa-pencil"></i>Close All</a>
		<a href="#" class="btn btn-link" onclick="deleteapiroute()"><i class="fa fa-times-circle"></i>Expiry All</a>
	</div>
</div>