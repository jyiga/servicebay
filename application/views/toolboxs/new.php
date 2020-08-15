<div id="dlgtoolbox" class="easyui-dialog" closed="true" style="width:500px; padding:5px;" toolbar="#toolboxbutton" modal="true" >
	<form id="frmtoolbox" name="frmtoolbox" method="post">
	<div class='form-group form-float'><div class='form-line'><label class='form-label'>toolboxName</label><input name='toolboxName' value='' id='toolboxName' class='form-control' type='text' /> </div></div>
</form></div><div id="toolboxbutton"><a href="#" class="btn btn-primary" onclick="savetoolbox()">Save</a>&nbsp;&nbsp;<a href="#" class="btn btn-primary" onclick="javascript:$('#dlgtoolbox').dialog('close')">Close</a></div>
