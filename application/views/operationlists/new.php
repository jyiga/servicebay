
<div id='dlgoperationlist' class='easyui-dialog' closed='true' style='width:800px; padding:15px;' toolbar='#operationlistbutton' modal='true' >
	<form id='frmoperationlist' name='frmoperationlist' method='post' data-parsley-validate>

<div class='col-lg-12'>	
	<div class='form-group form-float'>
		<label class='form-label'>Operation Name</label>
				<div class='form-line'>
			<input name='operationName' value='' id='operationName' class='form-control' type='text' Required />
		</div>
	</div>
	</div>
	</form>
</div>
<div id="operationlistbutton">
	<a href="#" class="btn btn-primary" onclick="saveoperationlist()"><i class="fa fa-save"></i>Save</a>&nbsp;&nbsp;
	<a href="#" class="btn btn-primary" onclick="javascript:$('#dlgoperationlist').dialog('close')"><i class="fa fa-times"></i>Close</a>
	</div>
	<!-- The Operation List -->
<?php  include (ROOT . DS . 'application' . DS . 'views'.DS.'operationcosts' . DS .'new.php'); 
	//include ('../operationcosts/new.php');
?> 