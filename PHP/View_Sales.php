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
<title>Annual/Summarized Report </title>
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
				<h3 align="center"><strong>SALES REPORT <br> FROM <?php echo $fromdate ?> TO <?php echo $todate ?></strong></h3>
				<br>
							<div class="table-responsive">
								<table class="table table-striped table-bordered rounded">
									  <tr>  
										   <th >Product Name </th>  
										   <th >Quantity</th>  
										   <th style='text-align: center' >Selling Price(Avg)</th>  
										  <th style='text-align: center'>Cost Price(Avg)</th> 
										   <th style='text-align: center' >Total Selling Value</th> 
										  <th style='text-align: center' >Total Cost Value</th>
										  <th style='text-align: center'> Profit</th>
									  </tr> 
			<?php
			$sql = "SELECT DISTINCT P_ID FROM order_table WHERE Tr_Date BETWEEN '".$_SESSION['FromDate']."' AND '".$_SESSION['ToDate']."' AND Status_2 = 'ACTIVE'";
			$query = mysqli_query($conn,$sql);

					if (mysqli_num_rows($query) > 0) {

						$n=0;
						$FinalProfit = 0;
						$Final2 = 0;
						
					while ($row=mysqli_fetch_array($query)) {
					$n++;

						//Fetching Product Name
					$sql1 = "SELECT P_Name,Sell_P FROM product WHERE P_ID = '".$row["P_ID"]."'";
					$query2 = mysqli_query($conn,$sql1);
						//Fetching Product Quantity
					$sql3 = "SELECT SUM(qty) FROM order_table WHERE P_ID = '".$row["P_ID"]."' and Tr_Date BETWEEN '".$_SESSION['FromDate']."' AND '".$_SESSION['ToDate']."' AND Status_2 = 'ACTIVE'";
					$query3 = mysqli_query($conn,$sql3);
					

					$sql56 = "SELECT * FROM order_table WHERE P_ID = '".$row["P_ID"]."' and Tr_Date BETWEEN '".$_SESSION['FromDate']."' AND '".$_SESSION['ToDate']."' AND Status_2 = 'ACTIVE'";
						
					$query7 = mysqli_query($conn,$sql56);
						$Numrows2 = mysqli_num_rows($query7);

						//Fetching Product Name
						while ($row1=mysqli_fetch_array($query2)) {
							$Product_Name = $row1["P_Name"];
						}
						//Fetching Product Quantity
						while ($row3=mysqli_fetch_array($query3)) {
							$QTY = $row3["SUM(qty)"];
						}
						
						$SampleNetProfit = 0;
						$SampleCostavg = 0;
						$SampleSellavg = 0;
						
						$ExactCostValue = 0;
						$ExactSellValue = 0;
						while ($row55=mysqli_fetch_array($query7)) {
							$SampleCost = $row55["Cost_P"];
							$SampleSell = $row55["Sell_P"];

							$SampleTCost = $row55["Cost_P"] * $row55["qty"];
							$SampleTSell = $row55["Sell_P"] * $row55["qty"];
							
							$SampleCostavg = $SampleCostavg + $row55["Cost_P"];
							$SampleSellavg = $SampleSellavg +  $row55["Sell_P"];
							
							$ExactCostValue = $ExactCostValue + ($row55["Cost_P"] * $row55["qty"]);
							$ExactSellValue = $ExactSellValue + ($row55["Sell_P"] * $row55["qty"]);

							$SampleTProfit = $SampleTSell-$SampleTCost;
							$SampleNetProfit = $SampleNetProfit + $SampleTProfit;
						}
						
						$FInalCostavg = $SampleCostavg/$Numrows2;
						$FInalSellavg = $SampleSellavg/$Numrows2;
						$Final2 = $Final2 + $SampleNetProfit;
						
						
						echo "<tr>";
						echo "<td>"; echo $Product_Name; "</td>";
						echo "<td>"; echo $QTY; "</td>";
						echo "<td style='text-align: right'>Rs. "; echo $FInalSellavg; "</td>";
						echo "<td style='text-align: right'>Rs. "; echo $FInalCostavg; "</td>";
						echo "<td style='text-align: right'>Rs. "; echo $ExactSellValue; "</td>";
						echo "<td style='text-align: right'>Rs. "; echo $ExactCostValue; "</td>";
						echo "<td style='text-align: right'>Rs. "; echo $SampleNetProfit; "</td>";
					}

						echo "</tr>";
						echo "<td></td>";
						echo "<td></td>";
						echo "<td></td>";	
						echo "<td></td>";	
						echo "<td></td>";	
						echo "<td style='text-align: center'> <strong>Total</strong> </td>"; 
						echo"<td style='text-align: right'><strong>Rs. ";echo $Final2; echo "</strong></td>";
				}else {
						echo "<script>alert('No Sales Generated');</script>";
					header("refresh:0; url=Sales_Menu.php");
					}

			?>
			</div >
</body>
</html>