<?php
session_start();
include_once 'DBconnection_DBS.php';
?>

<?php
$Brand_ID = $_POST['Brand_ID'];
$Brand_Name = $_POST['Brand_Name'];

$sql = "INSERT INTO brand (B_ID,B_Name) VALUES ('$Brand_ID','$Brand_Name')";


if(mysqli_query($connection,$sql)){
	
	echo 'Record is successfully inserted';
}
else {
	
	echo 'Record is not inserted';
}

header("refresh:5; url=Brand_PHP.php");
?>