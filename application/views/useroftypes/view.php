<div class='col-lg-12'>
	<table id='dguseroftype' title='Manage useroftype' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>
                        	
			<tr>
				<th field='userId' width='90'>userId</th>
				<th field='userTypeId' width='90'>userTypeId</th>
				<th field='isActive' width='90'>isActive</th>
			</tr>
		</thead>
	</table>
	<div id='toolbar'>\n\t\t<a href="#" class="btn btn-primary btn-sm" onclick="newuseroftype()"><i class="fa fa-plus-circle"></i>Add</a>\n\t\t<a href="#" class="btn btn-link" onclick="edituseroftype()"><i class="fa fa-pencil"></i>Edit</a>
        \n\t\t<a href="#" class="btn btn-link" onclick="deleteuseroftype()"><i class="fa fa-times-circle"></i>Delete</a>\n\t</div>\n</div>