
<div id='dlgreceiptcopy' class='easyui-dialog' closed='true' style='width:800px; padding:15px;' toolbar='#receiptcopybutton' modal='true' >
	<form id='frmreceiptcopy' name='frmreceiptcopy' method='post' data-parsley-validate>

<div class='col-lg-12'>	
	<div class='form-group form-float'>
		<label class='form-label'>Receipt Context</label>
				<div class='form-line'>
			<input name='receiptContext' value='' id='receiptContext' class='form-control' type='text' Required />
		</div>
	</div>	
	<div class='form-group form-float'>
		<label class='form-label'>Vehicle Plate</label>
				<div class='form-line'>
			<input name='vehiclePlate' value='' id='vehiclePlate' class='form-control' type='text' Required />
		</div>
	</div>	
	<div class='form-group form-float'><label class='form-label'>Creation Date</label>
			<div class='form-line'>
		<input name='creationDate' value='' id='creationDate' class='easyui-datebox' data-options='formatter:myformatter2,parser:myparser,required:true' style='width:100%;height:30px;padding-top:5px;'  type='text' Required /> 
		</div>
	</div></div>
	</form>
</div>
<div id="receiptcopybutton">
	<a href="#" class="btn btn-primary" onclick="savereceiptcopy()"><i class="fa fa-save"></i>Save</a>&nbsp;&nbsp;
	<a href="#" class="btn btn-primary" onclick="javascript:$('#dlgreceiptcopy').dialog('close')"><i class="fa fa-times"></i>Close</a>
	</div>