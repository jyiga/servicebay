<?php 
 class guitoolbox extends Model{
private $id;
private $guiToolName;
private $openTag;
private $closeTag;
private $dispayHtml;
private $defaultClass;


		public function getid()
		{
 		return $this->id;
}

		public function getguiToolName()
		{
 		return $this->guiToolName;
}

		public function getopenTag()
		{
 		return $this->openTag;
}

		public function getcloseTag()
		{
 		return $this->closeTag;
}

		public function getdispayHtml()
		{
 		return $this->dispayHtml;
}

		public function getdefaultClass()
		{
 		return $this->defaultClass;
}

		public function setid($id)
		{
		  $this->id=$id;
		}

		public function setguiToolName($guiToolName)
		{
		  $this->guiToolName=$guiToolName;
		}

		public function setopenTag($openTag)
		{
		  $this->openTag=$openTag;
		}

		public function setcloseTag($closeTag)
		{
		  $this->closeTag=$closeTag;
		}

		public function setdispayHtml($dispayHtml)
		{
		  $this->dispayHtml=$dispayHtml;
		}

		public function setdefaultClass($defaultClass)
		{
		  $this->defaultClass=$defaultClass;
		}

		public function generateNextId()
		{
			return $this->_count()+1;
		}
} 
 ?>