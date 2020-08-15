<div class='col-lg-12'>
	<table id='dglisthandle' title='Manage lists' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>        	
			<tr>				
				<th field='id' width='90'>id</th>
				<th field='idVal' width='90'>ID</th>
				<th field='textVal' width='90'>Text</th>
				<th field='listName' width='90'>list</th>
			</tr>
		</thead>
	</table>
	<div id='toolbar'>
		<a href="#" class="btn btn-primary btn-sm" onclick="newlisthandle()"><i class="fa fa-plus-circle"></i>Add Static List</a>|
		<a href="#" class="btn btn-success btn-sm" onclick="newlisthandleDny()"><i class="fa fa-plus-circle"></i>Add Data List</a>
		<a href="#" class="btn btn-link" onclick="editlisthandle()"><i class="fa fa-pencil"></i>Edit</a>
		<a href="#" class="btn btn-link" onclick="deletelisthandle()"><i class="fa fa-times-circle"></i>Delete</a>
	</div>
</div>
