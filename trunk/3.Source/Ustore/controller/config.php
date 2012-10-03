<?php
	$hostName = "localhost";
   	$databaseName = "ustorevn_ustore";
   	$username = "root";
   	$password = "root";	
	$maxPages = 5;
	$maxItems = 10;
	$amountDate = 30;
	$nameFolder = "php";
	$link = mysql_connect($hostName, $username, $password);
	mysql_set_charset('utf8', $link);
?>