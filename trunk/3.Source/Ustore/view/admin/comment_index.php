<?php
ob_start();
include 'header.php';
include 'comment/comment_submenu.php';
if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="add")
	include 'comment/comment_add.php';
else if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="edit")
	include 'comment/comment_edit.php';
else if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="view")
	include 'comment/comment_view.php';
else
	include 'comment/comment_main.php';
include 'footer.php';
?>