<link rel="stylesheet" href="<?php echo $contextPath?>template/css/default.css" type="text/css" media="screen">
<script type="text/javascript" src="<?php echo $contextPath?>template/js/utilities.js"></script>
<script type="text/javascript" src="<?php echo $contextPath?>template/js/common.js"></script>

<div id="footer" class="footer">
	<ul>
		<li><a href="AD Gallery 1.2.7/example/images/6.jpg"></a> <span>Copyright
				@2012 U<span style="font-style: italic">!</span> Store
		</span>
		</li>
	</ul>
</div>
<script type="text/javascript">
				$('#nav').spasticNav();

</script>
<!-- start script login!-->
<table id="popup" style="width: 100%; height: 100%; position: fixed; top: 0; left: 0;
            visibility: hidden; z-index: 598;" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="3" class="transparent">
				&nbsp;
			</td>
		</tr>
		<tr>
			<td class="transparent" style="width: 35%;">
				&nbsp;
			</td>
			<td class="mid_transparent">
				<div id="login_body">
					<div class="form_title">
						THÀNH VIÊN ĐĂNG NHẬP
					</div>
                   
					<!--form action="controller/LoginProcessor.php" method="POST" name="frmDangnhap" onsubmit="return press_btLogin();"!-->
					<form action="" method="POST" name="frmDangnhap" onsubmit="return press_btLogin();">
					<div class="form_box">
						<div  id="messRegister" class="form_text" style="width:340px;float:left;"></div>
						<br><br>
						<p class="form_text">
							Email đăng nhập</p>
						<p class="form_input_BG">
							<input id="txtUsernameLogin" name="txtUsernameLogin" type="text"></p>
						<p class="clear"></p>
						<p class="form_text">
							Mật khẩu</p>
						<p class="form_input_BG">
							<input type="password" id="txtPasswordLogin" name="txtPasswordLogin" type="text"></p>
						<p class="clear"></p>
						<p class="form_login_signup_btn" style="text-align: right; margin-right: 186px;">
						<input type="submit" name="btn_Login" value=""/>	
							<br />
							<br />
							<a style="color:yellow;" href="forget-password.php">Quên mật khẩu?</a>
							|
							<a style="color:yellow;" href="register.php">Đăng ký thành viên</a>
						</p>
						<p style="text-align: right; padding: 0px 10px 0 0; float: right; width: 100px; position: relative;">
							<a href="">	<img style="border:0;" onclick="return press_closeLogIn();" src="<?php echo $contextPath?>template/images/fileclose.png" alt="" /></a>
						</p>
					</div>
                    </form>
                    <?php
                        //xu ly dang nhap
                      $path = $contextPath."controller/LoginProcessor.php";
					 // echo "XXXXXXXXXXXXXX=".$path;
                      include_once($path);
                     // include_once("controller/LoginProcessor.php");
                    ?>
				</div>
			</td>
			<td class="transparent" style="width: 35%;">
				&nbsp;
			</td>
		</tr>
		<tr>
			<td colspan="3" class="transparent">
				&nbsp;
			</td>
		</tr>
</table>
		<script language="javascript" type="text/javascript">
		function press_DangNhap()
        {
            document.getElementById("popup").style.visibility = "visible";
            document.getElementById("txtUsernameLogin").value = "";
            document.getElementById("txtPasswordLogin").value = "";
			document.getElementById('messRegister').innerHTML="";
            document.getElementById("txtUsernameLogin").focus();
            return false;
        }
		function timeOut()
        {
            document.getElementById("popup").style.visibility = "visible";
            document.getElementById("txtUsernameLogin").value = "";
            document.getElementById("txtPasswordLogin").value = "";
            document.getElementById("txtUsernameLogin").focus();
			//$("#messRegister").attr("innerHTML","Mời bạn đăng nhập lại!");
			document.getElementById('messRegister').innerHTML="Mời bạn đăng nhập lại!";
			$("#messRegister").css("color","blue");
            return false;
        }
		function press_DangNhapRegister()
        {
            document.getElementById("popup").style.visibility = "visible";
            document.getElementById("txtUsernameLogin").value = "";
            document.getElementById("txtPasswordLogin").value = "";
            document.getElementById("txtUsernameLogin").focus();
			//$("#messRegister").attr("innerHTML","Đăng ký thành công.Mời bạn đăng nhập!");
			document.getElementById('messRegister').innerHTML="Đăng ký thành công.Mời bạn đăng nhập!";
			$("#messRegister").css("color","blue");
			
            return false;
        }
		function press_LoginToComment()
        {
            document.getElementById("popup").style.visibility = "visible";
            document.getElementById("txtUsernameLogin").value = "";
            document.getElementById("txtPasswordLogin").value = "";
            document.getElementById("txtUsernameLogin").focus();
			//$("#messRegister").attr("innerHTML","Đăng ký thành công.Mời bạn đăng nhập!");
			document.getElementById('messRegister').innerHTML="Hãy đăng nhập để comment sản phẩm này!";
			$("#messRegister").css("color","blue");
			
            return false;
        }

        function press_closeLogIn()
        {
            document.getElementById("popup").style.visibility = "hidden";
            return false;
        }
		function press_btLogin()
		{
		    if(document.getElementById("txtUsernameLogin").value == "")
		    {
                alert("Tên đăng ký không được để trống");
                return false;
		    }
            if(document.getElementById("txtPasswordLogin").value == "")
		    {
                alert("Password không được để trống");
                return false;
		    }
			return true; 
		}
	</script>
<!-- end script login!-->
</body>
