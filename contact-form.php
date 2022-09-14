<?php
	$name=$_POST['first_name'];
	$lname=$_POST['last_name'];
	$visitor_email=$_POST['visitor_email'];
	$subject=$_POST['subject'];
	$message=$_POST['visitor_message'];
	
	$email_from='Doyel';
	$email_subject="New Contact";
	$email_body="User Name:$name.\n".
	            "Last Name:$lname.\n".
				"User Email:$visitor_email.\n".
				"Subject:$subject.\n".
				"User Message:$message.\n";
	
	$to="atikulislam94@gmail.com";
	$headers="From:$email_from\r\n";
	$headers.="Reply-To:$visitor_email\r\n";
	mail($to,$email_subject,$email_body,$headers);
	header("Location:contact.html");