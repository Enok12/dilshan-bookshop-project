<?php
session_start();
include_once 'connection.php';


if(isset($_GET['id'])){
	$_SESSION['Category1']=$_GET['id'];
}else{
	$_SESSION['Category1'] = "C001";
}
?>

<?php

//Checking whether add_to_Cart button is pressed
if(isset($_POST["add_to_cart"])){
	
	//Checking if the Customer is logged
	if(isset($_SESSION["customerusername"])){
		
		//Get Quantity
		$Quantitybar =  $_POST["quantity"];
		
		//Executes query to get Stock of the relevant item
		$sql = "SELECT a.P_Image,a.P_ID,a.P_Name,a.P_Description,b.S_P,b.C_P,b.Availability,b.GRN_ID,b.ID FROM product a,grn_details b WHERE a.P_ID = b.P_ID and b.Activation_Status = 'Active' and a.P_ID ='".$_POST["hidden_ID"]."'";
		$run_query = mysqli_query($conn,$sql);
		
		while($row34 = mysqli_fetch_array($run_query)){
			$T_Stock = $row34["Availability"];
			$C_P = $row34["C_P"];
			$S_P = $row34["S_P"];
			$GRN_ID = $row34["GRN_ID"];
			$GRN_No = $row34["ID"];
		}
		
		//Checking the Stock with the entered Input Quantity by Customer
		if($Quantitybar > $T_Stock){
			echo "<script>alert('Stock is Low.Please select the quantity lower');</script>";
		header("refresh:0; url=shop.php");
			
		}else{
			//Checks whether same product exists in the Cart of the Corrosponding Customer
			$sql909 = "SELECT * FROM cart WHERE P_ID = '".$_POST["hidden_ID"]."' AND Username = '".$_SESSION["customerusername"]."'";
		$run_query = mysqli_query($conn,$sql909);
		$count = mysqli_num_rows($run_query);
			
			if($count > 0){
			echo "<script>alert('Product is already added to Cart');</script>";
			header("refresh:0; url=shop.php");
		} else {
				
				//Inserting to Cart
				$sql788 = "INSERT INTO `cart` (`P_ID`, `Username`, `QTY`,`Cost_P`,`Sell_P`,`GRN_ID`,`GRN_No`) VALUES ('".$_POST["hidden_ID"]."','".$_SESSION["customerusername"]."','$Quantitybar','$C_P','$S_P','$GRN_ID','$GRN_No')";
				
				if(mysqli_query($conn,$sql788)){
				echo "<script>alert('Successfully Added To Cart');</script>";
					header("refresh:0; url=shop.php");
				}else{
					echo "<script>alert('Error in Insertion to Cart');</script>";
					header("refresh:0; url=shop.php");
				}
			}
		}
		
}else{
		echo "<script>alert('Please Login to the System');</script>";
		header("refresh:0; url=Customer_Login.php");
	}
	
}else{
	echo "";
}
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
	<link rel="stylesheet" href="../css/stylecard.css">
	
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
			 <li class="nav-item ">
				<a class="nav-link" href="Home.php">Home </a>
			 </li>
			 <li class="nav-item">
				<a class="nav-link" href="aboutus.php">About Us</a>
			 </li>

			 <li class="nav-item active">
				<a class="nav-link" href="shop.php">Shop<span class="sr-only">(current)</span></a>
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
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-2">
				<div class="container-fluid">
					<div class="sidebar">
					  <a class="active" href="#home">SUB CATEGORIES</a>
						<?php
	$res = mysqli_query($conn,"Select * from sub_category where C_ID = '".$_SESSION['Category1']."'");
	while($row = mysqli_fetch_array($res)){
		?>
		<a href="shop3.php?id=<?php echo $row["SU_ID"];?>"><?php echo $row["SU_Name"];?></a>
		<?php
	}
		?>
					</div>					
				</div>
			</div>
			
			<div class="col-lg-10">
				
				<input type="text" name="search_text" id="search_text" placeholder="Search by Product Name" class="form-control" />
				
				<div class="containerproducts">
					<div class="col-sm-12" align="center">
						<div id="result" class="row">
							
			
					 </div>
			
			
				</div>			
				</div>		
			</div>	
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
				  <a href="#!" class="btn btn-info btn-rounded"><i class="fa fa-envelope"></i> &nbsp; dilshancentre@gmail.com</a>
				</li>
			  <br>
				<li class="list-inline-item">
				  <br>
				  <a href="#!" class="btn btn-info btn-rounded"><i class="fa fa-phone"></i> &nbsp; 031 22 72 288</a>
				</li>
			  <br>
				<li class="list-inline-item">
				  <br>
				  <a href="#!" class="btn btn-info btn-rounded"><i class="fa fa-location-arrow"></i> &nbsp; Bolawatta</a>
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

<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetchShopproducts2.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
	
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>