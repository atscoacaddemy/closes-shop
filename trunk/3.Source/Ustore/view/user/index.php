<?php session_start();?>
<head>
<?php $contextPath ="" ?>
		<meta http-equiv=Content-Type content='text/html; charset=utf-8'>
		<title>U Store - Chuyên Túi Xách Thời Trang, Túi Xách Hàng Hiệu</title>
		<LINK REL="SHORTCUT ICON" HREF="<?php echo $contextPath?>template/images/banner2.png" />
		<link rel="stylesheet" type="text/css" href="<?php echo $contextPath?>template/AD Gallery 1.2.7/lib/jquery.ad-gallery.css">
		<link rel="stylesheet" href="<?php echo $contextPath?>template/css/main.css" type="text/css" media="screen"/>
		<link rel="stylesheet" href="<?php echo $contextPath?>template/css/menu.css" type="text/css" media="screen">
		<script type="text/javascript" src="<?php echo $contextPath?>template/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo $contextPath?>template/AD Gallery 1.2.7/lib/jquery.ad-gallery.js"></script>
		<script type="text/javascript" src="<?php echo $contextPath?>template/js/jquery-ui-1.8.23.custom.min.js"></script>
		<script type="text/javascript" src="template/js/menu.js"></script>
		<script type="text/javascript">
			$(function() {
				var galleries = $('.ad-gallery').adGallery();
			});
		</script>
</head>
<?php include_once 'view/user/header.php';?>
<?php include_once $contextPath.'controller/ProductController.php';?>
<?php
	$presentType = 2;
	$productList = ProductController::getProducts(null,null, $presentType);
	
?>
		<div id="contain" class="contain box-transparent">
			<div class="ad-gallery" style="padding: 20px;">
				<div class="ad-image-wrapper"></div>
				<div class="ad-controls"></div>
				<div class="ad-nav" style="width: 50%; margin: auto">
					<div class="ad-thumbs">
						<ul class="ad-thumb-list">
							 
							<?php foreach ($productList as $product) {?>
							<li >
								<a  href="<?php echo $contextPath.$product['Cover_Img'] ?>"> <img longdesc = '<?php echo $contextPath; echo sprintf("view/user/product-detail.php?productid=%d&type=%d",$product['ID'],$product['Type'] ); ?>' style="height: 60px;width: 60px;" src="<?php echo $contextPath.$product['Cover_Img'] ?>" class="image0" alt="111"> </a>
							</li>
							<?php }?>
						</ul>
					</div>
				</div>
			</div>
			<div style="clear: both"></div>
		</div>
<?php include_once 'view/user/footer.php';?>