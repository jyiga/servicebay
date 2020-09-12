
<div id='dlgwashcar' class='easyui-dialog' closed='true' style='width:800px; padding:15px;' toolbar='#washcarbutton' modal='true' >
	<form id='frmwashcar' name='frmwashcar' method='post' data-parsley-validate>

<div class='col-lg-12'>	
	<div class='form-group form-float'>
		<label class='form-label'>Vehicle Plate</label>
				<div class='form-line'>
			<input name='vehiclePlate' value='' id='vehiclePlate' class='form-control' type='text' Required />
		</div>
	</div></div>
	</form>
</div>
<div id="washcarbutton">
	<a href="#" class="btn btn-primary" onclick="savewashcar()"><i class="fa fa-save"></i>Save</a>&nbsp;&nbsp;
	<a href="#" class="btn btn-primary" onclick="javascript:$('#dlgwashcar').dialog('close')"><i class="fa fa-times"></i>Close</a>
	</div>