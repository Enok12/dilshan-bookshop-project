
<?php
include_once 'connection.php';
if(isset($_GET['ids'])) //Fetching Update Details to Textfields
{
	$uGRN = $_GET['ids'];
	$uP_ID = $_GET['p_id'];
	
	if(mysqli_query($conn,"Delete from grn_details where ID ='$uGRN'"))
	{
		echo "<script>alert('Product Removed from SRN');</script>";
	header("refresh:0; url=View_GRN_Records.php");
	}
	else {
	
	echo "<script>alert('Product Failed to Remove from SRN');</script>";
	
}
}
?>