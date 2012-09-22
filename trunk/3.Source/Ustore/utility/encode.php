<?php 
	class Encode{
		function __construct (){
		}
		static function encodemd5 ($user,$pass){
		
			$temp = md5($user);
			$temp = $temp."iShare".$pass;
			$temp = md5($temp);
			return $temp;
		
		}
		static function decodemd5()
		{
			
		}
	
	}
?>