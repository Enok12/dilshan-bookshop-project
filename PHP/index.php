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

	<div class="containercarousel" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">
	<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
	  <ol class="carousel-indicators" style="color: #000000;">
		<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
		<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
	  </ol>
	  <div class="carousel-inner">
		<div class="carousel-item active">
		  <img src="../images/carousel1.jpg" class="d-block w-100" alt="...">
		  <div class="carousel-caption d-none d-md-block">

		  </div>
		</div>
		<div class="carousel-item">
		  <img src="../images/carousel2.jpg" class="d-block w-100" alt="...">
		  <div class="carousel-caption d-none d-md-block">

		  </div>
		</div>
		<div class="carousel-item">
		  <img src="../images/carousel3.jpg" class="d-block w-100" alt="...">
		  <div class="carousel-caption d-none d-md-block">
		  </div>
		</div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	  </a>
	</div>	

	</div>
	
	<div class="containeraboutus">
		<div class="col-12">
			<h2>ABOUT US</h2>
			<br>
			<p align="justify"><strong>Dilshan Bookshop</strong> has been running since 2015 by consideration of the children needs in that area. Meanwhile the owner (W.S.M.D.Thamel) has started another business at the same place by opening up a Communication Center which provides services such as Computer Typing........................<br><br>

			<li class="list-inline-item">
			  <a href="aboutus.php" class="btn btn-info btn-rounded"><strong>SEE MORE</strong></a>
			</li>
		
		</div>

	</div>
	
	<div class="containercategory">
		<div class="col-12">
			<h2>CATEGORIES</h2>
			<section id="team" class="pb-5">
				<div class="container-fluid">					
						<div class="row" align="center">
							<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="image-flip" ontouchstart="this.classList.toggle('hover');">
									<div class="mainflip">
										<div class="frontside">
											<div class="card">
												<div class="card-body text-center">
													<p><img class=" img-fluid" src="../images/picturesofproducts/183212_website.jpg" alt="card image"></p>
													<h4 class="card-title"><strong>SCHOOL SUPPLIES</strong></h4>
													<p class="card-text" style="color: #000000;">This is basic card with image on top, title, description and button.</p>
													<a href="https://www.fiverr.com/share/qb8D02" class="btn btn-dark btn-sm"><i class="fa fa-plus"></i></a>
												</div>
											</div>
										</div>
										<div class="backside">
											<div class="card">
												<br>
												<br>
												<div class="card-body text-center mt-4">
													<h4 class="card-title">SCHOOL SUPPLIES</h4>
													<a href="shop.php" class="btn btn-info btn-rounded"><strong>SEE MORE</strong></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="image-flip" ontouchstart="this.classList.toggle('hover');">
									<div class="mainflip">
										<div class="frontside">
											<div class="card">
												<div class="card-body text-center">
													<p><img class=" img-fluid" src="../images/picturesofproducts/IMG_9620.jpg" alt="card image"></p>
													<h4 class="card-title">OFFICE SUPPLIES</h4>
													<p class="card-text" style="color: #000000;">This is basic card with image on top, title, description and button.</p>
													<a href="https://www.fiverr.com/share/qb8D02" class="btn btn-dark btn-sm"><i class="fa fa-plus"></i></a>
												</div>
											</div>
										</div>
										<div class="backside">
											<div class="card">
												<br>
												<br>
												<div class="card-body text-center mt-4">
													<h4 class="card-title">OFFICE SUPPLIES</h4>
													<a href="shop.php" class="btn btn-info btn-rounded"><strong>SEE MORE</strong></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="image-flip" ontouchstart="this.classList.toggle('hover');">
									<div class="mainflip">
										<div class="frontside">
											<div class="card">
												<div class="card-body text-center">
													<p><img class=" img-fluid" src="../images/picturesofproducts/atlas-cr-single-1q-40-pages-o2-lk-sri-lanka_219_1024x1024.webp" alt="card image"></p>
													<h4 class="card-title"><strong>ARTS &amp; CRAFTS</strong></h4>
													<p class="card-text" style="color: #000000;">This is basic card with image on top, title, description and button.</p>
													<a href="https://www.fiverr.com/share/qb8D02" class="btn btn-dark btn-sm"><i class="fa fa-plus"></i></a>
												</div>
											</div>
										</div>
										<div class="backside">
											<div class="card">
												<br>
												<br>
												<div class="card-body text-center mt-4">
													<h4 class="card-title">ARTS &amp; CRAFTS</h4>
													<a href="shop.php" class="btn btn-info btn-rounded"><strong>SEE MORE</strong></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="image-flip" ontouchstart="this.classList.toggle('hover');">
									<div class="mainflip">
										<div class="frontside">
											<div class="card">
												<div class="card-body text-center">
													<p><img class=" img-fluid" src="../images/picturesofproducts/Atlas-HB-Imported-Sunflower-Yellow-Pencil-12-Pack.jpg" alt="card image"></p>
													<h4 class="card-title">CARDS &amp; WRAPS</h4>
													<p class="card-text" style="color: #000000;">This is basic card with image on top, title, description and button.</p>
													<a href="https://www.fiverr.com/share/qb8D02" class="btn btn-dark btn-sm"><i class="fa fa-plus"></i></a>
												</div>
											</div>
										</div>
										<div class="backside">
											<div class="card">
												<br>
												<br>
												<div class="card-body text-center mt-4">
													<h4 class="card-title">CARDS &amp; WRAPS</h4>
													<a href="shop.php" class="btn btn-info btn-rounded"><strong>SEE MORE</strong></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="image-flip" ontouchstart="this.classList.toggle('hover');">
									<div class="mainflip">
										<div class="frontside">
											<div class="card">
												<div class="card-body text-center">
													<p><img class=" img-fluid" src="../images/picturesofproducts/Atlas-HB-Imported-Sunflower-Yellow-Pencil-12-Pack.jpg" alt="card image"></p>
													<h4 class="card-title">OTHER</h4>
													<p class="card-text" style="color: #000000;">This is basic card with image on top, title, description and button.</p>
													<a href="https://www.fiverr.com/share/qb8D02" class="btn btn-dark btn-sm"><i class="fa fa-plus"></i></a>
												</div>
											</div>
										</div>
										<div class="backside">
											<div class="card">
												<br>
												<br>
												<div class="card-body text-center mt-4">
													<h4 class="card-title">OTHER</h4>
													<a href="shop.php" class="btn btn-info btn-rounded"><strong>SEE MORE</strong></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							


						</div>
				</div>
			</section>
				
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