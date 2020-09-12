
<div id='dlguser' class='easyui-dialog' closed='true' style='width:800px; padding:15px;' toolbar='#userbutton' modal='true' >
	<form id='frmuser' name='frmuser' method='post' data-parsley-validate>

<div class='col-lg-6'>	
	<div class='form-group form-float'>
		<label class='form-label'>First Name</label>
				<div class='form-line'>
			<input name='firstName' value='' id='firstName' class='form-control' type='text' Required />
		</div>
	</div>	
	<div class='form-group form-float'>
		<label class='form-label'>Last Name</label>
				<div class='form-line'>
			<input name='lastName' value='' id='lastName' class='form-control' type='text' Required />
		</div>
	</div>	
	<div class='form-group form-float'>
		<label class='form-label'>Mobile Number</label>
				<div class='form-line'>
			<input name='mobileNumber' value='' id='mobileNumber' class='form-control' type='text' Required />
		</div>
	</div></div>
	<div class='col-lg-6'>	
	<div class='form-group form-float'>
		<label>Password</label>
		<div class='form-line'>
			<input name='password' value='' id='password' class='form-control' type='password' onblur="confirmPasswordFocus()" /> 
		</div>
	</div>
	<div class='form-group form-float' >
		<label>Confirm Password</label>
		<div class='form-line'>
			<input name='confirmpassword' value='' id='confirmpassword' class='form-control' type='password' onblur="confirmPasswordMatch()" /> 
		</div>
	</div>
    <div class='form-group' id="passwordCheck"></div>
	<div class='form-group form-float'>
		<label class='form-label'>Email</label>
		<div class='form-line'>
			<input name='email' value='' id='email' class='form-control' type='text' Required />
		</div>
	</div>	
	<div class='form-group form-float'>
		<label class='form-label'>Status</label>
				<div class='form-line'>
			<input id='statusId' name='statusId' class='easyui-combobox form-control' style='height:30px; width:100%; padding-top:5px;'  data-options="url:'../listhandles/getList/isActive',valueField:'idVal',textField:'textVal',panelWidth:'450',panelHeight:'auto'"  Required />
		</div>
	</div></div>
	</form>
</div>
<div id="userbutton">
	<a href="#" class="btn btn-primary" onclick="saveuser()"><i class="fa fa-save"></i>Save</a>&nbsp;&nbsp;
	<a href="#" class="btn btn-primary" onclick="javascript:$('#dlguser').dialog('close')"><i class="fa fa-times"></i>Close</a>
	</div>