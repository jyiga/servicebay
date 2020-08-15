
<div id='dlgguitoolbox' class='easyui-dialog' closed='true' style='width:900px; padding:15px;' toolbar='#guitoolboxbutton' modal='true' >
	<form id='frmguitoolbox' name='frmguitoolbox' method='post' data-parsley-validate>

<div class='col-lg-6'>	
		<div class='form-group form-float'>
			<div class='form-line'>
				<label class='form-label'>Tool Name</label>
					<input name='guiToolName' value='' id='guiToolName' class='form-control' type='text' />
			</div>
		</div>	
		<div class='form-group form-float'>
			<div class='form-line'>
				<label class='form-label'>Openning Tag</label>
					<input name='openTag' value='' id='openTag' class='form-control' type='text'  />
			</div>
		</div>	
		<div class='form-group form-float'>
			<div class='form-line'>
				<label class='form-label'>Closing Tag</label>
					<input name='closeTag' value='' id='closeTag' class='form-control' type='text' onfocus="closingTag()"  />
			</div>
		</div>
</div>
<div class='col-lg-6'>	
		<div class='form-group form-float'>
			<div class='form-line'>
				<label class='form-label'>Dispay Html</label>
					<input name='dispayHtml' value='' id='dispayHtml' class='form-control' type='text'  />
			</div>
		</div>	
		<div class='form-group form-float'>
			
			<div class='form-line'>
			<label class='form-label'>Default Class</label>
					<input id='defaultClass' name='defaultClass' class='form-control' type='text'   />
			</div>
		</div>

</div>
<div class="col-lg-12">
	<div class='col-lg-5'>
		<table id='dgattkey' title='Manage attkey' class='easyui-datagrid' style='height:auto; width:100%; ' url='../attkeys/viewall' pagination='true' toolbar='#toolbarattkey' rownumbers='true' fitColumns='true' singleSelect='false' iconCls='fa fa-table'>
			<thead>			
				<tr>
					<th data-options="field:'id',checkbox:true"></th>
					<th field='attName' width='90'>Attribute Name</th>
				</tr>
			</thead>
		</table>
		<div id='toolbarattkey' style:'padding:15px;'>
			<!--<a href="#" class="btn btn-primary btn-sm" onclick="newattkey()"><i class="fa fa-plus-circle"></i>Add</a>
			<a href="#" class="btn btn-link" onclick="editattkey()"><i class="fa fa-pencil"></i>Edit</a>
			<a href="#" class="btn btn-link" onclick="deleteattkey()"><i class="fa fa-times-circle"></i>Delete</a>-->
		</div>
	</div>
	<div class='col-lg-2'>
	<div style="margin-bottom:30px;"><a href="#" class="btn btn-primary btn-sm" onclick="addAttrubite()"><i class="fa fa-forward"></i></a></div>
	<div><a href="#" class="btn btn-danger btn-sm" onclick="newattkey()"><i class="fa fa-backward"></i></a></div>
	
	</div>
	<div class='col-lg-5'>
		<table id='dgattkeyval' title='Manage attkeyval' class='easyui-datagrid' style='height:auto;'  pagination='true' toolbar='#toolbarattkeyval'  rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
			<thead>       	
				<tr>
					<th field='attName' width='90'>Attribute Name</th>
					<th width='50' data-options="field:'attVal',editor:{type:'text'}">Val</th>
				</tr>
			</thead>
		</table>
		<div id='toolbarattkeyval' style:'padding:15px;'>
				<a href="#" class="btn btn-primary" onclick="javascript:$('#dgattkeyval').edatagrid('saveRow')"><i class="fa fa-save"></i>&nbsp;Save</a>
				<a href="#" class="btn btn-link" onclick="javascript:$('#dgattkeyval').edatagrid('destroyRow')"><i class="fa fa-times-circle"></i>Delete</a>
		</div>	
	</div>
</div>

	</form>
</div>
<div id="guitoolboxbutton">
	<a href="#" class="btn btn-primary" onclick="saveguitoolbox()"><i class="fa fa-save"></i>Save</a>&nbsp;&nbsp;
	<a href="#" class="btn btn-primary" onclick="javascript:$('#dlgguitoolbox').dialog('close')"><i class="fa fa-times"></i>Close</a>
</div>