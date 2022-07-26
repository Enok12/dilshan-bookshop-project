<?php
session_start();
include_once 'Connection.php';

if(!isset($_SESSION['customerusername'])){
	echo "<script>alert('Please Login to your Account');</script>";
	header("refresh:0; url=Customer_Login.php");
}else{

$g_userid = $_SESSION["customerusername"];
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/stylebody.css">
	<link rel="stylesheet" href="../css/stylenavbar.css">
	<link rel="stylesheet" href="../css/stylefooter.css">
	<link rel="stylesheet" href="../css/stylecategory.css">
	
	<title>Dilshan Bookshop</title>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' href='https://themes.audemedia.com/html/goodgrowth/css/owl.theme.default.min.css'>
	<link rel="stylesheet" href="../images/dbshoplogo.jpg">
		
</head>

<body>
	<?php
	if(isset($_SESSION["customerusername"])){
		$querycount = "SELECT * FROM cart where Username='".$_SESSION["customerusername"]."'";
				$searchresultcount = mysqli_query($conn, $querycount);
				$numbercount =mysqli_num_rows($searchresultcount);
		echo '<div class="containertopnav">
	   <div class="col-lg-12" align="right"  style="display: flex; justify-content: flex-end;">
					<a class="nav-link" href="myaccount.php"><button class="btn btn-info">Welcome &nbsp; <i class="fa fa-user"></i></button></a>
					<a class="nav-link" href="Logout_Customer.php"><button class="btn btn-info">Log Out</button></a>
					<a class="nav-link" href="Cart_Page.php"><button class="btn btn-info"><i class="fa fa-cart-plus"></i> ('.$numbercount.')</button></a>

		</div>

	  </div>';
	}else{
		echo'<div class="containertopnav">
	   <div class="col-lg-12" align="right"  style="display: flex; justify-content: flex-end;">
					<a class="nav-link" href="Customer_Login.php"><button class="btn btn-info">LOGIN</button></a>
					<a class="nav-link" href="Cart_Page.php"><button class="btn btn-info"><i class="fa fa-cart-plus"></i> (0)</button></a>
	   </div>

	</div>';
	}
	?>
	<div class="container-fluid">
		<br>
	  <nav class="navbar navbar-expand-lg navbar-light bg-light">
	   <a class="navbar-brand" href="Home.php"><img src="../images/dbshoplogo.png" width="150" height="150" alt="" class="fadeInUp"/></a>
	   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	   <span class="navbar-toggler-icon"></span>
	   </button>
	   <div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <ul class="navbar-nav mr-auto">
			 <li class="nav-item active">
				<a class="nav-link" href="Home.php">Home <span class="sr-only">(current)</span></a>
			 </li>
			 <li class="nav-item">
				<a class="nav-link" href="aboutus.php">About Us</a>
			 </li>

			 <li class="nav-item">
				<a class="nav-link" href="shop.php">Shop</a>
			 </li>
			 <li class="nav-item">
				<a class="nav-link" href="faq.php">FAQ</a>
			 </li>
			 <li class="nav-item">
				<a class="nav-link" href="contactus.php">Contact Us</a>
			 </li>

		  </ul>
	   </div>
	</nav>
	</div>

	<br>
	
	<div class="container-fluid">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-5" style="background-color: #ffffff; padding: 40px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">
				
					<?php
			$search_Query = "SELECT * FROM `customer` where Username='$g_userid'";

				$search_Result = mysqli_query($conn, $search_Query);
				while ($row = mysqli_fetch_array($search_Result))
				{
					$cusid = $row['Username'];
					$cusname = $row['Name'];
					$cussurname = $row['L_Name'];
					$dob = $row['DOB'];
					$address1 = $row['Address'];
					$nic = $row['NIC'];
					$Email = $row['Email'];
				?>
				<div id="sliderboxaboutus">
					<h2 style="font-family: Verdana, Arial, Helvetica, sans-serif;"><?php echo $cusname; ?>&nbsp;<?php echo $cussurname; ?></h2><br />
						<p style="font-family: 'Ebrima';">
							<strong>Username - </strong><?php echo $cusid; ?>					
						</p>
					<br />
						<p style="font-family: 'Ebrima';">
							<strong>Date of Birth - </strong><?php echo $dob; ?>	
						</p>
					<br />
						<p style="font-family: 'Ebrima';">
							<strong>Address - </strong><?php echo $address1; ?>	
						</p>
					<br />
						<p style="font-family: 'Ebrima';">
							<strong>Email - </strong><?php echo $Email; ?>	
						</p>
						
					<br />
						<p style="font-family: 'Ebrima';">
							<strong>NIC - </strong><?php echo $nic; ?>	
						</p>
					<br />
					<div style="margin: 15px 0px;">
						
						<a href="editsignup.php"><button style="border-radius: 10px; background-color: #000000; color: #ffffff; padding: 10px;">Edit Customer Details</button></a>
					 </div>
				</div>

				
				<?php
					}			
				?>				
				
				</div>
				<div class="col-sm-1"></div>
				<div class="col-sm-4" style="background-color: #ffffff; padding: 40px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">
				 <h3 align="center"><strong>AVAILABLE CARDS</strong></h3>
						<?php
					$sql24= "select * from bank where Username = '$g_userid'";
					$rows6 = mysqli_query($conn,$sql24);
					$Noofrows5 = mysqli_num_rows($rows6);
					if($Noofrows5 > 0){
					?>
					 <div class="table-responsive">
							<table class="table table-striped table-bordered rounded">
							  <thead style="background-color: #00438F; color: #ffffff;">
										  <tr>
												<th >Card Number</th>
											   <th >Remove</th>
										  </tr>
							  </thead>
								<?php
									while ($row3 = mysqli_fetch_array($rows6)) 
								{
									echo "<tr>";
										echo "<td>"; echo $row3["Credit_Card_Number"];"</td>";
										echo "<td>"; ?><a href="RemoveCard.php?ids=<?php echo $row3["Bank__ID"];?>" onClick="return  confirm('Do you Want to Remove Card from your Account?')"><button type="button">Remove Card</button> </a><?php echo "</td>";
									echo "</tr>";

								}
								?>
								<?php
								}else{
									echo "No Cards Inserted";
								}
								?>
							</table>

					</div>
				
				
				
				</div>
				<div class="col-sm-1"></div>
			
			</div>
		
		</div>
	
	
	
	
	</div>
	
	
	

	
	
<br>
<br>
	

	<div class="container" style="background-color: #ffffff; padding: 20px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">
					 <h3 align="center"><strong>TRANSACTIONS</strong></h3>
					<?php
				$sql22 = "SELECT DISTINCT Transaction_No,Tr_Date,Username FROM order_table WHERE Username = '$g_userid' and Status_2 = 'ACTIVE' ORDER BY Transaction_No DESC";
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
										   <th >View</th>
									  </tr>
						  </thead>
							<?php
								while ($row2 = mysqli_fetch_array($rows4)) 
							{
								echo "<tr>";
									echo "<td>"; echo $row2["Transaction_No"];"</td>";
									echo "<td>"; echo $row2["Tr_Date"];"</td>";
									echo "<td>"; ?><a href="viewTransaction32.php?ids=<?php echo $row2["Transaction_No"];?>&Date=<?php echo $row2["Tr_Date"]?>"><button type="button">View</button> </a><?php echo "</td>";
								echo "</tr>";
							 echo "</div>";
							echo "</div>";
							}
							?>
							<?php
							}else{
								echo "No Transactions occured";
							}
							?>
					 </table>
				</div>

		</div>
	
	</div>
	

	
	<br>
	<hr>
	<br>
	<!-- Footer -->
	<footer class="page-footer font-small stylish-color-dark pt-4" style="color: aliceblue;">

	  <!-- Footer Links -->
	  <div class="container text-center text-md-left">

		<!-- Grid row -->
		<div class="row">

		  <!-- Grid column -->
		  <div class="col-md-4 mx-auto">

			<!-- Content -->
			<h5 class="font-weight-bold text-uppercase mt-3 mb-4">ABOUT DILSHAN BOOKSHOP</h5>
			<p align="justify"><strong>Dilshan Bookshop</strong> has been running since 2015 by consideration of the children needs in that area. Meanwhile the owner (W.S.M.D.Thamel) has started another business at the same place by opening up a Communication Center which provides services such as Computer Typing, Graphic Designing, Computer Repairs, etc…..</p>

		  </div>

		  <!-- Grid column -->

		  <hr class="clearfix w-100 d-md-none">

		  <!-- Grid column -->
		  <div class="col-md-2 mx-auto">

			<!-- Links -->
			<h5 class="font-weight-bold text-uppercase mt-3 mb-4">EXPLORE</h5>

			<ul class="list-unstyled">
			  <li>
				<a href="Home.php" style="color: #ffffff;">Home</a>
			  </li>
			  <li>
				<a href="aboutus.php" style="color: #ffffff;">About Us</a>
			  </li>
			  <li>
				<a href="shop.php" style="color: #ffffff;">Shop</a>
			  </li>
			  <li>
				<a href="faq.php" style="color: #ffffff;">FAQ</a>
			  </li>
			</ul>

		  </div>

		  <!-- Grid column -->

		  <hr class="clearfix w-100 d-md-none">

		  <div class="col-md-4 mx-auto">
				<li class="list-inline-item">
				  <h5 class="font-weight-bold text-uppercase mt-3 mb-4">CONTACT US</h5>
				</li>
				  <br>
				<li class="list-inline-item">
				  <a class="btn btn-info btn-rounded"><i class="fa fa-envelope"></i> &nbsp; dilshancentre@gmail.com</a>
				</li>
			  <br>
				<li class="list-inline-item">
				  <br>
				  <a class="btn btn-info btn-rounded"><i class="fa fa-phone"></i> &nbsp; 031 22 72 288</a>
				</li>
			  <br>
				<li class="list-inline-item">
				  <br>
				  <a class="btn btn-info btn-rounded"><i class="fa fa-location-arrow"></i> &nbsp; Bolawatta</a>
				</li>
		  </div>

		</div>
		<!-- Grid row -->

	  </div>
	  <!-- Footer Links -->

	  <hr>

	  <!-- Call to action -->
	  <ul class="list-unstyled list-inline text-center py-2">
		<li class="list-inline-item">
		  <h5 class="mb-1">Create an Account for free!</h5>
		</li>
		<li class="list-inline-item">
		  <a href="Customer_Signup.php" class="btn btn-danger btn-rounded">Sign up!</a>
		</li>
	  </ul>
	  <!-- Call to action -->

	  <hr>

	  <!-- Social buttons -->
	  <ul class="list-unstyled list-inline text-center">
		<li class="list-inline-item">
		  <a class="btn-floating btn-fb mx-1" style="color: #FFFFFF;">
			<i class="fa fa-facebook"> </i>
		  </a>
		</li>
		<li class="list-inline-item">
		  <a class="btn-floating btn-tw mx-1" style="color: #FFFFFF;">
			<i class="fa fa-twitter"> </i>
		  </a>
		</li>
		<li class="list-inline-item">
		  <a class="btn-floating btn-tw mx-1" style="color: #FFFFFF;">
			<i class="fa fa-instagram"> </i>
		  </a>
		</li>
		<li class="list-inline-item">
		  <a class="btn-floating btn-tw mx-1" style="color: #FFFFFF;">
			<i class="fa fa-linkedin"> </i>
		  </a>
		</li>
		<li class="list-inline-item">
		  <a class="btn-floating btn-tw mx-1" style="color: #FFFFFF;" href="index.php">
			<i class="fa fa-globe"> </i>
		  </a>
		</li>
	  </ul>
	  <!-- Social buttons -->

	  <!-- Copyright -->
	  <div class="footer-copyright text-center py-3">© 2020 Copyright 
		<a href="Home.php"> Dilshan Bookshop</a>
	  </div>
	  <!-- Copyright -->

	</footer>
	<!-- Footer -->

	
	
</body>
	
	
</html>

<?php
}
?>