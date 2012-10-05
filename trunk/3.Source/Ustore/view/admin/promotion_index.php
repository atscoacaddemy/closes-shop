<?php
ob_start();
include 'header.php';
include 'promotion/promotion_submenu.php';
if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="add")
	include 'promotion/promotion_add.php';
else if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="edit")
	include 'promotion/promotion_edit.php';
else if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="view")
	include 'promotion/promotion_view.php';
else
	include 'promotion/promotion_main.php';
include 'footer.php';
?>