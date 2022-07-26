<?php
session_start();
include_once 'connection.php';

if(isset($_SESSION['AdminUser_name'])){
	
}else{
	echo "<script>alert('Please Login to the System');</script>";
	header("refresh:0; url=Admin_login.php");
}

$_SESSION['Transaction_No'] = $_GET['ids'];
$_SESSION['Date'] = $_GET['Date'];
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Pending Transaction</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/stylebody1.css">
	<link rel="stylesheet" href="../css/stylenavbar.css">
	<link rel="stylesheet" href="../css/stylefooter.css">
	<link rel="stylesheet" href="../css/stylecarousel.css">
	
	<script src="Validations.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
	<div class="container-fluid" align="center">
		<a href="index.php">
			<img src="../images/dbshoplogo.png" width="300" height="300" alt="" class="fadeInUp" />
		</a>
	</div>
	
	<div class="container" align="center">
		<a href="admindashboard.php">
			<input type="submit" value="BACK TO DASHBOARD" style="font-size: 1.5vw;">
		</a>
	</div>
	<br>
	
	<div class="container-fluid">
		<div class="container-fluid" style="background-color: #ffffff; padding: 20px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">
			<h3><strong>TRANSACTION <?PHP echo $_SESSION['Transaction_No']  ?></strong></h3>
	<div class="table-responsive">
   					<table class="table table bordered">
                          <tr>  
							  
                                 
                               <th >Product Name</th>  
							  <th >Quantity</th> 
							  <th >Total </th>
							 
						
                          </tr> 
	<?php
	$sql = "SELECT * FROM order_table a, Product b WHERE a.P_ID =b.P_ID and Transaction_No = '".$_SESSION['Transaction_No']."' and Tr_Date = '".$_SESSION['Date']."'";
	$rows = mysqli_query($conn,$sql);			
	$Total = 0;
		while ($row1 = mysqli_fetch_array($rows)) 
	{
        $Sum = $row1["Sell_P"] * $row1["qty"];
		
		echo "<tr>";
			echo "<td>"; echo $row1["P_Name"];"</td>";
			echo "<td>"; echo $row1["qty"];"</td>";
			echo "<td>"; echo $Sum;"</td>";
			
			$Total = $Total + $Sum;
		echo "</tr>";
	 
	}
						echo "<tr>";	
						echo "<td colspan = '1'></td>"; 
						echo "<td> <strong>Net Total</strong>";"</td>";
						echo "<td><strong>Rs. "; echo $Total;"</strong></td>";
						echo "</tr>";
						echo "</div>";
						echo "</div>";
	?>
		</table>
						<form action="ApproveTransaction.php">
						<center><button type="submit" name="Approve" style="font-size: 1.5vw; background-color: #0DA62A;">Approve</button></center>
						</form>
			</div>
		</div>
</body>
</html>