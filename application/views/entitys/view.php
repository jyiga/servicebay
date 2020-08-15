<div class='col-lg-12'>
	<table id='dgentity' title='Manage entity' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>        	
			<tr>
				<th field='inSync' width='90' data-options="formatter:formatSync">Snyc</th>
				<th field='tableName' width='90'>Entity Name</th>
			</tr>
		</thead>
	</table>
	<div id='toolbar' style='padding:15px;'>
		<a href="#" class="btn btn-primary btn-sm" onclick="newentity()"><i class="fa fa-plus-circle"></i>Add</a>
		<a href="#" class="btn btn-link" onclick="editentity()"><i class="fa fa-pencil"></i>Edit</a>
		<a href="#" class="btn btn-link" onclick="deleteentity()"><i class="fa fa-times-circle"></i>Delete</a>
		<a href="#" class="btn btn-link" onclick="addFieldEntity()"><i class="fa fa-magic"></i>Add Fields</a>
		<a href="#" class="btn btn-link" onclick="syncEntityTable()"><i class="fa fa-check"></i>Sync [Check-in]</a>
		<a href="#" class="btn btn-link" onclick="exportTable()"><i class="fa fa-send"></i>Export Json File</a>
		<a href="#" class="btn btn-link" ><i class="fa fa-arrow-left"></i>Import Json File</a>
		<a href="#" class="btn btn-link" onclick="importScheme()"><i class="fa fa-cloud-download"></i>Get From DB</a>
	</div>
</div>