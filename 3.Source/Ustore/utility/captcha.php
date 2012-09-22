<?php  
	class Captcha{ 
		function __construct (){
		}
		static function generate_code() 
		{ 
			$md5_hash = md5(rand(0,999)); 
			$security_code = substr($md5_hash, 15, 5); 
			return $security_code;
		} 
	
	
	}
?>