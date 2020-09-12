
<div id='dlgparkinglist' class='easyui-dialog' closed='true' style='width:800px; padding:15px;' toolbar='#parkinglistbutton' modal='true' >
	<form id='frmparkinglist' name='frmparkinglist' method='post' data-parsley-validate>

<div class='col-lg-6'>	
	<div class='form-group form-float'>
		<label class='form-label'> In Date</label>
				<div class='form-line'>
			<input name='InDate' value='' id='InDate' class='form-control' type='text' Required />
		</div>
	</div>	
	<div class='form-group form-float'>
		<label class='form-label'> Out Date</label>
				<div class='form-line'>
			<input name='OutDate' value='' id='OutDate' class='form-control' type='text' Required />
		</div>
	</div>	
	<div class='form-group form-float'>
		<label class='form-label'> Session</label>
				<div class='form-line'>
			<input name='Session' value='' id='Session' class='form-control' type='text' Required />
		</div>
	</div>	
	<div class='form-group form-float'>
		<label class='form-label'>Exist</label>
				<div class='form-line'>
			<input name='exist' value='' id='exist' class='form-control' type='text' Required />
		</div>
	</div></div><div class='col-lg-6'>	
	<div class='form-group form-float'>
		<label class='form-label'>User</label>
				<div class='form-line'>
			<input name='userId' value='' id='userId' class='form-control' type='text' Required />
		</div>
	</div>	
	<div class='form-group form-float'>
		<label class='form-label'>Vehicle Plate</label>
				<div class='form-line'>
			<input name='vehiclePlate' value='' id='vehiclePlate' class='form-control' type='text' Required />
		</div>
	</div>	
	<div class='form-group form-float'>
		<label class='form-label'>Optransaction Id</label>
				<div class='form-line'>
			<input name='optransactionId' value='' id='optransactionId' class='form-control' type='text' Required />
		</div>
	</div></div>
	</form>
</div>
<div id="parkinglistbutton">
	<a href="#" class="btn btn-primary" onclick="saveparkinglist()"><i class="fa fa-save"></i>Save</a>&nbsp;&nbsp;
	<a href="#" class="btn btn-primary" onclick="javascript:$('#dlgparkinglist').dialog('close')"><i class="fa fa-times"></i>Close</a>
	</div>