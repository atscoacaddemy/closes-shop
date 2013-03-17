<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
 <?php  
  $contextPath="../../";
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
$presentType = '4';

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
		$(array[4]).attr("id", "selected");
	}
 </script>';
?>
 <form action="product-list.php" method="get" id="form">
 <input type="hidden" id="action" name="action"/>
 <input type="hidden" id="subtype" name="subtype"/>
		<div id="contain" class="contain contain box-transparent">
				<?php require_once 'left-menu.php';?>
				<div >
				<?php if (!empty($productList) && $productList != null ) {?>
					<?php foreach ($productList as $product) {?>
					<div class="product-cell">
						<div class="product-picture">
							<?php if ($product['Present_Type'] == '1'){?>
							<div class="product-label-hot"></div>
							<?php } elseif ($product['Present_Type'] == '2') {?>
							<div class="product-label-new"></div>
							<?php } else {?>
							<div class="product-label-nornal"></div>
							<?php } ?>
							<a href="product-detail.php?productid=<?php echo $product['ID']; ?>&type=1"> <img src="<?php echo $contextPath.$product['Preview_Img_01']; ?>" /> </a>

						</div>
						<div>
							<div class="product-id">
								<?php echo $product['Name']?>
							</div>
							<div  class="product-price">
								<?php echo number_format($product["Price"], 0, ',', ',');?><sup style="margin-left: 5px;">đ</sup>
							</div>
						</div>
						<div class="cart-button">
							<a style="color:white; text-decoration: none" href="cart.php?productid=<?php echo $product['ID']; ?>"> Add to cart </a>
						</div>
					</div>
					
				<?php } ?>
				<?php } else { ?>
				<div style="font-size: 14px;"><img src="<?php echo $contextPath?>template/images/coming_soon.png" /></div>
				<?php } ?>
				
				
				</div>
			<?php 
				
				$strLink = "product-list-comming.php?type=$selectedSubtype"."&subtype=".$_REQUEST['subtype']."&";
				$strPaging = Utils::paging2 ($strLink,$totalItems,$curPage,$maxPages,$maxItems,$contextPath);
				
				
			?>
				<div style="clear: both;"></div>
				<?php echo $strPaging;?> 
			</div>
	</form>
		
			 <?php include_once 'footer.php';?>
	</body>
</html>