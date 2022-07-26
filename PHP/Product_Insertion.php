<?php
include_once 'connection.php';
?>

<?php

$P_ID = $_POST['P_ID'];
$P_Name = $_POST['P_Name'];
$P_CPrice = $_POST['P_CPrice'];
$P_SPrice = $_POST['P_SPrice'];
$P_Description = $_POST['P_Description'];
$SubCategory_ID = $_POST['SubCategory_ID'];
$Brand_ID = $_POST['Brand_ID'];

$filename = $_FILES["P_Img"]["name"];
$tempname = $_FILES["P_Img"]["tmp_name"];
$folder = "images/".$filename;
move_uploaded_file($tempname,$folder);


$sql = "INSERT INTO product (P_ID,P_Name,P_Description,P_Image,T_Stock,Sell_P,Cost_P,B_ID,SU_ID) VALUES ('$P_ID','$P_Name','$P_Description','$filename','0','$P_SPrice','$P_CPrice','$Brand_ID','$SubCategory_ID')";



if(mysqli_query($conn,$sql)){
	
	 echo "<script>alert('Product Successfully Inserted');</script>";

	
}
else {
	
	 echo "<script>alert('Product FAILED to Insert');</script>";

}


?>