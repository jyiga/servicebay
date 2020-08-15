<div id="dlglisthandle" class="easyui-dialog" closed="true" style="width:500px; padding:10px;" toolbar="#listhandlebutton" modal="true" >
	<form id="frmlisthandle" name="frmlisthandle" method="post">
	<div class='form-group form-float'><div class='form-line'>
		<label class='form-label'>ID</label><input name='idVal' value='' id='idVal' class='form-control' type='text' /> </div>
	</div>
	<div class='form-group form-float'>
		<div class='form-line'>
			<label class='form-label'>Text</label><input name='textVal' value='' id='textVal' class='form-control' type='text' /> </div>
		</div>
	<div class='form-group form-float'>
		<div class='form-line'>
			<label class='form-label'>list Name</label><input name='listName' value='' id='listName' class='form-control' type='text' /> 
		</div>
	</div>
</form>
</div>
<div id="listhandlebutton">
	<a href="#" class="btn btn-primary" onclick="savelisthandle()">Save</a>&nbsp;&nbsp;
	<a href="#" class="btn btn-primary" onclick="javascript:$('#dlglisthandle').dialog('close')">Close</a>
</div>
<!-- The Dynamic List -->

<div id='dlglisthandleCopy' class='easyui-dialog' closed='true' style='width:800px; padding:15px;' toolbar='#listhandleCopybutton' modal='true' >
	<form id='frmlisthandleCopy' name='frmlisthandleCopy' method='post' data-parsley-validate>
		<div class='col-lg-6'>	
		<div class='form-group form-float'>
			<label class='form-label'>Entity</label>
			<div class='form-line'>
				<select id='listName2' name='listName2' class='easyui-combobox' style='height:30px; width:100%; padding-top:5px;'  data-options="url:'../entitys/viewcombobox',valueField:'id',textField:'tableName',panelWidth:'450',panelHeight:'auto',onSelect:function(rec){ 
					//alert(rec.id)
					loadTextVal(rec.id)
					}"  Required ></select>
			</div>
		</div>
		<div class='form-group form-float'>
			<label class='form-label'>ID</label>
			<div class='form-line'>
				<select id='idVal2' name='idVal2' class='easyui-combobox' style='height:30px; width:100%; padding-top:5px;'  data-options="url:'../entityfields/viewcombobox/0',valueField:'fieldName',textField:'fieldName',panelWidth:'450',panelHeight:'auto'"  Required ></select>
			</div>
		</div>
		</div>
		<div class='col-lg-6'>	
			<div class='form-group form-float'>
				<label class='form-label'>Text</label>
					<div class='form-line'>
						<select id='textVal2' name='textVal2' class='easyui-combobox' style='height:30px; width:100%; padding-top:5px;'  data-options="url:'../entityfields/viewcombobox/0',valueField:'fieldName',textField:'fieldName',panelWidth:'450',panelHeight:'auto'"  Required ></select>
					</div>
			</div>
			<div class='form-group form-float'>
			<label class='form-label'>Dynamic </label>
				<div class='form-line'>
					<select id='isSync' name='isSync' class='easyui-combobox' style='height:30px; width:100%; padding-top:5px;'  data-options="url:'../listhandles/getList/isActive',valueField:'idVal',textField:'textVal',panelWidth:'450',panelHeight:'auto'"  Required ></select>
				</div>
			</div>
		</div>
		</form>
	</div>
<div id="listhandleCopybutton">
	<a href="#" class="btn btn-primary" onclick="savelisthandleCopy()"><i class="fa fa-save"></i>Save</a>&nbsp;&nbsp;
	<a href="#" class="btn btn-primary" onclick="javascript:$('#dlglisthandleCopy').dialog('close')"><i class="fa fa-times"></i>Close</a>
</div>
