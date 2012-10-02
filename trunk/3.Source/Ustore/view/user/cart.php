<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<?php $contextPath = "../../"?>
        <head>
                <meta http-equiv=Content-Type content='text/html; charset=utf-8'>
                <title></title>
                <link type="text/css" rel="stylesheet" href="<?php echo $contextPath?>template/css/main.css" media="screen"/>
                <link type="text/css" rel="stylesheet" href="<?php echo $contextPath?>template/cloud-zoom.1.0.3/cloud-zoom.css"   />
                <link type="text/css" rel="stylesheet" href="<?php echo $contextPath?>template/css/scrollable-horizontal.css"  />
                <link type="text/css" rel="stylesheet" href="<?php echo $contextPath?>template/css/scrollable-buttons.css"   />
                <link type="text/css" rel="stylesheet" href="<?php echo $contextPath?>template/css/menu.css"  media="screen">
                <script type="text/javascript" src="<?php echo $contextPath?>template/js/jquery.min.js"></script>
                <script type="text/JavaScript" src="<?php echo $contextPath?>template/cloud-zoom.1.0.3/cloud-zoom.1.0.3.js"></script>
                <script type="text/javascript" src="<?php echo $contextPath?>template/js/jquery.tools.min.js" ></script>
                <script type="text/javascript" src="<?php echo $contextPath?>template/js/jquery-ui.js"></script>
                <script type="text/javascript" src="<?php echo $contextPath?>template/js/menu.js"></script>
<script type="text/javascript">
    $(document).ready(function()
	{
			$("#frmCheckOut").submit(function()
			{
				
				var flag = true;
				var strUsername = $("#idUser").attr("value");
		
				if(strUsername == "")
				{										
					press_LoginToAddCart();
					flag= false;
				}
	//			alert("aa");
				return flag;
			});
			$("#btnDelete0").click(function()
			{	
				flag = false;
				alert("btnDelete0");
				return flag;
			});
			$("#btnDelete1").click(function()
			{	
				alert("btnDelete1");
				flag = false;
				return flag;
			});
			$("#btnDelete2").click(function()
			{	
				alert("btnDelete2");
				flag = false;
				return flag;
			});
			$("#btnDelete3").click(function()
			{	
				flag = false;
				return flag;
			});
			$("#btnDelete4").click(function()
			{	
				flag = false;
				return flag;
			});
			$("#btnDelete5").click(function()
			{	
				flag = false;
				return flag;
			});
			
	});
	
	function press_LoginToAddCart()
	{
		document.getElementById("popup").style.visibility = "visible";
		document.getElementById("txtUsernameLogin").value = "";
		document.getElementById("txtPasswordLogin").value = "";
		document.getElementById("txtUsernameLogin").focus();
		document.getElementById('messRegister').innerHTML="Hãy đăng nhập để đặt hàng!";
		$("#messRegister").css("color","blue");
		return false;
	}
	function DeleteCart(productDeleteID)
	{	
		flag = false;
		
		
		if(productDeleteID != "" && productDeleteID>0)
		{
			alert("product id "+productDeleteID);
			var serverURL = "checkEmail.php?productdeleteid=" + productDeleteID;
			 $("#messDeleteCartAjax").load(serverURL);
		}
		else
		{
			alert("product id ko hop le");
		}
		return flag;
	}
	
									
</script>
        </head>
        <body class="body" >
 <?php include_once 'header.php';?>
                <div id="contain" class="contain contain box-transparent">
                        <div class="sub-menu-title">
                                <h1 style="top:20px">Túi Xách</h1>
                        </div>
                        <div class="left-menu">
                                <div class="sub-menu">
                                        <div >
                                                Tất cả sản phẩm
                                        </div>
                                        <div>
                                                For teen
                                        </div>
                                        <div>
                                                Sang trọng
                                        </div>
                                        <div>
                                                Cao cấp nhất
                                        </div>
                                </div>
                                <div id="support">
                                        <h1>Hỗ Trợ</h1>
                                        <div class="phone">
                                                09123456789
                                        </div>
                                        <div class="phone">
                                                09123456789
                                        </div>
                                        <div class="yahoo">
                                                <a href="ymsgr:SendIM?dinhbanhut24" title="mr Nhut"> <img width="101" height="21" border="0" src="http://mail.opi.yahoo.com/online?u=d&amp;m=g&amp;t=2"> </a>
                                                </div >
                                                <div class="yahoo">
                                                        <a href="ymsgr:SendIM?dinhbanhut24" title="mr Nhut"> <img width="101" height="21" border="0" src="http://mail.opi.yahoo.com/online?u=d&amp;m=g&amp;t=2"> </a>
                                                </div>
                                        </div>
                                        <div>

                                        </div>
                                </div>
       	<?php 
		
	if(isset($_POST['txtProductID']) && $_POST['txtProductID'] !=null && isset($_SESSION["addCart"]) && $_SESSION["addCart"] == "true")
	{
		$_SESSION["addCart"] = "false";
		include_once ($contextPath."controller/ProductController.php");
	    include_once ($contextPath."controller/ProductImageController.php");
		include_once ($contextPath."controller/CommentController.php");
	    include_once ($contextPath."controller/UserController.php");
	  
	    include_once ("checkEmail.php");
		$productid = $_POST['txtProductID'];
		$product_detail=ProductController::GetProductByID($productid);
	
		if($product_detail != null)
		{
			if(!isset($_SESSION["cart"]) && count($_SESSION["cart"]) == 0 && $productid > 0)
			{
				$cart=array($productid);
				$_SESSION["cart"]=$cart;
				//multidimentail
				//$cart=array(array($productid,1));
			}
			else
			{
				if( $productid > 0 )
				{
					$flag = true;
					for($i=0;$i<count($_SESSION["cart"]);$i++)
					{
						if($_SESSION["cart"][$i] == $productid)
						{
							$flag = false;
							break;
						}
					}
					if(isset($flag) && $flag == true){
						array_push( $_SESSION["cart"],$productid);
					}
				}
			}
		}
			
		$product_detail=ProductController::GetProductByID($productid);
		$productImage  =ProductImageController::GetImageOfProductFromProductID($productid);
		$productComment=CommentController::GetCommentFromProductID($productid);
		

	}

	?>                    
<div >
	
<div style="width: 686px; padding-top:5px;float:left;">
<?php
if(isset($_REQUEST["addcart"]) && $_REQUEST["addcart"]== "successful")
{
	echo "<div style='margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;font-weight: bold; color:#890C29;'> Bạn đã đặt hàng thành công! </div>";
}
else
{
	if(isset($_REQUEST["addcart"]) && $_REQUEST["addcart"] == "failed")
	{
		echo "<div style='margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;font-weight: bold; color:#890C29;'> Đặt hàng thất bại!</div>";
	}
	else
	{
		echo "<div style='margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;font-weight: bold; color:#890C29;'> Giỏ Hàng Của Bạn </div>";
	}
}
?>
	<!--div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;font-weight: bold; color:#890C29;"> Giỏ Hàng Của Bạn</div-->
	
	<div class="product-detail-picture">
		
	<div style="width: 686px; padding-top:5px;float:left;">	
	
		<hr width="680" size="1" style="color: rgb(211, 232, 248);">
		
		<div class="mid_content" id="loadAjax" name="loadAjax">	

<div id="messDeleteCartAjax" name="messDeleteCartAjax">
<div style="padding:20px;" id="frmCheckOut" name="frmCheckOut">
<!--form action="<?php //echo $contextPath?>controller/AddCartProcessor.php" method="post" id="frmCheckOut" name="frmCheckOut"-->
<!--form action="" method="post" id="frmCheckOut" name="frmCheckOut"-->


			<table id="tblist" width='100%' border='0' style='border:solid 1px #D3D3D3;' cellpadding='0' cellspacing='0'>   
			   <tr style='height:36px; font-weight:bold; font-size:13px; background:#D3658A;'>
				   <td style="border-right:solid 1px #D3D3D3; padding:4px; width:35px;" align='center'>Hình Ảnh</td>
				   <td style="border-right:solid 1px #D3D3D3; padding:4px; width:25px;">Mã SP</td>
				   <td style="border-right:solid 1px #D3D3D3; padding:4px; width:60px;">Tên SP</td>
				   <td style="border-right:solid 1px #D3D3D3; padding:4px; width:10px;">Số Lượng</td>
				   <td style="border-right:solid 1px #D3D3D3; padding:4px; width:25px;" align='center'>Đơn Giá</td>
				   <td style="border-right:solid 1px #D3D3D3; padding:4px; width:65px;">Thành Tiền</td>
				   <td style="border-right:solid 1px #D3D3D3; padding:4px; width:5px;">Xóa</td>				   
			   </tr>

	  
			<?php
			//check login to change product in session ($_SESSION["cart"]) && isset($_REQUEST["usercart"]) && $_REQUEST["usercart"] == "1" 
			echo "<input name='ischeckout' id='ischeckout' type='text' style='width:300px;display:none;' value='0'>";
			echo "<br>is session=".$_SESSION["ischeckout"];
			if(isset($_SESSION["curUser"])&& $_SESSION["curUser"] != null && $_SESSION["ischeckout"] != "1")
			{
				include_once ($contextPath."controller/CartController.php");
				$cartInDB = CartController::GetCartByUserID($_SESSION["curUser"][0]);				
				echo "<br>count session cart1=".count($_SESSION["cart"]);				
				for($j=0;$j<count($cartInDB);$j++)
				{
					$flag_check= "true";
					for($i=0;$i<count($_SESSION["cart"]);$i++)
					{
						if($_SESSION["cart"][$i] == $cartInDB[$j][2])
						{
							$flag_check = "false";
						}
					}
					if($flag_check == "true")
					{
						if(!isset($_SESSION["cart"]) && count($_SESSION["cart"]) == 0 )
						{
							$cart=array($cartInDB[$j][2]);
							$_SESSION["cart"]=$cart;
				
						}
						else
						{	
							echo "<br>them vao product id=".$cartInDB[$j][2];
							array_push($_SESSION["cart"],$cartInDB[$j][2]);
						}
					}
					
				}
				echo "<br>count session cart2=".count($_SESSION["cart"]);	
			}
			//end check
			if(count($_SESSION["cart"]) > 0)
			{	
		
				include_once ($contextPath."controller/ProductController.php");
				include_once ($contextPath."controller/ProductImageController.php");
				include_once ($contextPath."utility/Utils.php");
				$totalmoney = 0;
echo "<form action='".$contextPath."controller/AddCartProcessor.php' method='post' id='frmCheckOut' name='frmCheckOut'>";
				
					for($i=0;$i<count($_SESSION["cart"]);$i++)
					{
						
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
						
						echo "<td style='border-right:solid 1px #D3D3D3; padding:4px;' width='35px' align='center'><a href='' ><img  src='".$contextPath.$productImage[1]."'width='80px'/></a></td>";
					
						echo "<td  align='center' style='border-right:solid 1px #D3D3D3; padding:4px;' width='20px'>
							  <a href='product-detail.php?productid=".$product_detail[0]."'><b style='color:blue;'>".$product_detail[0]."</b></a></td>";
						echo "<td style='border-right:solid 1px #D3D3D3; padding:4px;'>".$product_detail[1]."</td>";
						echo "<td align='center' style='border-right:solid 1px #D3D3D3; padding:4px;' width='10px'><input type='text' name='txtQuantity".$i."' id='txtQuantity".$i."' size='5' value='1' />"."txtQuantity".$i."</td>";
						echo "<td style='border-right:solid 1px #D3D3D3;padding:4px;'>".Utils::convert_Money($product_detail[4])."(VND)</td>";
						echo "<td style='border-right:solid 1px #D3D3D3; padding:4px;'>".Utils::convert_Money($product_detail[4])."(VND)</td>";
						echo "<td style='border-right:solid 1px #D3D3D3; padding:4px;' width='10px' align='center'>";
						$btn = "btnDelete".$i;
						echo "<bt>btn=".$btn;
						echo     "<input type='image' src='".$contextPath."data/delete.png'' name='".$btn."' id='".$btn."' width='15px' height='15px' value='".$product_detail[0]."' onclick='DeleteCart(".$product_detail[0].");'/>";
						echo "</td>";
						echo "</tr>";
					}
				
				echo "<tr style='height:36px; font-weight:bold; font-size:13px; background:#FFFFFF;' style='background-color: rgb(246,237,206);'>";
					echo "<td style='padding:4px;' align='center' >Tổng tiền: </td>";
					echo "<td></td><td></td><td></td><td></td>";
					echo "<td>".Utils::convert_Money($totalmoney)."(VND)</td>";
					echo "<td></td>";
				echo "</tr>";

	
				 echo "<tr><td></td><td></td><td></td><td></td><td></td><td align='center' colspan='3'><h3 style='color: #336699; font-size: 14px;margin: 0;padding: 0;'><span class='action-button-left'></span><input class='submitYellow' type='submit' value='Check out' id='btnDatHang' name='btnDatHang'/><span class='action-button-right'></span></h3></td></tr>";
echo "</form>";			
			echo"<tr><td></td></tr></table>";
			}
			else
			{
				echo "<tr style='height:36px; font-weight:bold; font-size:13px; background:#FFFFFF;'>";
				echo "<td style='padding:4px;' align='center'>Bạn chưa chọn sản phẩm</td><td></td><td></td><td></td><td></td> <td></td><td></td>";
				echo "</tr>";
echo "<form action='../../controller/AddCartProcessor.php' method='POST' id='frmCheckOut' name='frmCheckOut'>";
//echo "<form action='../../controller/AddCartProcessor.php' method='POST' id='frmCheckOut' name='frmCheckOut'>";
			echo "<tr style='background-color: rgb(239, 239, 239);'>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td align='center' colspan='3'>
					
						<h3 style='color: #336699; font-size: 14px;margin: 0;padding: 0;'>
							<span class='action-button-left'></span>						
							<input class='submitYellow' type='submit' value='Đặt hàng' id='btnDatHang' name='btnDatHang'/>
							<span class='action-button-right'></span>
						</h3>
					</td>

				</tr>";
echo "</form>";	
				 echo "</table>";
			}
echo "<input name='txtProductID' id='txtProductID' type='text' style='width:300px;display:none;' value='".$productid."'>";
echo "<input name='idUser' id='idUser' type='text' style='width:300px;display:none;' value='".$curUser[0]."'>";
			?>  
			
<!--/form-->
</div>
</div>
<!--/form-->	
	<!--end ajax-->
</div>
	</div>	

					<div>					
<?php

	
?>
					</div>
	</div>
					</div>
						<div style="clear: both;"></div>
				</div>
				<div style="clear: both;"></div>
			</div>
			 <?php include_once 'footer.php';?>
                        
        </body>
</html>

