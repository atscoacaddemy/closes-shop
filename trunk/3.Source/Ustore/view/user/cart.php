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
<!--                                            <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fustore.vn&amp;width=292&amp;height=590&amp;colorscheme=light&amp;show_faces=true&amp;border_color=blue&amp;stream=true&amp;header=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:590px;" allowTransparency="true"></iframe> -->
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
	<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;font-weight: bold; color:#890C29;"> Giỏ Hàng Của Bạn </div>
	
	<div class="product-detail-picture">
		
	<div style="width: 686px; padding-top:5px;float:left;">	
	
		<hr width="680" size="1" style="color: rgb(211, 232, 248);">
		
		<div class="mid_content" id="loadAjax" name="loadAjax">	
<div id="messDeleteCartAjax" name="messDeleteCartAjax">
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

<!--begin ajax for div messDeleteCartAjax -->			  
			<?php
		
			if(count($_SESSION["cart"]) > 0)
			{		
				include_once ($contextPath."controller/ProductController.php");
				include_once ($contextPath."controller/ProductImageController.php");
				include_once ($contextPath."utility/Utils.php");
				$totalmoney = 0;
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
					
					echo "<td style='border-right:solid 1px #D3D3D3; padding:4px;' width='35px' align='center'>
						  <a href='' ><img  src='".$contextPath.$productImage[1]."' width='80px' /></a>
						  </td>";
				
					echo "<td  align='center' style='border-right:solid 1px #D3D3D3; padding:4px;' width='20px'>
						  <a href='product-detail.php?productid=".$product_detail[0]."'><b style='color:blue;'>".$product_detail[0]."</b></a>
						  </td>";
					echo "<td style='border-right:solid 1px #D3D3D3; padding:4px;'>".$product_detail[1]."</td>";
					echo "<td align='center' style='border-right:solid 1px #D3D3D3; padding:4px;' width='10px'>
					 <input type='text' name='txtQuantity' id='txtQuantity' size='5' value='1' />
					</td>";
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
				echo "<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td align='center' colspan='3'>
					
						<h3 style='color: #336699; font-size: 14px;margin: 0;padding: 0;'>
							<span class='action-button-left'></span>						
							<input class='submitYellow' type='submit' value='Đặt hàng' id='btnDatHang' name='btnDatHang' onclick='checkLoginToComment();'/>
							<span class='action-button-right'></span>
						</h3>
					</td>
				</tr>
				
				<tr>
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
				echo "</table>";
			}
			
			?>  
<!--end ajax for div messDeleteCartAjax -->

		
				
	</div>
	<!--end ajax-->
		</div>
	</div>	
		
        <script>
		$("table[id='tblist'] tr:odd").css('background-color', '#EFEFEF');
		</script>
		
	
<!--start comment -->	
					<div class="comment-content" >
					
							
					
					</div>

<!--end comment -->				
				
					</br>
					<div>
						
<?php
	echo "<input name='idSessionCart' id='idSessionCart' type='text' style='width:300px;display:none;' value='".$_SESSION["cart"]."'>";
	echo "<input name='txtProductID' id='txtProductID' type='text' style='width:300px;display:none;' value='".$productid."'>";
	echo "<input name='txtSession' id='txtSession' type='text' style='width:10px;display:none;' value='".$_SESSION["cart1"]."'>";
	
?>
					</div>
	</div>
					</div>
						<div style="clear: both;"></div>
				</div>
				<div style="clear: both;"></div>
			</div>
			
                         <?php include_once 'footer.php';?>
                         <script type="text/javascript">
                                $('#nav').spasticNav();
                                $('#comment-toggle').click(function() {
                                          $('#comment').toggle('slow', function() {
                                            // Animation complete.
                                          });
                                        });
                               
                                $(document).ready(function() {
                                        $("#txtComment").css("background-color", "#EDEDED"); 
                                        $("#txtComment").bind("focusin", function() {
                                                if ($("#txtComment").val() == 'Write a comment') {
                                                        $("#txtComment").val("");
                                                }
                                        });
                                        $("#txtComment").bind("focusout", function() {
										
                                                if ($("#txtComment").val() == '') {
                                                        $("#txtComment").val("Write a comment");
                                                }
                                        });
                                });
								function DeleteCart(productDeleteID)
								{
									
									var idSessionCart = new Array(100);
									idSessionCart = <?php echo $_SESSION["cart"];?>;
								
									var str="&amount="+<?php echo count($_SESSION["cart"]);?>;
									
									<?php
									for($i=0 ; $i < count($_SESSION["cart"]) ; $i++)
									{
									
									?>
								
									str+=  "&array" + <?php echo $i; ?> + "=" + <?php echo $_SESSION["cart"][$i]; ?> ;
									<?php 
									}
									?>
									
									if(productDeleteID != "")
									{
										var serverURL = "checkEmail.php?productdeleteid=" + productDeleteID + str;
										$("#messDeleteCartAjax").load(serverURL);
									}
								}
                        </script>
        </body>
</html>

