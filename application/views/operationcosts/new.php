
	<div id='dlgoperationcost' class='easyui-dialog' closed='true' style='width:800px; padding:15px;' toolbar='#operationcostbutton' modal='true' >
		<form id='frmoperationcost' name='frmoperationcost' method='post' data-parsley-validate>
		<div class='col-lg-6'>	
			<div class='form-group form-float'>
				<label class='form-label'>Amount</label>
						<div class='form-line'>
					<input name='amount' value='' id='amount' class='form-control' type='text' Required />
				</div>
			</div>
			</div>
		</div>
		</form>
	</div>
	<div id="operationcostbutton">
		<a href="#" class="btn btn-primary" onclick="saveoperationcost()"><i class="fa fa-save"></i>Save</a>&nbsp;&nbsp;
		<a href="#" class="btn btn-primary" onclick="javascript:$('#dlgoperationcost').dialog('close')"><i class="fa fa-times"></i>Close</a>
	</div>

	