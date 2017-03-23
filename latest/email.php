<?php
	require("dontopen.php");
	date_default_timezone_set('Asia/Kolkata');
	require 'PHPMailerAutoload.php';

	$mail = new PHPMailer;

	$mail->isSMTP();

	$mail->SMTPDebug = 2;

	$mail->Debugoutput = 'html';

	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;

	$mail->SMTPSecure = 'tls';

	$mail->SMTPAuth = true;

	$mail->Username = "hiteshbhagchandani39@gmail.com";

	$mail->Password = pass;

	$mail->setFrom('f2015023@hyderabad.bits-pilani.ac.in', 'Bits-SU');

	//$mail->addReplyTo();

	$mail->addAddress('f2013108@hyderabad.bits-pilani.ac.in', 'Shantanu Bhaiya');

	$mail->Subject = 'PHPMailer GMail SMTP test';

	$mail->Body = "hello";
	//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

	$mail->AltBody = 'This is a plain-text message body';

	if (!$mail->send()) 
	{
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} 
	else 
	{
	    echo "Message sent!";
	}
?>