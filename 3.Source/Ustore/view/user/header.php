<?php
	session_start();
	$_SESSION["contextPath"] = $contextPath;
	include_once ($contextPath."controller/config.php");
	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	
	// echo "url=".$url;
	// echo "</br>php=".$nameFolder;
	//start
		$posPHP = strpos($url,"php");
		$posLogOut = strpos($url,"logout");
		$posVIEW = strpos($url,"view");
		$question=strpos($url,"?");
	//	echo "</br>posPHP=".$posPHP;
		$posDAUSAC=0;
		$strUrl="";
		$flag = "false";
		for($i=$posPHP; $i>0; $i--)
		{
			if($url[$i] == "/")
			{
				$posDAUSAC = $i;
				break;
			}
		}
		
		
	//	echo "</br>posPHP=".$posPHP;
	//	echo "</br>posVIEW=".$posVIEW;
		if($posVIEW>0)
		{
			if($posLogOut >0)
			{
					$strUrl=substr($url,$posVIEW,(($posLogOut -4) -$posVIEW));
			}
			else
			{
				$strUrl=substr($url,$posVIEW,strlen($url));
			}
		}
		else
		{
			$strUrl=substr($url,$posDAUSAC+1,(($posPHP +3) - ($posDAUSAC+1))); 
		}
		//echo "<br>strUrl=".$strUrl;
		$_SESSION["strUrl"] = $strUrl;
		
	//end

	
	if(isset($_GET["do"])&& $_GET["do"]=="logout")
	{
        unset($_SESSION["curUser"]);
        unset($_SESSION["cart"]);
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
			<img height="100" src="<?php echo $contextPath?>template/images/banner2.png" />
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
					$posBlank=0;
					for($i=strlen($curUser[1]);$i>=0;$i--)
					{
						if($curUser[1][$i] == " " && $posBlank<$i)
						{
							$posBlank=$i;
						}
						
					}
					$name=substr($curUser[1],$posBlank,strlen($curUser[1]));
				?>
				<a class="lnk" href="<?php echo $contextPath?>view/user/private-information.php">Hello <?php //echo $curUser[1];
				echo $name; ?></a>
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
			<li><a href="<?php echo $contextPath?>view/user/product-list-hot.php">Hot</a>
			</li>
			<li><a href="<?php echo $contextPath?>view/user/product-list.php?type=1">Túi Xách</a>
			</li>
			<li><a href="<?php echo $contextPath?>view/user/product-list-order.php">Hàng Order</a>
			</li>
			<li><a href="<?php echo $contextPath?>view/user/product-list-comming.php">Hàng Sắp Về</a>
			</li>
			<li><a href="<?php echo $contextPath?>view/user/promotion.php">Khuyến Mãi</a>
			</li>
			<li><a href="<?php echo $contextPath?>view/user/contact.php">Liên Hệ</a>
			</li>
		</ul>
	</div>
	
	<style type="text/css">
.w2bslikebox{background: url("http://2.bp.blogspot.com/-S3wMYM5ABsk/Tv57qFo1odI/AAAAAAAAAUw/8NkdLv4d9bo/s1600/w2b_facebookbadge.png") no-repeat scroll left center transparent !important;display: block;float: right;height: 270px;padding: 0 5px 0 46px;width: 245px;z-index: 99999;position:fixed;right:-250px;top:20%;}
.w2bslikebox div{border:none;position:relative;display:block;}
.w2bslikebox span{bottom: 12px;font: 8px "lucida grande",tahoma,verdana,arial,sans-serif;position: absolute;right: 6px;text-align: right;z-index: 99999;}
.w2bslikebox span a{color: #808080;text-decoration:none;}
.w2bslikebox span a:hover{text-decoration:underline;}
</style>
<script type="text/javascript" src="<?php echo $contextPath?>template/js/scrolltopcontrol.js"></script>
<script type="text/javascript">
scrolltotop.controlHTML = '<img src="<?php echo $contextPath.'template/images/scrolltop.png" />';?>'
</script>
<div class="w2bslikebox" style="right: -250px;">
	<div>
		<iframe
			src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FUstoreBag&amp;width=245&amp;colorscheme=light&amp;show_faces=true&amp;connections=9&amp;stream=true&amp;header=false&amp;height=500px"
			scrolling="yes" frameborder="0"
			style="border: medium none; overflow: hidden; height: 500px; width: 245px; background: #fff;"></iframe>
	</div>
</div>
<script type="text/javascript">
//<!--
$(document).ready(function() {$(".w2bslikebox").hover(function() {$(this).stop().animate({right: "0"}, "medium");}, function() {$(this).stop().animate({right: "-250"}, "medium");}, 500);});
//-->
</script>
	