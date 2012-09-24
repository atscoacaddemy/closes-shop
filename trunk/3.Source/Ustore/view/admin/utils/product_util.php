<?php
class ProductUtil{
	public static function createMessageBox($name,$text)
	{
		$str="";
		$str.=' <form id="form" action="..." method="post">';
		$str.='	<fieldset id="personal"> ';
		$str.='		<legend> ';
		$str.=$name;
		$str.='		</legend>';
		$str.='		<h3>'.$text.'</h3>';
		$str.='
		</fieldset>
			
			
			<div align="center">				
				<input  type="button" id="close-panel" value="Close" onclick="closePopupEdit();"/>
			</div>
		</form>';
		return $str;
	}
}
?>