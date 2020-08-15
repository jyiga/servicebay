<?php 
 class userpge extends Model{
private $id;
private $folder;
private $image;
private $isactive;


		public function getid()
		{
 		return $this->id;
}

		public function getfolder()
		{
 		return $this->folder;
}

		public function getimage()
		{
 		return $this->image;
}

		public function getisactive()
		{
 		return $this->isactive;
}

		public function setid($id)
		{
		  $this->id=$id;
		}

		public function setfolder($folder)
		{
		  $this->folder=$folder;
		}

		public function setimage($image)
		{
		  $this->image=$image;
		}

		public function setisactive($isactive)
		{
		  $this->isactive=$isactive;
		}
} 
 ?>