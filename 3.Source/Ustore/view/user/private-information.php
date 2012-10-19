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
		$("#idChangePassword").blur(function ()
		{
			//var strEmail = $("#txtEmail").attr("value");
			//var flag=true;	
			
			//var serverURL = "checkEmail.php?txtEmail=" + strEmail;
			//$("#messEmail").load(serverURL);
			alert("aaaaaaaaaaaaaaa");
			document.getElementById('messPhone').innerHTML="";
			document.getElementById('messPhone').innerHTML="<td align='left'>Mật khẩu cũ:<span style='color:red;'>(*)</span></td>
												<td align='left'>
												<input type='password' size='40' value='' name='txtOldPassword' id='txtOldPassword'>
												<div id='messOldPassword' name='messOldPassword' >";
			//alert("aaa");
			// if(IsEmail(strEmail)==false)
			// {
				// flag=false;
				
				// document.getElementById('messEmail').innerHTML=" Email không hợp lệ";
				// $("#messEmail").css("color","red");
			// }
			// else
			// {
				// document.frmRegister.txtAccess.value = document.frmRegister.txtEmail.value;
				// var serverURL = "checkEmail.php?txtEmail=" + strEmail;
				// $("#messEmail").load(serverURL);
			// }
			
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
					
<!--form -->		
							<td style="padding: 10px;" valign="top">
								<div style="width: 686px;">
									<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;
										font-weight: bold; color:#890C29; text-transform:uppercase;">
										Thông Tin Cá Nhân
									</div>
									<hr style="color: rgb(211, 232, 248);" width="500" size="1">
									<div class="mid_content">
										
									<div id="messError" align="left" style="padding:5px;margin-left:5px;background:#FFFFCC;border:solid 1px #CCCCCC;font-size:12px;color:#000000;font-weight:bold;">
									<?php
									if(isset($_GET['error']))
										echo "-Kiểm tra lại password cũ hay mới không đúng";
										else
										echo"<a href='change-password.php'> Thay đổi mật khẩu.</a>";
									?>
									
										
										<br>
									</div>
									<center>
										<br>
<div style="padding:20px;" id="frmChange" name="frmChange">
<form action="user/thaydoimatkhau.php" method="post" name="frmChangePassword" id="frmChangePassword" style="font-size:14px" >
										<table class="table" border="0">
											<tr>
												<td align="left">Họ tên:</td>
												<td align="left">
												<b><?php echo $curUser[1] ;
												echo "<input name='idUser' id='idUser' type='text' style='width:300px;display:none;' value='".$curUserId."'>";
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
											<tr>
												<td align="left">Ngày đăng ký:</td>
												<td align="left">
												<b><?php echo $curUser[6]; ?></b>
												</td>
											</tr>
										</table>
</form>

</div>
										<p style="font-size: 11px; color: #9F9F9F; text-align:center;">
						<!--hidden -->	<span style="color:red;">(*)</span> Tất cả thông tin của bạn được thể hiện bên trên.</p>
							
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
