<?php
require_once 'header.php';
require_once 'user_submenu.php';
if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="search")
	include 'user/user_search.php';
else {
	include ('user_edit.php');
}
require_once 'footer.php';
?>