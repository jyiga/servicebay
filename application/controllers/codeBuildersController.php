<?php

/**
 * Created by PhpStorm.
 * User: JYiga
 * Date: 21/04/2017
 * Time: 3:53 PM
 */
class CodeBuildersController extends Controller
{
    public function index()
    {

    }

    public function view()
    {

    }

    public function viewCombo()
    {
        $this->doNotRenderHeader=1;
        $sql="SHOW TABLES";
        $this->set('json',$this->_model->_DML());

    }
    public function add()
    {
        $this->doNotRenderHeader=1;
        $conn=$this->_model->_conn->hookUp;
        $table=$_REQUEST['entityId'];
        $className=$_REQUEST['name'];
        $codeGenerator=new CodeGenerator($table,$className,$conn);
        //Add subactivity 
        //
        $this->set('json',array('success'=>true));
    }

}
class CodeGenerator
{

    private $tableName;
    private $className;
    private $conn;
    //the table columns
    private $table_names;

    public function __construct($tableName,$className,$conn)
    {
        $this->tableName=$tableName;
        $this->className=$className;
        $this->conn=$conn;
        $query=$conn->prepare("Describe ".$this->tableName);
        $query->execute();
        $this->table_names=$query->fetchAll(PDO::FETCH_COLUMN);
        $this->GenerateModel();
        $this->GenerateService();
        $this->GenerateView();
        $this->GenerateScript();
        //$this->GenerateController();
    }

    private function GenerateModel()
    {

        //the file path for the model
        $fileName='../application/models/'.$this->className.".php";


        $fn=fopen($fileName,'w') or die("can't open file");

        $stringData="<?php \n class ".$this->className." extends Model{\n";

        fwrite($fn,$stringData);

        //print_r($this->table_names);
        for($i=0;$i<sizeof($this->table_names);$i++){
            $stringData2="private $".$this->table_names[$i].";\n";
            fwrite($fn,$stringData2);
        }
        $stringData3="\n";
        fwrite($fn,$stringData3);
        for($i=0;$i<sizeof($this->table_names);$i++){
            $stringData2="\n\t\tpublic function get".$this->table_names[$i]."()\n\t\t{\n \t\treturn $"."this->".$this->table_names[$i].";\n}\n";
            fwrite($fn,$stringData2);
        }

        for($i=0;$i<sizeof($this->table_names);$i++){
            $stringData2="\n\t\tpublic function set".$this->table_names[$i]."($".$this->table_names[$i].")\n\t\t{\n\t\t  $"."this->".$this->table_names[$i]."=$".$this->table_names[$i].";\n\t\t}\n";
            fwrite($fn,$stringData2);
        }



        $stringData4="} \n ?>";
        fwrite($fn,$stringData4);

        fclose($fn);
    }

    public function GenerateService()
    {
        $fileName2='../application/controllers/'.$this->className."sController.php";

        $entityForm=new entityform();
        $fn=fopen($fileName2,'w') or die("can't open file");

        $stringData="<?php \n class ".$this->className."sController extends Controller{\n";

        fwrite($fn,$stringData);

        //save method
        $stringData3="\n \t \t public function view()\n \t \t{\n";
        $stringData3=$stringData3."\t \t}\t";
        fwrite($fn,$stringData3);

        //viewall method.
        $stringData3="\n \t \tpublic function viewcombobox()\n \t \t {\n";
        $stringData3.="\t \t \t \t$"."this->doNotRenderHeader=1;\n";
        $stringData3.="\t \t \t \t$"."this->set('json',$"."this->_model->__viewCombo());\n";
        $stringData3=$stringData3."\t \t}\t";
        fwrite($fn,$stringData3);

        //fwrite($fn,$stringData3);
        //viewall method.
        $stringData3="\n \t \t public function viewall()\n \t \t{\n";
        $stringData3.="\t \t \t \t$"."this->doNotRenderHeader=1;\n";
        $stringData3.="\t \t \t \t$"."this->set('json',$"."this->_model->__view());\n";
        $stringData3=$stringData3."\t\t}\t";
        fwrite($fn,$stringData3);
        //update method
        $stringData3="\n \t \t public function edit($".$this->table_names[0].")\n \t \t{\n";
        $stringData3.="\t \t \t \t$"."this->doNotRenderHeader=1;\n";
        //$stringData3=$stringData3."\t \t $"."builder->setTable('".$this->tableName."');\n";
        $string3="";
        //change is to entity object
        $i=0;
        foreach($entityForm->resultSet("Select * from entityform order by orderIn") as $row)
        {
            
            $name=$row['colName'];
            $toolControl=$row['controlName'];
            $urltool=$row['url'];
            $txtVal=$row['txtVal'];
            $valVal=$row['valval'];
            $show=$row['isActive'];
            $label=$row['labelName'];
            $isRequired=$row['isRequired']==1?'Required':'';
            $theme=$_REQUEST['theme'];
            if($i==0)
            {
                $string3.="\t \t \t \t $"."this"."->_model->set".$name."(htmlspecialchars($".$name."));\n";

            }else{
                $string3.="\t \t \t \t $"."this"."->_model->set".$name."(htmlspecialchars($"."_REQUEST['".$name."']));\n";

            }
            $i++;
        }    

        // Obsolete function. We now saving the entity attrube so we, We are using that attribute to change 
        /*for($i=0;$i<sizeof($this->table_names);$i++)
        {
            if($i==0)
            {
                $string3.="\t \t \t \t $"."this"."->_model->set".$this->table_names[$i]."($".$this->table_names[$i].");\n";

            }else{
                $string3.="\t \t \t \t $"."this"."->_model->set".$this->table_names[$i]."($"."_REQUEST['".$this->table_names[$i]."']);\n";

            }
            //fwrite($fn,$string3);
        }*/
        $stringData3.=$string3."\t \t \t \t$"."this->set('json',$"."this->_model->__update()); \n \t \t}";

        fwrite($fn,$stringData3);

        // Changed to safe guard against 
        // add method
        $stringData3="\n \t \t  public function add()\n \t \t {\n";
        $stringData3.="\t \t \t \t$"."this->doNotRenderHeader=1;\n";
        //$stringData3=$stringData3."\t \t $"."builder->setTable('".$this->tableName."');\n";
        $string3="";
        $i=0;
        foreach($entityForm->resultSet("Select * from entityform order by orderIn") as $row)
        {
            
            $name=$row['colName'];
            $toolControl=$row['controlName'];
            $urltool=$row['url'];
            $txtVal=$row['txtVal'];
            $valVal=$row['valval'];
            $show=$row['isActive'];
            $label=$row['labelName'];
            $isRequired=$row['isRequired']==1?'Required':'';
            $theme=$_REQUEST['theme'];
            if($i==0)
            {
                //$string3.="\t \t \t \t $"."this"."->_model->set".$name."(htmlspecialchars($".$name."));\n";

            }else{
                //
                if($toolControl=='filePicker')
                {
                    $string3.="\t \t \t \t $"."list=array('jpg' => 'image/jpg', 'jpeg' => 'image/jpeg', 'gif' => 'image/gif', 'png' => 'image/png');\n";
                    $string3.="\t \t \t \t $"."path=utility::importFile('".$name."',$"."list);\n";
                    $string3.="\t \t \t \t $"."this"."->_model->set".$name."(htmlspecialchars($"."path));\n";    
                }else{
                    $string3.="\t \t \t \t $"."this"."->_model->set".$name."(htmlspecialchars($"."_REQUEST['".$name."']));\n";
                }
                

            }
            $i++;
        }    
        /*for($i=1;$i<sizeof($this->table_names);$i++)
        {
            $string3.="\t \t \t \t $"."this"."->_model->set".$this->table_names[$i]."($"."_REQUEST['".$this->table_names[$i]."']);\n";
            //fwrite($fn,$string3);
        }*/
        $stringData3.=$string3."\t \t \t \t$"."this->set('json',$"."this->_model->__save()); \n \t \t}";

        fwrite($fn,$stringData3);


        //delete
        //add method
        $stringData3="\n \t \t public function delete($".$this->table_names[0].")\n \t \t{\n";
        $stringData3.="\t \t \t \t$"."this->doNotRenderHeader=1;\n";
        //$stringData3=$stringData3."\t \t $"."builder->setTable('".$this->tableName."');\n";
        $string3="";
        for($i=0;$i<sizeof($this->table_names);$i++)
        {
            if($i==0)
            {

                $string3 .= "\t \t \t \t $" . "this" . "->_model->set" . $this->table_names[$i] . "($"  . $this->table_names[$i] . ");\n";
            }
            //fwrite($fn,$string3);
        }
        $stringData3.=$string3."\t \t \t \t $"."this->set('json',$"."this->_model->__delete()); \n \t \t} \n \t} ?>";

        fwrite($fn,$stringData3);



        //for($i=1;$i<sizeof($this->table_names);$i++){
            //$stringData2="\n \t \t if(!is_null(parent::get".$this->table_names[$i]."())){\n$"."builder->addColumnAndData('".$this->table_names[$i]."',parent::get".$this->table_names[$i]."()); \n}\n";
            //fwrite($fn,$stringData2);
        //}
        fclose($fn);
    }
    public function GenerateController()
    {
        //The input type vs the process mode not implemented
        $fileName2='../application/controller/'.$this->className."sController.php";

        $fn=fopen($fileName2,'w') or die("can't open file");
        $stringData="<?php \n \n  require_once('controller.php');\n";

        fwrite($fn,$stringData);
        $string="\n if(isset($"."_REQUEST['"."action"."'])){\n $"."controller_templet=new Controller($"."_REQUEST['action']);\n\t if($"."controller_templet->getAction()=='view'){\n";
        $string.="\t\t $".$this->className."=new ".$this->className."Service();\n \t\t echo json_encode( $".$this->className."->view());\n }";
        fwrite($fn,$string);
        //fwrite($fn,$stringData);
        $string2="\t else if($"."controller_templet->getAction()=='add'){\n";
        $string2.="\t \t $".$this->className."=new ".$this->className."Service();\n ";
        fwrite($fn,$string2);
        //set varible
        for($i=1;$i<sizeof($this->table_names);$i++){

            $string3="\t \t $".$this->className."->set".$this->table_names[$i]."($"."_REQUEST['".$this->table_names[$i]."']);\n";
            fwrite($fn,$string3);
        }
        $string4="\t \t echo json_encode( $".$this->className."->save());\n }\n else if($"."controller_templet->getAction()=='edit'){\n \t \t $".$this->className."=new ".$this->className."Service();\n ";
        fwrite($fn,$string4);
        for($i=0;$i<sizeof($this->table_names);$i++){

            $string3="\t \t $".$this->className."->set".$this->table_names[$i]."($"."_REQUEST['".$this->table_names[$i]."']);\n";
            fwrite($fn,$string3);
        }
        $string4="\t \t echo json_encode( $".$this->className."->update()); }\n else if($"."controller_templet->getAction()=='delete'){\n \t \t $".$this->className."=new ".$this->className."Service();\n ";
        fwrite($fn,$string4);
        $string3="\t \t $".$this->className."->set".$this->table_names[0]."($"."_REQUEST['".$this->table_names[0]."']);\n";
        fwrite($fn,$string3);
        $string5="echo json_encode( $".$this->className."->delete()); \n}else if($"."controller_templet->getAction()=='viewCombo'){  \n\t\t $".$this->className."=new ".$this->className."Service();\n \t\t echo json_encode( $".$this->className."->viewConbox());\n\t\t}   \n} ?>";
        fwrite($fn,$string5);
        fclose($fn);
    }

    public function divideNumber($topNumber,$button)
    {
        $topNumber=intval($topNumber);
        $button=intval($button);
       
        $reminder=0;
        $reminder=$topNumber % $button;
        if($topNumber % $button>0)
        {
            $reminder=1;
        }else
        {
            $reminder=0;
        }
        
        return (intval($topNumber/$button)+1) ;
    }

    public function GenerateView()
    {
        $dirPath="../application/views/".$this->className."s";
        if(file_exists($dirPath))
        {
            //rmdir($dirPath);
            if(is_dir($dirPath))
            {
                $fileIndir=scandir($dirPath);
                foreach($fileIndir as $file)
                {
                    if($file!='.'&&$file!='..')
                    {
                        unlink($dirPath.'/'.$file);
                    }
                }
                reset($fileIndir);
                rmdir($dirPath);
                mkdir($dirPath);

            }
            

        }else{
            mkdir($dirPath);
        }
        
        //create the add item
        $fileName2='../application/views/'.$this->className.'s/new.php';

        $fn=fopen($fileName2,'w') or die("can't open file");

        $string6=HtmlControlGenerator::openDialog($this->className)."\n";
        
        fwrite($fn,$string6);
        //the entityform
        $entityForm=new entityform();
        $colNum=$_REQUEST['colNum'];
        $fieldNum=$entityForm->_countDefined("isActive=1");
        $divCount=1;
        $overCount=1;

        $divItemNumb=$this->divideNumber($fieldNum,$colNum);
        $divlg=12/$colNum;

        error_log("Code Builder\n divItemNumb: ".$divItemNumb."\n Field:".$fieldNum."\n",3,ROOT.DS.'tmp'.DS.'logs'.DS.'codeBuilder.log') ;

        foreach($entityForm->resultSet("Select * from entityform order by orderIn") as $row)
        {
            
            $name=$row['colName'];
            $toolControl=$row['controlName'];
            $urltool=$row['url'];
            $txtVal=$row['txtVal'];
            $valVal=$row['valval'];
            $show=$row['isActive'];
            $label=$row['labelName'];
            $isRequired=$row['isRequired']==1?'Required':'';
            $theme=$_REQUEST['theme'];
            //$string7="\n\t Value of Show:". $show." Control Val: ".$toolControl." Name: ".$name;
                        //fwrite($fn,$string7);
                        
            
                        
            if($show==1)
            {
                if($divCount==1)
                {
                    $string7=   "<div class='col-lg-".$divlg."'>";
                    fwrite($fn,$string7);
                }
                
                
                if($theme=='bootstrap')
                {

                    switch($toolControl)
                    {
                        case "textbox":
                           
                            $string7="\t".HtmlControlGenerator::normalInputBox($name,$label,'text',$isRequired);
                            fwrite($fn,$string7);
                        break;
                        case "passwordbox":
                            
                            $string7="\t".HtmlControlGenerator::normalInputBox($name,$label,'password',$isRequired);
                            fwrite($fn,$string7);
                        break;
                        case "combobox":
                            
                            $string7="\t".HtmlControlGenerator::combobox($name,$urltool,$valVal,$txtVal,$label,$isRequired);
                            fwrite($fn,$string7);
                        break;
                        case "checkbox":
                            
                            $string7="\t".HtmlControlGenerator::checkBox($name,$label);
                            fwrite($fn,$string7);
                        break;
                        case "radiobutton":
                            
                            $string7="\t".HtmlControlGenerator::radioBox($name,$label);
                            //$string7="\t".HtmlControlGenerator::materialdateboxPicker($name,$label);
                            fwrite($fn,$string7);
                        break;
                        case "dateboxPicker":
                            
                            $string7="\t".HtmlControlGenerator::dateboxPicker($name,$label,$isRequired);
                            fwrite($fn,$string7);
                        break;
                        case "filePicker":
                            
                            $string8="\t".HtmlControlGenerator::filePicker($name,$label,$isRequired);
                            fwrite($fn,$string8);
                        break;
                        case "textarea":
                            
                            $string9="\t".HtmlControlGenerator::normalText($name,$label,$isRequired);
                            fwrite($fn,$string9);
                        break;
                        default:
                        break;
                    }
                }else if($theme=='material'){
                    switch($toolControl)
                    {
                        case "textbox":
                            
                            $string7="\t".HtmlControlGenerator::materialInputBox($name,$label,'text',$isRequired);
                            fwrite($fn,$string7);
                        break;
                        case "passwordbox":
                            
                            $string7="\t".HtmlControlGenerator::materialInputBox($name,$label,'password',$isRequired);
                            fwrite($fn,$string7);
                        break;
                        case "combobox":
                            //$name,$urltool,$valVal,$txtVal,$label,$isRequired
                            $string7="\t".HtmlControlGenerator::materialCombobx($name,$urltool,$valVal,$txtVal,$label,$isRequired);
                            fwrite($fn,$string7);
                        break;
                        case "checkbox":
                            
                            $string7="\t".HtmlControlGenerator::checkBox($name,$label);
                            fwrite($fn,$string7);
                        break;
                        case "radiobutton":
                            
                            $string7="\t".HtmlControlGenerator::radioBox($name,$label);
                            //$string7="\t".HtmlControlGenerator::materialdateboxPicker($name,$label);
                            fwrite($fn,$string7);
                        break;
                        case "dateboxPicker":
                            
                            $string7="\t".HtmlControlGenerator::materialdateboxPicker($name,$label,$isRequired);
                            fwrite($fn,$string7);
                        break;
                        case "filePicker":
                            
                            $string8="\t".HtmlControlGenerator::materialfilePicker($name,$label,$isRequired);
                            fwrite($fn,$string8);
                        break;

                        case "textarea":
                            
                            $string9="\t".HtmlControlGenerator::materialTextarea($name,$label,$isRequired);
                            fwrite($fn,$string9);
                        break;
                        default:
                        break;
                    }

                }

                
                if($divCount == ($divItemNumb))
                {
                    $string7=   "</div>";
                    fwrite($fn,$string7);
                    $divCount=1;
                }else if($overCount==$fieldNum){
                    $string7=   "</div>";
                    fwrite($fn,$string7);
                    $divCount=1;

                }else{
                    $divCount=$divCount+1;
                }


                

                
                $overCount=$overCount+1;

                    
                
            }else{
                
            }
            

                    

        }
        /*for($i=1;$i<sizeof($this->table_names);$i++)
        {

            $string7="\t".HtmlControlGenerator::materialInputBox($this->table_names[$i])."\n";
            fwrite($fn,$string7);
        }*/
        $string8=HtmlControlGenerator::closeDialog($this->className);
        fwrite($fn,$string8);
        fclose($fn);
        $fileName2='../application/views/'.$this->className.'s/view.php';
        $fn=fopen($fileName2,'w') or die("can't open file");
        $string9="<div class='col-lg-12'>"."\n\t"."<table id='dg".$this->className."' title='Manage ".$this->className."' class='easyui-datagrid' style='height:auto; width:100%; ' url='viewall' pagination='true' toolbar='#toolbar' rownumbers='true' fitColumns='true' singleSelect='true' iconCls='fa fa-table'>\n\t\t<thead>
                        	\n\t\t\t<tr>";
        fwrite($fn,$string9);
        for($i=0;$i<sizeof($this->table_names);$i++)
        {
            $entity=new entityform();
            $string7="\n\t\t\t\t<th field='".$this->table_names[$i]."' width='90'>".$entity->getLabel($this->table_names[$i])."</th>";
            fwrite($fn,$string7);
        }
        $string10="\n\t\t\t</tr>\n\t\t</thead>\n\t</table>\n\t<div id='toolbar' style:'padding:15px;'>";
        $string10.="\n\t\t".'<a href="#" class="btn btn-primary btn-sm" onclick="new'.$this->className.'()"><i class="fa fa-plus-circle"></i>Add</a>'."\n\t\t".'<a href="#" class="btn btn-link" onclick="edit'.$this->className.'()"><i class="fa fa-pencil"></i>Edit</a>'."\n\t\t".'<a href="#" class="btn btn-link" onclick="delete'.$this->className.'()"><i class="fa fa-times-circle"></i>Delete</a>'."\n\t"."</div>\n</div>";
        fwrite($fn,$string10);
        //add
        $fileName2='../application/views/'.$this->className.'s/add.php';
        $fn=fopen($fileName2,'w') or die("can't open file");
        $string9="<?php echo json_encode($"."json);";
        fwrite($fn,$string9);

        //delete
        $fileName2='../application/views/'.$this->className.'s/delete.php';
        $fn=fopen($fileName2,'w') or die("can't open file");
        $string9="<?php echo json_encode($"."json);";
        fwrite($fn,$string9);

        //edit
        $fileName2='../application/views/'.$this->className.'s/edit.php';
        $fn=fopen($fileName2,'w') or die("can't open file");
        $string9="<?php echo json_encode($"."json);";
        fwrite($fn,$string9);

        //viewall
        $fileName2='../application/views/'.$this->className.'s/viewall.php';
        $fn=fopen($fileName2,'w') or die("can't open file");
        $string9="<?php echo json_encode($"."json);";
        fwrite($fn,$string9);

        //viewcombobox
        $fileName10='../application/views/'.$this->className.'s/viewcombobox.php';
        $fn=fopen($fileName10,'w') or die("can't open file");
        $string10="<?php echo json_encode($"."json);";
        fwrite($fn,$string10);



        fclose($fn);

    }
    public function GenerateScript()
    {
        $fileName2='../public/customJs/'.$this->className.'s.js';
        $fn=fopen($fileName2,'w') or die("can't open file");
        //write the common javascript function
        $string30="\n\n function new".$this->className."(){\n$"."('#dlg".$this->className."').dialog('open').dialog('setTitle','Enter ".$this->className." ');\n$"."('#frm".$this->className."').form('clear');\n url='add'; \n}";
        fwrite($fn,$string30);
        $string31="\n\n function edit".$this->className."(){\n var row=$"."('#dg".$this->className."').datagrid('getSelected');\n if(row)\n{\n $"."('#dlg".$this->className."').dialog('open').dialog('setTitle','Edit ".$this->className."');\n $"."('#frm".$this->className."').form('load',row); \n url='edit/'+row.".$this->table_names[0].";\n}\n else{\n$".".messager.show({title:'Warning!',msg:'Please select a item to to edit'});} \n}";
        fwrite($fn,$string31);
        $string32="\n\n function delete".$this->className."(){\n var row=$"."('#dg".$this->className."').datagrid('getSelected');\n if(row)\n{\n $."."messager.confirm('Warning', 'Are you sure of the the act', function(r){ if (r){    $."."post('delete/'+row.".$this->table_names[0].",{},function(data){ $"."('#dg".$this->className."').datagrid('reload');});\n \n}\n});}\n else{\n$".".messager.show({title:'Warning!',msg:'Please select a item to to edit'});} \n}";
        fwrite($fn,$string32);
        $string33="\n\n function save".$this->className."(){\n saveForm('#frm".$this->className."',url,'#dlg".$this->className."','#dg".$this->className."');\n}";
        fwrite($fn,$string33);
        fclose($fn);
    }






}
class HtmlControlGenerator
{

    public static function normalInputBox($name, $label=null, $inputTypeOf =null,$isRequired='')
    
    {
        $inputType = 'text';
        if(empty($label))
        {
                $label=$name;
        }
        if(!empty($inputTypeOf))
        {
            $inputType=$inputTypeOf;
        }

                        
        return "\n\t<div class='form-group'>\n\t<label>".$label."</label>\n\t<input name='".$name."' value='' id='".$name."' class='form-control' type='".$inputType."' ".$isRequired." />\n\t\t </div>\n";
    }

    public static function normalText($name, $label=null, $inputTypeOf =null,$isRequired='')
    
    {
        $inputType = 'text';
        if(empty($label))
        {
                $label=$name;
        }
        if(!empty($inputTypeOf))
        {
            $inputType=$inputTypeOf;
        }

                        
        return "\n\t<div class='form-group'>\n\t<label>".$label."</label>\n\t<textarea row='4' name='".$name."'  id='".$name."' class='form-control'  ".$isRequired."></textarea>\n\t\t </div>\n";
    }

    public static function materialInputBox($name,$label=null,$inputTypeOf =null,$isRequired='')
    {

        if(empty($label)||$label==null)
        {
                $label=$name;
        }
        return "\n\t<div class='form-group form-float'>\n\t\t<label class='form-label'>".$label."</label>\n\t\t\t\t<div class='form-line'>\n\t\t\t<input name='".$name."' value='' id='".$name."' class='form-control' type='text' ".$isRequired." />\n\t\t</div>\n\t</div>";
    }

    public static function materialTextarea($name,$label=null,$isRequired='')
    {

        if(empty($label)||$label==null)
        {
                $label=$name;
        }
        return "\n\t<div class='form-group form-float'>\n\t\t\t<label class='form-label'>".$label."</label>\n\t\t\t<div class='form-line'>\n\t\t\t\t<textarea rows='4' name='".$name."' id='".$name."' class='form-control' placeholder='Please type what you want...' ></textreaa> \n\t\t</div>\n\t</div>";
    }

    public static function combobox($name,$url,$idVal,$textVal,$label=null,$isRequired='')
    {
        if(empty($label)||$label==null)
        {
                $label=$name;
        }
        //return "\n\t<div class='form-group >\n\t\t<label class='form-label'>".$label."</label>\n\t\t\t<select id='".$name."' name='".$name."' class='easyui-combobox form-control' style='height:30px; width:100%;'  data-options=\""."url:'".$url."',valueField:'".$idVal."',textField:'".$textVal."',panelWidth:'450',panelHeight:'auto'\" ".$isRequired."></select>\n\t</div>\n";
        return "\n\t<div class='form-group'>\n\t\t\t<label>".$label."</label>\n\t\t\t\t<input id='".$name."' name='".$name."' class='easyui-combobox form-control' style='height:30px; width:100%; padding-top:5px;'  data-options=\""."url:'".$url."',valueField:'".$idVal."',textField:'".$textVal."',panelWidth:'450',panelHeight:'auto'\"  ".$isRequired." />\n\t\t</div>";
        
    }

    public static function materialCombobx($name,$url,$idVal,$textVal,$label=null,$isRequired='')
    {
        if(empty($label)||$label==null)
        {
                $label=$name;
        }
        //return "\n\t<div class='form-group form-float'>\n\t\t<div class='form-line'>\n\t\t\t<label class='form-label'>".$label."</label>\n\t\t\t\t<select id='".$name."' name='".$name."' class='easyui-combobox form-control' style='height:30px; width:100%; padding-top:5px;'  data-options=\""."url:'".$url."',valueField:'".$idVal."',textField:'".$textVal."',panelWidth:'450',panelHeight:'auto'\"  ".$isRequired."></select>\n\t\t </div>\n\t</div>";
        //$str="data-options=\""."url:'".$url."',valueField:'".$idVal."',textField:'".$textVal."',panelWidth:'450',panelHeight:'auto'\"";
        return "<div class='form-group form-float'>\n\t\t<label class='form-label'>".$label."</label>\n\t\t\t\t<div class='form-line'>\n\t\t\t<input id='".$name."' name='".$name."' class='easyui-combobox form-control' style='height:30px; width:100%; padding-top:5px;'  data-options=\""."url:'".$url."',valueField:'".$idVal."',textField:'".$textVal."',panelWidth:'450',panelHeight:'auto'\"  ".$isRequired." />\n\t\t</div>\n\t</div>";
        
    }

    public static function dateboxPicker($name,$label=null,$isRequired='')
    {
        if(empty($label)||$label==null)
        {
                $label=$name;
        }
        return "\n\t<div class='form-group>\n\t\t<label >".$label."</label>\n\t\t\t<input name='".$name."' value='' id='".$name."' class='easyui-datebox' data-options='formatter:myformatter2,parser:myparser,required:true' style='width:100%;height:30px;'  type='text' ".$isRequired." />\n\t</div>";
    }

    public static function materialdateboxPicker($name,$label=null, $isRequired='')
    {
        if(empty($label)||$label==null)
        {
                $label=$name;
        }
        return "\n\t<div class='form-group form-float'><label class='form-label'>".$label."</label>\n\t\t\t<div class='form-line'>\n\t\t<input name='".$name."' value='' id='".$name."' class='easyui-datebox' data-options='formatter:myformatter2,parser:myparser,required:true' style='width:100%;height:30px;padding-top:5px;'  type='text' ".$isRequired." /> \n\t\t</div>\n\t</div>";
   
    }

    public static function checkBox($name,$label=null)
    {
        if(empty($label)||$label==null)
        {
                $label=$name;
        }
        return "\n\t<div class='form-group'>\n\t\t<label>".$label."</label>\n\t\t\t<input name='".$name."' value='' id='".$name."' class='flat form-control' type='checkbox' />:".$name."\n\t</div>";
    }

    public static function radioBox($name,$label=null)
    {
        if(empty($label)||$label==null)
        {
                $label=$name;
        }
        return "\n\t<div class='form-group'>\n\t\t<label>".$label."</label>\n\t\t\t<input name='".$name."' value='' id='".$name."' class='form-control' type='radio' />:".$name."\n\t</div>";
    }

    public static function filePicker($name,$label=null)
    {
        if(empty($label)||$label==null)
        {
                $label=$name;
        }
     
        return "\n\t<div class='form-group form-float'>\n\t\t<label>".$label."</label>\n\t\t\t<input name='".$name."'  id='".$name."' class='form-control' type='file' />\n\t</div>";
    }
    public static function materialfilePicker($name,$label=null)
    {
        if(empty($label)||$label==null)
        {
                $label=$name;
        }
     
        return "\n\t<div class='form-group form-float'>\n\t\t<label class='form-line'>".$label."</label>\n\t\t\t<input name='".$name."'  id='".$name."' class='form-control' type='file' />:".$name."\n\t</div>";
    }


    public static function openDialog($name,$size='800px')
    {
        return "\n<div id='dlg".$name."' class='easyui-dialog' closed='true' style='width:".$size."; padding:15px;' toolbar='#".$name."button' modal='true' >"."\n\t"."<form id='frm".$name."' name='frm".$name."' method='post' data-parsley-validate>\n";
    }
    public static function closeDialog($name)
    {
        return "\n\t".'</form>'."\n</div>\n".'<div id="'.$name.'button">'."\n\t".'<a href="#" class="btn btn-primary" onclick="save'.$name.'()"><i class="fa fa-save"></i>Save</a>&nbsp;&nbsp;'."\n\t".'<a href="#" class="btn btn-primary" onclick="javascript:$(\'#dlg'.$name.'\').dialog(\'close\')"><i class="fa fa-times"></i>Close</a>'."\n\t</div>";
    }

}

