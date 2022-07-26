<?php
session_start();
include_once 'Connection.php';

if(!isset($_SESSION['customerusername'])){
	echo "<script>alert('Please Login to your Account');</script>";
	header("refresh:0; url=Customer_Login.php");
}else{
$querycount99 = "SELECT * FROM cart where Username='".$_SESSION["customerusername"]."'";
				$searchresultcount2 = mysqli_query($conn, $querycount99);
				$numbercount2 =mysqli_num_rows($searchresultcount2);

	if($numbercount2 == 0){
		echo "<script>alert('Add items to Cart');</script>";
	header("refresh:0; url=shop.php");
	}
}
?>
<?php
if(isset($_POST['credit_save'])){
	
$cardname = $_POST['cardname'];
$cardnumber = $_POST['cardnumber'];
$expmonth = $_POST['expmonth'];
$expyear = $_POST['expyear'];
$cvv = $_POST['cvv'];
$Cardtype = $_POST['Creditcard2'];
	
	$CVV2 = sha1($cvv);

$sql54 = "Select * from bank where Credit_Card_Number = '$cardnumber' && Security_Pin = '$CVV2'  ";
	
	 $true = mysqli_query($conn,$sql54);
		 $no = mysqli_num_rows($true);
		 if($no==1){
			 echo "<script>alert('Credit Card already inserted');</script>";
		 }else{
			 $sql666 = "INSERT INTO `bank`(`Credit_Card_Number`, `Security_Pin`, `Card_Name`, `Exp_Month`, `Exp_Year`, `Card_Type`, `Username`) VALUES ('$cardnumber','$CVV2','$cardname','$expmonth','$expyear','$Cardtype','".$_SESSION["customerusername"]."')";

			 	if(mysqli_query($conn,$sql666)){
						echo "<script>alert('Credit Card Saved');</script>";
						header("refresh:0; url=Checkout.php");
	
						}
			 			else {
								echo "<script>alert('Credit Card Failed to Save');</script>";
							header("refresh:0; url=Checkout.php");
							}
		 	}
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Checkout</title>
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
	function validateCheckout() {
  var CreditCard = document.forms["Checkout"]["Creditcard"].value;
		
		if(CreditCard == "Choose Credit Card"){
			 alert("Choose Credit Card");
			return false;
		}
		
	}
		
		function validatecredit() {
			var Card_Type = document.forms["Credit_Card2"]["Creditcard2"].value;
	var cardname = document.forms["Credit_Card2"]["cardname"].value;
	var cardnumber = document.forms["Credit_Card2"]["cardnumber"].value;
	var expmonth = document.forms["Credit_Card2"]["expmonth"].value;
	var expyear = document.forms["Credit_Card2"]["expyear"].value;
	var cvv = document.forms["Credit_Card2"]["cvv"].value;
	
	
	if(Card_Type == "Choose Card Type"){
		 alert("Choose Card Type");
    return false;
		
	}
			
	if(cardname == ""){
		 alert("Enter the Card Name");
    return false;
		
	}
	
		if(cardnumber == ""){
		 alert("Enter the Card Number");
    return false;
		
	}
		if(isNaN(cardnumber)){
		 alert("Only Numbers are valid in for Card Number");
    return false;
		
	}
	

	if(cardnumber.length < 16 || cardnumber.length > 16 ){
		 alert("Enter a valid Card Number");
    return false;
		
	}
	

	if(expmonth == ""){
		 alert("Enter Expiry Month of Credit/Debit Card");
    return false;
		
	}
			
	
	if(expyear == ""){
		 alert("Enter Expiry Year of Credit/Debit Card");
    return false;
		
	}
			
			if(isNaN(expyear)){
		 alert("Enter a valid Expiry Year");
    return false;
		
	}
	
	
	if(cvv == ""){
		 alert("Enter Security Pin");
    return false;
		
	}
	
			if(isNaN(cvv)){
		 alert("Enter a Valiid Security Pin");
    return false;
		
	}
	
	if(cvv.length < 3 || cvv.length > 3){
		 alert("Security Pin is invalid");
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
		<div class="col-lg-12">
			<div class="row">
				<form action="Payment_Success.php" method="post" onSubmit="return validateCheckout()" name="Checkout">
						<div class="container" style="background-color: #ffffff; padding: 40px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6); margin: 30px;">
							<?php

							$sql = "Select * from bank where Username = '".$_SESSION["customerusername"]."'";
										$rows = mysqli_query($conn,$sql);
										$Noofrows = mysqli_num_rows($rows);

										if($Noofrows > 0){
											?>
											<select name="Creditcard" id="selection1">
												<option>Choose Credit Card</option>
													<?php
														$link = mysqli_query($conn,$sql);

														while($row1 = mysqli_fetch_array($link)){
															?> <option value="<?php echo $row1["Bank_ID"];?>"><?php echo $row1["Credit_Card_Number"];?></option><?php
														}
									?>
									</select>
							<br>
							<br>
							<button type="submit" class="btn" name="checkout">Continue to checkout</button>

							<?php
										}else{
											echo "Please Enter a Card";
										}
							?>
						</div>
				</form>	
				
			</div>
		</div>
	</div>
	

	<div class="container-fluid">
		<div class="col-lg-12">
			<div class="row" style="background-color: #ffffff; padding: 40px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6); margin: 30px;">
    				<div class="container">
     					 <form action="#" method="post" name="Credit_Card2" onSubmit="return validatecredit() ">

								<center><h2 style="font-family: Verdana, Arial, Helvetica, sans-serif;">        <h2 style="font-family: Verdana, Arial, Helvetica, sans-serif;"><strong>PAYMENT</strong></h2></center>
								<label for="fname">Accepted Cards</label>
								<div class="icon-container">
								  <i class="fa fa-cc-visa" style="color:navy;"></i>
								  <i class="fa fa-cc-amex" style="color:blue;"></i>
								  <i class="fa fa-cc-mastercard" style="color:red;"></i><br>

									<select  name="Creditcard2">
										<option>Choose Card Type</option>
										<option>VISA</option>
										<option>Amex</option>
										<option>Master Card</option>
									</select>

								</div>
								<label for="cname">Name on Card</label>
								<input type="text" id="cname" name="cardname" placeholder="John More Doe">
								<label for="ccnum">Credit card number</label>
								<input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">

								<div class="row">
								  <div class="col-4">
									<label for="expmonth">Exp Month</label>
									<input type="number" id="expmonth" name="expmonth" placeholder="02" min="01" max="12">
								  </div>
								  <div class="col-4">
									<label for="expyear">Exp Year</label>
									<input type="number" id="expyear" name="expyear" placeholder="20" min="20" max="99">
								  </div>
									<div class="col-4"></div>
								</div>
									
								<label for="cvv">CVV</label>
								<input type="text" id="cvv" name="cvv" placeholder="352"><br>
									<br>
									
									<button type="submit" class="btn" name="credit_save">Save Credentials</button>

							</div>

								

						  </form>
	 
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
				<a href="index.php" style="color: #ffffff;">Home</a>
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
	
