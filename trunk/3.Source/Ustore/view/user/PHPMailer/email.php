<?php
class SendEmail
{
	public static function send_Email($emailTo,$content_Subject,$content_Body,$type)
	{
		include_once("class.phpmailer.php");
		$mail = new PHPMailer();
		$mail->IsSMTP(); // send via SMTP
		//IsSMTP(); // send via SMTP
		$mail->SMTPAuth = true; // turn on SMTP authentication
		//$mail->Username = "sieudanglegend@gmail.com"; // SMTP username
		echo "<br>emailTo=".$emailTo;
		echo "<br>type=".$type;
		if($type==1)
		{
			//$mail->Username = "sieudangf2@yahoo.com"; // SMTP username
			$mail->Username = "lam.hoson_uns@yahoo.com"; // SMTP username
			$mail->Password = "ZXCasd123"; // SMTP password		
			//$webmaster_email = "sieudangf2@yahoo.com"; //Reply to this email ID			
			$webmaster_email = "lam.hoson_uns@yahoo.com"; //Reply to this email ID			
		}
		else
		{
			if($type == 2)
			{
				$email="sieudanglegend@gmail.com"; // Recipients email ID
				$mail->Password = "27219872006"; // SMTP password
				$webmaster_email = "sieudanglegend@gmail.com"; //Reply to this email ID
			}
		}
		//$mail->Password = "27219872006"; // SMTP password
		//$webmaster_email = "sieudanglegend@gmail.com"; //Reply to this email ID
		//$webmaster_email = "sieudangf2@yahoo.com"; //Reply to this email ID
		// $email="sieudanglegend@gmail.com"; // Recipients email ID
		//$email="sieudangf2@yahoo.com"; // Recipients email ID
		$name="HoSonLam"; // Recipient's name
		$mail->From = $webmaster_email;
		$mail->FromName = "Ustore.com";
		$mail->AddAddress($emailTo,$name);//send to
		$mail->AddReplyTo($webmaster_email,"Webmaster: ustore.com");
		$mail->WordWrap = 50; // set word wrap
		//$mail->AddAttachment("../var/tmp/file.tar.gz"); // attachment
		//$mail->AddAttachment("/tmp/image.jpg", "new.jpg"); // attachment
		$mail->IsHTML(true); // send as HTML
		// $mail->Subject = "This is the subject";
		$mail->Subject = $content_Subject;
		// $mail->Body = "Hi,This is the HTML BODY "; //HTML Body
		$mail->Body = $content_Body; //HTML Body
		$mail->AltBody = "This is the body when user views in plain text format"; //Text Body
		$flag = true;
		if(!$mail->Send())
		{
			$flag = false;
			echo "<br>Mailer Error: " . $mail->ErrorInfo;
			return $flag;
		}
		else
		{
			echo "Message has been sent";
			return $flag;
		}
	}
}

?>
