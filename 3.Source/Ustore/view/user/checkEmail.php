<?php session_start();?>
<?php 
	$txtEmail = $_REQUEST["txtEmail"];
	$txtNumberPhone = $_REQUEST["txtNumberPhone"];
	$txtComment = $_REQUEST["txtComment"];
	$userID = $_REQUEST["userID"];
	$productID = $_REQUEST["productID"];
	$productdeleteid = $_REQUEST["productdeleteid"];
	
	if(!empty($productdeleteid) && $productdeleteid>0 )
	{
		//session_start();
		
		for($i=0 ; $i < count($_SESSION["cart"]) ; $i++)
		{
			if($_SESSION["cart"][$i] != $productdeleteid )
			{
				if(count($_SESSION["cart1"]) == 0)
				{
					$cart=array($_SESSION["cart"][$i]);
					$_SESSION["cart1"]=$cart;
				}
				else
				{
					array_push($_SESSION["cart1"],$_SESSION["cart"][$i]);
				}
			}
		}
		
		$_SESSION["cart"]=null;
		for($i=0 ; $i < count($_SESSION["cart1"]) ; $i++)
		{
			
			if(count($_SESSION["cart"]) == 0)
			{
				$cart=array($_SESSION["cart1"][$i]);
				$_SESSION["cart"]=$cart;
			}
			else
			{
				array_push($_SESSION["cart"],$_SESSION["cart1"][$i]);
			}
		}
		$_SESSION["cart1"]=null;
	
	//	echo "<input name='idUser' id='idUser' type='text' style='width:300px;display:none;' value='".$curUser[0]."'>";
		$totalmoney = 0;
		echo "<table id='tblist' width='100%' border='0' style='border:solid 1px #D3D3D3;' cellpadding='0' cellspacing='0'>   
		   <tr style='height:36px; font-weight:bold; font-size:13px; background:#D3658A;'>
			   <td style='border-right:solid 1px #D3D3D3; padding:4px; width:35px;' align='center'>Hình Ảnh</td>
			   <td style='border-right:solid 1px #D3D3D3; padding:4px; width:25px;'>Mã SP</td>
			   <td style='border-right:solid 1px #D3D3D3; padding:4px; width:60px;'>Tên SP</td>
			   <td style='border-right:solid 1px #D3D3D3; padding:4px; width:10px;'>Số Lượng</td>
			   <td style='border-right:solid 1px #D3D3D3; padding:4px; width:25px;' align='center'>Đơn Giá</td>
			   <td style='border-right:solid 1px #D3D3D3; padding:4px; width:65px;'>Thành Tiền</td>
			   <td style='border-right:solid 1px #D3D3D3; padding:4px; width:5px;'>Xóa</td>				   
		   </tr>";
	
		//	echo "<br>session user=".$_SESSION["curUser"][1];
		//	echo "<br>count session cart=".count($_SESSION["cart"]);
		if(count($_SESSION["cart"]) > 0)
		{		
		
			include_once ("../../controller/ProductController.php");
			include_once ("../../controller/ProductImageController.php");
			include_once ("../../controller/CartController.php");
			include_once ("../../utility/Utils.php");
			
			

			echo "<input name='txtSession' id='txtSession' type='text' style='width:10px;display:none;' value='".$_SESSION["cart1"]."'>";
			
echo "<form action='../../controller/AddCartProcessor.php' method='post' id='frmCheckOut' name='frmCheckOut'>";	
	echo "<input name='idUser' id='idUser' type='text' style='width:300px;display:none;' value='".$_SESSION["curUser"][0]."'>";
			for($i=0;$i<count($_SESSION["cart"]);$i++)
			{
			//echo "<br>count session cart2=".count($_SESSION["cart"]);
				//echo "</br>cart[".$i."]=".$_SESSION['cart'][$i];
				$product_detail=ProductController::GetProductByID($_SESSION["cart"][$i]);
				$productImage  =ProductImageController::GetImageOfProductFromProductID($_SESSION["cart"][$i]);
				$totalmoney +=$product_detail[4];
				if($i % 2 == 0)
				{
					echo "<tr style='background-color: rgb(239, 239, 239);'>";
				}
				else
				{
					echo "<tr style='background-color: rgb(255, 255, 255);'>";
				}
				//image
				echo "<td style='border-right:solid 1px #D3D3D3; padding:4px;' width='35px' align='center'>
					  <a href='' ><img  src='../../".$productImage[1]."' width='80px' /></a>
					  </td>";
				//productID
				echo "<td  align='center' style='border-right:solid 1px #D3D3D3; padding:4px;' width='20px'>
					  <a href=''><b style='color:blue;'>". $product_detail[0]."</b></a>
					  </td>";
				//product Name
				echo "<td style='border-right:solid 1px #D3D3D3; padding:4px;'>".$product_detail[1]."</td>";
				//quantity
				$quantity_product="txtQuantity".$i;
				if(isset($_SESSION["curUser"]) && $_SESSION["curUser"][0]> 0 )
				{
					$quantityofUser = CartController::GetCartByUserIDAndProductId($_SESSION["curUser"][0],$product_detail[0]);
					if($quantityofUser[3] >0)
					{
						echo "<td align='center' style='border-right:solid 1px #D3D3D3; padding:4px;' width='10px'>
						<input type='text' onkeypress='return keypress(event);' name='".$quantity_product."' id='".$quantity_product."' size='5' value='".($quantityofUser[3] +1)."' /></td>";
					}
					else
					{
						echo "<td align='center' style='border-right:solid 1px #D3D3D3; padding:4px;' width='10px'>
						<input type='text' onkeypress='return keypress(event);' name='".$quantity_product."' id='".$quantity_product."' size='5' value='1' /></td>";
					}
				}
				else
				{
					echo "<td align='center' onkeypress='return keypress(event);' style='border-right:solid 1px #D3D3D3; padding:4px;' width='10px'>
					<input type='text' name='".$quantity_product."' id='".$quantity_product."' size='5' value='1' /></td>";
				}
						
				//$quantity_product="txtQuantity".$i;
				//echo "<td align='center' style='border-right:solid 1px #D3D3D3; padding:4px;' width='10px'>
				// <input type='text' name='".$quantity_product."' id='".$quantity_product."' size='5' value='1' />
				//</td>";
				echo "<td style='border-right:solid 1px #D3D3D3;padding:4px;'>".Utils::convert_Money($product_detail[4])."(VND)</td>";
				echo "<td style='border-right:solid 1px #D3D3D3; padding:4px;'>".Utils::convert_Money($product_detail[4])."(VND)</td>";
				echo "<td style='border-right:solid 1px #D3D3D3; padding:4px;' width='10px' align='center'>";
				$btn = "btnDelete".$i;
				echo     "<input type='image' src='../../data/delete.png'' name='".$btn."' id='".$btn."' width='15px' height='15px' value='".$product_detail[0]."' onclick='DeleteCart(".$product_detail[0].");'/>";
				echo "</td>";
				echo "</tr>";
			
			}
			echo "<tr style='height:36px; font-weight:bold; font-size:13px; background:#FFFFFF;'>";
					echo "<td style='padding:4px;' align='center' >Tổng tiền: </td>";
					echo "<td></td><td></td><td></td><td></td>";
					echo "<td>".Utils::convert_Money($totalmoney)."(VND)</td>";
					echo "<td></td>";
				echo "</tr>";

//echo "<form action='../../controller/AddCartProcessor.php' method='post' id='frmCheckOut' name='frmCheckOut'>";
		
				echo "<tr style='background-color: rgb(239, 239, 239);'>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td align='center' colspan='3'>
					
						<h3 style='color: #336699; font-size: 14px;margin: 0;padding: 0;'>
							<span class='action-button-left'></span>						
							<input class='submitYellow' type='submit' value='Check out' id='btnDatHang' name='btnDatHang'/>
							<span class='action-button-right'></span>
						</h3>
					</td>

				</tr>";
echo "</form>";	
			echo"<tr>
					<td></td>
				</tr>
			</table>";
			
		}
		else
		{
			echo "<tr style='height:36px; font-weight:bold; font-size:13px; background:#FFFFFF;'>";
			echo "<td style='padding:4px;' align='center'>Bạn chưa chọn sản phẩm</td>
				  <td></td>
				  <td></td>
				  <td></td>
				  <td></td>
				  <td></td>
				  <td></td>";
			echo "</tr>";
echo "<form action='../../controller/AddCartProcessor.php' method='POST' id='frmCheckOut' name='frmCheckOut'>";
			echo "<tr style='background-color: rgb(239, 239, 239);'>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td align='center' colspan='3'>
						<h3 style='color: #336699; font-size: 14px;margin: 0;padding: 0;'>
							<span class='action-button-left'></span>						
							<input class='submitYellow' type='submit' value='Check out' id='btnDatHang' name='btnDatHang'/>
							<span class='action-button-right'></span>
						</h3>
					</td>

				</tr>";
echo "</form>";	
			echo "</table>";
		}
		
		
		echo "<script type='text/javascript'>
    $(document).ready(function()
	{
			$('#frmCheckOut').submit(function()
			{
				
				var flag = true;
				var strUsername = $('#idUser').attr('value');
		
				if(strUsername == '')
				{										
					press_LoginToAddCart();
					flag= false;
				}
	
				return flag;
			});
			$('#btnDelete0').click(function()
			{	
				flag = false;
			
				return flag;
			});
			$('#btnDelete1').click(function()
			{	
				flag = false;
				return flag;
			});
			$('#btnDelete2').click(function()
			{	
				
				flag = false;
				return flag;
			});
			$('#btnDelete3').click(function()
			{	
				flag = false;
				return flag;
			});
			$('#btnDelete4').click(function()
			{	
				flag = false;
				return flag;
			});
			$('#btnDelete5').click(function()
			{	
				flag = false;
				return flag;
			});
			$('#btnDelete6').click(function()
			{	
				flag = false;
				return flag;
			});
			$('#btnDelete7').click(function()
			{	
				flag = false;
				return flag;
			});
			$('#btnDelete8').click(function()
			{	
				flag = false;
				return flag;
			});
			$('#btnDelete9').click(function()
			{	
				flag = false;
				return flag;
			});
			$('#btnDelete10').click(function()
			{	
				flag = false;
				return flag;
			});
			
	});
	
	function press_LoginToAddCart()
	{
		document.getElementById('popup').style.visibility = 'visible';
		document.getElementById('txtUsernameLogin').value = '';
		document.getElementById('txtPasswordLogin').value = '';
		document.getElementById('txtUsernameLogin').focus();
		document.getElementById('messRegister').innerHTML='Hãy đăng nhập để đặt hàng!';
		$('#messRegister').css('color','blue');
		return false;
	}
	function DeleteCart(productDeleteID)
	{	
		flag = false;
		
		if(productDeleteID != '' && productDeleteID>0)
		{
			//alert('product id '+productDeleteID);
			var serverURL = 'checkEmail.php?productdeleteid=' + productDeleteID;
			 $('#messDeleteCartAjax').load(serverURL);
		}
		else
		{
			alert('product id ko hop le');
		}
		return flag;
	}
	
									
</script>";
			
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
			
			echo "<div>
						<span class='action-button-left'></span>						
						<input class='submitYellow' type='button' value='Send comment' id='btSendComment' name='btSendComment' onclick='checkLoginToComment();'/>
						<span class='action-button-right'></span></div>";
			echo "<input name='idUser' id='idUser' type='text' style='width:300px;display:none;' value='".$userID."'>";
			echo "</div>";
			echo "</div>";
				
			echo "<script type='text/javascript'>
						$('#nav').spasticNav();
						$('#comment-toggle').click(function() 
						{
								  $('#comment').toggle('slow', function()
								  {
									// Animation complete.
								  });
						});
					   
						$(document).ready(function() 
						{
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
				  </script>";
			 
		}
		else
		{
			
		}
	}
	
	
?>