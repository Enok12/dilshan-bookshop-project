<?php
session_start();
include_once 'connection.php';
$sql = "SELECT * FROM order_table WHERE Transaction_No = '".$_SESSION['Transaction_No']."' and Tr_Date= '".$_SESSION['Date']."'";
		$query = mysqli_query($conn,$sql);
		if (mysqli_num_rows($query) > 0) {
			# code...
			while ($row=mysqli_fetch_array($query)) {
			$Tr_ID[] = $row["Transaction_ID"];
			$Customer = $row["Username"];
			}
			
			//Updating Stock
			for ($i=0; $i < count($Tr_ID); $i++) { 
				$sql1= "UPDATE order_table SET Status = 'Approved' WHERE Transaction_ID ='$Tr_ID[$i]'";
				mysqli_query($conn,$sql1); 
				
			}
			$sql22 = "Select * from Customer where Username = '".$Customer."'";
			$query34 = mysqli_query($conn,$sql22);
			
			while ($row45=mysqli_fetch_array($query34)) {
			$Email = $row45["Email"];
			}
			
				//the subject
				$sub = "Order CONFIRMED - Dilshan Bookshop";
				//the message
				$msg = "Your Order is CONFIRMED. You will receive your items within 2-4 days";
			
				mail($Email,$sub,$msg);
				
					echo "<script>alert('Transaction Approved');</script>";
					header("refresh:0; url=admindashboard.php");
					
		}

?>