﻿<?php
		if(isset($_POST["btnForgetPassword"]))
		{
			
			$txtEmail = $_POST["txtEmail"];
			
			echo "email=".$txtEmail."</br>";
			
			if($_POST["txtEmail"] !== null)
			{
				include_once("UserController.php");
			}
			$checkstatus = UserController::GetUserByEmail($txtEmail);
			//echo "check status=".$checkstatus[0]."</br>";
			if($checkstatus !== null)
			{
				$random = rand (1,1000000);
				$changePass = UserController::SetPassword($checkstatus[0],$random);
				echo "changePass=".$changePass."</br>";
				echo "random=".$random."</br>";
				if($changePass == true )
				{
					$tag="";
					//$content_Subject="Đinh Bá Nhựt là Nhựt két!";
					$content_Subject="Change password from Ustore.com website!";
					$content_Body="
					<div id='yiv1540714745'>
						Xin chào, ".$checkstatus[1]."
						<br><br>
						Website Ustore.com có nhận được yêu cầu thay đổi mật khẩu cùa quý khách vào ngày ".date('d-m-Y , h:i:s')."
						<br>
						Mật khẩu đã được thay đổi:<b style='color:#336699;'>".$random."</b>
						<br>
						<br>
						Quí khách vui lòng quay trở lại trang web để đăng nhập lại.
						<br>
						<a  href='http://ustore.com' >http://ustore.com</a>
						<br>
						<br>
						__________________________________________________
						<br>
						Bộ phận kỹ thuật:
						<br>
						Điện thoại : (08) 38777939. - Fax : (08) 62602665
						<br>
						E-mail: support@ustore.com
						<br>
					</div>";
					for($i=strlen($txtEmail)-9;$i<strlen($txtEmail);$i++)
					{
						$tag.=$txtEmail[$i];
					}
					if($tag == "yahoo.com")
						$type  = 1;
					else if($tag == "gmail.com")
							$type = 2;
						 else 
							$type = 3;
					//echo "<br>type=".$type;
					//echo "<br>tag=".$tag;
					include_once("../view/user/PHPMailer/email.php");
					$rs=SendEmail::send_Email($txtEmail,$content_Subject,$content_Body,$type);
					//echo "</br>rs=".$rs."</br>";
					if($rs == true)
					{
						Utils::redirect("../view/user/forget-password.php?email='".$txtEmail."'&send=success");
					}
					else
					{
						Utils::redirect("../view/user/forget-password.php?email='".$txtEmail."'&send=failed");
					}
				}
				else
				{
					Utils::redirect("../view/user/forget-password.php?email='".$txtEmail."'&send=failed");
				}
				
			}
			else
			{
				Utils::redirect("../view/user/forget-password.php?email='".$txtEmail."'&send=failed");
			}
		}
		if(isset($_POST["btnGuiTin"]))
		{
			 include_once("../../BUS/LienHeBUS.php");
			
			 $txtNoiDung = $_POST["txtNoiDung"];
			 $txtDienThoai = $_POST["txtDienThoai"];
			 $txtHoTen = $_POST["txtHoTen"];
			 $txtEmail = $_POST["txtEmail"];
			 $txtDiaChi = $_POST["txtDiaChi"];
			 $date = date('Y-m-d');
			 $status =0;
			 $process = LienHeBUS::Add($txtHoTen,$txtDienThoai,$txtEmail,$txtDiaChi,$txtNoiDung,$date,$status);
			 if($process != false)
			 {
				Utils::redirect("../lienhe.php?send=success");
			 }
			 else
				Utils::redirect("../lienhe.php?send=failed");
		}
		if(isset($_POST["btnNangVip"]) && isset($_GET['iddv']))
		{
			 include_once("../../BUS/DichVuVIPBUS.php");
			 $iddv= $_GET['iddv'];
			 $txtNoiDung = $_POST["txtNoiDung"];
			 $cbbMonth =((int) $_POST["cbbMonth"])*30;
			 $time_send   = date('Y-m-d');
			 $time_update = date('Y-m-d');
			 $status =0;
			 echo "<br>ngayupdate=".$time_update;
			 $process = DichVuVIPBUS::Add($iddv, $txtNoiDung, $time_send,$time_update,$cbbMonth,$status);
			 if($process != false)
			 {
				Utils::redirect("../nangcaptinvip.php?iddv=".$iddv."&send=success");
			 }
			 else
				Utils::redirect("../nangcaptinvip.php?iddv=".$iddv."&send=failed");
		}
		if(isset($_POST["btnChangeInfoUser"]))
		{
			 include_once ("../../BUS/UsersBUS.php");
			 $id = $_GET["id"];
			 $username = $_POST["txtUsername"];
			 $address =  $_POST["txtAddress"];
			 $dt1 = $_POST["txtTelephoneNumber"];
			 if(isset($_POST["txtMobileNumber"]))
				$dt2 = $_POST["txtMobileNumber"];
			else
			    $dt2 ="";
			 $time = date('Y-m-d');
			 $radio_gender = $_POST['gender'];
			 echo "<br>radio=".$radio_gender;
			 $rsUpdate=UsersBUS::UpdateInfor($id,$username,$radio_gender,$address,$dt1,$dt2,$time);
			 if($rsUpdate == true)
				Utils::redirect("../thongtinkhachhang.php?update=success");
			else
			    Utils::redirect("../thongtinkhachhang.php?update=failed");
		}
		if(isset($_POST["btRegister"]))
		{
			//echo "register";
			include_once ("UserController.php");				 
			$password = $_POST["txtPassword"];
			$username = $_POST["txtUsername"];
			$phone = $_POST["txtPhone"];
			//$dt2 = $_POST["txtMobile"];
			$email = $_POST["txtEmail"];
			$role = "1";
			//$fRegister="false";
			$time = date('Y-m-d');
			
			$id = UserController::AddUser($username,$password,$email,$phone,$role);
			if(!empty ($id))
			{	
				$fRegister="true";
				//echo "suceess";
			//$_SESSION["register"] = "true";
				Utils::redirect("../view/user/product-list.php?type=1&do=login");
			}
			else
			{
				echo "failed";
				Utils::redirect("../view/user/register.php?do=failed");
			}
			
		}	
?>