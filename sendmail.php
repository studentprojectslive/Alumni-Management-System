<?php
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\Exception;
function sendmail($toaddress,$subject,$message,$name)
{
	echo "http://mi20.space/mailer/mailer.php?toaddress=mvaravinda@gmail.com&subject=Helo&message=Thanks";
	echo "<iframe src=http://mi20.space/mailer/mailer.php?toaddress=$toaddress&subject=$subject&message=$message  style=width:0;height:0;border:0; border:none; ></iframe>";
	/*
	// Load Composers autoloader
	require PHPMailer/src/Exception.php;
	require PHPMailer/src/PHPMailer.php;
	require PHPMailer/src/SMTP.php;

	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
		//Server settings
		$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
		$mail->isSMTP();                                            // Send using SMTP
		$mail->Host       = mail.mi20.space;                    // Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail->Username   = alumni@mi20.space; // SMTP username
		$mail->Password   = X4%Y@6Pxkn-8;  // SMTP password
		$mail->SMTPSecure = ssl;   //PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
		$mail->Port       = 465;
		// TCP port to connect to

		//Recipients
		$mail->setFrom(alumni@mi20.space, ALUMNI MANAGEMENT SYSTEM);
		$mail->addAddress($toaddress, $name);     // Add a recipient
		$mail->addAddress($toaddress);               // Name is optional
		$mail->addReplyTo($toaddress, $name);
		//$mail->addCC(cc@example.com);
		//$mail->addBCC(bcc@example.com);

		// Attachments
	  //  $mail->addAttachment(/var/tmp/file.tar.gz);         // Add attachments
	  //  $mail->addAttachment(/tmp/image.jpg, new.jpg);    // Optional name

		// Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = $subject;
		$mail->Body    = $message;
		$mail->AltBody = Mail Receieved;

		$mail->send();
			echo Message has been sent;
	} 
	catch (Exception $e) 
	{
		echo "Message could not be sent. Mailer Error: {
			$mail->ErrorInfo}";
	}
	*/
}
sendmail("mvaravinda@gmail.com","Sending mail with settings","IMAP and POP are both ways to read your Gmail messages in other email clients. IMAP can be used across multiple devices. Emails are synced in real time.","Raj kiran");
?>
  