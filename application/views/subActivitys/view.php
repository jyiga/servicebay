<div class="col-lg-12">
    <table id="dgsubActivity" title="Manage subActivity" class="easyui-datagrid" style="height:auto; width: 100%;" url="viewall" pagination="true" toolbar="#toolbar" rownumbers="true" fitColumns="true" singleSelect="true" iconCls="fa fa-table">
        <thead>
        	<tr>
                <th field='id' width='90'>Spec ID.</th>
                <th field='name' width='90'>Name</th>
                <th field='link' width='90'>Url</th>
                <th field='title' width='90'>Module</th>
                <!--<th field='isActive' width='90'>isActive</th>-->
            </tr>
        </thead>
    </table>
    <div id='toolbar'>
        <a href="#" class="btn btn-primary" onclick="newsubActivity()"><i class="fa fa-plus-circle"></i>Add</a>
        <a href="#" class="btn btn-link" onclick="editsubActivity()"><i class="fa fa-pencil"></i>Edit</a>
        <a href="#" class="btn btn-link" onclick="deletesubActivity()"><i class="fa fa-times-circle"></i>Delete</a>
    </div>
</div>