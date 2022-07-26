<?php
session_start();
include_once 'connection.php';

$_SESSION['FromDate'] = $_POST["From_Date"];
$_SESSION['ToDate'] = $_POST["To_Date"];

$fromdate = $_SESSION['FromDate'];
$todate = $_SESSION['ToDate'];  
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>GRN Report - Date</title>
	
	
	<script src="Validations.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
	
	<div class="container-fluid" align="center">
		<a >
			<img src="../images/dbshoplogo.png" width="150" height="150" alt="" class="fadeInUp" />
		</a>
	</div>
	
	<div class="container">

				<hr>


				<h3 align="center"><strong>GRN REPORT <br> FROM <?php echo $fromdate ?> TO <?php echo $todate ?></strong></h3>
				<br>
							<div class="table-responsive">
								<table class="table table-striped table-bordered rounded">
									  <tr>  
										   <th >Date </th>
										  <th >Supplier </th>
										   <th >Product Name </th>  
										   <th >Quantity</th>  
										   <th style='text-align: center' >Selling Price</th>  
										  <th style='text-align: center'>Cost Price</th> 
										  
									  </tr> 
			<?php
			$sql = "Select * from grn where Received_Date BETWEEN '$fromdate' AND '$todate' and Status = 'G'";
			$query = mysqli_query($conn,$sql);
					if (mysqli_num_rows($query) > 0) {
						$n=0;
					while ($row=mysqli_fetch_array($query)) {
					$n++;
					//Fetching GRN Details from grn_details table
					$sql1 = "SELECT a.QTY,a.C_P,a.S_P,b.P_Name,c.S_Name from grn_details a, product b, supplier c WHERE a.P_ID = b.P_ID AND a.S_ID=c.S_ID AND GRN_ID = '".$row["GRN"]."'";
					$query2 = mysqli_query($conn,$sql1);
						
					while ($row1=mysqli_fetch_array($query2)) {
					$P_ID = $row1["P_Name"];
					$QTY = $row1["QTY"];
					$Cost_P = $row1["C_P"];
					$Sell_P = $row1["S_P"];
					$S_Name = $row1["S_Name"];
						echo "<tr>";
						echo "<td>"; echo $row["Received_Date"]; "</td>";
						echo "<td>"; echo $S_Name; "</td>";
						echo "<td>"; echo $P_ID; "</td>";
						echo "<td>"; echo $QTY; "</td>";
						echo "<td style='text-align: right'>Rs. "; echo $Sell_P; "</td>";
						echo "<td style='text-align: right'>Rs. "; echo $Cost_P; "</td>";
					}
					}	
				}else {
						echo "<script>alert('No GRN Generated');</script>";
					header("refresh:0; url=ViewGRNDate.php");
					}
			?>
			</div >
</body>
</html>