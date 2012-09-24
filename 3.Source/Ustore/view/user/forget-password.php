<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
 <?php  
  $contextPath="../../";
 ?>
	<head>
		<meta http-equiv=Content-Type content='text/html; charset=utf-8'>
		<title></title>
		<link type="text/css" rel="stylesheet" href="<?php echo $contextPath?>template/css/menu.css"  media="screen">
		<link type="text/css" rel="stylesheet" href="<?php echo $contextPath?>template/css/main.css"  media="screen"/>
		
		<script type="text/javascript" src="<?php echo $contextPath?>template/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo $contextPath?>template/js/jquery-ui.js"></script>
		<script type="text/javascript" src="<?php echo $contextPath?>template/js/menu.js"></script>
	</head>
	<body class="body">
 <?php include_once 'header.php';?>
		<div id="contain" class="contain contain box-transparent">
			<div class="sub-menu-title">
				<h1 style="top:20px">Túi Xách</h1>
			</div>
			<div class="left-menu">
				<div class="sub-menu">
					<div >
						Tất cả sản phẩm
					</div>
					<div>
						For teen
					</div>
					<div>
						Sang trọng
					</div>
					<div>
						Cao cấp nhất
					</div>
				</div>
				<div id="support">
					<h1>Hỗ Trợ</h1>
					<div class="phone">
						09123456789
					</div>
					<div class="phone">
						09123456789
					</div>
					<div class="yahoo">
						<a href="ymsgr:SendIM?dinhbanhut24" title="mr Nhut"> <img width="101" height="21" border="0" src="http://mail.opi.yahoo.com/online?u=d&amp;m=g&amp;t=2"> </a>
						</div >
						<div class="yahoo">
							<a href="ymsgr:SendIM?dinhbanhut24" title="mr Nhut"> <img width="101" height="21" border="0" src="http://mail.opi.yahoo.com/online?u=d&amp;m=g&amp;t=2"> </a>
						</div>
					</div>
					<div>

					</div>
			</div>
<!--start script for register -->
<script type="text/javascript">
	$(document).ready(function()
	{
	//check submit 
		$("#frmForgetPassword").submit(function()
		{
			var flag = true;
			var strEmail = $("#txtEmail").attr("value");
			if(IsEmail(strEmail)==false)
			{
				flag=false;
				//$("#messLoadEmail").attr("innerHTML","Email không hợp lệ");
				document.getElementById('messPhone').innerHTML=" Email không hợp lệ!";
				$("#messLoadEmail").css("color","red");
				
			}
			if(flag==false)
				alert ("Có lỗi trong thông tin đăng ký. Xin kiểm tra lại");
			return flag;
		});
	});
	function IsEmail(email)
	{
			if (email=="")
				return false;

			if (email.indexOf ("@")==-1)
				return false;
			var i = 1;
			var sLength = email.length;
			if (email.indexOf (".")==-1)
				return false;
			if (email.indexOf ("..")!=-1)
				return false;
			if (email.indexOf ("@")!= email.lastIndexOf ("@"))
				return false;
			if (email.lastIndexOf (".")==sLength-1)
				return false;
			var str="abcdefghijklmnopqrstuvwxyz-@._1234567890";
			for (var i=0;i<email.length;i++)
				if (str.indexOf (email.charAt(i))==-1)
					return false;
			return true;
	}
	
</script>
<!--end script for register -->
<!--start content in forget password!-->		
			<!--div class="product-cell"-->
			<div>
			<table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="500;">
				<tr>						
					<div style="padding:20px;" id="frmForgetPassword" name="frmForgetPassword">
<!--form -->			<form action="<?php echo $contextPath?>controller/RegisterProcessor.php" method="post" name="frmForgetPassword" id="frmForgetPassword" >
							<td style="padding: 10px;" valign="top">
								<div style="width: 686px;">
									<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;
										font-weight: bold; color:#890C29; text-transform:uppercase;">
										Quên Mật Khẩu
									</div>
									<hr style="color: rgb(211, 232, 248);" width="500" size="1">
									<div class="mid_content">
										
										<table id="nhaban_box" height="105" cellspacing="0" cellpadding="5" border="0" width="686">
											<tr>
												<td align="left" valign="top" colspan="2">
												<div align="left" style="padding:5px;margin-left:5px;background:#FFFFCC;border:solid 1px #CCCCCC;font-size:12px;color:#336699;font-weight:bold;">
												<?php 
												if(isset($_GET['send']) && $_GET['send'] == "success")
												{
													echo "Chú ý :<br>Thư xác nhận yêu cầu thay đổi Mật khẩu mới đã được gửi tới hộp thư ".$_GET['email']."của quý khách.
	Vui lòng truy cập vào email và lấy mật khẩu để đăng nhập lại website";
												}
												else if(isset($_GET['send']) && $_GET['send'] == "failed")
												{
													echo "Chú ý :<br>Lỗi đã xảy ra trong quá trình cài đặt lại mật khẩu với địa chỉ email ".$_GET['email']." này. Xin quý khách thử lại.";
												}
												else
												{
												?>
													- Chỉ các tài khoản thành viên đã được kích hoạt, mới có thể yêu cầu thay đổi mật khẩu.
												<?php } ?>
												</div>
												</td>
											</tr>
											<tr>
												<td align="right" width="30%" valign="top">
												Địa chỉ email:
												<span style="color:red;">*</span>
												</td>
												<td align="left" width="70%" valign="top">
												<input type="text" maxlength="100" value="" name="txtEmail" id="txtEmail" size="55">
												<div id="messLoadEmail" name=="messLoadEmail"></div>
												</td>
											</tr>
											<tr>
												<td align="right" width="30%" valign="top"> </td>
												<td align="left" width="70%" valign="top">
												<span class="action-button-left"></span>
												<input class="submitYellow" type="Submit" value="Gửi thông tin" name="btnForgetPassword" id="btnForgetPassword">
												<span class="action-button-right"></span>
												</td>
											</tr>
										</table>								
										
									</div>
								</div>
							</td>
						</form>
					</div> <!--end div -->		
				</tr>
				</table>
			</div>			
			<div>
		
			</div>	
				
<!--end in register !-->					
				
				<div style="clear: both;"></div>
			</div>
			 <?php include_once 'footer.php';?>
	</body>
</html>
