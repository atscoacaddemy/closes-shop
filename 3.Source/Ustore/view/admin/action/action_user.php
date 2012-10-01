<?php
if(isset($_POST["btnAddUser"]))
{   	
		include_once("../../../controller/UserController.php");
		$name=$_POST["name"];
		$email=$_POST["email"];
		$pass=$_POST["pass"];
		$phone=$_POST["phone"];
		$role=$_POST["role"];
		
		$result = UserController::AddUser($name,$pass, $email,$phone,$role);
		if($result)
			header("Location:../user_index.php?id=".$result);
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
	$phone=$_REQUEST["phone"];
	$role=$_REQUEST["role"];
	$id=$_REQUEST["id"];
	$result = UserController::Update($id,$pass, $email,$phone,$role);
		if($result)
			echo UserUtil::createMessageBox("Update completed!"); 
		else {
			echo UserUtil::createMessageBox("Update does not complete!"); 
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
if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="delete" )
	{
	require_once("../../../controller/UserController.php");
	require_once ("../utils/user_util.php");
	$id=$_REQUEST["userId"];

	$result = UserController::Delete($id);
	if($result)
	{
	echo UserUtil::createMessageBox("Delete completed!");
	}
	else
	{
		echo UserUtil::createMessageBox("Delete does not complete!");
	}

	}
if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="search" )
	{
	require_once("../../../controller/UserController.php");
	require_once ("../utils/user_util.php");
	$name=$_REQUEST["name"];
	$mail=$_REQUEST["email"];
	$strSQL="select * from user where 1=1 ";
	if(strlen($name)>0)
		$strSQL.=" and Name LIKE '%$name%' ";
	if(strlen($mail))
		$strSQL.=" and Email LIKE '%$mail%' ";
	$result = UserController::getAllBySql($strSQL);
	if($result)
	{
	echo UserUtil::createSearchResult($result);
	}
	else
	{
		echo UserUtil::createSearchResult($result);
	}

	}
?>