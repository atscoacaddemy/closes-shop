<?php 
	$txtEmail = $_REQUEST["txtEmail"];
	$txtNumberPhone = $_REQUEST["txtNumberPhone"];
	$txtComment = $_REQUEST["txtComment"];
	$userID = $_REQUEST["userID"];
	$productID = $_REQUEST["productID"];
	//echo "email=".$txtEmail;
	//echo "<script>alert 'aaaa';</script>";
	if(!empty($txtEmail))
	{
		$PATH_BASE = str_replace('//','/',dirname(__FILE__).'/');
		//echo $PATH_BASE;
		include_once ($PATH_BASE . '../../controller/UserController.php');
		$user = UserController::GetUserByEmail($txtEmail);
		if(empty($user))
		{
			echo "<img src='../../template/images/valid.png' alt='Hợp lệ' title='Hợp lệ' width=20 height=20>";
	//		echo "<span class='correct'> bạn có thể dùng tên này</span>";
		}
		else
		{
			echo "<img src='../../template/images/incorrect.png' alt='Đã được sử dụng' title='Đã được sử dụng' width=20 height=20>";
			echo "<span style='position:relative;top:-6px;color:red;'> đã được sử dụng</span>";
			echo "<input type='hidden' id='hdEmailError' value='true' />";
		}
	}
	if(!empty($txtNumberPhone))
	{
		echo "<img src='../../template/images/valid.png' alt='Hợp lệ' title='Hợp lệ' width=20 height=20>";
	}
	if(!empty($txtComment) && !empty($userID) && !empty($productID))
	{
		$PATH_BASE = str_replace('//','/',dirname(__FILE__).'/');
		include_once ($PATH_BASE . '../../controller/CommentController.php');
		include_once ($PATH_BASE . '../../controller/UserController.php');
		$replace = array(' ');
		$order   = array('_');
		$txtComment = str_replace($order, $replace, $txtComment);
		//echo "userID=".$userID;
		//echo "</br>productID=".$productID;
		
		$commentUser=UserController::GetUserByID($userID);
		
		$rs = CommentController::Add($productID,$userID,$txtComment);
		
		if($rs != null)
		{
			$cm = CommentController::GetCommentByID($rs);
			
			echo " <div class='comment-item' >";
			echo "<div style='float:right' class='comment-info'> By ".$commentUser[1]." (".$cm[4].")</div>";
			echo "<div style='clear: both'></div>";
			echo "<div class='comment-detail'>".$txtComment."</div></div>";
		}
		else
		{
			
		}
	}
	
	
?>