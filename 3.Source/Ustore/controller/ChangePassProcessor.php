<?php
	//xu ly dang nhap
	
	if(isset($_POST["btnSubmitChangePass"]))
	{   
		include_once("UserController.php");
		$id=$_POST["idUser"];
		$oldpass=$_POST["txtOldPassword"];
		$newpass=$_POST["txtNewPassword"];
		$repass=$_POST["txtRePassword"];
		echo "<br>newpass=".$newpass;
		echo "<br>repass=".$repass;
		echo "<br>oldpass=".$oldpass;
		echo "<br>id=".$id;
		//header("Location:../dichvu.php?do=login");
		$result=UserController::CheckOldPassword($id,$oldpass);
		echo "<br>result=".$result;
		if($result==null || $newpass != $repass)
		{
			header("Location:../view/user/change-password.php?error=error");
		}
		else
		{
			$resultChange=UserController::SetPassword($id,$newpass);
			echo "<br>resultChange=".$resultChange;
			if($resultChange == false)
			{
				header("Location:../view/user/change-password.php?error=failed");
			}
			else
			{
				header("Location:../view/user/change-password.php?changepassword=successfull");
			}
		}  /**/
	}                     
	
?>     