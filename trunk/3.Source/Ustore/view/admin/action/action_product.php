<?php
include_once ("../utils/product_util.php");
include_once("../../../controller/ProductController.php");
include_once("../../../controller/ProductImageController.php");
if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="addNew")
{
	
		$name=$_REQUEST["name"];
		$type=$_REQUEST["type"];
		$sub_type=$_REQUEST["sub_type"];
		$description=$_REQUEST["description"];
		$price=$_REQUEST["price"];
		$promotion_id=$_REQUEST["promotion_id"];
		$present_type=$_REQUEST["present_type"];
				
		$result = ProductController::Add($name,$type,$sub_type,$price,$description,$promotion_id,$present_type);
		if($result)
		{
			//create empty product image
			ProductImageController::Add($result,"","","","","","","","","","","","","","","","");
			header("Location:../product_index.php?action=add&result=$result");
			//echo ProductUtil::createMessageBox("ADD PRODUCT","Add completed!");
		}
		else {
			header("Location:../product_index.php?action=add&result=-1");
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
	$price=$_REQUEST["price"].'000';
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
else if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="deleteImage")
{
	include_once("../../../controller/ProductImageController.php");
	require_once ("../utils/product_util.php");
	$id=$_REQUEST["proId"];
	$imgType=$_REQUEST["imgType"];
	$img=ProductImageController::GetImageOfProductFromProductID($id);
	$result = ProductImageController::Update($id,$imgType,"");
	$result=true;
	if($result)
	{
		if(unlink( "../../../".$img[$imgType]))	
		{	
			echo ProductUtil::createMessageBox("DELETE IMAGE","Delete completed!");
			return;
		}
	
	}
	echo ProductUtil::createMessageBox("DELETE IMAGE","Delete does not complete!");
	
}
if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="search")
{
	
		$name=$_REQUEST["name"];
		$type=$_REQUEST["type"];
		$sub_type=$_REQUEST["sub_type"];
		$pricefrom=$_REQUEST["pricefrom"];
		$priceto=$_REQUEST["priceto"];
		$promotion_id=$_REQUEST["promotion_id"];
		$present_type=$_REQUEST["present_type"];
		
		$strSQL = "select * from product where 1=1 ";
		if(strlen($name)>0)
			$strSQL.=" and Name LIKE '%$name%' ";
		if($type!=-1)
			$strSQL.=" and Type = $type" ;
		if($sub_type!=-1)
			$strSQL.="and Sub_Type = $sub_type ";
		if($present_type!=-1)
			$strSQL.="and Present_Type = $present_type ";
		if($pricefrom>0)
			$strSQL.="and Price >= $pricefrom ";
		if($priceto>0)
			$strSQL.="and Price <= $priceto ";
		//echo $strSQL;
		$result = ProductController::GetAllBySQL($strSQL);
		if($result)
		{
			echo ProductUtil::createSearchResult($result);

		}
					
		
}
?>
