<div class="col-lg-12">
    <table id="dgsystemUser" title="Manage System User" class="easyui-datagrid" style="height:auto; padding:2px;" url="viewall" pagination="true" toolbar="#toolbar" rownumbers="true" fitColumns="true" singleSelect="true" iconCls="fa fa-table">
    <thead>
        <tr>

        <th field='firstName' width='90'>First Name</th>
        <th field='lastName' width='90'>Last Name</th>
        <th field='dob' width='90'>DOB</th>
        <th field='contact' width='90'>Contact</th>
        <th field='email' width='90'>Email</th>
        <th field='username' width='90'>Username</th>
        <th field='isActive' width='90'>IsActive</th>
        </tr>
    </thead>
    </table>
    <div id='toolbar'>
    <a href="#" class="btn btn-primary" onclick="newsystemUser()">
    <i class="fa fa-plus-circle"></i>Add</a>
    <a href="#" class="btn btn-link" onclick="editsystemUser()">
    <i class="fa fa-pencil"></i>Edit</a>
    <a href="#" class="btn btn-link" onclick="deletesystemUser()"><i class="fa fa-times-circle"></i>Delete</a>
    </div>
</div>