                </div>

            </div>

            </div>
            </div>
        </div>

    </div>
</section>
<!-- Script starting -->
<!-- Jquery Core Js -->
<script src="../public/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="../public/plugins/bootstrap/js/bootstrap.min.js"></script>
<!--<script src="../public/vendor/bootstrap/dist/js/bootstrap.min.js"></script>-->
<!-- Easyui -->
<script type="text/javascript" src="../public/plugins/scripts/jquery/jquery.easyui.min.js"></script>
<!--<script type="text/javascript" src="../public/plugins/scripts/datepicker/js/bootstrap-datepicker.js"></script>-->
<script type="text/javascript" src="../public/plugins/scripts/jquerylib/jquery.edatagrid.js"></script>
<script type="text/javascript" src="../public/plugins/scripts/jquerylib/datagrid-detailview.js"></script>
<script type="text/javascript" src="../public/plugins/scripts/jquerylib/datagrid-defaultview.js"></script>
<script type="text/javascript" src="../public/plugins/scripts/jquerylib/datagrid-groupview.js"></script>
<script type="text/javascript" src="../public/plugins/scripts/jquerylib/datagrid-scrollview.js"></script>

<!-- Select Plugin Js -->
<!--<script src="../public/plugins/bootstrap-select/js/bootstrap-select.js"></script>-->

<!-- Slimscroll Plugin Js -->
<script src="../public/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="../public/plugins/node-waves/waves.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="../public/plugins/jquery-countto/jquery.countTo.js"></script>

<!-- Morris Plugin Js -->
<script src="../public/plugins/raphael/raphael.min.js"></script>
<script src="../public/plugins/morrisjs/morris.js"></script>

<!-- ChartJs -->
<!--<script src="../public/plugins/chartjs/Chart.bundle.js"></script>-->

<!-- Flot Charts Plugin Js -->
<!--<script src="../public/plugins/flot-charts/jquery.flot.js"></script>
<script src="../public/plugins/flot-charts/jquery.flot.resize.js"></script>
<script src="../public/plugins/flot-charts/jquery.flot.pie.js"></script>
<script src="../public/plugins/flot-charts/jquery.flot.categories.js"></script>
<script src="../public/plugins/flot-charts/jquery.flot.time.js"></script>-->

<!-- Sparkline Chart Plugin Js -->
<script src="../public/plugins/jquery-sparkline/jquery.sparkline.js"></script>

<!-- Custom Js -->
<script src="../public/js/admin.js"></script>
<script src="../public/js/pages/index.js"></script>
<!--<script src="../public/js/pages/forms/basic-form-elements.js"></script>-->

<!-- Demo Js -->
<script src="../public/js/demo.js"></script>


<script src='../public/plugins/scripts/fullcalendar/lib/moment.min.js'></script>
<script src='../public/plugins/scripts/fullcalendar/fullcalendar.js'></script>
<script type="text/javascript" src="../public/plugins/scripts/js/scriptEngine.js"></script>
<script type="text/javascript" src="../public/js/pdfmaker/pdfmake.min.js"></script>
<script type="text/javascript" src="../public/js/datagrid-export.js"></script>
<script type="text/javascript" src="../public/js/pdfmaker/vfs_fonts.js"></script>
<script src="../public/js/ckeditor/ckeditor.js" type="text/javascript"></script>
  <!-- JQuery Steps Plugin Js -->
<script src="../public/plugins/jquery-steps/jquery.steps.js"></script>
<!-- Light Gallery Plugin Js -->
<script src="../public/plugins/light-gallery/js/lightgallery-all.js"></script>
<script src="../public/plugins/tinymce/tinymce.js"></script>
<!--<script src="https://cdn.webdatarocks.com/latest/webdatarocks.toolbar.min.js"></script>
<script src="https://cdn.webdatarocks.com/latest/webdatarocks.js"></script>-->

<?php
$html=new HTML();
echo $html->includeJs('../public/customJs/'. $this->_controller .'.js');

//require_once('controller/scriptController.php'); ?>
<script type="text/javascript">

function showBalanceTitle()
{
    $.post('../generaledgers/invoiceBalance/null',{criteria:"systemName='wallet'"},function(data){
        //alert(data);
        var bal=parseInt(data);
        var d='';
        if(bal<200000)
        {
            d='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ur" Wallet Balance is :<span class="text text-danger" style="color:#5c060a;">'+data+'</span>';
        }else
        {
            d='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ur" Wallet Balance is :<span class="text text-success" style="color:#17ab64;">'+data+'</span>';
        }

        $('#titleId2').html(d);
        //url= 'paybill'
    })
}


$(function(){
    /*$.post('../roleManagements/sideMenu',{},function(data){
        //$("#sidem").html(data);
    });*/
    //alert($('#titleId').html())
    $.post('../subActivitys/getfeaturename/0',{urlv:$('#titleId').html()},function(data){
        $('#titleId').html(data) });



});
function loadingBar(message){
    $.messager.progress({title:'loading',msg:message});
}

function closeBar()
{
    $.messager.progress('close');
}

function saveForm(formName,url,dialogName,datagridName){
    //url=url;
    $.messager.progress();
    $(formName).form('submit',{ url: url,
        onSubmit: function(){
            // $.messager.alert('info',$(this).form('validate'));
            if($(this).form('validate')==false)
            {
                $.messager.progress('close');
            }
            return $(this).form('validate');
        },
        success: function(result){
            $.messager.progress('close');
            var result = eval('('+result+')');
            if (result.msg){
                $.messager.show({title: 'Warning',
                    msg: result.msg});
            } else {
                $.messager.show({title: 'Info',
                    msg: 'successfully completed'});
                $(dialogName).dialog('close');
                $(datagridName).datagrid('reload'); // close the dialog
                // reload the user
            }

        }
    });



}

function saveFormNoDialog(formName,url){
    //url=url;
    $.messager.progress();
    $(formName).form('submit',{ url: url,
        onSubmit: function(){
            // $.messager.alert('info',$(this).form('validate'));
            if($(this).form('validate')==false)
            {
                $.messager.progress('close');
            }
            return $(this).form('validate');
        },
        success: function(result){
            $.messager.progress('close');
            var result = eval('('+result+')');
            if (result.msg){
                $.messager.show({title: 'Warning',
                    msg: result.msg});
            } else {
                $.messager.show({title: 'Info',
                    msg: 'successfully completed'});
                    $(this).form('clear')
                //$(dialogName).dialog('close');
                //$(datagridName).datagrid('reload'); // close the dialog
                // reload the user
            }

        }
    });



}




function saveFormNoDatagrid(formName,url,dialogName){
    //url=url;
    $.messager.progress();
    $(formName).form('submit',{ url: url,
        onSubmit: function(){
            // $.messager.alert('info',$(this).form('validate'));
            if($(this).form('validate')==false)
            {
                $.messager.progress('close');
            }
            return $(this).form('validate');
        },
        success: function(result){
            $.messager.progress('close');
            var result = eval('('+result+')');
            if (result.msg){
                $.messager.show({title: 'Warning',
                    msg: result.msg});
            } else {
                $.messager.show({title: 'Info',
                    msg: 'successfully completed'});
                $(dialogName).dialog('close');
                //$(datagridName).datagrid('reload'); // close the dialog
                // reload the user
            }

        }
    });



}



function saveFormUrl(formName,url,urlx){
    //url=url;
    $.messager.progress({title:'Submitting',msg:'Please wait connecting to server in progress...'});
    $(formName).form('submit',{ url: url,
        onSubmit: function(){
            // $.messager.alert('info',$(this).form('validate'));
            if($(this).form('validate')==false)
            {
                $.messager.progress('close');
            }
            return $(this).form('validate');
        },
        success: function(result){
            $.messager.progress('close');
            var result = eval('('+result+')');
            if (result.msg){
                $.messager.show({title: 'Error',
                    msg: result.msg});
            } else {
                $.messager.show({title: 'Info',
                    msg: 'successfully completed'});
                //$(dialogName).dialog('close');
                //$(datagridName).datagrid('reload'); // close the dialog
                // reload the user
                window.location=urlx+'&id='+result.x;
            }

        }
    });

}

function saveFormUrlRedirect(formName,url){
    //url=url;
    $.messager.progress({title:'Submitting',msg:'Please wait connecting to server in progress...'});
    $(formName).form('submit',{ url: url,
        onSubmit: function(){
            // $.messager.alert('info',$(this).form('validate'));
            if($(this).form('validate')==false)
            {
                $.messager.progress('close');
            }
            return $(this).form('validate');
        },
        success: function(result)
        {
            $.messager.progress('close');
            var result = eval('('+result+')');
            if (result.msg){
                $.messager.show({title: 'Error',
                    msg: result.msg});
            } else {
                $.messager.show({title: 'Info',
                    msg: 'successfully completed'});
                //$(dialogName).dialog('close');
                //$(datagridName).datagrid('reload'); // close the dialog
                // reload the user
                window.location=result.url;
            }

        }
    });

}



function saveFormUrl2(formName,url,urlx){
    //url=url;
    $.messager.progress({title:'Submitting',msg:'Please wait connecting to server in progress'});
    $(formName).form('submit',{ url: url,
        onSubmit: function(){
            // $.messager.alert('info',$(this).form('validate'));
            if($(this).form('validate')==false)
            {
                $.messager.progress('close');
            }
            return $(this).form('validate');
        },
        success: function(result){
            $.messager.progress('close');
            var result = eval('('+result+')');
            if (result.msg){
                $.messager.show({title: 'Error',
                    msg: result.msg});
            } else {
                $.messager.show({title: 'Info',
                    msg: 'successfully completed'});
                $(formName).form('clear');
                //$(dialogName).dialog('close');
                //$(datagridName).datagrid('reload'); // close the dialog
                // reload the user
                window.location=urlx;
            }

        }
    });

}
function openDia(){
    $('#dlgGraphGenerator').dialog('open').dialog('setTitle','Km Graph Generator');
    $('#frmGraphGenerator').form('clear');
    //newTrip();
    //url='controller/capacityController.php?action=add';
}
function generateGraph()
{
    var vehicleId=$('#geneId').combobox('getValue');
    location.href='admin.php?view=Vehicle_Kilometer_Graph&id='+vehicleId;

}

function notifyMe() {
    if (!("Notification" in window)) {
         alert("This browser does not support desktop notification");
    }
    else if (Notification.permission === "granted") {
        $.post('../purchasenotifications/notificationcount',{},function(data){
        if(parseInt(data)>0)
        {
            var options = {
                body: "You have "+data+" purchase notification </br>please to Procurement module",
                icon: "../public/images/logo.jpg",
                dir : "ltr"
            };
            var notification = new Notification("System Alerts",options);
        }else
        {

        }


        });
    }
    else if (Notification.permission !== 'denied') {
        Notification.requestPermission(function (permission) {
            if (!('permission' in Notification)) {
                Notification.permission = permission;
            }

            if (permission === "granted") {
                var options = {
                    body: "This is the body of the notification",
                    icon: "image2.jpg",
                    dir : "ltr"
                };
                var notification = new Notification("System Alerts",options);
            }
        });
    }
}
//var myVar=setInterval(function(){notifyMe()},150000);
//var myVar=setTimeout(function(){notifyMe()}, 10);
function getTitle(x)    
{

}

function isActiveCellFormatter(val,row)
{

    if(parseInt(val)==1)
    {
        return '<span style="color:#1ABB9C;">YES</span>';
    }else
    {
        return '<span style="color:#ae0b22;font-family: Tahoma; font-weight: bold;">NO</span>';
    }
}
function isActiveCellFormatterInclude(val,row)
{

    if(parseInt(val)==1)
    {
        return '<span style="color:#1ABB9C;">INCLUDED</span>';
    }else
    {
        return '<span style="color:#ae0b22;font-family: Tahoma; font-weight: bold;">EXCLUDED</span>';
    }
}


</script>



</body> 
</html>