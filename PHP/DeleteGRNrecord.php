
<?php
include_once 'connection.php';
if(isset($_GET['ids'])) //Fetching Update Details to Textfields
{
	$uGRN = $_GET['ids'];
	$uQTY = $_GET['Stock'];
	$uP_ID = $_GET['p_id'];
	
	if(mysqli_query($conn,"Delete from grn_details where ID ='$uGRN'"))
	{
		if(mysqli_query($conn,"UPDATE `product` SET T_Stock = T_Stock - '$uQTY' where P_ID = '$uP_ID'")){
			echo"";
		}
		echo "<script>alert('Product Removed from GRN');</script>";
	header("refresh:0; url=View_GRN_Records.php");
	}
	else {
	
	echo "<script>alert('Product Failed to Remove from GRN');</script>";
	
}
}
?>