<?php
    // variables start
	$name = "";
	$email = "";
	$message = "";
	
	$name =  trim($_POST['contactNameField']);
	$email =  trim($_POST['contactEmailField']);
	$message =  trim($_POST['contactMessageTextarea']);
	// variables end
	
	// email address starts
	$emailAddress = 'mail@domain.com';
	// email address ends
	
	$subject = "Pesan dari: $name";	
	$message = "<strong>Dari:</strong> $name <br/><br/> <strong>Pesan:</strong> $message";
	
	$headers .= 'Dari: '. $name . '<' . $email . '>' . "\r\n";
	$headers .= 'Balas-ke: ' . $email . "\r\n";
	
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	//send email function starts
	mail($emailAddress, $subject, $message, $headers);
	//send email function ends
?>