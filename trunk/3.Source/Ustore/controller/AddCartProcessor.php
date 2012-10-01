<?php
	//xu ly dang nhap
	if(isset($_POST["btnDatHang"]))
	{   
	session_start();
		//include_once("UserController.php");
		include_once("CartController.php");
		$email=$_POST["txtUsernameLogin"];
		$pass=$_POST["txtPasswordLogin"];
		echo "<br>amount product in cart = ".count($_SESSION["cart"]);
		echo "<br>amount product in cart[0] = ".$_SESSION["cart"][0];
		echo "<br>curUser= ".$_SESSION["curUser"][0];
		//$result=CartController::AddCart($email,$pass);
		echo "<br>url=".$_SESSION["contextPath"].$_SESSION["strUrl"];
		$flag = true;
		 for($i=0;$i<count($_SESSION['cart']);$i++)
		  {
				//
				// $str="txtQuantity".$i;
				// echo "<br>quantity=".$_POST[$str];
				// if($_POST[$str] > 0)
				// {
					// $rs=CartController::AddCart($_SESSION["curUser"][0],$_SESSION["cart"][0],$_POST[$str]);
					// if($rs == null) 
						// $flag=false;
				// }
		  }
		  if($flag == false)
		  {
			//echo "<script language='javascript' type='text/javascript'>
			//document.getElementById('messAfterAddCart').innerHTML='Bạn đặt hàng thất bại!';
			//</script>";
			//header("Location:".$_SESSION["contextPath"].$_SESSION["strUrl"]."?addcart=successful");
		  }
		  else
		  {
			//echo "<script language='javascript' type='text/javascript'>
			//document.getElementById('messAfterAddCart').innerHTML='Bạn đặt hàng thành công!';
			//</script>";
			//header("Location:".$_SESSION["contextPath"].$_SESSION["strUrl"]."?addcart=failed");
		  }
			// echo "</br>i=".$_SESSION['cart'][$i]."</br>";
			 // $_SESSION["curUser"] = $result;
			 
			 // if ($result[5] == 1 && $result[7] == 0) 
			 // {
				// $contextPath =$_SESSION["contextPath"];
				// $strUrl =$_SESSION["strUrl"];
				// echo "contextPath=".$contextPath;
			    // echo "</br>url=".$strUrl;
			    // header("Location:".$contextPath.$strUrl);
			
			 // }
			
		  
	}                    
	if(isset($fLogin)&&$fLogin==false)
	{                            
		echo "<script language='javascript' type='text/javascript'>";
		echo "document.getElementById('messRegister').innerHTML='Bạn đã nhập sai tên hoặc mật khẩu';";
		echo "document.getElementById('messRegister').style.color='blue';";
		echo "document.getElementById('popup').style.visibility = 'visible';";
		echo "</script>";
		
	}
?>       