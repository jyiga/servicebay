<div class='col-lg-12'>
	<table id='dguserpge' title='Manage userpge' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>
                        	
			<tr>
				<th field='id' width='90'>id</th>
				<th field='folder' width='90'>folder</th>
				<th field='image' width='90'>image</th>
				<th field='isactive' width='90'>isactive</th>
			</tr>
		</thead>
	</table>
	<div id='toolbar'>\n\t\t<a href="#" class="btn btn-primary btn-sm" onclick="newuserpge()"><i class="fa fa-plus-circle"></i>Add</a>\n\t\t<a href="#" class="btn btn-link" onclick="edituserpge()"><i class="fa fa-pencil"></i>Edit</a>
        \n\t\t<a href="#" class="btn btn-link" onclick="deleteuserpge()"><i class="fa fa-times-circle"></i>Delete</a>\n\t</div>\n</div>