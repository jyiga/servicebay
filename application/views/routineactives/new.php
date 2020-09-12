
<div id='dlgroutineactive' class='easyui-dialog' closed='true' style='width:800px; padding:15px;' toolbar='#routineactivebutton' modal='true' >
	<form id='frmroutineactive' name='frmroutineactive' method='post' data-parsley-validate>

<div class='col-lg-12'>	
	<div class='form-group form-float'>
		<label class='form-label'>Action</label>
				<div class='form-line'>
			<input name='action' value='' id='action' class='form-control' type='text' Required />
		</div>
	</div></div>
	</form>
</div>
<div id="routineactivebutton">
	<a href="#" class="btn btn-primary" onclick="saveroutineactive()"><i class="fa fa-save"></i>Save</a>&nbsp;&nbsp;
	<a href="#" class="btn btn-primary" onclick="javascript:$('#dlgroutineactive').dialog('close')"><i class="fa fa-times"></i>Close</a>
</div>