<div id="dlgsubActivity" class="easyui-dialog" closed="true" style="width:500px; padding:5px; height: auto;" buttons="#subActivitybutton" modal="true" >
    <form id="frmsubActivity" name="frmsubActivity" method="post">
    <div class='form-group' style='' >
    <label>Module</label>
        <select name='activityId' id='activityId' class="easyui-combobox form-control" style="height:30px; width:100%;" data-options="url:'../activitys/viewcombo',valueField:'id',textField:'name',panelWidth:'450',panelHeight:'auto',onSelect:function(value){ getListOrderNumber(value.id)}"></select>
    </div>
        <div class='form-group form-float' >
                <div class='form-line'>
                <label class="form-label">Functional Specification</label>
                <input name='name' value='' id='name' class='form-control' type='text' />
                </div>
        </div>
    <div class='form-group form-float' >
        <div class='form-line'>
            <label class="form-label">Url</label>
            <input name='link' value='' id='link' class='form-control' type='text' />
        </div>
    </div>
        <div class='form-group form-float'>
            <div class="form-line">
                <label class="form-label">Icon</label>
                <input name='icon' value='' id='icon' class='form-control' type='text' />
            </div>
        </div>
        <div class='form-group form-float'>
            <div class='form-line'>
                <!--<label class="form-label">List Order</label>-->
                <input name='orderIndex' value='' id='orderIndex' class='form-control' type='text' readonly />
            </div>
        </div>
        
    </form>
</div>
<div id="subActivitybutton">
<a href="#" class="btn btn-primary" onclick="savesubActivity()">Save</a>&nbsp;&nbsp;<a href="#" class="btn btn-danger">Close</a></div>
