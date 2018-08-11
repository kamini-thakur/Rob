<?php

	$name = $_POST["name"];
	$phone = $_POST["phone"];
	$comment = $_POST["comment"];
	$company_email = $_POST["company_email"];
	if (isset($_POST['email'])) {
		$email = $_POST["email"];
	}
	if (isset($_POST['message'])) {
		$msg = $_POST["message"];
	}
	if (isset($_POST['comment'])) {
		$comment = $_POST["comment"];
	}

	$to = "robert@icebloc.com";
	$subject = "Test on M2 square site";
	$headers = "From: $company_email\n";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers = "Content-type:text/html;charset=UTF-8" . "\r\n";

	$message = "<p>A visitor to your site has sent the following email address to be added to your mailing list.</p>
	<p><b>Name:</b> $name </p>
	<p><b>Phone:</b> $phone </p>
	<p><b>Company Email:</b> $company_email </p>";

	if (isset($_POST['email']) || isset($_POST['message']) ) {
		$message = "$message <p><b>Email Address:</b> $email </p>
		<p><b>Message:</b> $msg </p>";
	}
	if (isset($_POST['comment'])) {
		$message = "$message <p><b>Comment:</b> $comment </p>";
	}

	// $user = "$email";
	// $usersubject = "Thank You";
	// $userheaders = "From: you@youremailaddress.com\n";
	// $usermessage = "Thank you for subscribing to our mailing list.";
	mail($to,$subject,$message,$headers);
	// mail($user,$usersubject,$usermessage,$userheaders);


?>