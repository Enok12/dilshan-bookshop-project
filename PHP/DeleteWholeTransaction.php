<?php
session_start();
include_once 'connection.php';

$tid = $_GET['id'];

$sql = "SELECT * FROM order_table WHERE Transaction_No = '$tid'";

$query = mysqli_query($conn,$sql);
		if (mysqli_num_rows($query) > 0) {
			
			while ($row=mysqli_fetch_array($query)) {
				
			$Transaction_ID[] = $row["Transaction_ID"];
			$qty[] = $row["qty"];
			$P_ID[] = $row["P_ID"];
			$GRN_ID[] = $row["GRN_ID"];
			}
			
			for ($i=0; $i < count($Transaction_ID); $i++) { 
				$sql= "UPDATE grn_details SET Availability = Availability +'$qty[$i]' WHERE P_ID ='$P_ID[$i]' and GRN_ID ='$GRN_ID[$i]' ";
				mysqli_query($conn,$sql);
			}
			
			for ($i=0; $i < count($Transaction_ID); $i++) { 
				$sql23 = "UPDATE order_table SET Status_2 = 'INACTIVE' WHERE Transaction_ID = '$Transaction_ID[$i]'"; 
				mysqli_query($conn,$sql23);
			}
			
			
			
			echo "<script>alert('Order DEACTIVATED');</script>";
			header("refresh:0; url=ManageTransactions_Menu.php");
			
		}else {
			echo "<script>alert('Error in Deactivating');</script>";
			header("refresh:0; url=ManageTransactions_Menu.php");
		}

?>