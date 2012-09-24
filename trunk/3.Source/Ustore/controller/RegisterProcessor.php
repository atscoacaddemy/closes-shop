<?php
		if(isset($_POST["btnForgetPassword"]))
		{
			include_once("../PHPMailer/email.php");
			$txtEmail = $_POST["txtEmail"];
			if($_POST["txtEmail"] !== null)
			{
				include_once("../../BUS/UsersBUS.php");
			}
			$checkstatus = UsersBUS::GetUser_StatusByEmail($txtEmail);
			if($checkstatus !== null)
			{
				$random = rand (1,1000000);
				$changePass = UsersBUS::SetPassword($checkstatus['id'],$random);
				if($changePass == true )
				{
					$tag="";
					$content_Subject="RealEstate_HoaPhuong.com";
					$content_Body="
					<div id='yiv1540714745'>
						Xin chào, ".$checkstatus['hoten']."
						<br><br>
						Website RealEstate_HoaPhuong.com có nhận được yêu cầu thay đổi mật khẩu cùa quý khách vào ngày ".date('d-m-Y , h:i:s')."
						<br>
						Mật khẩu đã được thay đổi:<b style='color:#336699;'>".$random."</b>
						<br>
						<br>
						Quí khách vui lòng quay trở lại trang web để đăng nhập lại.
						<br>

						<br>
						<br>
						__________________________________________________
						<br>
						Bộ phận kỹ thuật:
						<br>
						Điện thoại : (08) 38777939. - Fax : (08) 62602665
						<br>
						E-mail: support@realestate_hoaphuong.com
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
					echo "<br>type=".$type;
					echo "<br>tag=".$tag;
					
					$rs=SendEmail::send_Email($txtEmail,$content_Subject,$content_Body,$type);
					echo "<br>rs=".$rs;
					if($rs == true)
					{
						header("Location:../forgetpassword.php?email='".$txtEmail."'&send=success");
					}
					else
						header("Location:../forgetpassword.php?email='".$txtEmail."'&send=failed");
				}
				else
				{
				header("Location:../forgetpassword.php?email='".$txtEmail."'&send=failed");
				}
				
			}
			else
			{
				header("Location:../forgetpassword.php?email='".$txtEmail."'&send=failed");
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
				header("Location:../lienhe.php?send=success");
			 }
			 else
				header("Location:../lienhe.php?send=failed");
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
				header("Location:../nangcaptinvip.php?iddv=".$iddv."&send=success");
			 }
			 else
				header("Location:../nangcaptinvip.php?iddv=".$iddv."&send=failed");
		}
		if(isset($_POST["btnChangeInfoUser"]))
		{
			 include ("../../BUS/UsersBUS.php");
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
				header("Location:../thongtinkhachhang.php?update=success");
			else
			    header("Location:../thongtinkhachhang.php?update=failed");
		}
		if(isset($_POST["btRegister"]))
		{
			echo "register";
			include ("UserController.php");				 
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
				echo "suceess";
				header("Location:../view/user/skirt.php?do=login");
			}
			else
			{
				echo "failed";
				//header("Location:../view/user/register.php?do=failed");
			}
			
		}	
?>