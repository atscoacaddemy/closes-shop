<?php
class UserUtil{
	public static function createFormEdit($user)
	{
		$str="";
		$str.=' <form id="form" action="..." method="post">';
		$str.='	<fieldset id="personal"> ';
		$str.='		<legend> ';
		$str.='			EDIT USER  ';
		$str.='		</legend>';
		$str.='		<label for="email">Email : </label>';
		$str.='		<input name="email" id="emailEdit" type="text" tabindex="1" value="'.$user["Email"].'"/>';
		$str.='		<br />';
		$str.='		<label for="phone">Phone : </label>';
		$str.='		<input name="phone" id="phoneEdit" type="text" value="'.$user["Phone"].'"';
		$str.='		tabindex="2" />';
		$str.='		<br />';
		$str.='		<label for="role">Role : </label>';
		$str.='		<input name="role" id="roleEdit" type="text" value="'.$user["Role"].'"';
		$str.='		tabindex="2" />';
		$str.='		<br />
				<p>
					Send auto generated password
					<input name="generatepass" id="yes" type="checkbox"
					value="yes" tabindex="35" />
				</p>
				<label for="pass">Password : </label>
				<input name="pass" id="passEdit" type="password"
				tabindex="2" />
				<br />
				<label for="pass-2">Password Re: </label>
				<input name="pass-2" id="pass-2" type="password"
				tabindex="2" />
				<br />
			</fieldset>
			
			
			<div align="center">
				<input id="button1" type="button" value="Save" onclick="updateUser('.$user["ID"].');"/>
				<input  type="button" id="close-panel" value="Close" onclick="closePopupEdit();"/>
			</div>
		</form>';
		return $str;
	}
	public static function createMessageBox($text)
	{
		$str="";
		$str.=' <form id="form" action="..." method="post">';
		$str.='	<fieldset id="personal"> ';
		$str.='		<legend> ';
		$str.='			EDIT USER  ';
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