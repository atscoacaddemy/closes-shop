<?php
	$hostName = "localhost";
   	$databaseName = "ustore";
   	$username = "root";
   	$password = "root";	
	$maxPages = 5;
	$maxItems = 1;
	$amountDate = 30;
	$link = mysql_connect($hostName, $username, $password);
	mysql_set_charset('utf8', $link);
?>