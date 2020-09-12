
<div id='dlgapiroute' class='easyui-dialog' closed='true' style='width:800px; padding:15px;' toolbar='#apiroutebutton' modal='true' >
	<form id='frmapiroute' name='frmapiroute' method='post' data-parsley-validate>

<div class='col-lg-6'>	
	<div class='form-group form-float'>
		<label class='form-label'>User</label>
				<div class='form-line'>
			<input name='userId' value='' id='userId' class='form-control' type='text' Required />
		</div>
	</div>	
	<div class='form-group form-float'><label class='form-label'>Creation Time</label>
			<div class='form-line'>
		<input name='creationTime' value='' id='creationTime' class='easyui-datebox' data-options='formatter:myformatter2,parser:myparser,required:true' style='width:100%;height:30px;padding-top:5px;'  type='text' Required /> 
		</div>
	</div>	
	<div class='form-group form-float'><label class='form-label'>Response Time</label>
			<div class='form-line'>
		<input name='responseTime' value='' id='responseTime' class='easyui-datebox' data-options='formatter:myformatter2,parser:myparser,required:true' style='width:100%;height:30px;padding-top:5px;'  type='text' Required /> 
		</div>
	</div></div><div class='col-lg-6'>	
	<div class='form-group form-float'>
		<label class='form-label'>Action Query</label>
				<div class='form-line'>
			<input name='actionQuery' value='' id='actionQuery' class='form-control' type='text' Required />
		</div>
	</div>	
	<div class='form-group form-float'>
		<label class='form-label'>Token</label>
				<div class='form-line'>
			<input name='token' value='' id='token' class='form-control' type='text' Required />
		</div>
	</div></div>
	</form>
</div>
<div id="apiroutebutton">
	<a href="#" class="btn btn-primary" onclick="saveapiroute()"><i class="fa fa-save"></i>Save</a>&nbsp;&nbsp;
	<a href="#" class="btn btn-primary" onclick="javascript:$('#dlgapiroute').dialog('close')"><i class="fa fa-times"></i>Close</a>
	</div>