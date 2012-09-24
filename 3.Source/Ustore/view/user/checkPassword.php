<?php 
	//$txtPassword = $_REQUEST["txtPassword"];
	if(isset($_REQUEST["txtRePassword"]))
	{
		$txtRePassword = $_REQUEST["txtRePassword"];
		if(!empty($txtRePassword))
		{
				echo "<img src='../../template/images/valid.png' alt='Hợp lệ' title='Hợp lệ' width=20 height=20>";
		}
	}
	if(isset($_REQUEST["txtPassword"]))
	{
		$txtPassword = $_REQUEST["txtPassword"];
		if(!empty($txtPassword))
		{
			  echo "<img src='../../template/images/valid.png' alt='Hợp lệ' title='Hợp lệ' width=20 height=20>";
		}
	}
	
?>