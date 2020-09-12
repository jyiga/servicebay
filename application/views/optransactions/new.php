
<div id='dlgoptransaction' class='easyui-dialog' closed='true' style='width:800px; padding:15px;' toolbar='#optransactionbutton' modal='true' >
	<form id='frmoptransaction' name='frmoptransaction' method='post' data-parsley-validate>

<div class='col-lg-12'>	
	<div class='form-group form-float'><label class='form-label'>Creation Date</label>
			<div class='form-line'>
		<input name='creationDate' value='' id='creationDate' class='easyui-datebox' data-options='formatter:myformatter2,parser:myparser,required:true' style='width:100%;height:30px;padding-top:5px;'  type='text' Required /> 
		</div>
	</div>	
	<div class='form-group form-float'>
		<label class='form-label'>User</label>
				<div class='form-line'>
			<input name='userId' value='' id='userId' class='form-control' type='text' Required />
		</div>
	</div>	
	<div class='form-group form-float'>
		<label class='form-label'>Trans Type</label>
				<div class='form-line'>
			<input name='transType' value='' id='transType' class='form-control' type='text' Required />
		</div>
	</div>	
	<div class='form-group form-float'>
		<label class='form-label'>Operation</label>
				<div class='form-line'>
			<input name='operationId' value='' id='operationId' class='form-control' type='text' Required />
		</div>
	</div>	
	<div class='form-group form-float'>
		<label class='form-label'>Amount</label>
				<div class='form-line'>
			<input name='amount' value='' id='amount' class='form-control' type='text' Required />
		</div>
	</div></div>
	</form>
</div>
<div id="optransactionbutton">
	<a href="#" class="btn btn-primary" onclick="saveoptransaction()"><i class="fa fa-save"></i>Save</a>&nbsp;&nbsp;
	<a href="#" class="btn btn-primary" onclick="javascript:$('#dlgoptransaction').dialog('close')"><i class="fa fa-times"></i>Close</a>
	</div>