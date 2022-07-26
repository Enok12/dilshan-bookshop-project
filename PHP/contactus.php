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
	
	<script>
		// JavaScript Document
		function validateContactus() {
		  var inquiryname = document.forms["ContactUS"]["inquiryname"].value;
			var customername = document.forms["ContactUS"]["customername"].value;
			var address = document.forms["ContactUS"]["address"].value;
			var contact = document.forms["ContactUS"]["contact"].value;
			var email = document.forms["ContactUS"]["email"].value;
			var remarks = document.forms["ContactUS"]["remarks"].value;

		  if (inquiryname == "") {
			alert("Enter Inquiry Name");
			return false;
		  }
			 if(customername == ""){
				 alert("Enter Customer Name");
			return false;

			}
			
			 if(address == ""){
				 alert("Enter Address");
			return false;

			}
			
			 if(contact == ""){
				 alert("Enter Contact Number");
			return false;

			}
			
			if(isNaN(contact)){
		 alert("Mobile Number should contain Numbers only");
    return false;
		
	}
	
	
	if(contact.length < 10 || contact.length > 10 ){
		 alert("Contact Number should Contain 10 digits ");
    return false;
		
	}
			if(email == ""){
		 alert("Enter your Email");
    return false;
		
	}
	
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email) ){
			 
	}else{	
	alert("Invalid format of Email");
	return false;
	}
			
		if(remarks == ""){
		 alert("Enter Remarks");
    return false;
		
	}	

		}

	</script>
		
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

	</div>
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

			 <li class="nav-item">
				<a class="nav-link" href="shop.php">Shop</a>
			 </li>
			 <li class="nav-item">
				<a class="nav-link" href="faq.php">FAQ</a>
			 </li>
			 <li class="nav-item active">
				<a class="nav-link" href="contactus.php">Contact Us <span class="sr-only">(current)</span></a>
			 </li>

		  </ul>
	   </div>
	</nav>
	</div>
	<br>
	<div class="container-fluid">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-5" style="background-color: #ffffff; padding: 40px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6); margin: 30px;">
				
				<hr>
	        	<h2 style="font-family: Verdana, Arial, Helvetica, sans-serif;">        <h2 style="font-family: Verdana, Arial, Helvetica, sans-serif;"><strong>CONTACT US</strong></h2>
				<hr>	
				<br />
                <p style="font-family: 'Ebrima'">Phone:<br />
                    <strong style="font-size:18px;">0777-149-924</strong>
                </p><br />
                <p style="font-family: 'Ebrima'">Email:<br>
                    <a href="mailto:lesthakir@gmail.com" style="font-size:18px;"><strong>dilshancentre@gmail.com</strong></a>
                </p><br />
                <p style="font-family: 'Ebrima'">Facebook:<br>
                    <a href="https://www.facebook.com/CO-Lesthakir-International-College-1166241573506212/"  style="font-size:18px;"></i> <strong>DILSHAN BOOKSHOP</strong></a>        </p><br /> 
                                        
                <p style="font-family: 'Ebrima'">Address:<br>
                    <strong> 
                    No 73, North Kammala, Waikkala
                    </strong>
                </p>	
				<p align="center">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1622.5146964531812!2d79.8508165598355!3d7.294157820764862!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2e9be3a1aaf8f%3A0xd4aaff2171eabda!2sDilshan%20Bookshop!5e0!3m2!1sen!2slk!4v1600535967746!5m2!1sen!2slk" width="300px" height="400px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				
				</p>
				        
				
				
				
				</div>
				
				<div class="col-sm-1"></div>
				
				<div class="col-lg-5" style="background-color: #ffffff; padding: 40px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6); margin: 30px;">
					<hr>
					<h2 style="font-family: Verdana, Arial, Helvetica, sans-serif;">        <h2 style="font-family: Verdana, Arial, Helvetica, sans-serif;"><strong>FEEDBACK</strong></h2>
					<hr>
					<form action="Contactmail.php" method="post" name="ContactUS" onSubmit="return validateContactus()">			  
							<label><p><strong>Inquiry Name</strong></p></label>
							<input type="text" placeholder="Enter Inquiry Name" name="inquiryname">
							<br>

							<label><p><strong>Customer Name</strong></p></label>
							<input type="text" placeholder="Enter Customer Name" name="customername">
							<br>

							<label><p><strong>Address</strong></p></label>
							<input type="text" placeholder="Enter Address (No.143/A, Made Dummaladeniya, Wennapuwa)" name="address">
							<br>

							<label><p><strong>Contact</strong></p></label>
							<input type="text" placeholder="Enter Contact" name="contact">
							<br>

							<label><p><strong>Email</strong></p></label>
							<input type="text" placeholder="Enter Email" name="email">
							<br>

							<label><p><strong>Remarks</strong></p></label>
							<textarea placeholder="Enter Remarks" name="remarks"></textarea>
							<br>
							<br>
							<label>
				  			<input type="submit" name="submit" value="SEND MESSAGE" style="width: 100%;">
							</label>	  
					</form>
				
				
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
		<a href="index.php"> Dilshan Bookshop</a>
	  </div>
	  <!-- Copyright -->

	</footer>
	<!-- Footer -->

	
	
</body>
	
	
</html>