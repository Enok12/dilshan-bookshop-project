<?php
session_start();
include_once 'connection.php';

$_SESSION['FromDate'] = $_POST["From_Date"];
$_SESSION['ToDate'] = $_POST["To_Date"];
$_SESSION['SupplierID'] = $_POST["Supplier_ID"];

$fromdate = $_SESSION['FromDate'];
$todate = $_SESSION['ToDate'];
$Supplier_ID = $_SESSION['SupplierID'];

//Display Supplier Name using Session from previous page
			$Supplier_Name = '';
			$link = mysqli_query($conn,"select * from supplier where S_ID = '$Supplier_ID' ");
			while($row1 = mysqli_fetch_array($link)){
				$Supplier_Name = $row1['S_Name'];
			}	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SRN Report - Supplier</title>
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


				<h3 align="center"><strong>SRN REPORT <br> FROM <?php echo $fromdate ?> TO <?php echo $todate ?></strong></h3>
		<h3 align="center"><strong>SUPPLIER : <?php echo $Supplier_Name?></strong></h3>
				<br>
							<div class="table-responsive">
								<table class="table table-striped table-bordered rounded">
									  <tr>  
										   <th >Date </th>  
										   <th >Product Name </th>  
										   <th >Quantity</th>  
										   <th style='text-align: center' >Selling Price</th>  
										  <th style='text-align: center'>Cost Price</th> 
										  


									  </tr> 
			<?php
			$sql = "SELECT b.Received_Date,c.P_Name,a.QTY,a.S_P,a.C_P FROM grn_details a, grn b, product c WHERE c.P_ID=a.P_ID AND a.GRN_ID=b.GRN AND b.Received_Date BETWEEN '$fromdate' AND '$todate' AND b.Status = 'R' AND a.S_ID = '$Supplier_ID'";
			$query = mysqli_query($conn,$sql);

					if (mysqli_num_rows($query) > 0) {
						$n=0;
						
					while ($row=mysqli_fetch_array($query)) {
					$n++;
					
					//Fetching GRN Details from grn_details table
						echo "<tr>";
						echo "<td>"; echo $row["Received_Date"]; "</td>";
						echo "<td>"; echo $row["P_Name"]; "</td>";
						echo "<td>"; echo $row["QTY"]; "</td>";
						echo "<td style='text-align: right'>Rs. "; echo $row["S_P"]; "</td>";
						echo "<td style='text-align: right'>Rs. "; echo $row["C_P"]; "</td>";
					
						

					}
				}else {
						echo "<script>alert('No SRN Generated');</script>";
					header("refresh:0; url=ViewSRNSupplier.php");
					}

			?>
			</div >
</body>
</html>