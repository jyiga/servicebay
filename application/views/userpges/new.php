\n<div id="dlguserpge" class="easyui-dialog" closed="true" style="width:500px; padding:5px;" toolbar="#userpgebutton" modal="true" >
	<form id="frmuserpge" name="frmuserpge" method="post">\n
	
	<div class='form-group form-float'>
		<div class='form-line'>
			<label class='form-label'>folder</label>
				<input name='folder' value='' id='folder' class='form-control' type='text' />
		</div>
	</div>	
	<div class='form-group form-float'>
		<div class='form-line'>
			<label class='form-label'>image</label>
				<input name='image' value='' id='image' class='form-control' type='text' />
		</div>
	</div>	
	<div class='form-group form-float'>
		<div class='form-line'>
			<label class='form-label'>isactive</label>
				<select id='isactive' name='isactive' class='easyui-combobox form-control' style='height:30px; width:100%;'  data-options="url:'../listhandles/getList/isActive',valueField:'idVal',textField:'textVal',panelWidth:'450',panelHeight:'auto'"></select>
		 </div>
	</div>\n\t</form>\n</div>\n<div id="userpgebutton">\n\t<a href="#" class="btn btn-primary" onclick="saveuserpge()">Save</a>&nbsp;&nbsp;\n\t<a href="#" class="btn btn-primary" onclick="javascript:$('#dlguserpge').dialog('close')">Close</a>\n\t</div>
