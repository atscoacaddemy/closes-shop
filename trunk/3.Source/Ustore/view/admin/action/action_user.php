<?php
if(isset($_POST["btnAddUser"]))
{   	
		include_once("../../../controller/UserController.php");
		$email=$_POST["email"];
		$pass=$_POST["pass"];
		$pass=md5($pass);
		$phone=$_POST["phone"];
		$role=$_POST["role"];
		
		$result = UserController::Add($pass, $email,$phone,$role);
		if($result)
			header("Location:../user_index.php?id=".$result['id']);
}
if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="showPopupEdit")
{
	include_once("../../../controller/UserController.php");
	$id=$_REQUEST["userId"];
	$result = UserController::GetUserByID($id);
		if($result)
		{
			require_once ("../utils/user_util.php");
			echo UserUtil::createFormEdit($result);
		}
			
}
if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="update")
{
	require_once("../../../controller/UserController.php");
	require_once ("../utils/user_util.php");
	$email=$_REQUEST["email"];
	$pass=$_REQUEST["pass"];
	$pass=md5($pass);
	$phone=$_REQUEST["phone"];
	$role=$_REQUEST["role"];
	$id=$_REQUEST["id"];
	$result = UserController::Update($id,$pass, $email,$phone,$role);
		if($result)
			echo UserUtil::createMessageBox("Update completed!"); 
		else {
			echo UserUtil::createMessageBox("Update does not completed!"); 
		}
	
	
}
if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="showPopupInfo")
{
	require_once("../../../controller/UserController.php");
	$id=$_REQUEST["userId"];
	
	$result = UserController::GetUserByID($id);
		if($result)
		{
			require_once ("../utils/user_util.php");
			echo UserUtil::createFormInfo($result);
		}
			
}
?>