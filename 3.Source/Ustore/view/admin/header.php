<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php
	session_start();
	if (isset($_SESSION["admin"]) && $isIndex){
		echo 'dd';
	}
	if (!isset($_SESSION["admin"]) && !$isIndex){
		header("Location:index.php");
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Users - Admin Template</title>
<link rel="stylesheet" type="text/css" href="css/theme.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/light box.css">
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
</script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->
<script type="text/javascript" src="../../template/js/jquery.min.js">
</script>

<script type="text/javascript">
$(document).ready(function(){
 $("a#show-panel").click(function(){
    $("#lightbox, #lightbox-panel").fadeIn(300);
 })
 $("input#close-panel").click(function(){
     $("#lightbox, #lightbox-panel, #message-panel").fadeOut(300);
 })
})
</script>
</head>

<body>
	<div id="container">
    	<div id="header">
        	<h2>Ustore Administrator Site</h2>
        	<?php if (isset($_SESSION["admin"])) { ?>
        	<div style = "float: right;">
        		<div style="color: black; margin-bottom: 10px;"><?php echo $_SESSION["admin"]['Name'];?></div>
        		<div >
        			<a style="color: white" href="action/action_login.php?action=logout">Logout</a>
        		</div>
        	</div>
   			<?php } ?>