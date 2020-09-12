<div class='col-lg-12'>
	<table id='dgserviceinterval' title='Manage serviceinterval' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>
                        	
			<tr>
				<th field='intervalValue' width='90'>Interval Value</th>
			</tr>
		</thead>
	</table>
	<div id='toolbar' style='padding:15px;'>
		<a href="#" class="btn btn-primary btn-sm" onclick="asyncGetId()"><i class="fa fa-plus-circle"></i>Add</a>
		<a href="#" class="btn btn-link" onclick="editserviceinterval()"><i class="fa fa-pencil"></i>Edit</a>
		<a href="#" class="btn btn-link" onclick="deleteserviceinterval()"><i class="fa fa-times-circle"></i>Delete</a>
	</div>
</div>