<?php
	//sendmail("aravinda@technopulse.in","Sending mail with settings","IMAP and POP are both ways to read your Gmail messages in other email clients. IMAP can be used across multiple devices. Emails are synced in real time.","Raj kiran");

function sendmail($toaddress,$subject,$message,$name)
{
	/**
 * This example shows sending a message using a local sendmail binary.
 */

//Import the PHPMailer class into the global namespace
use PHPMailer-master;

require ../vendor/autoload.php;

//Create a new PHPMailer instance
$mail = new PHPMailer;
// Set PHPMailer to use the sendmail transport
$mail->isSendmail();
//Set who the message is to be sent from
$mail->setFrom(from@example.com, First Last);
//Set an alternative reply-to address
$mail->addReplyTo(replyto@example.com, First Last);
//Set who the message is to be sent to
$mail->addAddress(whoto@example.com, John Doe);
//Set the subject line
$mail->Subject = PHPMailer sendmail test;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents(contents.html), __DIR__);
//Replace the plain text body with one created manually
$mail->AltBody = This is a plain-text message body;
//Attach an image file
$mail->addAttachment(images/phpmailer_mini.png);

//send the message, check for errors
if (!$mail->send()) {
    echo Mailer Error: . $mail->ErrorInfo;
} else {
    echo Message sent!;
}
	
	/*
	require PHPMailer-master/PHPMailerAutoload.php;
	
	$mail = new PHPMailer;
	
	$mail->SMTPDebug = 3;                               // Enable verbose debug output
	
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = mail.mi20.space;  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = alumni@mi20.space;                 // SMTP username
	$mail->Password = X4%Y@6Pxkn-8;                           // SMTP password
	$mail->SMTPSecure = ssl;                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                    // TCP port to connect to
	
	$mail->From = alumni@mi20.space;
	$mail->FromName = ALUMNI MANAGEMENT SYSTEM;
	$mail->addAddress("mvaravinda@gmail.com", $name);     // Add a recipient
	
	$mail->isHTML(true);                                  // Set email format to HTML
	
	$mail->Subject = $subject;
	$mail->Body    = $message;
	$mail->AltBody = $subject;
	
	if(!$mail->send()) {
		echo Message could not be sent.;
		echo Mailer Error:  . $mail->ErrorInfo;
	} else {
		echo <center><strong><font color=green>Mail sent.</font></strong></center>;
	}
	*/
}
?>