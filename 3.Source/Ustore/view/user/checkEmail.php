<?php 
	$txtEmail = $_REQUEST["txtEmail"];
	$txtNumberPhone = $_REQUEST["txtNumberPhone"];
	$txtComment = $_REQUEST["txtComment"];
	$userID = $_REQUEST["userID"];
	$productID = $_REQUEST["productID"];
	$productdeleteid = $_REQUEST["productdeleteid"];
	$idSessionCart = $_REQUEST["idSessionCart"];
	//echo "email=".$txtEmail;
	//echo "<script>alert 'aaaa';</script>";

	if(!empty($productdeleteid) && $productdeleteid>0)
	{
	
	
			echo "ssssssssssss=".count($_SESSION['cart']);
	for($i=0;$i<count($_SESSION['cart']);$i++)
		echo "</br>i=".$_SESSION['cart'][$i];
		if(count($_SESSION['cart']) > 0)
		{		
			include_once ($contextPath."controller/ProductController.php");
			include_once ($contextPath."controller/ProductImageController.php");
			
			//delet id from session['cart']
			
			//$flag = true;
			for($i=0;$i<count($_SESSION['cart']);$i++)
			{
				if($_SESSION['cart'][$i] == $productid)
				{
					array_pop($_SESSION['cart'],$productid);
					//$flag = false;
					break;
				}
			}
				
			
				
			$totalmoney = 0;
			for($i=0;$i<count($_SESSION['cart']);$i++)
			{
				//echo "</br>cart[".$i."]=".$_SESSION['cart'][$i];
				$product_detail=ProductController::GetProductByID($_SESSION['cart'][$i]);
				$productImage  =ProductImageController::GetImageOfProductFromProductID($_SESSION['cart'][$i]);
				$totalmoney +=$product_detail[4];
				if($i % 2 == 0)
				{
					echo "<tr style='background-color: rgb(239, 239, 239);'>";
				}
				else
				{
					echo "<tr style='background-color: rgb(255, 255, 255);'>";
				}
				
				echo "<td style='border-right:solid 1px #D3D3D3; padding:4px;' width='35px' align='center'>
					  <a href='' ><img  src='".$contextPath.$productImage[1]."' width='80px' /></a>
					  </td>";
			
				echo "<td  align='center' style='border-right:solid 1px #D3D3D3; padding:4px;' width='20px'>
					  <a href=''><b style='color:blue;'>". $product_detail[0]."</b></a>
					  </td>";
				echo "<td style='border-right:solid 1px #D3D3D3; padding:4px;'>".$product_detail[1]."</td>";
				echo "<td align='center' style='border-right:solid 1px #D3D3D3; padding:4px;' width='10px'>1</td>";
				echo "<td style='border-right:solid 1px #D3D3D3;padding:4px;'>".Utils::convert_Money($product_detail[4])."(VND)</td>";
				echo "<td style='border-right:solid 1px #D3D3D3; padding:4px;'>".Utils::convert_Money($product_detail[4])."(VND)</td>";
				echo "<td style='border-right:solid 1px #D3D3D3; padding:4px;' width='10px' align='center'>";
				echo     "<input type='image' src='".$contextPath."data/delete.png'' name='image' width='15px' height='15px' value='".$product_detail[0]."' onclick='DeleteCart(".$product_detail[0].");'/>";
				echo "</td>";
				echo "</tr>";
			?>
				
			<?php
			}
			echo "<tr style='height:36px; font-weight:bold; font-size:13px; background:#FFFFFF;' style='background-color: rgb(246,237,206);'>";
				echo "<td style='padding:4px;' align='center' >Tổng tiền: </td>";
				echo "<td></td><td></td><td></td><td></td>";
				echo "<td>".Utils::convert_Money($totalmoney)."(VND)</td>";
				echo "<td></td>";
			echo "</tr>";
		}
	}
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
		$productComment=CommentController::GetCommentFromProductID($productID);
		//echo "count=".count($productComment);
		if($rs != null)
		{
		
		echo "<label type='text' value=''>Phần đánh giá sản phẩm của các bạn</label></br>";
			echo "<div><a id='comment-toggle' href='javascript:;' >".count($productComment)." comment(s)</a></div>";
			echo "<div id='comment' style='display:visible'>";
				echo "<div id= 'comment-list'>";
					
					//echo "count=".count($productComment);
					
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