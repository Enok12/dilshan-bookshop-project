<?php
session_start();
include_once 'Connection.php';
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
			 <li class="nav-item">
				<a class="nav-link" href="Home.php">Home</a>
			 </li>
			 <li class="nav-item ">
				<a class="nav-link" href="aboutus.php">About Us</a>
			 </li>

			 <li class="nav-item">
				<a class="nav-link" href="shop.php">Shop</a>
			 </li>
			 <li class="nav-item active">
				<a class="nav-link" href="faq.php">FAQ  <span class="sr-only">(current)</span></a>
			 </li>
			 <li class="nav-item">
				<a class="nav-link" href="contactus.php">Contact Us</a>
			 </li>

		  </ul>
	   </div>
	</nav>

	</div>

	<br>
	
	<div class="containeraboutus">
		<div class="col-12">
			<div class="row">
				<div class="col-sm-12">
				  <h2>Do i need an Account to Purchase Purchase Products? </h2>
					<br>
					<p align="justify">Yes you do. You have to Login or Sign Upto make any purchases in this E-commerce website.<br><br>			
				
				</div>
			
			
			</div>

		
		</div>

	</div>	

	<div class="containeraboutus">
		<div class="col-12">
			<div class="row">
				<div class="col-sm-12">
				  <h2>What are the Payment Options?</h2>
					<br>
					<p align="justify">You can use a VISA, MASTERCARD or AMEX Card to pay for the purchased products.<br><br>			
				
				</div>
			
			
			</div>

		
		</div>

	</div>
	
	<div class="containeraboutus">
		<div class="col-12">
			<div class="row">
				<div class="col-sm-12">
				  <h2>How do i Checkout Products?</h2>
					<br>
					<p align="justify">First select the card you want to use to purchase. Then press the checkout button to complete the Transaction. If there is NO CARD given, A form will be provided to fill Credit Card Details. Once you save the Card, you can use your Card for purchasing purposes. You can manage your cards in your Account<br><br>			
				
				</div>
			
			
			</div>

		
		</div>

	</div>
	
	<div class="containeraboutus">
		<div class="col-12">
			<div class="row">
				<div class="col-sm-12">
				  <h2>How do I search a product?</h2>
					<br>
					<p align="justify">You can search your product by going to Shop page and you can search any product by typing it's Product Name or it's Product Brand. <br><br>			
				
				</div>
			
			
			</div>

		
		</div>

	</div>
	
	<div class="containeraboutus">
		<div class="col-12">
			<div class="row">
				<div class="col-sm-12">
				  <h2>How does our order process after checkout?</h2>
					<br>
					<p align="justify">After Checkout Process, The Order will be sent to the System of Dilshan Bookshop. After the Administration approves your Order, You will be notified via an email.<br><br>			
				
				</div>
			
			
			</div>

		
		</div>

	</div>
	
	
	<div class="containeraboutus">
		<div class="col-12">
			<div class="row">
				<div class="col-sm-12">
				  <h2>To what areas are Delivery Applicable? </h2>
					<br>
					<p align="justify">Delivery is applicable islandwide.<br><br>			
				
				</div>
			
			
			</div>

		
		</div>

	</div>
	
	<div class="containeraboutus">
		<div class="col-12">
			<div class="row">
				<div class="col-sm-12">
				  <h2>Are my Credit Card Credentials safe with Dilshan Bookshop?</h2>
					<br>
					<p align="justify">We have ensured the highest security possible to keep safe your encrypted details.<br><br>			
				
				</div>
			
			
			</div>

		
		</div>

	</div>
	
		<div class="containeraboutus">
		<div class="col-12">
			<div class="row">
				<div class="col-sm-12">
				  <h2>Can I cancel an Order after Checkout ?</h2>
					<br>
					<p align="justify">Yes.The Administration process approve your orders as soon as possible within 24 hrs. If there are any cancellation to be done, Feel free to email using the Feedback Form or you can contact to Dilshan Bookshop and solve the issue. Cancellations of Orders are not applicable once the order has given to Delivery.<br><br>			
				
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