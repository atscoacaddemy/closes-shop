<?php
	//xu ly dang nhap
	if(isset($_POST["btn_Login"]))
	{   
		include("UserController.php");
		$email=$_POST["txtUsernameLogin"];
		$pass=$_POST["txtPasswordLogin"];
		echo "user=".$email."</br>";
		echo "pass=".$pass."</br>";
		
		$result=UserController::CheckLogin($email,$pass);
		// echo "result =".$result["3"]."</br>";
		// echo "result =".$result["2"]."</br>";
		// echo "result =".$result[1]."</br>";
		 if($result==null)
			 $fLogin=false;
		 else
		 {
			 $_SESSION["curUser"] = $result;
			 if ($result["role"] == 0) //admin => log thang vao trang admin.php
			 {
			// $path=$contextPath."skirt.php"
				header("Location:".$contextPath."view/user/skirt.php?id=".$result["ID"]);
			 }
			// else
			// {
				
				// $_SESSION["time_start"]=time();
				// $_SESSION["flag"]=true;
				// header("Location:index.php?id=".$result['id']);
				// header("Location:../index.php");
			// }
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