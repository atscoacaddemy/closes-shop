<?php
include_once ("../utils/product_util.php");
include_once("../../../controller/CommentController.php");
include_once("../../../controller/ProductController.php");
include_once("../../../controller/ProductImageController.php");
if(isset($_POST["btnUpdateComment"]))
{
	include_once("../../../controller/CommentController.php");
	$id=$_REQUEST["id"];
	
	$description=$_REQUEST["description"];
	
	$result = CommentController::Update($id,$description);
		if($result)
		{
			header("Location:../comment_index.php?action=view&id=".$id);
		}
		else
		{
			header("Location:../comment_index.php?action=view&id=".$id);
		}
			
}
//ok
else if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="delete")
{
	include_once("../../../controller/CommentController.php");
	require_once ("../utils/product_util.php");
	$id=$_REQUEST["id"];
	$result = CommentController::Delete($id);
	if($result)
	{
	echo ProductUtil::createMessageBox("DELETE PRODUCT","Deletion completed!");
	}
	else
	{
		echo ProductUtil::createMessageBox("DELETE PRODUCT","Deletion does not complete!");
	}
}
?>
