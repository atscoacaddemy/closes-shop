<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
        	<h2>My eCommerce Admin area</h2>
    <div id="topmenu">
            	<ul>
                	<li><a href="index.html">Dashboard</a></li>
                    <li><a href="#">Orders</a></li>
                	<li class="current"><a href="#">Users</a></li>
                    <li><a href="#">Manage</a></li>
                    <li><a href="#">CMS</a></li>
                    <li><a href="#">Statistics</a></li>
                    <li><a href="#">Settings</a></li>
              </ul>
          </div>
      </div>