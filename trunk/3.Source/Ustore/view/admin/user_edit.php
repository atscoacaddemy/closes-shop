<!-- user content -->
<script type="text/javascript">
function showPopupEdit(userId)
	{		
		 $("#lightbox, #lightbox-panel").fadeIn(300);
		$("#lightbox-panel").load("action/action_user.php?action=showPopupEdit",{'userId':userId});
		
	}
function closePopupEdit() {
  $("#lightbox, #lightbox-panel, #info-panel").fadeOut(300);
  window.location.reload(true);
}
function updateUser(id)
{
	var email = $("#emailEdit").val();
	var phone = $("#phoneEdit").val();
	var role = $("#roleEdit").val();
	var pass = $("#passEdit").val();
	$("#lightbox-panel").load("action/action_user.php?action=update",{'id':id,'email':email,'phone':phone,'role':role,'pass':pass});
	
}
function showPopupInfo(userId)
{
	$("#lightbox, #info-panel").fadeIn(300);
	$("#info-panel").load("action/action_user.php?action=showPopupInfo",{'userId':userId});
}
function showConfirmDelete(userId)
{
	$("#txtUserId").val(userId);
	$("#lightbox, #message-panel").fadeIn(300);
}
function deleteUser()
{
	var userId=$("#txtUserId").val();
	$("#message-panel").load("action/action_user.php?action=delete",{'userId':userId});
}
</script>
<?php
	include ("../../controller/config.php");
	require_once("../../utility/Utils.php");
	$curPage = "";
	if (isset($_GET["page"]))
		$curPage = (int) $_GET["page"];
    $curPage = $curPage>0?$curPage:1;
	$curItem = ($curPage-1)*$maxItems;
?>
<div id="wrapper">
<div id="content">
	<div id="box">
		<h3>Users</h3>
		<table width="100%">
			<thead>
				<tr>
					<th width="40px"><a href="#">ID<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></a></th>					
					<th><a href="#">Name</a></th>					
					<th><a href="#">Password</a></th>
					<th width="90px"><a href="#">Phone</a></th>
					<th><a href="#">Email</a></th>
					<th width="90px"><a href="#">Created Date</a></th>
					<th width="60px"><a href="#">Action</a></th>
				</tr>
			</thead>
			<tbody>
				<?php
				require_once ("../../controller/UserController.php");
				$users=UserController::GetUsers($curItem,$maxItems);
				$totalItems=UserController::Count();
				if($users!=null)
				foreach ($users as $user) {
					?>
					<tr>
					<td class="a-center"><?php echo $user["ID"]; ?></td>
					<td><?php echo $user["Name"] ;?></td>					
					<td><?php echo $user["Password"] ;?></td>
					<td><?php echo $user["Phone"] ;?></td>
					<td><a href="#"><?php echo $user["Email"] ;?></a></td>
					<td><?php echo$user["Create_Date"] ;?></td>
					<td><a href="#" onclick="showPopupInfo(<?php echo $user["ID"]; ?>)"><img src="img/icons/user.png" title="Show profile" width="16" height="16" /></a><a onclick="showPopupEdit(<?php echo $user["ID"]; ?>);" href="#"><img src="img/icons/user_edit.png" title="Edit user" width="16" height="16" /></a><a href="#" onclick="showConfirmDelete(<?php echo $user["ID"]; ?>);"><img src="img/icons/user_delete.png" title="Delete user" width="16" height="16" /></a></td>
					</tr>
					<?php
				}
				?>
				
				
			</tbody>
		</table>
	
			<?php 
				
				$strLink = "user_index.php?view=user&";
								$strPaging = Utils::paging ($strLink,$totalItems,$curPage,$maxPages,$maxItems);
								echo $strPaging; 
				
			?>
			
			<!--
			Page <a href="#"><img src="img/icons/arrow_left.gif" width="16" height="16" /></a>
									<input size="1" value="1" type="text" name="page" id="page" />
									<a href="#"><img src="img/icons/arrow_right.gif" width="16" height="16" /></a>of 42
									pages | View
									<select name="view">
										<option>10</option>
										<option>20</option>
										<option>50</option>
										<option>100</option>
									</select>
									per page | Total <strong>420</strong> records found-->
			
			
		
	</div>
	<br />
	<div id="box">
		<h3 id="adduser">USER</h3>
		<form id="form" action="action/action_user.php" method="post">
			<fieldset id="personal">
				<legend>
					ADD NEW
				</legend>
				<label for="name">Name : </label>
				<input name="name" id="name" type="text" tabindex="1" />
				<br />
				<label for="email">Email : </label>
				<input name="email" id="email" type="text" tabindex="1" />
				<br />
				<label for="phone">Phone : </label>
				<input name="phone" id="phone" type="text"
				tabindex="2" />
				<br />
				<?php
					require_once ("../../controller/RoleController.php");
					$roles=RoleController::GetAll();
				?>
				<label for="role">Role : </label>
				<select name="role" id="role">
				<?php
					for ($i=0;$i<count($roles);$i++) {
						if($i==0)//select first option
							echo "<option  selected='selected' value='".$roles[$i]["ID"]."'>".$roles[$i]["Name"]."</option>";
						else {
							echo "<option  value='".$roles[$i]["ID"]."'>".$roles[$i]["Name"]."</option>";
						}
					}
				?>
				</select>
				<!--
				<input name="role" id="role" type="text"
								tabindex="2" />-->
				
				
				<br />
				<p>
					Send auto generated password
					<input name="generatepass" id="yes" type="checkbox"
					value="yes" tabindex="35" />
				</p>
				<label for="pass">Password : </label>
				<input name="pass" id="pass" type="password"
				tabindex="2" />
				<br />
				<label for="pass-2">Password Re: </label>
				<input name="pass-2" id="pass-2" type="password"
				tabindex="2" />
				<br />
			</fieldset>
		
			<div align="center">
				<input id="button1" type="submit" value="Save" name="btnAddUser"/>
				<input id="button2" type="reset" />
			</div>
		</form>
	</div>
</div>

<div id="lightbox-panel" class="lightbox-panel">
    <form id="form" action="..." method="post">
			<fieldset id="personal">
				<legend>
					EDIT USER
				</legend>
				<label for="name">Name : </label>
				<input name="name" id="nameEdit" type="text" tabindex="1" />
				<br />
				<label for="email">Email : </label>
				<input name="email" id="emailEdit" type="text" tabindex="1" />
				<br />
				<label for="phone">Phone : </label>
				<input name="phone" id="phoneEdit" type="text"
				tabindex="2" />
				<br />
				<label for="role">Role : </label>
				<input name="role" id="roleEdit" type="text"
				tabindex="2" />
				<br />
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
				<input id="button1" type="button" value="Save" onclick="updateUser();"/>
				<input  type="button" id="close-panel" value="Close"/>
			</div>
		</form>
</div><!-- /lightbox-panel -->

<div class="lightbox" id="lightbox"> </div><!-- /lightbox -->
<!-- Confirm Messagebox -->
<div class="lightbox-panel" id="message-panel">
    <form id="form" action="..." method="post">
			<fieldset id="personal">
				<legend>
					EDIT USER
				</legend>
				<h3>Are you sure remove!</h3>
			</fieldset>
			
			
			<div align="center">
				<input id="txtUserId" type="hidden" />
				<input id="button1" type="button" value="Yes" onclick="deleteUser();"/>
				<input  type="button" id="close-panel" value="No"/>
			</div>
		</form>
</div>
<!-- -->
<!-- Confirm Messagebox -->
<div class="lightbox-panel" id="info-panel"></div>
</div>