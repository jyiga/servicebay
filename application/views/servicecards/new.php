
<div id='dlgservicecard' class='easyui-dialog' closed='true' style='width:800px; padding:15px;' toolbar='#servicecardbutton' modal='true' >
	<form id='frmservicecard' name='frmservicecard' method='post' data-parsley-validate>

<div class='col-lg-4'>	
	<div class='form-group form-float'><label class='form-label'> Creation Date</label>
			<div class='form-line'>
		<input name='CreationDate' value='' id='CreationDate' class='easyui-datebox' data-options='formatter:myformatter2,parser:myparser,required:true' style='width:100%;height:30px;padding-top:5px;'  type='text' Required /> 
		</div>
	</div>	
	<div class='form-group form-float'>
		<label class='form-label'> Odometer</label>
				<div class='form-line'>
			<input name='Odometer' value='' id='Odometer' class='form-control' type='text' Required />
		</div>
	</div></div><div class='col-lg-4'>	<div class='form-group form-float'>
		<label class='form-label'> Service Interval</label>
				<div class='form-line'>
			<input id='ServiceIntervalId' name='ServiceIntervalId' class='easyui-combobox form-control' style='height:30px; width:100%; padding-top:5px;'  data-options="url:'../serviceintervals/viewcombobox',valueField:'id',textField:'intervalValue',panelWidth:'450',panelHeight:'auto'"  Required />
		</div>
	</div>	
	<div class='form-group form-float'>
		<label class='form-label'>Vehicle Plate</label>
				<div class='form-line'>
			<input name='vehiclePlate' value='' id='vehiclePlate' class='form-control' type='text' Required />
		</div>
	</div></div><div class='col-lg-4'>	
	<div class='form-group form-float'>
		<label class='form-label'>Optransaction ID</label>
				<div class='form-line'>
			<input name='optransactionId' value='' id='optransactionId' class='form-control' type='text' Required />
		</div>
	</div></div>
	</form>
</div>
<div id="servicecardbutton">
	<a href="#" class="btn btn-primary" onclick="saveservicecard()"><i class="fa fa-save"></i>Save</a>&nbsp;&nbsp;
	<a href="#" class="btn btn-primary" onclick="javascript:$('#dlgservicecard').dialog('close')"><i class="fa fa-times"></i>Close</a>
	</div>