<?php
include_once 'connection.php';

													 
if(isset($_POST['update']))
{
	$id = $_GET['ID'];
														 

$F_Name=$_POST['First_Name'];
$L_Name=$_POST['Last_Name'];
$Email=$_POST['Email'];
$address=$_POST['Address'];
$NIC=$_POST['NIC'];
$DOB=$_POST['DOB'];
	
$qury = "update customer set Name='".$F_Name."',L_Name='".$L_Name."',Email='".$Email."',Address='".$address."',NIC='".$NIC."',DOB='".$DOB."' where Username = '".$id."'";
	
	
	
	if(mysqli_query($conn,$qury)){
		
	
	echo "<script>alert('Details Successfully Updated');</script>";
	header("refresh:0; url=myaccount.php");
}
else {
	
	echo "<script>alert('Details FAILED to Updated');</script>";
	header("refresh:0; url=myaccount.php");
}
	
}

		?>