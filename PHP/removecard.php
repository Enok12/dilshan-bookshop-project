<?php

include_once 'connection.php';

$id = $_GET["ids"];

$query = mysqli_query($conn,$sql);
	if(mysqli_query($conn,"Delete from bank where Bank__ID ='$id'")){
	
						echo "<script>alert('Credit Card Removed');</script>";
						header("refresh:0; url=myaccount.php");
}
else {
	
	echo "<script>alert('Credit Card FAILED to Removed');</script>";
	header("refresh:0; url=myaccount.php");
	
}

?>