<?php

;
//the subject
$sub = $_POST['inquiryname'];


$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
//the message
$message = '<html><body>';

$message .= "<strong>Name :</strong>" . strip_tags($_POST['customername']) ."<br>";
$message .= "<strong>Email:</strong> " . strip_tags($_POST['email']) . "<br>";
$message .= "<strong>Address:</strong> " . strip_tags($_POST['address']) . "<br>";
$message .= "<strong>Contact   :</strong> " . $_POST['contact'] . "<br><br>";
$message .= "<strong>Message:</strong> " . $_POST['remarks'] . "<br>";
$message .= "</body></html>";
//recipient email here
$rec = "dilshancentre@gmail.com";


//send email


if(mail($rec,$sub,$message,$headers)){
	echo "<script>alert('Message Sent !');</script>";
	header("refresh:0; url=contactus.php");
}else{
	echo "<script>alert('Message FAILED to Send !');</script>";
	header("refresh:0; url=contactus.php");
}
?>
