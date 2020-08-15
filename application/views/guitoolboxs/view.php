<div class='col-lg-12'>
	<table id='dgguitoolbox' title='Manage guitoolbox' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>
                        	
			<tr>
				<th field='id' width='90'>id</th>
				<th field='guiToolName' width='90'>Tool Name</th>
				<th width='90' data-options="field:'openTagDisplay'">Openning Tag</th>
				<th field='closeTagDisplay' width='90'>Closing Tag</th>
				<th field='dispayHtml' width='90'>Dispay Html</th>
				<th field='defaultClass' width='90'>defaultClass</th>
			</tr>
		</thead>
	</table>
	<div id='toolbar' style:'padding:15px;'>
		<a href="#" class="btn btn-primary btn-sm" onclick="loadDialog()"><i class="fa fa-plus-circle"></i>Add</a>
		<a href="#" class="btn btn-link" onclick="editguitoolbox()"><i class="fa fa-pencil"></i>Edit</a>
		<a href="#" class="btn btn-link" onclick="deleteguitoolbox()"><i class="fa fa-times-circle"></i>Delete</a>
	</div>
</div>