﻿<?php
	session_start();
    $_SESSION["contextPath"] = $contextPath;
	if(isset($_GET["do"])&& $_GET["do"]=="logout")
	{
        unset($_SESSION["curUser"]);
		$curUser=null;	
	}
	$curUser=$_SESSION["curUser"];
	
	//echo "flag_register=".isset($_SESSION["register"]);
	if(isset($_GET["do"])&& $_GET["do"]=="login" && !isset($_SESSION["register"]))
	{
		$_SESSION["register"]="true";
		echo"<body onload='press_DangNhapRegister();'>";
		//$_SESSION["register"] = "fail";
	}
?>
<body class="body">
	<div id="header" class="header">
		<img src="<?php echo $contextPath?>template/images/banner.png" />
		<div><table>
			<tr>
				<td width="800"></td>
				<?php
				if ($curUser == null)
				{
				?>
				<td><a class="lnk"  onclick="return press_DangNhap();" href="#">Đăng Nhập</a></td>
				<td><span style="color:#FFFFFF;font-weight:bold">|</span></td>
				<td><a class="lnk" href="<?php echo $contextPath?>view/user/register.php">Đăng Ký</a></td>
				<?php
				}
				else{
				?>
				<td><label style="color:#FFFFFF;font-weight:bold" type="type">Hello <?php echo $curUser["Email"] ?></label></td>
				<td><span style="color:#FFFFFF;font-weight:bold">|</span></td>
				<td><a class="lnk" href="<?php echo $contextPath?>view/user/skirt.php?do=logout">Đăng xuất</a></td>
				<?php }
				?>
				
				<td><span style="color:#FFFFFF;font-weight:bold">|</span></td>
				<td><a class="lnk" href="#">Giỏ hàng</a></td>
			</tr>
			<tr height="10"></tr>
		</table>
		</div>
	</div>
	<div id="menu" class="menu">
		<ul id="nav">
			<li id="selected"><a href="<?php echo $contextPath?>index.php">New Collection</a>
			</li>
			<li><a href="#">Hot</a>
			</li>
			<li><a href="<?php echo $contextPath?>view/user/skirt.php">Tui Xach</a>
			</li>
			<li><a href="#">Khuyen Mai</a>
			</li>
			<li><a href="#">Huong Dan</a>
			</li>
			<li><a href="#">Lien He</a>
			</li>
		</ul>
	</div>