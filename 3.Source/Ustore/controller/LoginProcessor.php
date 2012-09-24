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
		 echo "result =".$result[1]."</br>";
		 if($result==null)
			 $fLogin=false;
		 else
		 {
			 $_SESSION["curUser"] = $result;
			 echo "rs=".$result;
			 echo "role=".$result[5];
			 if ($result[5] == 1) 
			 {
			// $path=$contextPath."skirt.php"
			 echo "rs=".$result;
			 echo "path=".$contextPath."view/user/skirt.php?id=";
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