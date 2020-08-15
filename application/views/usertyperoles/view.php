<div class='col-lg-12'>
	<table id='dgusertyperole' title='Manage usertyperole' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>
                        	
			<tr>
				<th field='id' width='90'>id</th>
				<th field='userTypeId' width='90'>userTypeId</th>
				<th field='subActivityId' width='90'>subActivityId</th>
				<th field='isActive' width='90'>isActive</th>
				<th field='creationDate' width='90'>creationDate</th>
			</tr>
		</thead>
	</table>
	<div id='toolbar'>\n\t\t<a href="#" class="btn btn-primary btn-sm" onclick="newusertyperole()"><i class="fa fa-plus-circle"></i>Add</a>\n\t\t<a href="#" class="btn btn-link" onclick="editusertyperole()"><i class="fa fa-pencil"></i>Edit</a>
        \n\t\t<a href="#" class="btn btn-link" onclick="deleteusertyperole()"><i class="fa fa-times-circle"></i>Delete</a>\n\t</div>\n</div>