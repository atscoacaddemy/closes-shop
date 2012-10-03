<?php
	//xu ly dang nhap
	echo "<br>add to cart processpor";
	if(isset($_POST["btnDatHang"]))
	{   
		session_start();
		//include_once("UserController.php");
		include_once("CartController.php");
		//echo "<br>add to cart processpor";
		$email=$_POST["txtUsernameLogin"];
		$pass=$_POST["txtPasswordLogin"];
		//echo "<br>amount product in cart = ".count($_SESSION["cart"]);/
		echo "<br>amount product in cart[0] = ".$_SESSION["cart"][0];
	//	echo "<br>curUser= ".$_SESSION["curUser"][0];
		//$result=CartController::AddCart($email,$pass);
		echo "<br>url=".$_SESSION["contextPath"].$_SESSION["strUrl"];
		$flag = "true";
		if(count($_SESSION['cart']) > 0)
		{
			$allcart_of_userid=CartController::GetCartByUserID($_SESSION["curUser"][0]);
			echo "<br>***********user id=".$_SESSION["curUser"][1];
			echo "<br>***********so luong cart trong DB of user=".count($allcart_of_userid);
			echo "<br>***********so luong cart trong session of user=".count($_SESSION['cart']);
			//delete all cart of user not in $_SESSION['cart'][0]
			for($i=0;$i<count($allcart_of_userid);$i++)
			{
				$flag_delete="false";
				for($j=0;$j<count($_SESSION['cart']);$j++)
				{
				 echo "<br>++++ propduct_id cart in DB of userid=".$allcart_of_userid[$i][2];
				 echo "<br>++++ product_id cart  in SS          = ".$_SESSION['cart'][$j];
					if($allcart_of_userid[$i][2] == $_SESSION['cart'][$j])
					{
						$flag_delete = "true";
					}
				}
				if($flag_delete == "false")
				{
					echo "<br>***********delete id=".$allcart_of_userid[$i][0];
					$rs = CartController::Delete($allcart_of_userid[$i][0]);
				}
			}
			
			for($i=0;$i<count($_SESSION['cart']);$i++)
			{
				
				 //$str="txtQuantity1";
				$str="txtQuantity".$i;
				 echo "<br>str quantity=".$str;
				 echo "<br>quantity=".$_POST[$str];
				if($_POST[$str] > 0)
				{
					echo "<br>************product id =".$_SESSION["cart"][$i];
					echo "<br>************user id =".$_SESSION["curUser"][0];
					$check = CartController::GetCartByUserIDAndProductId($_SESSION["curUser"][0],$_SESSION["cart"][$i]);
					echo "<br>************cart id =".$check[0];
					if($check != null)
					{
						echo "<br>********amount cart of userid productid=".$check[3];
						//$rs=CartController::UpdateCart($_SESSION["curUser"][0],$_SESSION["cart"][$i],($check[3]+$_POST[$str]));
						$rs=CartController::UpdateCart($_SESSION["curUser"][0],$_SESSION["cart"][$i],($_POST[$str]));
					}
					else
					{
						$rs=CartController::AddCart($_SESSION["curUser"][0],$_SESSION["cart"][$i],$_POST[$str]);
					}
					if($rs == null)
					{
						 $flag="false";
						 echo "<br>flag=".$flag;
					}
				}
			}
		}
		else
		{
			$deleteAllCart = CartController::GetCartByUserID($_SESSION["curUser"][0]);
			for($i=0; $i< count($deleteAllCart) ;$i++)
			{
				$rs = CartController::Delete($deleteAllCart[$i][0]);
				if($rs == null )
					$flag = "false";
			}
		}
	    if($flag == "false")
	    {
			header("Location:../view/user/cart.php?addcart=failed");
	    }
	    else
	    {
			header("Location:../view/user/cart.php?addcart=successful");
	    }
			
		  
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