<?php
session_start();
include_once 'Connection.php';

if(!isset($_SESSION['customerusername'])){
	echo "<script>alert('Please Login to your Account');</script>";
	header("refresh:0; url=Customer_Login.php");
}else{

$g_userid = $_SESSION["customerusername"];
?>

<?php

$Username ="";
$F_Name="";
$L_Name="";
$P_Description="";
$Email="";
$address="";
$NIC="";
$DOB="";

$res = mysqli_query($conn,"select * from customer where Username = '$g_userid'");
	while($row2 = mysqli_fetch_array($res)){
		$Username=$row2["Username"];
		$F_Name=$row2["Name"];
		$L_Name=$row2["L_Name"];
$Email=$row2["Email"];
$address=$row2["Address"];
		$NIC=$row2["NIC"];
		$DOB=$row2["DOB"];
		
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
	var First_Name = document.forms["Registration33"]["First_Name"].value;
	var Last_Name = document.forms["Registration33"]["Last_Name"].value;
	var DOB = document.forms["Registration33"]["DOB"].value;
	var Add = document.forms["Registration33"]["Address"].value;
	var Email = document.forms["Registration33"]["Email"].value;
	var NIC = document.forms["Registration33"]["NIC"].value;
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
		if(NIC.length > 12 || NIC.length < 10 ||  NIC.length == 11 ){
			 alert("Invalid NIC");
		return false;

		}
		
	
		
	}
		
	</script>
</head>
	
<body>
	
	<div class="container-fluid" align="center">
		<a href="#">
			<img src="../images/dbshoplogo.png" width="300" height="300" alt="" class="fadeInUp" />
		</a>
	</div>
	<br>
	<div class="container" align="center">
		<a href="myaccount.php">
			<input type="submit" value="BACK TO ACCOUNT" style="font-size: 1.5vw;">
		</a>
	</div>
	
	
	<br>
	<br>
	<div class="container" style="background-color: #FFFFFF; border: 3px solid #00D2CF; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6); padding: 20px;">
		<div class="col-lg-12">
					<h3 align="center"><strong>EDIT DETAILS</strong></h3>
				<br />			

					<form name="Registration33" action="UpdateCustomer.php?ID=<?php echo $Username ?>" onsubmit="return validateRegistration()" method="post" style="border: 3px solid #f1f1f1; padding: 10px;">
						
						<div class="row">
							<div class="col-lg-5">
								<label> <strong>First Name -</strong></label>
								 <input type="text" name="First_Name" value="<?php echo $F_Name ?>" placeholder="Enter First Your Name">						
								
							</div>
							
							<div class="col-lg-2"></div>
							
							<div class="col-lg-5">
								<label> <strong>Last Name -</strong></label>
								 <input type="text" name="Last_Name" value="<?php echo $L_Name ?>" placeholder="Enter Last Your Name">
							</div>
						</div>
		
							<label> <strong>Date of Birth -</strong></label>
							 <input type="date" name="DOB" value="<?php echo $DOB ?>" placeholder="Enter your Birthday">
						
                               <label>  <strong>Address -</strong> :</label>
     		                <input type="text" name="Address" value="<?php echo $address ?>" placeholder="Enter your Address">
 

							<label><strong>Email -</strong></label>
							 <input type="text" name="Email" value="<?php echo $Email ?>" placeholder="Enter your Email">
						
							<label><strong>NIC -</strong></label>
							 <input type="text" name="NIC" value="<?php echo $NIC ?>" placeholder="Enter NIC ">
							
							
							 <br>
							 <br> 
						<center><input type="submit" name="update" value=" UPDATE"></center>
						</form>
			<br>
		</div>
	
	</div>			

	<br>
	<hr>
	<br>
	
</body>
</html>
<?php
}
?>
