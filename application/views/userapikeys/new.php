
<div id='dlguserapikey' class='easyui-dialog' closed='true' style='width:800px; padding:15px;' toolbar='#userapikeybutton' modal='true' >
	<form id='frmuserapikey' name='frmuserapikey' method='post' data-parsley-validate>

<div class='col-lg-6'>	
	<div class='form-group form-float'>
		<label class='form-label'>Api Key</label>
				<div class='form-line'>
			<input name='apiKey' value='' id='apiKey' class='form-control' type='text' Required />
		</div>
	</div>	
	<div class='form-group form-float'>
		<label class='form-label'>User Id</label>
				<div class='form-line'>
			<input name='userId' value='' id='userId' class='form-control' type='text' Required />
		</div>
	</div>	
	<div class='form-group form-float'><label class='form-label'>Creation Date</label>
			<div class='form-line'>
		<input name='creationDate' value='' id='creationDate' class='easyui-datebox' data-options='formatter:myformatter2,parser:myparser,required:true' style='width:100%;height:30px;padding-top:5px;'  type='text' Required /> 
		</div>
	</div></div><div class='col-lg-6'>	
	<div class='form-group form-float'><label class='form-label'>Expiry Date</label>
			<div class='form-line'>
		<input name='expiryDate' value='' id='expiryDate' class='easyui-datebox' data-options='formatter:myformatter2,parser:myparser,required:true' style='width:100%;height:30px;padding-top:5px;'  type='text' Required /> 
		</div>
	</div>	<div class='form-group form-float'>
		<label class='form-label'>Is Active</label>
				<div class='form-line'>
			<input id='isActive' name='isActive' class='easyui-combobox form-control' style='height:30px; width:100%; padding-top:5px;'  data-options="url:'../listhandles/getList/isActive',valueField:'idVal',textField:'textVal',panelWidth:'450',panelHeight:'auto'"  Required />
		</div>
	</div></div>
	</form>
</div>
<div id="userapikeybutton">
	<a href="#" class="btn btn-primary" onclick="saveuserapikey()"><i class="fa fa-save"></i>Save</a>&nbsp;&nbsp;
	<a href="#" class="btn btn-primary" onclick="javascript:$('#dlguserapikey').dialog('close')"><i class="fa fa-times"></i>Close</a>
	</div>