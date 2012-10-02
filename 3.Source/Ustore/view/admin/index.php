<?php
$isIndex = true;
require_once 'header.php';
?>
<div id="wrapper">
<div id="content" style="height: 500px">
	<div id="box">
		<h3>Login</h3>
		
		<?php
		if (isset($_REQUEST['action']) && $_REQUEST['action'] == "loginfail") {
			echo '<h3 style="color: red">Dang nhap ko thanh cong</h3>';
		}
		?>
		<form class="loginForm" name="frmLogin" action="action/action_login.php?action=login" method="post">
			
			<label for="txtMail">Email: </label>
			<input type="text" name="txtMail" id="txtMail" />
			<br />
			<label for="txtPass">Password: </label>
			<input type="password" name="txtPass" id="txtPass" />
			<br />
			<input style="cursor: pointer;" type="submit" value="Login" name="btnLogin"/>
		</form>
		
	</div>
</div>
<?php
require_once 'footer.php';
?>