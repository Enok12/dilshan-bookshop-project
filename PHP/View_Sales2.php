<?php
session_start();
include_once 'connection.php';

$_SESSION['FromDate2'] = $_POST["From_Date"];
$_SESSION['ToDate2'] = $_POST["To_Date"];

$fromdate = $_SESSION['FromDate2'];
$todate = $_SESSION['ToDate2'];
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	
	
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
										  <th >Date </th> 
										   <th >Product Name </th>  
										   <th >Quantity</th>  
										   <th style='text-align: center' >Selling Price</th>  
										  <th style='text-align: center'>Cost Price</th> 
										   <th style='text-align: center' >Total Selling Value</th> 
										  <th style='text-align: center' >Total Cost Value</th>
										  <th style='text-align: center'> Profit</th>
									  </tr> 
			<?php
			$sql = "SELECT * from order_table WHERE Tr_Date BETWEEN '".$_SESSION['FromDate2']."' AND '".$_SESSION['ToDate2']."'  AND Status_2 = 'ACTIVE'";
			$query = mysqli_query($conn,$sql);

					if (mysqli_num_rows($query) > 0) {
						$n=0;
						$SampleNetProfit = 0;
						while ($row=mysqli_fetch_array($query)) {
                            $n++;
							$Date = $row["Tr_Date"];
							$Quantity = $row["qty"];
							$CostPrice = $row["Cost_P"];
							$Sell_P = $row["Sell_P"];
							$ExactSellValue = $row["Sell_P"]*$row["qty"];
							$ExactCostValue = $row["Cost_P"]*$row["qty"];
							
							$SampleTProfit = $ExactSellValue-$ExactCostValue;
							$SampleNetProfit = $SampleNetProfit + $SampleTProfit;

                                //Fetching Product Name
                            $sql1 = "SELECT P_Name,Sell_P FROM product WHERE P_ID = '".$row["P_ID"]."'";
                            $query2 = mysqli_query($conn,$sql1);

                                    //Fetching Product Name
                            while ($row1=mysqli_fetch_array($query2)) {
                                    $Product_Name = $row1["P_Name"];
									
                            }
							echo "<tr>";
							echo "<td>"; echo $Date; "</td>";
						echo "<td>"; echo $Product_Name; "</td>";
						echo "<td>"; echo $Quantity; "</td>";
						echo "<td style='text-align: right'>Rs. "; echo $Sell_P; "</td>";
						echo "<td style='text-align: right'>Rs. "; echo $CostPrice; "</td>";
						echo "<td style='text-align: right'>Rs. "; echo $ExactSellValue; "</td>";
						echo "<td style='text-align: right'>Rs. "; echo $ExactCostValue; "</td>";
						echo "<td style='text-align: right'>Rs. "; echo $SampleTProfit; "</td>";
						}

						echo "</tr>";
						echo "<td colspan='6'></td>";
							
						echo "<td style='text-align: center'> <strong>Total</strong> </td>"; 
						echo"<td style='text-align: right'><strong>Rs. ";echo $SampleNetProfit; echo "</strong></td>";
				}else {
						echo "<script>alert('No Sales Generated');</script>";
					header("refresh:0; url=Sales_Menu.php");
					}
			?>
			</div >
</body>
</html>