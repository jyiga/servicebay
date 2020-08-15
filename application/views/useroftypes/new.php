\n<div id="dlguseroftype" class="easyui-dialog" closed="true" style="width:500px; padding:5px;" toolbar="#useroftypebutton" modal="true" >
	<form id="frmuseroftype" name="frmuseroftype" method="post">\n
	
	<div class='form-group form-float'>
		<div class='form-line'>
			<label class='form-label'>userTypeId</label>
				<input name='userTypeId' value='' id='userTypeId' class='form-control' type='text' />
		</div>
	</div>	
	<div class='form-group form-float'>
		<div class='form-line'>
			<label class='form-label'>isActive</label>
				<input name='isActive' value='' id='isActive' class='form-control' type='text' />
		</div>
	</div>\n\t</form>\n</div>\n<div id="useroftypebutton">\n\t<a href="#" class="btn btn-primary" onclick="saveuseroftype()">Save</a>&nbsp;&nbsp;\n\t<a href="#" class="btn btn-primary" onclick="javascript:$('#dlguseroftype').dialog('close')">Close</a>\n\t</div>
