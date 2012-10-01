<head>
		<meta http-equiv=Content-Type content='text/html; charset=utf-8'>
		<title>U Store</title>
		<link rel="stylesheet" type="text/css" href="template/AD Gallery 1.2.7/lib/jquery.ad-gallery.css">
		<link rel="stylesheet" href="template/css/main.css" type="template/text/css" media="screen"/>
		<link rel="stylesheet" href="template/css/menu.css" type="text/css" media="screen">
		<script type="text/javascript" src="template/js/jquery.min.js"></script>
		<script type="text/javascript" src="template/AD Gallery 1.2.7/lib/jquery.ad-gallery.js"></script>
		<script type="text/javascript" src="template/js/jquery-ui.js"></script>
		<script type="text/javascript" src="template/js/menu.js"></script>
		<script type="text/javascript">
			$(function() {
				var galleries = $('.ad-gallery').adGallery();
			});
		</script>
</head>
<?php $contextPath ="" ?>
<?php include_once 'view/user/header.php';?>
<?php include_once $contextPath.'controller/ProductController.php';?>
<?php
	$presentType = 2;
	$productList = ProductController::getProducts(null,null, $presentType);
	
?>
		<div id="contain" class="contain box-transparent">
			<?php include_once $contextPath.'facebook-content.php';?>
			<div class="ad-gallery" style="padding: 20px;">
				<div class="ad-image-wrapper"></div>
				<div class="ad-controls"></div>
				<div class="ad-nav">
					<div class="ad-thumbs">
						<ul class="ad-thumb-list">
							 
							<?php foreach ($productList as $product) {?>
							<li >
								<a  href="<?php echo $contextPath.$product['Cover_Img'] ?>"> <img style="max-height: 100px; max-width: 100px;" src="<?php echo $contextPath.$product['Cover_Img'] ?>" class="image0" alt="111"> </a>
							</li>
							<?php }?>
						</ul>
					</div>
				</div>
			</div>
			<div style="clear: both"></div>
		</div>
<?php include_once 'view/user/footer.php';?>