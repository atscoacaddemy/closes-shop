<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
 <?php  
  $contextPath="../../";
 ?>
	<head>
		<meta http-equiv=Content-Type content='text/html; charset=utf-8'>
		<title>U Store - Chuyên Túi Xách Thời Trang, Túi Xách Hàng Hiệu</title>
		<LINK REL="SHORTCUT ICON" HREF="<?php echo $contextPath?>template/images/banner2.png" />
		<link type="text/css" rel="stylesheet" href="<?php echo $contextPath?>template/css/menu.css"  media="screen">
		<link type="text/css" rel="stylesheet" href="<?php echo $contextPath?>template/css/main.css"  media="screen"/>
		<script type="text/javascript" src="<?php echo $contextPath?>template/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo $contextPath?>template/js/jquery-ui-1.8.23.custom.min.js"></script>
		<script type="text/javascript" src="<?php echo $contextPath?>template/js/menu.js"></script>
	</head>
	<body class="body">
<?php
	require_once("../../utility/Utils.php");
	include_once ("../../controller/config.php");
	$maxItems = 9;
	$curPage = "";
	if (isset($_GET["page"]))
		$curPage = (int) $_GET["page"];
    $curPage = $curPage>0?$curPage:1;
	$curItem = ($curPage-1)*$maxItems;
?>
 <?php include_once 'header.php';?>
 <?php
 require_once ("../../controller//ProductController.php");
$type = null;
$subtype = null;
$presentType = '1';

$productList = null;
$productList = ProductController::getProductsOnPage($type, $subtype,$presentType,$curItem,$maxItems);
$totalItems=ProductController::getProductsOnPageCount($type, $subtype,$presentType);
echo ' <script type="text/javascript">
 	var array = $("ul#nav > li");
 	for ( var int = 0; int < array.length; int++) {
		var array_element = array[int];
		if ($(array_element).attr("id") == "selected") {
			$(array_element).attr("id", "");
		} 
	}
 </script>';
echo
	' <script type="text/javascript">
 	var array = $("ul#nav > li");
 	for ( var int = 0; int < array.length; int++) {
		$(array[5]).attr("id", "selected");
	}
 </script>';
?>
<?php
 include_once ('../../controller/PromotionController.php');
 require_once("../../utility/Utils.php");
 include_once ("../../controller/config.php");
 $maxItems = 10;
 $curPage = "";
 if (isset($_GET["page"]))
 	$curPage = (int) $_GET["page"];
 $curPage = $curPage>0?$curPage:1;
 $curItem = ($curPage-1)*$maxItems;
 $promotionController = new PromotionController();
 $promotionList = $promotionController -> Get($curItem,$maxItems);
 $totalItems=$promotionController -> Count();
?>
		<div id="contain" class="contain contain box-transparent">
				<?php if (!empty($promotionList) && $promotionList != null ) {?>
					<?php foreach ($promotionList as $promotion) {?>
					<div class="promotion">
						<?php echo $promotion['Detail'];?>
					</div>
					<?php } } else {?>
				<div style="font-size: 14px;"><img src="<?php echo $contextPath?>template/images/coming_soon.png" /></div>
				<?php }?>
		</div>
			 <?php include_once 'footer.php';?>
	</body>
</html>