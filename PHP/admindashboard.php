<?php
session_start();
include_once 'connection.php';

if(!isset($_SESSION['AdminUser_name'])){
	echo "<script>alert('Please Login to the System');</script>";
	header("refresh:0; url=Admin_login.php");
}else{

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/stylebody1.css">
	<link rel="stylesheet" href="../css/stylenavbar.css">
	<link rel="stylesheet" href="../css/stylefooter.css">
	<link rel="stylesheet" href="../css/stylecarousel.css">
	
	<title>Dilshan Bookshop</title>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' href='https://themes.audemedia.com/html/goodgrowth/css/owl.theme.default.min.css'>
	<link rel="stylesheet" href="../images/dbshoplogo.jpg">
		
</head>

<body>
	<div class="containertopnav"  style="background-color: #000000;">
		<br>
		<div class="col-lg-12" align="right" >
			<a href="Logout_Admin.php">
				<button class="btn btn-primary"style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6); border-radius: 30px; font-size: 20px;"><strong>LOG OUT</strong></button>			
			</a>		
		
		</div>
		<br>
	
	
	</div>
	<div class="container-fluid" align="center">
		<a href="index.php">
			<img src="../images/dbshoplogo.png" width="400" height="400" alt="" class="fadeInUp" />
		</a>
	</div>
	
	<div class="container">
		<div class="col-lg-12">
			<div class="row">
			
				<div class="col-lg-4">
					<div class="containeradminmenu1" align="center">
						<hr>
						<h5><strong>MANAGE CATEGORIES</strong></h5>
						<hr>
						<a href="Category_Insert_Menu.php">
							<button class="btn btn-dark" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">CREATE CATEGORY</button>
						</a>
						<br>
						<br>
						<a href="Category_Edit_Menu.php">
							<button class="btn btn-dark" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">UPDATE CATEGORY</button>
						</a>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="containeradminmenu2" align="center">
						<hr>
						<h5><strong>MANAGE BRANDS</strong></h5>
						<hr>
						<a href="Brand_Insert_Menu.php">
							<button class="btn btn-dark" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">CREATE BRAND</button>
						</a>
						<br>
						<br>
						<a href="Brand_Edit_Menu.php">
							<button class="btn btn-dark" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">UPDATE BRAND</button>
						</a>
					</div>
				</div>
				
				<div class="col-lg-4">
					<div class="containeradminmenu3" align="center">
						<hr>
						<h5><strong>MANAGE SUPPLIERS</strong></h5>
						<hr>
						<a href="Supplier_Insert_Menu.php">
							<button class="btn btn-dark" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">CREATE SUPPLIERS</button>
						</a>
						<br>
						<br>
						<a href="Supplier_Edit_Menu.php">
							<button class="btn btn-dark" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">UPDATE SUPPLIERS</button>
						</a>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-lg-12">
			<div class="row">
			
				<div class="col-lg-4">
					<div class="containeradminmenu4" align="center">
						<hr>
						<h5><strong>MANAGE PRODUCTS</strong></h5>
						<hr>
						<a href="Product_Insert_Menu.php">
							<button class="btn btn-dark" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">CREATE PRODUCTS</button>
						</a>
						<br>
						<br>
						<a href="Product_Edit Menu.php">
							<button class="btn btn-dark" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">UPDATE PRODUCTS</button>
						</a>
						<br>
						<br>
						<a href="Managestocks.php">
							<button class="btn btn-dark" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">MANAGE STOCKS</button>
						</a>
						<br>
						<br>
						<br>
						<br>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="containeradminmenu5" align="center">
						<hr>
						<h5><strong>STOCK MANAGEMENT</strong></h5>
						<hr>
						<a href="GRN.php">
							<button class="btn btn-dark" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">CREATE GRN</button>
						</a>
						<br>
						<br>
						<a href="STGRN_Update.php">
							<button class="btn btn-dark" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">UPDATE GRN</button>
						</a>
						
						<br>
						<br>
						<a href="ViewGRNDate.php">
							<button class="btn btn-dark" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">VIEW GRN REPORT - DATES</button>
						</a>
						
						<br>
						<br>
						<a href="ViewGRNSupplier.php">
							<button class="btn btn-dark" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">VIEW GRN REPORT - SUPPLIER</button>
						</a>
						

					</div>
					</div>
				
				<div class="col-lg-4">
					<div class="containeradminmenu6" align="center">
						<hr>
						<h5><strong>STOCK MANAGEMENT</strong></h5>
						<hr>
						<a href="SRN.php">
							<button class="btn btn-dark" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">CREATE SRN</button>
						</a>
						<br>
						<br>
						<a href="STSRN_Update.php">
							<button class="btn btn-dark" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">UPDATE SRN</button>
						</a>
						
						<br>
						<br>
						<a href="ViewSRNDate.php">
							<button class="btn btn-dark" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">VIEW SRN REPORT - DATES</button>
						</a>
						
						<br>
						<br>
						<a href="ViewSRNSupplier.php">
							<button class="btn btn-dark" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">VIEW SRN REPORT - SUPPLIER</button>
						</a>
					</div>
				</div>
				
				<div class="col-lg-4">
					<div class="containeradminmenu7" align="center">
						<hr>
						<h5><strong>SALES MANAGEMENT</strong></h5>
						<hr>
						<a href="Sales_Menu.php">
							<button class="btn btn-dark" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">VIEW SALES REPORTS - ANNUALLY</button>
						</a>
						
						<br>
						<br>
						<a href="Sales_Menu2.php">
							<button class="btn btn-dark" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">VIEW SALES REPORTS - MONTHLY</button>
						</a>
						<br>
						<br>
						<a href="StockBulk.php">
							<button class="btn btn-dark" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">STOCK BULK</button>
						</a>
					</div>
				</div>
				
				<div class="col-lg-4">
					<div class="containeradminmenu8" align="center">
						<hr>
						<h5><strong>MANAGE TRANSACTIONS</strong></h5>
						<hr>
						<a href="ManageTransactions_Menu.php">
							<button class="btn btn-dark" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">MANAGE TRANSACTIONS</button>
						</a>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
					</div>
				</div>
				
				<div class="col-lg-4">
					<div class="containeradminmenu1" align="center">
						<hr>
						<h5><strong>MANAGE USERS</strong></h5>
						<hr>
						<a href="Admin_Signup.php">
							<button class="btn btn-dark" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">ADMIN SIGN UP</button>
						</a>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
					</div>
				</div>
			</div>
		</div>		  
	</div>
	
	<br>
	
	<div class="container-fluid">
		<div class="container" style="background-color: #ffffff; padding: 20px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">
			<?php
				$sql = "Select * from grn_details a,product b where a.Availability < 50 and a.Activation_Status = 'Active' and a.P_ID = b.P_ID";
				$rows = mysqli_query($conn,$sql);
				$Noofrows = mysqli_num_rows($rows);

				$sql2 = "Select * from grn_details a,product b where a.Availability > 50 and a.Activation_Status = 'Active' and a.P_ID = b.P_ID";
				$rows2 = mysqli_query($conn,$sql2);
				$Noofrows2 = mysqli_num_rows($rows2);

				if($Noofrows > 0){

			?>
			<h3 align="center"><strong>LOW STOCK OF ACTIVE STOCKS</strong></h3>
			 <div class="table-responsive">
					<table class="table table-striped table-bordered rounded">
						<thead style="background-color:#F01E21 ;color: #ffffff;">
						  <tr>
							   <th >Product Name</th>
							   <th >Quantity</th>
						  </tr>
						</thead>
						<?php
							while ($row1 = mysqli_fetch_array($rows)) 
						{

							echo "<tr>";
								echo "<td>"; echo $row1["P_Name"];"</td>";
								echo "<td style= 'text-align:right'>"; echo $row1["Availability"]."</td>";

							echo "</tr>";
						 echo "</div>";
						echo "</div>";

						}
						?>
						<?php
						}elseif($Noofrows2 > 0){
							echo "Stock is Stable";
						}else{
							echo "There are no Active Stocks. ";
						}
						?>
					</table>
			</div>
		</div>	
		<br>
		<div class="container" style="background-color: #ffffff;  padding: 20px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">
					 <h3 align="center"><strong>PENDING ORDERS</strong></h3>
					<?php
				$sql = "SELECT DISTINCT Transaction_No,Tr_Date,Username FROM order_table WHERE Status = 'Pending' and Status_2 ='ACTIVE' ORDER BY Transaction_No DESC";
				$rows = mysqli_query($conn,$sql);
				$Noofrows = mysqli_num_rows($rows);

				if($Noofrows > 0){

				?>
				 <div class="table-responsive">
					<table class="table table-striped table-bordered rounded">
						  <thead style="background-color: #00438F; color: #ffffff;">
							  <tr>
								   <th >Order Number</th>
								   <th >Transaction Date</th>
								  <th >Customer Username</th>
								   <th >View</th>
							  </tr> 
						  </thead>
					 
						<?php
							while ($row1 = mysqli_fetch_array($rows)) 
						{


							echo "<tr>";
								echo "<td>"; echo $row1["Transaction_No"];"</td>";
								echo "<td>"; echo $row1["Tr_Date"];"</td>";
								echo "<td>"; echo $row1["Username"];"</td>";
								echo "<td>"; ?><a href="ViewTransactions.php?ids=<?php echo $row1["Transaction_No"];?>&Date=<?php echo $row1["Tr_Date"]  ?>"><button type="button">View</button> </a><?php echo "</td>";


							echo "</tr>";
						 echo "</div>";
						echo "</div>";

						}
						?>
						<?php
						}else{
							echo "No Pending Orders";
						}
						?>
					 </table>
				</div>



		</div>
		<br>
		<div class="container" style="background-color: #ffffff; padding: 20px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">
					 <h3 align="center"><strong>APPROVED ORDERS</strong></h3>
					<?php
				$sql22 = "SELECT DISTINCT Transaction_No,Tr_Date,Username FROM order_table WHERE Status = 'Approved' and Status_2 = 'ACTIVE' ORDER BY Transaction_No DESC LIMIT 10";
				$rows4 = mysqli_query($conn,$sql22);
				$Noofrows3 = mysqli_num_rows($rows4);

				if($Noofrows3 > 0){

				?>
				 <div class="table-responsive">
						<table class="table table-striped table-bordered rounded">
						  <thead style="background-color: #00438F; color: #ffffff;">
									  <tr>
										   <th >Order Number</th>
										   <th >Transaction Date</th>
										  <th >Customer Username</th>
										   <th >View</th>
									  </tr>
						  </thead>
							<?php
								while ($row2 = mysqli_fetch_array($rows4)) 
							{


								echo "<tr>";
									echo "<td>"; echo $row2["Transaction_No"];"</td>";
									echo "<td>"; echo $row2["Tr_Date"];"</td>";
									echo "<td>"; echo $row2["Username"];"</td>";
									echo "<td>"; ?><a href="ViewTransactions2.php?ids=<?php echo $row2["Transaction_No"];?>&Date=<?php echo $row2["Tr_Date"]?>"><button type="button">View</button> </a><?php echo "</td>";


								echo "</tr>";
							 echo "</div>";
							echo "</div>";

							}
							?>
							<?php
							}else{
								echo "No Approved Orders";
							}
							?>
					 </table>
				</div>

		</div>
	
	</div>
	
<br>
</body>
</html>
<?php
}
?>