<?php
class UserUtil{
	public static function createFormEdit($user)
	{
		require_once ("../../../controller/RoleController.php");
		$roles=RoleController::GetAll();
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
		$str.='		<select name="role" id="role">';
				
					for ($i=0;$i<count($roles);$i++) {
						if($user["Role"]==$roles[$i]["ID"])//select first option
							$str.= "<option  selected='selected' value='".$roles[$i]["ID"]."'>".$roles[$i]["Name"]."</option>";
						else {
							$str.= "<option  value='".$roles[$i]["ID"]."'>".$roles[$i]["Name"]."</option>";
						}
					}
				
		$str.='		</select>';
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
public static function createFormInfo($user)
	{
		$str="";
		$str.=' <form id="form" action="..." method="post">';
		$str.='	<fieldset id="personal"> ';
		$str.='		<legend> ';
		$str.='			USER INFOMATION ';
		$str.='		</legend>';
		$str.='		<p>Email : '.$user["Email"].'</p>';

		$str.='		<p>Phone : '.$user["Phone"].'</p>';

		$str.='		<p>Role : '.$user["Role"].'</p>';
		$str.='		
				
				<p>Password : '.$user["Password"].'</p>
				<br />
				
			</fieldset>
			
			
			<div align="center">
				<input  type="button" id="close-panel" value="Close" onclick="closePopupEdit();"/>
			</div>
		</form>';
		return $str;
	}
public static function createSearchResult($users)
{
	$str = "";
	$str.='<div id="box">';
	$str.='	<h3>Users</h3>';
	$str.='	<table width="100%">';
	$str.='		<thead>';
	$str.='			<tr>';
	$str.='				<th width="40px"><a href="#">ID<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></a></th>';					
	$str.='				<th><a href="#">Name</a></th>';
	$str.='				<th><a href="#">Password</a></th>';
	$str.='				<th width="90px"><a href="#">Phone</a></th>';
	$str.='				<th><a href="#">Email</a></th>';
	$str.='				<th width="90px"><a href="#">Created Date</a></th>';
	$str.='				<th width="60px"><a href="#">Action</a></th>';
	$str.='			</tr>';
	$str.='		</thead>';
	$str.='		<tbody>';

		
			if($users!=null)
				foreach ($users as $user) {
	
	$str.='				<tr>';
	$str.='				<td class="a-center">'.$user["ID"].'</td>';
	$str.='				<td><a href="#">'.$user["Name"].'</a></td>';
	$str.='				<td>'.$user["Password"].'</td>';
	$str.='				<td>'.$user["Phone"].'</td>';
	$str.='				<td><a href="#">'.$user["Email"].'</a></td>';
	$str.='				<td>'.$user["Create_Date"].'</td>';
	$str.='				<td><a href="#" onclick="showPopupInfo('.$user["ID"].')"><img src="img/icons/user.png" title="Show profile" width="16" height="16" /></a><a onclick="showPopupEdit('.$user["ID"].');" href="#"><img src="img/icons/user_edit.png" title="Edit user" width="16" height="16" /></a><a href="#" onclick="showConfirmDelete('.$user["ID"].');"><img src="img/icons/user_delete.png" title="Delete user" width="16" height="16" /></a></td>';
	$str.='				</tr>';
					
				}
	$str.='	</tbody>';
	$str.='	</table>';
	
			
	$str.='	</div>';
	return $str;
}
}
?>