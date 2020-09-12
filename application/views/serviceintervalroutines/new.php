
<div id='dlgserviceintervalroutine' class='easyui-dialog' closed='true' style='width:800px; padding:15px;' toolbar='#serviceintervalroutinebutton' modal='true' >
	<form id='frmserviceintervalroutine' name='frmserviceintervalroutine' method='post' data-parsley-validate>

<div class='col-lg-12'>	
	<div class='form-group form-float'>
		<label class='form-label'>Id</label>
				<div class='form-line'>
			<input name='id' value='' id='id' class='form-control' type='text' Required />
		</div>
	</div>	
	<div class='form-group form-float'>
		<label class='form-label'>Amount</label>
				<div class='form-line'>
			<input name='amount' value='' id='amount' class='form-control' type='text' Required />
		</div>
	</div>	
	<div class='form-group form-float'>
		<label class='form-label'>Service Interval</label>
				<div class='form-line'>
			<input name='serviceIntervalId' value='' id='serviceIntervalId' class='form-control' type='text' Required />
		</div>
	</div>	<div class='form-group form-float'>
		<label class='form-label'>Routine</label>
				<div class='form-line'>
			<input id='routineId' name='routineId' class='easyui-combobox form-control' style='height:30px; width:100%; padding-top:5px;'  data-options="url:'../routineactives/viewcombobox',valueField:'id',textField:'action',panelWidth:'450',panelHeight:'auto'"  Required />
		</div>
	</div></div>
	</form>
</div>
<div id="serviceintervalroutinebutton">
	<a href="#" class="btn btn-primary" onclick="saveserviceintervalroutine()"><i class="fa fa-save"></i>Save</a>&nbsp;&nbsp;
	<a href="#" class="btn btn-primary" onclick="javascript:$('#dlgserviceintervalroutine').dialog('close')"><i class="fa fa-times"></i>Close</a>
	</div>