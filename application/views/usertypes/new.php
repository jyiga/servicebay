<div id='dlgusertype' class='easyui-dialog' closed='true' style='width:500px; padding:5px;' toolbar='#usertypebutton' modal='true' >
	<form id='frmusertype' name='frmusertype' method='post'>
	<div class='form-group form-float'>
		<div class='form-line'>
			<label class='form-label'>userType</label>
				<input name='userTypeName' value='' id='userTypeName' class='form-control' type='text' />
		</div>
	</div>
	</form>
</div>
<div id="usertypebutton">
	<a href="#" class="btn btn-primary" onclick="saveusertype()">Save</a>&nbsp;&nbsp;
	<a href="#" class="btn btn-primary" onclick="javascript:$('#dlgusertype').dialog('close')">Close</a>
</div>
<div id='dlgroles' class='easyui-dialog' closed='true' style='width:800px; padding:5px;' toolbar='#rolesButton' modal='true' >
	<table id="dgsubActivity" title="Manage subActivity" class="easyui-datagrid" style="height:auto; width: 100%;" url="../subActivitys/viewall" pagination="true" toolbar="#toolbarsubActivity" rownumbers="true" fitColumns="true" singleSelect="true" iconCls="fa fa-table">
        <thead>
        	<tr>
			    <th field='id'  checkbox="true"></th>
                <th field='name' width='90'>Name</th>
                <th field='link' width='90'>Url</th>
                <th field='title' width='90'>Module</th>
                <!--<th field='isActive' width='90'>isActive</th>-->
            </tr>
        </thead>
    </table>
    <div id='toolbarsubActivity'>
        <a href="#" class="btn btn-primary" onclick="insertRole()"><i class="fa fa-plus-circle"></i>Add</a>
    </div>
</div>
<div id="rolesButton">
	<a href="#" class="btn btn-primary" onclick="saveusertype()">Save</a>&nbsp;&nbsp;
	<a href="#" class="btn btn-primary" onclick="javascript:$('#dlgusertype').dialog('close')">Close</a>
</div>