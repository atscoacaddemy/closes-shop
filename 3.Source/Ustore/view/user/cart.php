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
	if(isset($_REQUEST['productid']) && $_REQUEST['productid'] !=null) 
	{
		include_once ($contextPath."controller/ProductController.php");
		include_once ($contextPath."controller/CommentController.php");
	    include_once ($contextPath."controller/ProductImageController.php");
	    include_once ($contextPath."controller/UserController.php");
		$productid = $_REQUEST['productid'];
		$product_detail=ProductController::GetProductByID($_REQUEST['productid']);
		$productImage  =ProductImageController::GetImageOfProductFromProductID($productid);
		$productComment=CommentController::GetCommentFromProductID($productid);
		

	}
	$productidx = $_POST["productidx"];
	//echo "productidx=".$productidx;
	?>                    
<div >
	
<div style="width: 686px; padding-top:20px;float:left;">
	<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;font-weight: bold; color:#890C29;"> Giỏ Hàng Của Bạn </div>
	
	<div class="product-detail-picture">
		
	<div style="width: 686px; padding-top:20px;float:left;">	
	
		<hr width="680" size="1" style="color: rgb(211, 232, 248);">
		
		<div class="mid_content" id="loadAjax" name="loadAjax">	
			<table id="tblist" width='100%' border='0' style='border:solid 1px #D3D3D3;' cellpadding='0' cellspacing='0'>   
			   <tr style='height:36px; font-weight:bold; font-size:13px; background:#8BC5F4;'>
				   <td style='border-right:solid 1px #D3D3D3; padding:4px;' align='center'>Hình Ảnh</td>
				   <td style='border-right:solid 1px #D3D3D3; padding:4px;'>Mô Tả</td>
				   <td style='border-right:solid 1px #D3D3D3; padding:4px;width:65px;'>Loại Hình</td>
				   <td style='border-right:solid 1px #D3D3D3; padding:4px;width:65px;'>Cập Nhật</td>
				   <td style='padding:4px;' align='center'>Giá</td>
			   </tr>
			  
				
				<tr style="background-color: rgb(239, 239, 239);">
					<td style='border-right:solid 1px #D3D3D3; padding:4px;' width='150px'>
						<a href=''><img src='../images/upload/minhhoa/minhhoa.png' width='150px' /></a>
					</td>
				
					<td style='border-right:solid 1px #D3D3D3; padding:4px;'>
						<a href=''><b style='color:blue;'>tIEU DE</b></a><br>
							Vị trí: xxxxxx<br>
							Diện tích: <br>
							Số phòng ngủ:XX<br>
							Tầng: xxx<br><br>
					</td>
					
					<td style='border-right:solid 1px #D3D3D3; padding:4px;'>Bán căn hộ the everich Q11 gia rẻ vào ở ngay</td>
					
					<td align='center' style='border-right:solid 1px #D3D3D3; padding:4px;'>
						<img src='../images/vip.gif'/></br>3/2/2010
					</td>
					
					<td style='padding:4px;'>ZZZZZZZZZZZZZ<br>ZZZZZZZZZZ</td>
				</tr>
				<tr style="background-color: rgb(255, 255, 255);">
					<td style='border-right:solid 1px #D3D3D3; padding:4px;' width='150px'>
						<a href=''><img src='../images/upload/minhhoa/minhhoa.png' width='150px' /></a>
					</td>
				
					<td style='border-right:solid 1px #D3D3D3; padding:4px;'>
						<a href=''><b style='color:blue;'>tIEU DE</b></a><br>
							Vị trí: xxxxxx<br>
							Diện tích: <br>
							Số phòng ngủ:XX<br>
							Tầng: xxx<br><br>
					</td>
					
					<td style='border-right:solid 1px #D3D3D3; padding:4px;'>Bán căn hộ the everich Q11 gia rẻ vào ở ngay</td>
					
					<td align='center' style='border-right:solid 1px #D3D3D3; padding:4px;'>
						<img src='../images/vip.gif'/></br>3/2/2010
					</td>
					
					<td style='padding:4px;'>ZZZZZZZZZZZZZ<br>ZZZZZZZZZZ</td>
				</tr>
				<tr style="background-color: rgb(239, 239, 239);">
					<td style='border-right:solid 1px #D3D3D3; padding:4px;' width='150px'>
						<a href=''><img src='../images/upload/minhhoa/minhhoa.png' width='150px' /></a>
					</td>
				
					<td style='border-right:solid 1px #D3D3D3; padding:4px;'>
						<a href=''><b style='color:blue;'>tIEU DE</b></a><br>
							Vị trí: xxxxxx<br>
							Diện tích: <br>
							Số phòng ngủ:XX<br>
							Tầng: xxx<br><br>
					</td>
					
					<td style='border-right:solid 1px #D3D3D3; padding:4px;'>Bán căn hộ the everich Q11 gia rẻ vào ở ngay</td>
					
					<td align='center' style='border-right:solid 1px #D3D3D3; padding:4px;'>
						<img src='../images/vip.gif'/></br>3/2/2010
					</td>
					
					<td style='padding:4px;'>ZZZZZZZZZZZZZ<br>ZZZZZZZZZZ</td>
				</tr>
		
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td align="center" colspan="3">
						<h3 style='color: #336699; font-size: 14px;margin: 0;padding: 0;'>
							<span class="action-button-left"></span>						
							<input class="submitYellow" type="submit" value="Đặt hàng" id="btnDatHang" name="btnDatHang" onclick="checkLoginToComment();"/>
							<span class="action-button-right"></span>
						</h3>
					</td>
				</tr>
				
				<tr>
					<td></td>
				</tr>
			</table>
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
	echo "<input name='idUser' id='idUser' type='text' style='width:300px;display:none;' value='".$curUser[0]."'>";
	echo "<input name='txtProductID' id='txtProductID' type='text' style='width:300px;display:none;' value='".$productid."'>";
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
                        </script>
        </body>
</html>

