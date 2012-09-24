<?php
if(isset($_POST["btnAddProduct"]))
{
	include_once("../../../controller/ProductController.php");
		$name=$_REQUEST["name"];
		$type=$_REQUEST["type"];
		$sub_type=$_REQUEST["sub_type"];
		$description=$_REQUEST["description"];
		$price=$_REQUEST["price"];
		$promotion_id=$_REQUEST["promotion_id"];
		$present_type=$_REQUEST["present_type"];
				
		$result = ProductController::Add($name,$type,$sub_type,$price,$description,$promotion_id,$present_type);
				if($result)
					header("Location:../product_index.php");
		
}
else if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="showPopupEdit")
{
	include_once("../../../controller/ProductController.php");
	$id=$_REQUEST["userId"];
	$result = ProductController::GetProductByID($id);
		if($result)
		{
			require_once ("../utils/user_util.php");
			echo UserUtil::createFormEdit($result);
		}
			
}
else if(isset($_POST["btnUpdateProduct"]))
{
	include_once("../../../controller/ProductController.php");
	$id=$_REQUEST["id"];
	$name=$_REQUEST["name"];
	$type=$_REQUEST["type"];
	$sub_type=$_REQUEST["sub_type"];
	$description=$_REQUEST["description"];
	$price=$_REQUEST["price"];
	$promotion_id=$_REQUEST["promotion_id"];
	$present_type=$_REQUEST["present_type"];
	$result = ProductController::Update($id,$name,$type,$sub_type,$price,$description,$promotion_id,$present_type);
		if($result)
		{
			header("Location:../product_index.php?action=view&id=".$id);
		}
			
}
else if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="delete")
{
	include_once("../../../controller/ProductController.php");
	require_once ("../utils/product_util.php");
	$id=$_REQUEST["id"];
	$result = ProductController::Delete($id);
	if($result)
	{
	echo ProductUtil::createMessageBox("DELETE PRODUCT","Delete completed!");
	}
	else
	{
		echo ProductUtil::createMessageBox("DELETE PRODUCT","Delete does not complete!");
	}
}
?>
