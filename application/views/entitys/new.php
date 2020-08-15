
<div id='dlgentity' class='easyui-dialog' closed='true' style='width:800px; padding:15px;' toolbar='#entitybutton' modal='true' >
	<form id='frmentity' name='frmentity' method='post' data-parsley-validate>

<div class='col-lg-12'>	
	<div class='form-group form-float'>
		<div class='form-line'>
			<label class='form-label'>Entity Name</label>
				<input name='tableName' value='' id='tableName' class='form-control' type='text' text />
		</div>
	</div></div>
	</form>
</div>
<div id="entitybutton">
	<a href="#" class="btn btn-primary" onclick="saveentity()"><i class="fa fa-save"></i>Save</a>&nbsp;&nbsp;
	<a href="#" class="btn btn-primary" onclick="javascript:$('#dlgentity').dialog('close')"><i class="fa fa-time"></i>Close</a>
	</div>
<!--Manage Entity field -->
<div id='dlgentityfield' class='easyui-dialog' closed='true' style='width:800px; padding:15px;' toolbar='#entityfieldbutton' modal='true' >
<table id='dgentityfield' title='Manage entityfield' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbarx' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>        	
			<tr>
				<th field='id' width='90'>id</th>
				<th  width='90' data-options="field:'fieldName',editor:{type:'text'}">Field Name</th>
				<th field='fieldType' width='90' data-options="field:'controlName',editor:{
							type:'combobox',
					options:{panelWidth:250,valueField:'idVal',textField:'textVal',url:'../listhandles/getList/dataType'
                }}">Field Type</th>
				<th  width='90' data-options="field:'fieldLength',editor:{type:'text'}">Length</th>
				<th width='90' 
				field='fieldConstraint' width='90' data-options="field:'fieldConstraint',editor:{
							type:'combobox',
					options:{panelWidth:250,valueField:'idVal',textField:'textVal',url:'../listhandles/getList/DB_CONSTRAINT'
                }}">Constraint</th>
				<th width='90' data-options="field:'canBeNull',align:'center',
        formatter:function(value){
            return value==1 ? 'Yes' : 'No';
        },editor:{type:'checkbox',options:{on:'1',off:'0'}}">Null</th>
				
			</tr>
		</thead>
	</table>
	<div id='toolbarx' style:'padding:15px;'>
		<a href="#" class="btn btn-primary btn-sm" onclick="javascript:$('#dgentityfield').edatagrid('addRow')"><i class="fa fa-plus-circle"></i></a>
		<a href="#" class="btn btn-link" onclick="javascript:$('#dgentityfield').edatagrid('saveRow')"><i class="fa fa-save"></i></a>
		<a href="#" class="btn btn-link" onclick="javascript:$('#dgentityfield').edatagrid('destroyRow')"><i class="fa fa-times-circle"></i></a>
	</div>
	</div>
<div id="entityfieldbutton">
	<a href="#" class="btn btn-primary" onclick="syncEntity()"><i class="fa fa-save"></i>Sync Table</a>&nbsp;&nbsp;
	<a href="#" class="btn btn-primary" onclick="javascript:$('#dlgentityfield').dialog('close')"><i class="fa fa-times"></i>Close</a>
</div>