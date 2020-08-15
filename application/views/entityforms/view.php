<div class='col-lg-12'>
	<table id='dgentityform' title='Manage entityform' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>        	
			<tr>				
				<th field='colName' width='90'>Column Name</th>
				<th field='controlName' width='90'>Control Name</th>
				<th field='url' width='90'>Url</th>
				<th field='txtVal' width='90'>Text Field</th>
				<th field='valval' width='90'>Value Field</th>
				<th field='isActive' width='90'>Show</th>
				<th field='tableNme' width='90'>Table Name</th>
			</tr>
		</thead>
	</table>
	<div id='toolbar'>
		<a href="#" class="btn btn-primary btn-sm" onclick="newentityform()"><i class="fa fa-plus-circle"></i>Add</a>
		<a href="#" class="btn btn-link" onclick="editentityform()"><i class="fa fa-pencil"></i>Edit</a>
		<a href="#" class="btn btn-link" onclick="deleteentityform()"><i class="fa fa-times-circle"></i>Delete</a>
	</div>
</div>