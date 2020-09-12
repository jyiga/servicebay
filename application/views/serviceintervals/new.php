
<div id='dlgserviceinterval' class='easyui-dialog' closed='true' style='width:800px; padding:15px;' toolbar='#serviceintervalbutton' modal='true' >
	<form id='frmserviceinterval' name='frmserviceinterval' method='post' data-parsley-validate>
	<div class='col-lg-12'>
		<div class='form-group form-float'>
			<label class='form-label'>Interval Value</label>
				<div class='form-line'>
					<input name='intervalValue' value='' id='intervalValue' class='form-control' type='text' Required />
				</div>
		</div>

		<!--Routine -->
		<table id='dgserviceintervalroutine' title='Manage serviceintervalroutine' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbarintervalroutine' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
		<thead>        	
			<tr>
				<th field='action' width='90' >Routine</th>
				<th width='90' data-options="field:'amount',editor:{type:'numberbox'}">Amount</th>
			</tr>
		</thead>
		</table>
		<div id='toolbarintervalroutine' style='padding:15px;'>
			<a href="#" class="btn btn-primary btn-sm" onclick="loadRoutine()"><i class="fa fa-plus-circle"></i>Add</a>
			<a href="#" class="btn btn-link" onclick="javascript:$('#dgserviceintervalroutine').edatagrid('saveRow')"><i class="fa fa-save"></i>Save Change</a>
			<a href="#" class="btn btn-link" onclick="javascript:$('#dgserviceintervalroutine').edatagrid('destroyRow')"><i class="fa fa-times-circle"></i>Delete</a>
		</div>
	</div>
	</form>
</div>
<div id="serviceintervalbutton">
	<a href="#" class="btn btn-primary" onclick="saveserviceinterval()"><i class="fa fa-save"></i>Save</a>&nbsp;&nbsp;
	<a href="#" class="btn btn-primary" onclick="javascript:$('#dlgserviceinterval').dialog('close')"><i class="fa fa-times"></i>Close</a>
</div>
<!-- Dlg to select routine -->
<div id='dlgroutineactive' class='easyui-dialog' closed='true' style='width:800px; padding:15px;' toolbar='#routineactivebutton' modal='true' >
	<table id='dgroutineactive' title='Routine List' class='easyui-datagrid' style='height:auto; width:100%; ' url='../routineactives/viewall' pagination='true' toolbar='#toolbaractive' rownumbers='true' fitColumns='true' singleSelect='false' iconCls='fa fa-table'>
		<thead>
                        	
			<tr>
				<th field='ck' checkbox='true'></th>
				<th field='action' width='90'>Action</th>
			</tr>
		</thead>
	</table>
	<div id='toolbaractive' style='padding:15px;'>
		<a href="#" class="btn btn-primary btn-sm" onclick="saveServiceRoutine()"><i class="fa fa-plus-circle"></i>Load</a>
	</div>
</div>
<div id="routineactivebutton">
	<a href="#" class="btn btn-primary" onclick="saveroutineactive()"><i class="fa fa-save"></i>Close</a>
</div>