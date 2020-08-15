<div id="dlgactivity" class="easyui-dialog" closed="true" style="width:600px;padding:5px;height: auto;" toolbar="#activitybutton" modal="true" >
<form id="frmactivity" name="frmactivity" method="post">
<div class='form-group'  >
    <div class='form-line'>
        <label for='name'>Module/Activity</label>
        <input name='name' value='' id='name' class='form-control' type='text' />
</div>
    </div>
    <div class='form-group' >
        <div class='form-line'>
        <label>Index Order</label>
        <input name='indexOrder' value='' id='indexOrder' class='form-control' type='text' />
</div>
    </div>
    </form>
</div><div id="activitybutton">
<a href="#" class="btn btn-primary" onclick="saveactivity()">Save</a>&nbsp;&nbsp;<a href="#" class="btn btn-primary">Close</a></div>
