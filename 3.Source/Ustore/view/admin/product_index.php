<?php
include 'header.php';
include 'product/product_submenu.php';
if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="view")
	include 'product/product_detail.php';
else if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="add")
	include 'product/product_add.php';
else if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="edit")
	include 'product/product_edit.php';
else if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="image")
	include 'product/product_image.php';
else
	include 'product/product_main.php';
include 'footer.php';
?>