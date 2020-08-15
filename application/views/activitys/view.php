<div class="col-lg-12">
    <table id="dgactivity" title="Manage Activities" class="easyui-datagrid" style="height:auto; width: 100%;" url="viewall" pagination="true" toolbar="#toolbar" rownumbers="true" fitColumns="true" singleSelect="true" iconCls="fa fa-table">
        <thead>
        	<tr>
                <th field='name' width='90'>Name</th>

            </tr>
        </thead>
    </table>
    <div id='toolbar'>
        <a href="#" class="btn btn-primary" onclick="newactivity()"><i class="fa fa-plus-circle"></i>Add</a>
        <a href="#" class="btn btn-link" onclick="editactivity()"><i class="fa fa-pencil"></i>Edit</a>
        <a href="#" class="btn btn-link" onclick="deleteactivity()"><i class="fa fa-times-circle"></i>Delete</a>
        <a href="#" class="btn btn-link" onclick="moveupactivity()"><i class="fa fa-arrow-up"></i>Move Up</a>
        <a href="#" class="btn btn-link" onclick="movedownactivity()"><i class="fa fa-arrow-down"></i>Move Down</a>
    </div>
</div>