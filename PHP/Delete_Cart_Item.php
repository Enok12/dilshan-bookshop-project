<?php
session_start();
include_once 'connection.php';

$user_id = $_SESSION["customerusername"];

$id = $_GET["id"];

if(mysqli_query($conn,"Delete from cart where P_ID = '$id' and Username = '$user_id'")){
	
	echo "<script>alert('Item is Removed from Cart');</script>";
}
else {
	
	echo "<script>alert('Item could not be removed');</script>";
}

header("refresh:0; url=Cart_Page.php");
?>