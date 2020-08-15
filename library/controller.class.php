<?php
class Controller {

	protected $_model;
	protected $_controller;
	protected $_action;
	protected $_template;

	public $doNotRenderHeader;
	public $render;

	function __construct($model, $controller, $action)
    {

		$this->_controller = $controller;
		$this->_action = $action;
		//$this->_model = $model;

		$this->_model =new  $model;
		$this->_template =new Template($controller,$action);
		$this->doNotRenderHeader = 0;
		//the title Bar.
		//$this->set('controller',$this->_action.':'. $this->_controller);
        $this->set('controller',$this->_controller.'/'.$this->_action);
		//$this->set('menu',new RoleManagementsController('roleManagement','roleManagementsController','sideMenu'));
		$this->render = true;
		//

	}

	function set($name,$value)
	{
		$this->_template->set($name,$value);
	}

	function __destruct()
	{
		if ($this->render)
		{
			$this->_template->render($this->doNotRenderHeader);
		}
	}

}
