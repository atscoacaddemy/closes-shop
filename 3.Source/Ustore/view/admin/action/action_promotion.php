<?php
include_once("../../../controller/PromotionController.php");
include_once("../../../controller/PromotionController.php");
if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="addNew")
{
	
		$name=$_REQUEST["name"];
		$description=$_REQUEST["description"];
		$startdate=$_REQUEST["startdate"];
		$enddate=$_REQUEST["enddate"];
				
		$result = PromotionController::Add($name,$description,$startdate,$enddate);
		if($result>=0)
		{
			header("Location:../promotion_index.php?action=add&result=ok");
			//echo ProductUtil::createMessageBox("ADD PRODUCT","Add completed!");
		}
		else {
			header("Location:../promotion_index.php?action=add&result=fail");
		}							
}
else if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="delete")
{
	include_once("../../../controller/PromotionController.php");
	require_once ("../utils/product_util.php");
	$id=$_REQUEST["id"];
	$result = PromotionController::Delete($id);
	if($result)
	{
	echo ProductUtil::createMessageBox("DELETE PROMOTION","Delete completed!");
	}
	else
	{
		echo ProductUtil::createMessageBox("DELETE PROMOTION","Delete does not complete!");
	}
}
else if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="edit")
{
	include_once("../../../controller/PromotionController.php");
	$id=$_REQUEST["id"];
	$name=$_REQUEST["name"];
	$description=$_REQUEST["description"];
	$startdate=$_REQUEST["startdate"];
	$enddate=$_REQUEST["enddate"];
	$result = PromotionController::Update($id,$name,$description,$startdate,$enddate);		
	header("Location:../promotion_index.php?action=view&id=".$id);
		
			
}