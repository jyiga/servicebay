<div id="dlgconfigurationSetting" class="easyui-dialog" closed="true" style="width:500px; padding:5px;" toolbar="#configurationSettingbutton" modal="true" ><form id="frmconfigurationSetting" name="frmconfigurationSetting" method="post">
<div class='form-group' >
    <div class="form-line">
        <label for="systemName">System Name</label>
        <input name='systemName' value='' id='systemName' class='form-control' type='text' />
    </div> 
</div>
<div class='form-group' >
    <div class="form-line">
        <label for="systemValue">System Value</label>
        <input name='systemValue' value='' id='systemValue' class='form-control' type='text' /> 
    </div>
</div>
<div class='form-group' >
    
        <label>mask</label>
        <input name='mask' value='1' id='mask' class='form-control' type='checkbox' />
    
 </div>
</form>
</div>
<div id="configurationSettingbutton">
    <a href="#" class="btn btn-primary" onclick="saveconfigurationSetting()">Save</a>&nbsp;&nbsp;
    <a href="#" class="btn btn-danger" onclick="javascript:$('#dlgconfigurationSetting').dialog('close')">Close</a>
</div>
