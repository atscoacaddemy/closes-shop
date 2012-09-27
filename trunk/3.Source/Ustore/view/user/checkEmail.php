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
		echo "</br>productID=".$productID;
		
		$commentUser=UserController::GetUserByID($userID);
		
		$rs = CommentController::Add($productID,$userID,$txtComment);
		$productComment=CommentController::GetCommentFromProductID($productID);
		echo "count=".count($productComment);
		if($rs != null)
		{
		
		echo "<label type='text' value=''>Phần đánh giá sản phẩm của các bạn</label>";
			echo "<div><a id='comment-toggle' href='javascript:;' >".count($productComment)." comment(s)</a></div>";
			echo "<div id='comment' style='display:visible'>";
				echo "<div id= 'comment-list'>";
					
					echo "count=".count($productComment);
					
					for($i=0;$i<count($productComment);$i++)
					{
						if($productComment[$i] !=null)
						{
							echo "<div class='comment-item'>";
							$commentUser=UserController::GetUserByID($productComment[$i][2]);
								echo "<div style='float:right' class='comment-info'>";
									echo $commentUser[1];
									echo "(".$productComment[$i][4].")";
								echo "</div>";
								echo "<div style='clear: both'></div>";
								echo "<div class='comment-detail'>";
									echo $productComment[$i][3];
								echo "</div>";
							echo "</div>";			
						}
					}
				echo "</div>";
			
				echo "<div>";
echo "<textarea id='txtComment' name='txtComment' rows='3' title='Write a comment' cols='85' class='comment-textarea'>Write a comment</textarea>";
				echo "</div>";
			echo "</div>";
			echo "<script type='text/javascript'>
								$(document).ready(function() {
                                        $('#txtComment').css('background-color', '#EDEDED'); 
                                        $('#txtComment').bind('focusin', function() {
                                                if ($('#txtComment').val() == 'Write a comment') {
                                                        $('#txtComment').val('');
                                                }
                                        });
                                        $('#txtComment').bind('focusout', function() {
										
                                                if ($('#txtComment').val() == '') {
                                                        $('#txtComment').val('Write a comment');
                                                }
                                        });
                                });
								
								$('#nav').spasticNav();
                                $('#comment-toggle').click(function() {
                                          $('#comment').toggle('slow', function() {
                                            // Animation complete.
                                          });
                                        });
			</script>";
			
		}
		else
		{
			
		}
	}
	
	
?>