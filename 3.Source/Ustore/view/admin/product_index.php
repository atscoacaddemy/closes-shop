<?php
include 'header.php';
include 'product/product_submenu.php';
if(isset($_REQUEST["id"]))
	include 'product/product_detail.php';
else if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="add")
	include 'product/product_add.php';
else
	include 'product/product_edit.php';
include 'footer.php';
?>