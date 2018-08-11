<?php

include("class.phpmailer.php");
include("class.smtp.php");

session_start();


if( isset($_POST['name']) && strtoupper($_POST['captcha']) == $_SESSION['captcha_id'] )
{
	// $to = 'info@mullervoon.com.au'; // Replace with your email	
	// $subject = 'Message from website'; // Replace with your $subject
	// $headers = 'From: ' . $_POST['email'] . "\r\n" . 'Reply-To: ' . $_POST['email'];	
	
	// $message = 'Name: ' . $_POST['name'] . "\n" .
	//            'E-mail: ' . $_POST['email'] . "\n" .
	//            'Subject: ' . $_POST['subject'] . "\n" .
	//            'Message: ' . $_POST['message'];
	
	// mail($to, $subject, $message, $headers);	
	// if( $_POST['copy'] == 'on' )
	// {
	// 	mail($_POST['email'], $subject, $message, $headers);
	// }


	$mail = new PHPMailer();
	$name=$_POST['name'];
    $body             = "Hi".$name."\n".$_POST['message'];
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->Host       = "smtp.gmail.com"; // SMTP server
    $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                               // 1 = errors and messages
                                               // 2 = messages only
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->Host       = "smtp.gmail.com"; // sets the SMTP server
    $mail->Port       = 587;                    // set the SMTP port for the GMAIL server
    $mail->Username   = "testmail.esfera@gmail.com"; // SMTP account username
    $mail->Password   = "esfera123";        // SMTP account password

    $mail->Subject    = "Message from website";
    $mail->MsgHTML($body);

    $address = 'kamini_thakur@esferasoft.com';
    $mail->AddAddress($address);
    
    
    if(!$mail->Send()) {
     echo "Mailer Error: " . $mail->ErrorInfo;
    } else 
    {
      echo "Message sent!";
    } 


}
?>