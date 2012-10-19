<?php session_start();?>
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
<!--start script for private information -->
<script type="text/javascript">

$(document).ready(function()
{
	$("#frmChangePassword").submit(function()
	{   
		var flag = true;
		var strOldPass = $("#txtOldPassword").attr("value");
		var strNewPassword = $("#txtNewPassword").attr("value");
		var strRePassword = $("#txtRePassword").attr("value");
		// alert("strOldPass="+strOldPass);
		// alert("strNewPassword="+strNewPassword);
		// alert("strRePassword="+strRePassword);
		// var id = $("#idUser").attr("value");
		// alert(id);
		if(strOldPass.length <5)
		{
			flag = false;
			//$("#messOldPassword").attr("innerHTML","Phải nhập password cũ");
			document.getElementById('messOldPassword').innerHTML=" Phải nhập password cũ!";
			$("#messOldPassword").css("color","red");
		}
		if(strNewPassword.length <5)
		{
			flag = false;
		//	$("#messNewPassword").attr("innerHTML","Phải nhập password mới và lơn hơn 5 kí tự");
			document.getElementById('messNewPassword').innerHTML=" Phải nhập lại password mới và lơn hơn 5 kí tự!";
			$("#messNewPassword").css("color","red");
		}
		if(strRePassword.length <5)
		{
			flag = false;
			//$("#messRePassword").attr("innerHTML","Phải nhập lại password mới và lơn hơn 5 kí tự");
			document.getElementById('messRePassword').innerHTML=" Phải nhập lại password mới và lơn hơn 5 kí tự";
			$("#messRePassword").css("color","red");
		}
		if(strRePassword != strNewPassword)
		{
			flag = false;
			//$("#messRePassword").attr("innerHTML","Phải nhập lại password mới và lơn hơn 5 kí tự");
			document.getElementById('messRePassword').innerHTML=" Password mới không trùng với nhau!";
			$("#messRePassword").css("color","red");
		}
		if(flag == false)
			alert ("Có lỗi trong thông tin đổi mật khẩu. Xin kiểm tra lại");
		return flag;
	});
});
</script>
<!--end script for private information -->
	<body class="body">
 <?php include_once 'header.php';
	// echo "curUser=".$curUser."</br>";
	// echo "curUser[1]=".$curUser[1]."</br>";
	if(!isset($curUser) && $curUser[1] == null)
	{
		//Utils::redirect("product-list.php");
	}
 ?>
		<div id="contain" class="contain contain box-transparent">
			<div class="sub-menu-title">
				<h1 style="top:20px">Túi Xách</h1>
			</div>
<!--start content in forget password!-->		
			<!--div class="product-cell"-->
			<div>
			<table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="500;">
				<tr>						
					
		
							<td style="padding: 10px;" valign="top">
								<div style="width: 686px;">
									<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;
										font-weight: bold; color:#890C29; text-transform:uppercase;">
										Thay đổi mật khẩu
									</div>
									<hr style="color: rgb(211, 232, 248);" width="500" size="1">
									<div class="mid_content">
										
									<div id="messError" align="left" style="padding:5px;margin-left:5px;background:#FFFFCC;border:solid 1px #CCCCCC;font-size:12px;color:#000000;font-weight:bold;">
									<?php
									if(isset($_GET['error']) && $_GET['error']== "error")
									{
										echo"<a href='private-information.php'> Trở lại trang thông tin cá nhân. </a>";
										echo "-Kiểm tra lại password cũ hay mới không đúng";
									}
									else 
									{
										if(isset($_GET['error']) && $_GET['error']== "failed")
										{
											echo"<a href='private-information.php'> Trở lại trang thông tin cá nhân.</a>";
											echo"<label> Password mới không được trùng với pass cũ</label>";
										}
										else if(isset($_GET['changepassword']) && $_GET['changepassword']== "successfull")
										{
											echo"<a href='private-information.php'> Trở lại trang thông tin cá nhân.</a>";
											echo"<label> Thay đổi password thành công</label>";
										}
										else
										{
											echo"<a href='private-information.php'> Trở lại trang thông tin cá nhân.</a>";
										}
									}
									?>
									
										
										<br>
									</div>
<!--form -->									<center>
										<br>
<div style="padding:20px;" id="frmChangePassword" name="frmChangePassword">
<!--form action="../../controller/ChangePassProcessor.php" method="post" name="frmChangePassword" id="frmChangePassword" -->
<form action="<?php echo $contextPath?>controller/ChangePassProcessor.php" method="post" name="frmChangePassword" id="frmChangePassword" >

										<table class="table" border="0">
											<tr>
												<td align="left">Họ tên:</td>
												<td align="left">
												<b><?php echo $curUser[1] ;
												echo "<input name='idUser' id='idUser' type='text' style='width:300px;display:none;' value='".$curUser[0]."'>";//echo "curUser=".$curUser[0];
												?></b>
												</td>
											</tr>
											<tr>
												<td align="left">Email:</td>
												<td align="left">
												<b><?php echo $curUser[4]; ?></b>
												</td>
											</tr>	
											<tr>
												<td align="left">Số điện thoại:</td>
												<td align="left">
												<b><?php echo $curUser[3]; ?></b>
												</td>
											</tr>
					
					
						<!--hidden-->		<tr>
												<div id="messDisPlayOldPassword" name="messDisPlayOldPassword" class="mess"></div>
												<td align="left">
												Mật khẩu cũ:
												<span style="color:red;">(*)</span>
												</td>
												<td align="left">
												<input type="password" size="40" value="" name="txtOldPassword" id="txtOldPassword">
												<div id="messOldPassword" name="messOldPassword" class="mess"></div>
												
												</td>
											</tr>
											<tr>
												
						<!--hidden -->			<td align="left">
												Mật khẩu mới:
												<span style="color:red;">(*)</span>
												</td>
												<td align="left">
												<input type="password" size="40" value="" name="txtNewPassword" id="txtNewPassword"-->
												<div id="messNewPassword" name="messNewPassword" class="mess"></div>
												</td>
											</tr>
											<tr>
						<!--hidden -->		<td align="left">
												Nhập lại mật khẩu mới:
												<span style="color:red;">(*)</span>
												</td>
												<td align="left">
												<input type="password" size="40" value="" name="txtRePassword" id="txtRePassword"-->
												<div id="messRePassword" name="messRePassword" class="mess"></div>
												</td>
											</tr>
										
											<tr>
												<td></td>
												<td style="padding-left:10px;">
													<span class="action-button-left"></span>
												<input class="submitYellow" type="Submit" value="Gửi thông tin" name="btnSubmitChangePass">
													<span class="action-button-right"></span>
												</td>
											</tr>					
										</table>
</form>
</div>
										<p style="font-size: 11px; color: #9F9F9F; text-align:center;">
						<!--hidden -->	<span style="color:red;">(*)</span> Thông tin không được để trống.</p>
							
									</center>							
										
									</div>
								</div>
							</td>
						
					</tr>
				</table>
			</div>			
			<div>
		
			</div>	
				
<!--end in register !-->					
				
				<div style="clear: both;"></div>
			</div>
			 <?php include_once 'footer.php';?>
			 <script type="text/javascript">
				$('#nav').spasticNav();
				$('#comment-toggle').click(function() {
					  $('#comment').toggle('slow', function() {
					    // Animation complete.
					  });
					});
				
				$(document).ready(function() {
					$("#txtValue").css("background-color", "#EDEDED"); //You can use some more styling.
					$("#txtValue").bind("focusin", function() {
						if ($("#txtValue").val() == 'Write a comment') {
							$("#txtValue").val("");
						}
					});
					$("#txtValue").bind("focusout", function() {
						if ($("#txtValue").val() == '') {
							$("#txtValue").val("Write a comment");
						}
					});
				});
			</script>
	</body>
</html>
