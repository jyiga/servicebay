\n<div id="dlguser" class="easyui-dialog" closed="true" style="width:500px; padding:5px;" toolbar="#userbutton" modal="true" >
	<form id="frmuser" name="frmuser" method="post">\n
	
	<div class='form-group form-float'>
		<div class='form-line'>
			<label class='form-label'>firstName</label>
				<input name='firstName' value='' id='firstName' class='form-control' type='text' />
		</div>
	</div>	
	<div class='form-group form-float'>
		<div class='form-line'>
			<label class='form-label'>lastName</label>
				<input name='lastName' value='' id='lastName' class='form-control' type='text' />
		</div>
	</div>	
	<div class='form-group form-float'>
		<div class='form-line'>
			<label class='form-label'>mobileNumber</label>
				<input name='mobileNumber' value='' id='mobileNumber' class='form-control' type='text' />
		</div>
	</div>	
	<div class='form-group form-float'><div class='form-line'>
		<label class='form-label'>creationDate</label>
			<input name='creationDate' value='' id='creationDate' class='easyui-datebox' data-options='formatter:myformatter2,parser:myparser,required:true' style='width:100%;height:30px;'  type='text' /> 
		</div>
	</div>	
	<div class='form-group form-float'>
		<div class='form-line'>
			<label class='form-label'>statusId</label>
				<select id='statusId' name='statusId' class='easyui-combobox form-control' style='height:30px; width:100%;'  data-options="url:'../statuss/comboboxview',valueField:'id',textField:'statusName',panelWidth:'450',panelHeight:'auto'"></select>
		 </div>
	</div>\n\t</form>\n</div>\n<div id="userbutton">\n\t<a href="#" class="btn btn-primary" onclick="saveuser()">Save</a>&nbsp;&nbsp;\n\t<a href="#" class="btn btn-primary" onclick="javascript:$('#dlguser').dialog('close')">Close</a>\n\t</div>
