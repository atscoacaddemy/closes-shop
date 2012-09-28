<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
 <?php  
  $contextPath="../../";
  $productid="1";
 ?>
	<head>
		<meta http-equiv=Content-Type content='text/html; charset=utf-8'>
		<title></title>
		<link type="text/css" rel="stylesheet" href="<?php echo $contextPath?>template/css/menu.css"  media="screen">
		<link type="text/css" rel="stylesheet" href="<?php echo $contextPath?>template/css/main.css"  media="screen"/>
		<script type="text/javascript" src="<?php echo $contextPath?>template/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo $contextPath?>template/js/jquery-ui-1.8.23.custom.min.js"></script>
		<script type="text/javascript" src="<?php echo $contextPath?>template/js/menu.js"></script>
	</head>
	<script type="text/javascript">
		function doFilter(type) {
			$('#subtype').val(type);
			$('#form').submit();
		}
	</script>
	<body class="body">
 <?php include_once 'header.php';?>
 <?php
 require_once ("../../controller//ProductController.php");
$type = 1;
$subtypeList=ProductController::getProductSubType($type);
$subtype = $_GET['subtype'];
$productList = null;
$productList = ProductController::getProducts($type, $subtype);
?>
 <form action="product-list.php" method="get" id="form">
 <input type="hidden" id="action" name="action"/>
 <input type="hidden" id="subtype" name="subtype"/>
		<div id="contain" class="contain contain box-transparent">
			<div class="sub-menu-title">
				<h1 style="top:20px">Túi Xách</h1>
			</div>
			<div class="left-menu">
				<div class="sub-menu">
					<div  onclick="doFilter()">
						Tất cả sản phẩm
					</div>
				<?php foreach ($subtypeList as $subtype) {?>
					
					<div onclick="doFilter(<?php echo $subtype['ID']?>)">
						<?php echo $subtype["Name"]?>
					</div>
					<?php }?>
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
<!-- 						<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fustore.vn&amp;width=292&amp;height=590&amp;colorscheme=light&amp;show_faces=true&amp;border_color=blue&amp;stream=true&amp;header=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:590px;" allowTransparency="true"></iframe> -->
					</div>
				</div>
				<div >
				<?php if (!empty($productList) && $productList != null ) {?>
					<?php foreach ($productList as $product) {?>
					<div class="product-cell">
						<div class="product-picture">
							<div class="product-label-new"></div>
							<a href="product-detail.php?productid=<?php echo $productid; ?>"> <img src="temp/002-10.png" /> </a>
						</div>
						<div>
							<div class="product-id">
								<?php echo $product['Name']?>
							</div>
							<div  class="product-price">
								<?php echo $product['Price']?><sup style="margin-left: 5px;">đ</sup>
							</div>
						</div>
						<div class="cart-button">
							Add to cart
						</div>
					</div>
					
				<?php } ?>
				<?php } else { ?>
				<div style="font-size: 14px;">Chua co san pham nao</div>
				<?php } ?>
				</div>
				<div style="clear: both;"></div>
			</div>
	</form>
			 <?php include_once 'footer.php';?>
	</body>
</html>