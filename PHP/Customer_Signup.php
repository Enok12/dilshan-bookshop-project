<?php
session_start();
include_once 'Connection.php';
?>
<?php
if(isset($_POST['Register-btn'])){
	function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
		$name = test_input($_POST["First_Name"]);
		$L_Name = test_input($_POST["Last_Name"]);
		 $DOB = test_input($_POST["DOB"]);
		  $email = test_input($_POST["Email"]);
		$NIC = test_input($_POST["NIC"]);
		 $Username = test_input($_POST["Username1"]);
		  $Pass = test_input($_POST["ConPassword"]);
	$Address = test_input($_POST["Address"]);
		$Password3232 = sha1($Pass); // password hashing using SHA1
		 $sql45 = "INSERT INTO Customer (Username,Password,Name,L_Name,DOB,Email,NIC,Address) VALUES ('$Username','$Password3232','$name','$L_Name','$DOB',' $email','$NIC','$Address')";
		  
		   $sql46 = "Select * from Customer where Username = '$Username'";
		 $true = mysqli_query($conn,$sql46);
		 $no = mysqli_num_rows($true);
		 if($no==1){
			 echo "<script>alert('Customer already Registered');</script>";
		 }else{
			  echo "<script>alert('Customer Successfully Registered');</script>";
			 $true = mysqli_query($conn,$sql45);
  }
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
	
	<title>Dilshan Bookshop</title>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' href='https://themes.audemedia.com/html/goodgrowth/css/owl.theme.default.min.css'>
	<link rel="stylesheet" href="../images/dbshoplogo.jpg">
	
	<script>
	// JavaScript Document
	function validateRegistration() {
	var First_Name = document.forms["Registration"]["First_Name"].value;
	var Last_Name = document.forms["Registration"]["Last_Name"].value;
	var DOB = document.forms["Registration"]["DOB"].value;
	var Add = document.forms["Registration"]["Address"].value;
	var Email = document.forms["Registration"]["Email"].value;
	var NIC = document.forms["Registration"]["NIC"].value;
	var Username1 = document.forms["Registration"]["Username1"].value;
	var Password1 = document.forms["Registration"]["Password1"].value;
	var Password2 = document.forms["Registration"]["ConPassword"].value;
	var Da = new Date();

		 if (First_Name == "") {
		alert("Enter your First Name");
		return false;
	  }
		 if (Last_Name == "") {
		alert("Enter your Last Name");
		return false;
	  }
		 if(DOB == ""){
			 alert("Enter your Date of Birth");
		return false;

		}
		var CYear = Da.getFullYear();
		var DYear = DOB.substring(0, 4)


		var CAge=CYear-DYear


		if ( CAge< 18)
		{
			 alert(" User should be above 18 ");

			 return false;
		}
	   if (Add == "") {
        alert("Enter your Address");
        return false;
  }
		if(Email == ""){
			 alert("Enter your Email");
		return false;

		}
		
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(Email) ){
		}else{
				
		alert("Invalid format of Email");
		return false;
		}
		
		if(NIC == ""){
			 alert("Enter NIC");
		return false;

		}
		if(NIC.length > 12 || NIC.length < 10  ){
			 alert("Invalid NIC");
		return false;

		}
		
		if(Username1 == ""){
			 alert("Enter Username");
		return false;

		}
		if(Password1 == ""){
			 alert("Enter a Password");
		return false;

		}
		
		if(Password1.length < 8 ){
			 alert("Password should Contain minimum 8 characters ");
		return false;

		}
		if(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/.test(Password1)){
			 
		
		}else{
			alert("Password should contain at least one number, one lowercase letter, one UPPERCASE LETTER");
			return false;
		}
		if(Password2 == ""){
			 alert("Re-Enter Password");
		return false;

		}
		if(Password1 == Password2){
			}else{
				alert("Passwords should match");
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
			 <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				About Us
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				   <a class="dropdown-item" href="#">Our History</a>

				   <div class="dropdown-divider"></div>
				   <a class="dropdown-item" href="#">Vision</a>
				   <a class="dropdown-item" href="#">MIssion</a>
				</div>
			 </li>

			 <li class="nav-item">
				<a class="nav-link" href="shop.php">SHOP</a>
			 </li>
			 <li class="nav-item">
				<a class="nav-link" href="#">FAQ</a>
			 </li>
			 <li class="nav-item">
				<a class="nav-link" href="contactus.php">Contact Us</a>
			 </li>

		  </ul>
		
	   </div>
	</nav>

	</div>
	<br>
	
	<div class="container" style="background-color: #FFFFFF; border: 3px solid #00D2CF; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6); padding: 20px;">
		<div class="col-lg-12">
					<h3 align="center"><strong>SIGNUP</strong></h3>
				<br />			

					<form name="Registration" action="" onsubmit="return validateRegistration()" method="post" style="border: 3px solid #f1f1f1; padding: 10px;">
						
						<div class="row">
							<div class="col-lg-5">
								<label> <strong>First Name -</strong></label>
								 <input type="text" name="First_Name" value="" placeholder="Enter First Your Name">						
								
							</div>
							
							<div class="col-lg-2"></div>
							
							<div class="col-lg-5">
								<label> <strong>Last Name -</strong></label>
								 <input type="text" name="Last_Name" value="" placeholder="Enter Last Your Name">
							</div>
						</div>
		
							<label> <strong>Date of Birth -</strong></label>
							 <input type="date" name="DOB" value="" placeholder="Enter your Birthday">
						
                               <label>  <strong>Address -</strong> :</label>
     		                <input type="text" name="Address" value="" placeholder="Enter your Address">
 

							<label><strong>Email -</strong></label>
							 <input type="text" name="Email" value="" placeholder="Enter your Email">
						
							<label><strong>NIC -</strong></label>
							 <input type="text" name="NIC" value="" placeholder="Enter NIC ">
							

							<label> <strong>Username -</strong></label>
							 <input type="text" name="Username1" value="" placeholder="Enter Username">
							
						
							<label> <strong>Password -</strong></label>
							 <input type="password" name="Password1" value="" placeholder="Enter Password">
							
							<label> <strong>Confirm Password -</strong></label>
							 <input type="password" name="ConPassword" value="" placeholder="Re-enter Password">
							
							 <br>
							 <br> 
						<center><input type="submit" name="Register-btn" value="SIGN UP"></center>
						</form>
			<br>
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
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

		  </div>

		  <!-- Grid column -->

		  <hr class="clearfix w-100 d-md-none">

		  <!-- Grid column -->
		  <div class="col-md-2 mx-auto">

			<!-- Links -->
			<h5 class="font-weight-bold text-uppercase mt-3 mb-4">EXPLORE</h5>

			<ul class="list-unstyled">
			  <li>
				<a href="index.php" style="color: #ffffff;">Home</a>
			  </li>
			  <li>
				<a href="#!" style="color: #ffffff;">About Us</a>
			  </li>
			  <li>
				<a href="#!" style="color: #ffffff;">Shop</a>
			  </li>
			  <li>
				<a href="#!" style="color: #ffffff;">FAQ</a>
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
