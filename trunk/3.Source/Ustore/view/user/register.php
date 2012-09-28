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
		$("#frmRegister").submit(function()
		{
		   
			var strUsername = $("#txtUsername").attr("value");
			var strPassword = $("#txtPassword").attr("value");
			var strRePassword = $("#txtRePassword").attr("value");
			var strEmail = $("#txtEmail").attr("value");
			var flag = true;			
			// alert("submit");
			if(strUsername.length<3 || strUsername.length > 50)
			{				
				flag=false;
				//$("#messUsername").attr("innerHTML","Tên đăng nhập từ 6-50 ký tự");
				document.getElementById('messUsername').innerHTML="Tên đăng nhập từ 6-50 ký tự";
				$("#messUsername").css("color","red");
				
			}
			if(strPassword.length <6 || strPassword.length > 50)
			{				
				flag=false;
				document.getElementById('messPassword').innerHTML="5< Password <50";				
				$("#messPassword").css("color","red");
			}
			else if(HaveSpecialChar(strPassword))
			{
				flag=false;
				document.getElementById('messPassword').innerHTML="Mật khẩu có chứa ký tự lạ!";
				$("#messPassword").css("color","red");
			}					
			if(strPassword != strRePassword)
			{
				flag=false;
				document.getElementById('messRePassword').innerHTML="Mật khẩu nhập không khớp";
				$("#messRePassword").css("color","red");
			}			
			else
			{
				 var serverURL = "checkPassword.php?txtRePassword=" + strRePassword;
				 $("#messRePassword").load(serverURL);
			}
			if(IsEmail(strEmail)==false)
			{
				flag=false;
				document.getElementById('messEmail').innerHTML="Email không hợp lệ";
				$("#messEmail").css("color","red");
				
			}
			else
			{
				var serverURL = "checkEmail.php?txtEmail=" + strEmail;
				 $("#messEmail").load(serverURL);
			}

			if(flag==false)
				alert ("Có lỗi trong thông tin đăng ký. Xin kiểm tra lại");

			//alert($("#cbAgree").attr('checked'));
			//alert("checked=" + document.getElementById('cbAgree').checked);
			//alert("flag=" + flag);
			//if(flag==true && $("#cbAgree").attr('checked') == false)
			//if(flag==true && document.getElementById('cbAgree').checked == false)
			if(document.getElementById('cbAgree').checked == false && flag == true)
			{
				flag=false;
				alert ("Bạn phải đồng ý với thỏa thuận sử dụng");
			}
			
			if(flag==true && $("#hdEmailError").attr("value") == "true")
			{
				flag=false;
				alert ("Email này đã được sử dụng. Xin chọn email khác");
			}
			
			//alert("vao end");
			return flag;
		});
	//check password
		$("#txtPassword").blur(function ()
		{
			
			var txtPassword = $("#txtPassword").attr("value");
			//alert(strUsername);
			//alert("passwr	!"+txtPassword.length);
			if(txtPassword.length <6 || txtPassword.length > 50)
			{				
				flag=false;
				//$("#messPassword").attr("innerHTML","5< Password <50");
				document.getElementById('messPassword').innerHTML="5< Password <50";				
				$("#messPassword").css("color","red");
			}
			
			else
			{
				//$("#messPassword").attr("innerHTML", "");
				var serverURL = "checkPassword.php?txtPassword=" + txtPassword;
				$("#messPassword").load(serverURL);
			}
		});
	//check repassword
		$("#txtRePassword").blur(function ()
		{
			//alert("pass	!");
			var txtPassword = $("#txtPassword").attr("value");
			var txtRePassword = $("#txtRePassword").attr("value");
			//alert(strUsername);
			if(txtPassword != txtRePassword)
			{				//alert(strUsername);
				flag=false;
				//$("#messRePassword").attr("innerHTML","Mật khẩu không khớp !");
				document.getElementById('messRePassword').innerHTML="Mật khẩu không khớp !";
				$("#messRePassword").css("color","red");
			}
			
			else
			{
				//$("#messPassword").attr("innerHTML", "");
				var serverURL = "checkPassword.php?txtRePassword=" + txtRePassword;
				$("#messRePassword").load(serverURL);
			}
		});
	//check email
		$("#txtEmail").blur(function ()
		{
			var strEmail = $("#txtEmail").attr("value");
			var flag=true;	
			
			
			//alert("aaa");
			if(IsEmail(strEmail)==false)
			{
				flag=false;
				//$("#messEmail").attr("innerHTML","Email không hợp lệ");
				document.getElementById('messEmail').innerHTML=" Email không hợp lệ";
				$("#messEmail").css("color","red");
			}
			else
			{
				document.frmRegister.txtAccess.value = document.frmRegister.txtEmail.value;
				var serverURL = "checkEmail.php?txtEmail=" + strEmail;
				$("#messEmail").load(serverURL);
			}
		});
		
		
	// check phone number
		function CheckPhoneNumber(strText)
		{
			var strTemp="0123456789./\_-()";
			for (var i=0; i<strText.length; i++)
			if (strTemp.indexOf (strText.charAt(i))==-1)//==-1 ko bao gio xay ra
			{
				return true;
			}	
			return false;
		}
		
		$("#txtPhone").blur(function ()
		{
			var strPhone = $("#txtPhone").attr("value");
			
			//var txtPhone = $("#txtPhone").attr("value");
			
			if (txtPhone == "")
				return;
			//alert(strPhone +" "+txtPhone );
			if(strPhone.length<10 || strPhone.length>12)
			{				//alert(strUsername);
				flag=false;
				//$("#messPhone").attr("innerHTML","10 <= SDT <= 12");
				document.getElementById('messPhone').innerHTML=" 10 <= SDT <= 12";
				$("#messPhone").css("color","red");
			}
			else if(CheckPhoneNumber(txtPhone))
			{
			
				flag=false;
				//$("#messPhone").attr("innerHTML", "Số điện thoại ko hợp lệ");
				document.getElementById('messPhone').innerHTML=" Số điện thoại ko hợp lệ!";
				$("#messPhone").css("color","red");
			}
			else
			{
				document.getElementById('messPhone').innerHTML="";
				document.getElementById('messPhone').innerHTML="<img src='../../template/images/valid.png' alt='Hợp lệ' title='Hợp lệ' width=20 height=20>";

			}
		});
	//check Username
		$("#txtUsername").blur(function ()
		{

			var strUsername = $("#txtUsername").attr("value");
			//alert(strUsername);
			if(strUsername.length< 6 || strUsername.length > 50)
			{				//alert(strUsername);
				flag=false;
				//$("#messUsername").attr("innerHTML","Nhập từ 6-50 ký tự");
				document.getElementById('messUsername').innerHTML="Nhập từ 6-50 ký tự";
				$("#messUsername").css("color","red");
			}		
			else
			{
				document.getElementById('messUsername').innerHTML="<img src='../../template/images/valid.png' alt='Hợp lệ' title='Hợp lệ' width=20 height=20>";
			}
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
	function passwordStrength(password)
	{
		var desc = new Array();
		desc[0] = "Very Weak";
		desc[1] = "Weak";
		desc[2] = "Better";
		desc[3] = "Medium";
		desc[4] = "Strong";
		desc[5] = "Strongest";

		var score   = 0;

		//if password bigger than 6 give 1 point
		if (password.length > 6) score++;

		//if password has both lower and uppercase characters give 1 point	
		if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;

		//if password has at least one number give 1 point
		if (password.match(/\d+/)) score++;

		//if password has at least one special caracther give 1 point
		if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	score++;

		//if password bigger than 12 give another 1 point
		if (password.length > 12) score++;

		 document.getElementById("passwordDescription").innerHTML = desc[score];
		 document.getElementById("passwordStrength").className = "strength" + score;
	}
</script>
<!--end script for register -->
<!--start contend in register!-->		
			<!--div class="product-cell"-->
			<div>
				<table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="600;">
					<tr>
						
						<td style="padding: 10px;" valign="top">
							<div style="width: 686px;">
								<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;
									font-weight: bold; color:#D3658A; text-transform:uppercase;">
									Đăng Ký Thành Viên</div>
								<hr style="color: rgb(211, 232, 248);" width="680" size="1">	
							<div style="padding:20px;" id="frmRegister" name="frmRegister">
<!--form -->					<form action="<?php echo $contextPath?>controller/RegisterProcessor.php" method="post" name="frmRegister" id="frmRegister">
				
								<table border="0" id="nhaban_box" cellspacing="0" cellpadding="5" border="0" width="700">
									<tr>
										<td align="left" colspan="2" style="font-size:13px;">
										Nếu bạn đã đăng ký tài khoản thành viên tại ustore.com? 
										<a style="color:red;" href="" onclick="return press_DangNhap();">Nhấn đăng nhập</a>
										</td>
									</tr>
									<tr>
										<td align="left" colspan="2">
											<h1>THÔNG TIN LIÊN LẠC</h1>
										</td>
									</tr>
									<tr>
										<td align="right" valign="top" style="padding-top:6px;">
										Họ và tên:<span style="color:red;"> (*)</span>
										</td>
										<td align="left">
										<div style="float:left;">
										<input type="text" style="width:280px;" name="txtUsername" id="txtUsername" onkeyup="javascript:this.value=this.value.toUpperCase();"></div>
										<div id="messUsername" name="messUsername" class="mess"></div>
										<div style="float:left;">
												<span style="font-size:10px;">Họ tên phải lớn hơn 3 và nhỏ hơn 50 ký tự</span>
											</div>
										</td>
									</tr>
									
									<tr>
										<td align="right">
										Điện thoại:<span style="color:red;"> (*)</span>
										</td>
										<td align="left">
										<div style="float:left;">
											<input type="text" style="width:215px;" maxlength="15" value="" name="txtPhone" id="txtPhone" onkeypress="return keypress(event);">
																				
										</div>
										<div id="messPhone" name="messPhone" style="width:140px;float:left;" class="mess"></div>
										</td>
										
									</tr>
									<tr>
										<td align="right" valign="top" style="padding-top:6px;">
										E-mail truy cập:<span style="color:red;"> (*)</span>
										</td>
										<td align="left">
											<div style="float:left;">
												<input type="text" name="txtEmail" id="txtEmail"  value="" style="width:280px;" maxlength="50">
											</div>
											<div id="messEmail" style="width:140px;float:left;" class="mess"> </div>
										<br>
										<div>
										<span style="font-size:10px;float:left;">Hãy điền chính xác địa chỉ email để nhận được thư kích hoạt</span>
										</div>
										</td>
									</tr>
									
									<tr>
										<td align="left" colspan="2">
										<h1>THÔNG TIN TÀI KHOẢN TRUY CẬP</h1>
										</td>
									</tr>
									<tr>
										<td align="right" valign="top" style="padding-top:6px;">
										E-mail truy cập:<span style="color:red;"> (*)</span>
										</td>
										<td align="left">
										<div style="float:left;">
										<input type="text" disabled="disabled"  id="txtAccess" name="txtAccess"  style="width:280px;" maxlength="50" value="" >
										</div>
										<br>
										
										</td>
									</tr>
									
									<tr>
										<td align="right" valign="top" style="padding-top:6px;">
										Mật khẩu:<span style="color:red;"> (*)</span>
										</td>
										<td align="left">
											<div style="float:left;">
												<input name="txtPassword" id="txtPassword" style="width:280px;"  onkeyup="passwordStrength(this.value)" type="password">
											</div>
											<div id="messPassword" name="messPassword" style="width:140px;float:left;" class="mess"></div>
											<br>
											<div style="float:left;">
												<span style="font-size:10px;">Mật khẩu truy cập phải lớn hơn 5 và nhỏ hơn 50 ký tự</span>
											</div>
										</td>
										
									</tr>
									<tr>
										<td align="right" valign="top" style="padding-top:6px;">
											Độ an toàn mật khẩu</td>
										<td>
											<div id="passwordDescription">Very Weak</div>
											<div id="passwordStrength" class="strength0"></div>
										</td>
									</tr>
									<tr>
										<td align="right" valign="top" style="padding-top:6px;">
										Nhập lại mật khẩu:<span style="color:red;"> (*)</span>
										</td>
										<td align="left">
											<div style="float:left;">
												<input type="password" style="width:280px;" maxlength="50" name="txtRePassword" id="txtRePassword">
											</div>
											<div id="messRePassword" name="messRePassword" style="width:140px;float:left;" class="mess"></div>
											<br>
											<div style="float:left;width:300px;">
												<span style="font-size:10px;">Nhập lại mật khẩu như đã điền ở ô trên</span>
											</div>
										</td>
										
									</tr>
									<tr>
										<td colspan="2">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
										<input type="checkbox" name="cbAgree" id="cbAgree">
										Tôi đồng ý với các quy định của ustore.com 
										</td>
									</tr>
									<?php  unset($_SESSION["register"]); ?>
									<tr>
										<td align="right"></td>
										<td align="left" style="padding-left:30px;">
										<span class="action-button-left"></span>
										<input class="submitYellow" type="Submit" value="Đăng ký thành viên" id="btRegister" name="btRegister" />
										<span class="action-button-right"></span>
										</td>
									</tr>
								</table><br>
								</form>
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
	</body>
</html>
