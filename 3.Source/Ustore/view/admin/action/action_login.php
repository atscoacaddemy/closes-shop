<?php
ob_start();
include_once("../../../controller/UserController.php");
?>

<?php
if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="login")
{
	$mail = $_REQUEST["txtMail"];
	$pass = $_REQUEST["txtPass"];
	$user = UserController::CheckLogin($mail,$pass);
	if($user!=null && $user["Role"]==1)
		{
			session_start();
			$_SESSION["admin"]=$user;
			//echo $_SESSION["admin"]['Name'];
			header("Location:../user_index.php");
		}
		else {
			header("Location:../index.php?action=loginfail");
		}
	
}
if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="logout")
{	
	session_start();
	unset($_SESSION['admin']);
	header("Location:../index.php");
	
}
?>