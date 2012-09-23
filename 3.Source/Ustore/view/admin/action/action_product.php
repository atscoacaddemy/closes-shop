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
				
		$result = ProductController::Add($name,$type,$sub_type,$price,$description,$promotion_id);
				if($result)
					header("Location:../product_index.php?id=".$result['id']);
		
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
?>
