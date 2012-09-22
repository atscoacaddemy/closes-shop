<?php
	class Pdf{
	
		var $name;
		var $size;
		var $type;
		
		function __construct($name,$size,$type)
		{
			$this->name=$name;
			$this->size=$size/1024;
			$this->type=$type;
		}
		function file_extension($filename)
		{
			$path_info = pathinfo($filename);
			return $path_info['extension'];
		}
	    function upload($folder)
		{			
			$name = rand().".".$this->file_extension($this->name);				
			move_uploaded_file($_FILES["file"]["tmp_name"],$folder."/" . $name);				
			return $name;
					
		}
			
	}

?>