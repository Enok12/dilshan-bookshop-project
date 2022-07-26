<?php
session_start();
include_once 'Connection.php';
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My Cart</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/stylebody.css">
	<link rel="stylesheet" href="../css/stylenavbar.css">
	<link rel="stylesheet" href="../css/stylefooter.css">
	<link rel="stylesheet" href="../css/stylecategory.css">
	
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
<br>
		<br> 
		<?php
		 if(isset($_SESSION["customerusername"])){
		?>
	</div>
	<div class="container-fluid">
		<div class="container-fluid" style="background-color: #ffffff; padding: 20px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">
			<div class="col-lg-12">
			<h3><strong>ORDER DETAILS</strong></h3>
				<div class="table-responsive">
                     <table class = "table table-striped table-bordered rounded">  
                          <tr>  
                               <th > Product ID</th>  
                               <th>Image</th>  
                               <th >Product Name</th>  
                               <th >Price</th>  
                               <th >Quantity</th> 
							  <th >Total</th> 
							  <th >Action</th> 
						
                          </tr>  
						
 <?php			
	$sql = "SELECT a.P_ID,a.P_Name,b.Sell_P,a.P_Image,b.Cart_ID,b.QTY FROM Product a,cart b WHERE a.P_ID=b.P_ID AND b.Username='".$_SESSION["customerusername"]."'";
						 
	$query = mysqli_query($conn,$sql);
	if (mysqli_num_rows($query) > 0) {
			$n=0;
			$total = 0;
		
			while ($row=mysqli_fetch_array($query)) {
				$n++;
				$product_id = $row["P_ID"];
				$product_title = $row["P_Name"];
				$product_price = $row["Sell_P"];
				$product_image = $row["P_Image"];
				$cart_item_id = $row["Cart_ID"];
				$qty = $row["QTY"];
				
				$total = $total + ($product_price*$qty);
				$total1 = ($product_price*$qty);
				echo "<tr>";
		echo "<td>"; echo $row["P_ID"];"</td>";
		echo "<td>"; echo"<img src='images/".$row["P_Image"]."' height = '100px' width '100px'" ;echo"</td>";
		echo "<td>"; echo $row["P_Name"];"</td>";
		echo "<td>Rs. "; echo $row["Sell_P"]."</td>";
		echo "<td>"; echo $row["QTY"]."</td>";
		echo "<td align='right'>Rs. "; echo $total1."</td>";
		echo "<td>"; ?><a href="Delete_Cart_Item.php?id=<?php echo $row["P_ID"];?>"><button type="button">Delete</button> </a><?php echo "</td>";
			}
		echo '</tr>';
		?> 
						 <tr>  
							 <td colspan="4"></td>
                               <td  align="right"><strong>Net Total</strong></td>  
                               <td align="right"><strong>Rs. <?php echo number_format($total, 2); ?></strong></td>  
                               <td></td>  
                          </tr> 
						 </div>
					</table>  
                </div>  
		 </div>
      </div>  
	 <br />  
	  <a href="Checkout.php"><input type="submit" value="Checkout"> </a>
	</div>
          
	 <br>
	 <br>
						 <?php
						 }else{
	
		echo "No items in the cart";
		echo "</table>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		
		
	}
						 }else{				 
	?>
		<div class="container-fluid">
		<div class="container-fluid" style="background-color: #ffffff; padding: 20px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">
			<div class="col-lg-12">
			<h3><strong>PLEASE LOGIN TO VIEW CART DETAILS</strong></h3>	
			</div>
			</div>
	</div>
	</div>
	<?php
						 }
						 ?>
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
				  <a class="btn btn-info btn-rounded"><i class="fa fa-phone"></i> &nbsp; 011 123 3456</a>
				</li>
			  <br>
				<li class="list-inline-item">
				  <br>
				  <a class="btn btn-info btn-rounded"><i class="fa fa-location-arrow"></i> &nbsp; Negombo</a>
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