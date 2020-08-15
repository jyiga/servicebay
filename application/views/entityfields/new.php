
<div id='dlgentityfield' class='easyui-dialog' closed='true' style='width:800px; padding:15px;' toolbar='#entityfieldbutton' modal='true' >
	<form id='frmentityfield' name='frmentityfield' method='post' data-parsley-validate>

<div class='col-lg-6'>	
	<div class='form-group form-float'>
		<div class='form-line'>
			<label class='form-label'>Field Name</label>
				<input name='fieldName' value='' id='fieldName' class='form-control' type='text' text />
		</div>
	</div>	
	<div class='form-group form-float'>
		<div class='form-line'>
			<label class='form-label'>textVal</label>
				<select id='fieldType' name='fieldType' class='easyui-combobox form-control' style='height:30px; width:100%; padding-top:5px;'  data-options="url:'Field Type',valueField:'../listhandlers/getList/dataType',textField:'idVal',panelWidth:'450',panelHeight:'auto'"  Field Type></select>
		 </div>
	</div>	
	<div class='form-group form-float'>
		<div class='form-line'>
			<label class='form-label'>Length</label>
				<input name='fieldLength' value='' id='fieldLength' class='form-control' type='text' text />
		</div>
	</div></div><div class='col-lg-6'>	
	<div class='form-group form-float'>
		<div class='form-line'>
			<label class='form-label'>Constraint</label>
				<input name='fieldConstraint' value='' id='fieldConstraint' class='form-control' type='text' text />
		</div>
	</div>	
	<div class='form-group form-float'>
		<div class='form-line'>
			<label class='form-label'>canBeNull</label>
				<select id='canBeNull' name='canBeNull' class='easyui-combobox form-control' style='height:30px; width:100%; padding-top:5px;'  data-options="url:'Null',valueField:'../listhandlers/getList/isActive',textField:'',panelWidth:'450',panelHeight:'auto'"  Null></select>
		 </div>
	</div></div>
	</form>
</div>
<div id="entityfieldbutton">
	<a href="#" class="btn btn-primary" onclick="saveentityfield()"><i class="fa fa-save"></i>Save</a>&nbsp;&nbsp;
	<a href="#" class="btn btn-primary" onclick="javascript:$('#dlgentityfield').dialog('close')"><i class="fa fa-times"></i>Close</a>
	</div>