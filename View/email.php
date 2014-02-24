<?php
 
// $email and $message are the data that is being
// posted to this page from our html contact form
$email = "Saed Insurance Corporation" ;
$message = "Hello" ;
 
// When we unzipped PHPMailer, it unzipped to
// public_html/PHPMailer_5.2.0
require("---PHPMailer_5.2.0/class.phpmailer.php");
 
$mail = new PHPMailer();
 
// set mailer to use SMTP
$mail->IsSMTP();
 
// As this email.php script lives on the same server as our email server
// we are setting the HOST to localhost

$mail->SMTPAuth = true;     // turn on SMTP authentication

 $mail->SMTPSecure = "ssl";
 $mail->Host = "smtp.gmail.com";  // specify main and backup server
 $mail->Port       = 465;
// When sending email using PHPMailer, you need to send from a valid email address
// In this case, we setup a test email account with the following credentials:
// email: send_from_phpmailer@bradm.inmotiontesting.com
// pass: password
$mail->Username = "fateh.fateh.12345@gmail.com";  // SMTP username
$mail->Password = "operation123"; // SMTP password
 
// $email is the user's email address the specified
// on our contact us page. We set this variable at
// the top of this page with:
// $email = $_REQUEST['email'] ;
$mail->From = $email;
 
// below we want to set the email address we will be sending our email to.
$mail->AddAddress("fateh.fateh.12345@gmail.com", "Brad Markle");
 
// set word wrap to 50 characters
$mail->WordWrap = 50;
// set email format to HTML
$mail->IsHTML(true);
 
$mail->Subject = "You have received feedback from your website!";
 
// $message is the user's message they typed in
// on our contact us page. We set this variable at
// the top of this page with:
// $message = $_REQUEST['message'] ;
$mail->Body    = $message;
$mail->AltBody = $message;
 
if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}
 
echo "Message has been sent";
?>