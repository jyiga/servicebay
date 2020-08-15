<?php 
 class guitoolboxsController extends Controller{

 	 	 public function view()
 	 	{
	 	}	
 	 	public function viewcombobox()
 	 	 {
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	$this->set('json',$this->_model->__viewCombo());
	 	}	
 	 	 public function viewall()
 	 	{
				   $this->doNotRenderHeader=1;
				   $sql="SELECT id,guiToolName,FROM_BASE64(openTag) openTag,FROM_BASE64(closeTag) closeTag,FROM_BASE64(dispayHtml)dispayHtml, REPLACE(REPLACE(REPLACE(FROM_BASE64(openTag),'<','&lt; '),'/',' &frasl;'),'>',' &gt;') openTagDisplay, REPLACE(REPLACE(REPLACE(FROM_BASE64(closeTag),'<','&lt; '),'/',' &frasl;'),'>',' &gt;') closeTagDisplay,REPLACE(REPLACE(REPLACE(FROM_BASE64(dispayHtml),'<','&lt; '),'/',' &frasl;'),'>',' &gt;') dispayHtmlDisplay,defaultClass FROM `guitoolbox`  ";
	 	 	 	$this->set('json',$this->_model->__viewSql($sql));
		}	
 	 	 public function edit($id)
 	 	{
	 	 	 	$this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setid($id);
	 	 	 	 $this->_model->setguiToolName($_REQUEST['guiToolName']);
	 	 	 	 $this->_model->setopenTag(base64_encode($_REQUEST['openTag']));
	 	 	 	 $this->_model->setcloseTag(base64_encode($_REQUEST['closeTag']));
	 	 	 	 $this->_model->setdispayHtml(base64_encode($_REQUEST['dispayHtml']));
	 	 	 	 $this->_model->setdefaultClass($_REQUEST['defaultClass']);
	 	 	 	$this->set('json',$this->_model->__update()); 
 	 	}
 	 	  public function add($id)
 	 	 {
				$this->doNotRenderHeader=1;
				$this->_model->setid($id);
				$this->_model->setguiToolName($_REQUEST['guiToolName']);
				$this->_model->setopenTag(base64_encode($_REQUEST['openTag']));
				$this->_model->setcloseTag(base64_encode($_REQUEST['closeTag']));
				$this->_model->setdispayHtml(base64_encode($_REQUEST['dispayHtml']));
				$this->_model->setdefaultClass($_REQUEST['defaultClass']);
	 	 	 	$this->set('json',$this->_model->__save()); 
 	 	}
 	 	 public function delete($id)
 	 	{
	 	 	 	 $this->doNotRenderHeader=1;
	 	 	 	 $this->_model->setid($id);
	 	 	 	 $this->set('json',$this->_model->__delete()); 
		} 
		  public function getId()
		  {
			$this->doNotRenderHeader=1;
			$this->set('json',$this->_model->generateNextId());

		  }
 	} ?>