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
		$(array[6]).attr("id", "selected");
	}
 </script>';
?>
		<div id="contain" class="contain contain box-transparent">
				<div style="background: url(<?php echo $contextPath?>template/images/contactus.jpg) no-repeat right;">
				<div style="padding: 20px;">
					<h1>&nbsp;</h1>
<span style="font-size: larger; ">
<h1><span style="font-family: Arial; "><span style="color: rgb(0, 0, 128); ">C&aacute;c bạn vui l&ograve;ng li&ecirc;n hệ:</span></span></h1>
<span style="font-family: Arial; ">&nbsp; &nbsp; &nbsp; &nbsp; <strong>Ở th&agrave;nh phố Hồ Ch&iacute; Minh:</strong><br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; + <span style="color: rgb(0, 0, 255); "><strong>Nhật </strong></span>(Mr)<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;- Phone:&nbsp;<span style="color: rgb(255, 0, 0); ">0984669938</span><br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;- Yahoo:&nbsp;luckyluc1988@yahoo.com<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; + <span style="color: rgb(0, 0, 255); "><strong>Qu&acirc;n</strong> </span>(Mr)<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;- Phone:&nbsp;<span style="color: rgb(255, 0, 0); ">0906622190</span><br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;- Yahoo:&nbsp;goodking2403@yahoo.com<br />
&nbsp; &nbsp; &nbsp; &nbsp;<strong> Ở th&agrave;nh phố Mỹ Tho:</strong><br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; + <span style="color: rgb(0, 0, 255); "><strong>Xu&acirc;n </strong></span>(Ms)<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;- Phone:&nbsp;<span style="color: rgb(255, 0, 0); ">0972150979</span><br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;- Yahoo:&nbsp;boolep_1188@yahoo.com</span></span><br />
				</div>
			</div>
		</div>
			 <?php include_once 'footer.php';?>
	</body>
</html>