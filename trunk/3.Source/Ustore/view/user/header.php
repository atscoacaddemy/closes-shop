<?php
	session_start();
	$_SESSION["contextPath"] = $contextPath;
	include_once ($contextPath."controller/config.php");
	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	
	// echo "url=".$url;
	// echo "</br>php=".$nameFolder;
	//start
		// $posPHP = strpos($url,"php");
		// $posVIEW = strpos($url,"view");
		// echo "</br>posPHP=".$posPHP;
		// $posDAUSAC=0;
		// $stringURLneed="";
		// for($i=39;$i>0;$i--)
		// {
			// if($url[$i] == "/")
			// {
				// $posDAUSAC=$i;
				// break;
			// }
		// }
		// echo "</br>posPHP=".$posPHP;
		// echo "</br>posVIEW=".$posVIEW;
		// if($posVIEW>0)
		// {
			// $stringURLneed=substr($url,$posVIEW,(($posPHP +3) -$posVIEW)); 
			
		// }
		// else
		// {
			// $stringURLneed=substr($url,$posDAUSAC+1,(($posPHP +3) - ($posDAUSAC+1))); 
		// }
		// echo "<br>stringURLneed=".$stringURLneed;
		//$_SESSION["strUrl"] = $stringURLneed;
	//end
	
	
	$removeLogOut ="?do=logout";
	$posLogOut = strpos($url,"logout");
	$pos = strpos($url,$nameFolder);
	$question=strpos($url,"?");
	if($posLogOut > 1)
	{
		echo "</br>posLogout=".$posLogOut;
		$strUrl = substr($url,$pos+7,strlen($url) - 10- ($pos+7)); 
	}
	else
	{
		$strUrl = substr($url,$pos+7); 
	}
	$_SESSION["strUrl"] = $strUrl;
	
	
	// $posAddCart = strpos($url,"addcart");
	// if($posAddCart > 1)
	// {
		// echo "</br>posAddCart=".$posAddCart;
		// $strUrl = substr($url,$pos+7,strlen($url) - 7- ($pos+15)); 
	// }
	// else
	// {
		// $strUrl = substr($url,$pos+7); 
	// }
	// echo "</br>subString=".$strUrl;
	
	//$_SESSION["strUrl"] = $strUrl;
	
	
	if(isset($_GET["do"])&& $_GET["do"]=="logout")
	{
        unset($_SESSION["curUser"]);
		$curUser=null;
		header("Location:".$contextPath.$strUrl);
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
		<div>
			<img src="<?php echo $contextPath?>template/images/banner.png" />
		</div>
		<div class='header-login-bar'>
				<?php
				if ($curUser == null)
				{
				?>
				<a class="lnk"  onclick="return press_DangNhap();" href="">Đăng Nhập</a>
				<span style="color:#FFFFFF;font-weight:bold">|</span>
				<a class="lnk" href="<?php echo $contextPath?>view/user/register.php">Đăng Ký</a>
				<?php
				}
				else{
				?>
				<a class="lnk" href="<?php echo $contextPath?>view/user/private-information.php">Hello <?php echo $curUser[1] ?></a>
				<span style="color:#FFFFFF;font-weight:bold">|</span>
				<?php if( $question >1) { ?>
				<a class="lnk" href="<?php echo $contextPath.$strUrl?>&do=logout">Đăng xuất</a>
				<?php 
					  }
					  else{
						echo "<td><a class='lnk' href='".$contextPath.$strUrl."?do=logout'>Đăng xuất</a></td>";
					  }
				}
				?>
				
				<span style="color:#FFFFFF;font-weight:bold">|</span>
				<a class="lnk" href="<?php echo $contextPath?>view/user/cart.php">Giỏ hàng(<?php 
					include_once($contextPath."controller/CartController.php");
					$check = CartController::CountProductID_Of_CartByUserID($_SESSION["curUser"][0]);
					if($check != null)
					{
						echo $check;
					}
					else
					{
						echo "0";
					}
					?>)
				</a>
		</div>
	</div>
	<div id="menu" class="menu">
		<ul id="nav">
			<li id="selected"><a href="<?php echo $contextPath?>index.php">New Collection</a>
			</li>
			<li><a href="#">Hot</a>
			</li>
			<li><a href="<?php echo $contextPath?>view/user/product-list.php?type=1">Túi Xách</a>
			</li>
			<li><a href="#">Hàng Order</a>
			</li>
			<li><a href="#">Hàng Sắp Về</a>
			</li>
			<li><a href="#">Khuyến Mãi</a>
			</li>
			<li><a href="#">Liên Hệ</a>
			</li>
		</ul>
	</div>