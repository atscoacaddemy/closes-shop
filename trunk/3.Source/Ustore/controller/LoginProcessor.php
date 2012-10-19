<?php
	//xu ly dang nhap
	if(isset($_POST["btn_Login"]))
	{   
		include_once("UserController.php");
		$email=$_POST["txtUsernameLogin"];
		$pass=$_POST["txtPasswordLogin"];
		
		$result=UserController::CheckLogin($email,$pass);
		 // echo "result[0] =".$result[0]."</br>";
		 if($result==null)
			 $fLogin=false;
		 else
		 {
		 for($i=0;$i<count($_SESSION['cart']);$i++)
			echo "</br>i=".$_SESSION['cart'][$i]."</br>";
			 $_SESSION["curUser"] = $result;
			 // echo "rs=".$result;
			 // echo "role=".$result[5];
			 if ($result[5] == 1 && $result[7] == 0) 
			 {
				$contextPath =$_SESSION["contextPath"];
				$strUrl =$_SESSION["strUrl"];
				echo "contextPath=".$contextPath;
			    echo "</br>url=".$strUrl;
			    Utils::redirect($contextPath.$strUrl);
			
			 }
			
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