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
				
<!--start contend in register!-->		
			<!--div class="product-cell"-->
			<div>
				<table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="600;">
					<tr>
						
						<td style="padding: 10px;" valign="top">
							<div style="width: 686px;">
								<div style="margin-left: 10px; margin-top: 10px; font-family: tahoma; font-size: 18px;
									font-weight: bold; color:#890C29; text-transform:uppercase;">
									Đăng Ký Thành Viên</div>
								<hr style="color: rgb(211, 232, 248);" width="680" size="1">	
							<div style="padding:20px;" id="frmRegister" name="frmRegister">
<!--form -->					<form action="user/xulydangky.php" method="post" name="frmRegister" id="frmRegister" >
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
										E-mail liên lạc:<span style="color:red;"> (*)</span>
										</td>
										<td align="left">
											<div style="float:left;">
												<input type="text" name="txtEmail" id="txtEmail"  value="" style="width:280px;" maxlength="50">
											</div>
											<div id="messEmail" style="width:140px;float:left;" class="mess"></div>
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
										Tên truy cập:<span style="color:red;"> (*)</span>
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
