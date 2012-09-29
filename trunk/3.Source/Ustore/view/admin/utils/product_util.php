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
	public static function createSearchResult($productList)
	{
		$str="";
		$str.='<div id="box">';
		$str.='<h3>Users</h3>';
		$str.='<table width="100%">';
		$str.='	<thead>';
		$str.='		<tr>';
		$str.='			<th width="40px"><a href="#">ID<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></a></th>';					
		$str.='			<th><a href="#">Name</a></th>';
		$str.='			<th><a href="#">Description</a></th>';
		$str.='			<th width="90px"><a href="#">Type</a></th>';
		$str.='			<th width="50px"><a href="#">Sub_Type</a></th>';
		$str.='			<th width="90px"><a href="#">Price</a></th>';
		$str.='			<th width="60px"><a href="#">Action</a></th>';
		$str.='		</tr>';
		$str.='	</thead>';
		$str.='	<tbody>';
				
				
				
				foreach ($productList as $product) {
					
		$str.='			<tr>';
		$str.='			<td class="a-center">'.$product["ID"].'</td>';
		$str.='			<td><a href="?action=view&id=.$product["ID"]">'.$product["Name"].'</a></td>';
		$str.='			<td>'.$product["Description"].'</td>';
		$str.='			<td>'.$product["Type"].'</td>';
		$str.='			<td>'.$product["Sub_Type"].'</td>';
		$str.='			<td>'.$product["Price"].'</td>';
		$str.='			<td><a href="?action=view&id='.$product["ID"].'" ><img src="img/icons/user.png" title="Show profile" width="16" height="16" /></a><a href="?action=edit&id='.$product["ID"].'"><img src="img/icons/user_edit.png" title="Edit user" width="16" height="16" /></a><a href="#" onclick="showConfirmDelete('.$product["ID"].');"><img src="img/icons/user_delete.png" title="Delete user" width="16" height="16" /></a></td>';
		$str.='				</tr>';
					
				}
				
				
				
		$str.='		</tbody>';
		$str.='	</table>';
											
	$str.='	</div>';
	return $str;
	}
}
?>