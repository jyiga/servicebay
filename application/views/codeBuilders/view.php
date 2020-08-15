<form id="frmsubActivity" name="frmsubActivity" method="post">
    <div class="col-lg-12 ">
    <div class="col-lg-12 ">
        <div class='pull-right'>
            <a href='#' class='btn btn-primary' onclick="saveCodeBuilder()"><i class='fa fa-save'></i>&nbsp;Create</a>
        </div>
    </div>
    <div class="col-lg-6">
        <div class='form-group' style='' ><label>Database Entity</label>
            <select name='entityId' id='entityId' class="easyui-combobox form-control" style="height:30px; width:100%;" data-options="url:'../entitys/viewcombobox',valueField:'tableName',textField:'tableName',panelWidth:'450',panelHeight:'auto',onSelect:function(value){ entryPoint(value.tableName);$('#name').val(value.tableName)}"></select>
        </div>
        <div class='form-group' style='' >
            <label>Theme</label>
            <input name='theme' id='theme' class="easyui-combobox form-control" style="height:30px; width:100%;" data-options="data:[{id:'material',name:'Material Design'},{id:'bootstrap',name:'Bootstrap Design'}],valueField:'id',textField:'name',panelHeight:'auto'" />
        </div>
    </div>
    <div class="col-lg-6">
        <label class='form-label'>Class Name(Auto Complete Please)</label>
        <div class='form-group form-float'>
                <div class='form-line'>
                    <input name='name' value='' id='name' class='form-control' type='text' />
                </div>
        </div>
        <div class='form-group'>
               <label>Number of Column</label>
               <div class='form-line'>
                 <input name='colNum' value='' id='colNum' class='form-control' type='text' />
                </div>
        </div>
    </div>
    <div class='col-lg-12'>
        <table id='dgentityform' title='UI Forms' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbarentityform' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
            <thead>        	
                <tr>				
                    <th width='90' data-options="field:'colName',editor:{type:'text'}">Column Name</th>
                    <th field='controlName' width='90' data-options="field:'controlName',editor:{
							type:'combobox',
					options:{panelWidth:250,valueField:'toolboxName',textField:'toolboxName',url:'../toolboxs/viewcombobox'
                }

						}">Control Name</th>
                        <th width='90' data-options="field:'labelName',editor:{type:'text'}">Label</th>
                    <th width='90' data-options="field:'url',editor:{type:'text'}">Url</th>
                    <th width='90' data-options="field:'txtVal',editor:{type:'text'}">Text Field</th>
                    <th width='90' data-options="field:'valval',editor:{type:'text'}">Value Field</th>
                    <th width='90' data-options="field:'isActive',align:'center',
        formatter:function(value){
            return value==1 ? 'Yes' : 'No';
        },editor:{type:'checkbox',options:{on:'1',off:'0'}}">Show</th>
        <th width='90' data-options="field:'isRequired',align:'center',
        formatter:function(value){
            return value==1 ? 'Yes' : 'No';
        },editor:{type:'checkbox',options:{on:'1',off:'0'}}">Required</th>
                    <!--<th width='90' data-options="field:'tableNme',editor:{type:'text'}">Table Name</th>-->
                </tr>
            </thead>
        </table>
        <div id='toolbarentityform'>
            <!--<a href="#" class="btn btn-primary btn-sm" onclick="newentityform()"><i class="fa fa-plus-circle"></i>Add</a>-->
            <a href="#" class="btn btn-primary" onclick="javascript:$('#dgentityform').edatagrid('saveRow')"><i class="fa fa-save"></i>&nbsp;Save</a>
            <a href="#" class="btn btn-link" onclick="deleteentityform()"><i class="fa fa-times-circle"></i>Delete</a>
            <a href="#" class="btn btn-link" onclick="movedownentityform()"><i class="fa fa-arrow-down"></i>Move Down</a>
            <a href="#" class="btn btn-link" onclick="moveupentityform()"><i class="fa fa-arrow-up"></i>Move Up</a>
            <a href="#" class="btn btn-link" onclick="addStaticList()"><i class="fa fa-arrow-up"></i>Get List Handle</a>
            <a href="#" class="btn btn-link" onclick="getEntities()"><i class="fa fa-arrow-up"></i>Get Entity</a>
            
            
        </div>
    </div>
    <div class='form-action'>
        <!--<a href='#' class='btn btn-primary' onclick="saveCodeBuilder()">Create</a>-->
    </div>
    </div>
</form>

<!-- The List Handle -->
<div id="dlglisthandle" class="easyui-dialog" closed="true" style="width:800px; padding:10px;" toolbar="#listhandlebutton" modal="true" >
    <div class='col-lg-12'>
        <table id='dglisthandle' title='Manage lists' class='easyui-datagrid' style='height:auto; width:100%; ' url='../listhandles/viewlist' pagination='true' toolbar='#toolbarlisthandle' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>
            <thead>        	
                <tr>				
                    <th field='ck' width='90' checkbox='true'>id</th>
                    <th field='listName' width='90'>list</th>
                </tr>
            </thead>
        </table>
        <div id='toolbarlisthandle'>
            <a href="#" class="btn btn-primary btn-sm" onclick="addListInfo()"><i class="fa fa-plus-circle"></i>Load</a>&nbsp;&nbsp;
            Search:&nbsp;&nbsp;<input type='text' onkeydown="findList(this.value)" name='searchIn' id='searchIn' style='height:30px; width:50%;'   />
        </div>
    </div>
</div>

