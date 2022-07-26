<?php
session_start();
include_once 'Connection.php';

if(!isset($_SESSION['AdminUser_name'])){
	echo "<script>alert('Please Login to the System');</script>";
	header("refresh:0; url=Admin_login.php");
}else{
?>
<?php
if(isset($_POST['Sign_Up'])){
	function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;}
    $name = test_input($_POST["First_Name"]);
		 $DOB = test_input($_POST["DOB"]);
		  $Address = test_input($_POST["Address"]);
		  $email = test_input($_POST["Email"]);
		 $Username = test_input($_POST["Username1"]);
		  $Pass = test_input($_POST["ConPassword"]);
		$Contact = test_input($_POST["Contact"]);
		$Password3232 = sha1($Pass); // password hashing using SHA1
		 
		 $sql45 = "INSERT INTO admin (Username,Password,Name,DOB,Email,Address,Contact) VALUES ('$Username','$Password3232','$name','$DOB',' $email','$Address','$Contact')";
		  
		   $sql46 = "Select * from admin where Username = '$Username'";
		 $true = mysqli_query($conn,$sql46);
		 $no = mysqli_num_rows($true);
		 if($no==1){
			 echo "<script>alert('Username already Registered');</script>";
		 }else{
			  echo "<script>alert('User Successfully Registered');</script>";
			 $true = mysqli_query($conn,$sql45); 
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/stylebody1.css">
	<link rel="stylesheet" href="../css/stylenavbar.css">
	<link rel="stylesheet" href="../css/stylefooter.css">
	<link rel="stylesheet" href="../css/stylecarousel.css">
<title> Admin Sign Up - Dilshan Bookshop</title>
	<script src="Validations.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<script>
// JavaScript Document
function validateRegistration() {
var First_Name = document.forms["Registration"]["First_Name"].value;
var DOB = document.forms["Registration"]["DOB"].value;
var Add = document.forms["Registration"]["Address"].value;
var Con = document.forms["Registration"]["Contact"].value;
var Email = document.forms["Registration"]["Email"].value;
var Username11 = document.forms["Registration"]["Username1"].value;
var Password11 = document.forms["Registration"]["Password1"].value;
var Password2 = document.forms["Registration"]["ConPassword"].value;
var Da = new Date();
			
	 if (First_Name == "") {
    alert("Enter your Name");
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
	 if(Con == ""){
		 alert("Enter a Contact number");
    return false;
		
	}
	
	if(isNaN(Con)){
		 alert("Mobile Number should contain Numbers only");
    return false;
		
	}
	
	
	if(Con.length < 10 || Con.length > 10 ){
		 alert("Contact Number should Contain 10 digits ");
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
	if(Username11 == ""){
		 alert("Enter an Username");
    return false;
		
	}
	if(Password11 == ""){
		 alert("Enter a Password");
    return false;
		
	}
	if(Password11.length < 8 ){
		 alert("Password should Contain minimum 8 characters ");
    return false;
		
	}
	
	if(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/.test(Password11)){
			 
		
		}else{
			alert("Password should contain at least one number, one lowercase letter, one UPPERCASE LETTER");
			return false;
		}
	
	if(Password2 == ""){
		 alert("Enter a Confirm Password");
    return false;
	}
	
	if(Password11 != Password2){
		 alert("Passwords should Match");
    return false;
		
	}

		}
</script>
</head>
<body>
	<div class="container-fluid" align="center">
		<a href="index.php">
			<img src="../images/dbshoplogo.png" width="300" height="300" alt="" class="fadeInUp" />
		</a>
	</div>
	
	<div class="container" align="center">
		<a href="admindashboard.php">
			<input type="submit" value="BACK TO DASHBOARD" style="font-size: 1.5vw;">
		</a>
	</div>
	<br>
	<div class="container" style="background-color: #FFFFFF; border: 3px solid #00D2CF; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6); padding: 20px;">
		<div class="col-lg-12">
			<h3 align="center"><strong>ADMIN SIGN UP</strong></h3>

	<form name="Registration" action="" onsubmit="return validateRegistration()" method="post">
			
    	    <label> Name :</label>
     		 <input type="text" name="First_Name" value="" placeholder="Enter Your Name">
				
    	    <label> Date of Birth :</label>
     		 <input type="date" name="DOB" value="" placeholder="Enter your Birthday">
   			
        <label>Address :</label>
     		 <input type="text" name="Address" value="" placeholder="Enter your Address">
   		
           <label>Contact Number :</label>
     		 <input type="text" name="Contact" value="" placeholder="Enter your Contact Number">
   			 
    	    <label>Email :</label>
     		 <input type="text" name="Email" value="" placeholder="Enter your Email">
   		
    	    <label> Username :</label>
     		 <input type="text" name="Username1" value="" placeholder="Enter Username">
   			
				
    	    <label> Password :</label>
     		 <input type="password" name="Password1" value="" placeholder="Enter Password">
   		
				
    	    <label> Confirm Password :</label>
     		 <input type="password" name="ConPassword" value="" placeholder="Re-enter Password">
             <br>
             <br>
		<button type="submit"  name = "Sign_Up" class="Register-btn">Sign Up</button>
        <br>
        <br>
			</form>
		</div>
		</div>
	</div>
	<br>
	<br>
        <div class="container-fluid">
		<div class="container-fluid" style="background-color: #ffffff; padding: 20px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">
			<div class="col-lg-12">
			<h3><strong>ADMIN</strong></h3>
       <input type="text" name="search_text" id="search_text" placeholder="Search by  UserName" class="form-control" />
			
			<div id="result"></div>
				
			</div>
			</div>
			<br>
			<br>
			
			</body>
	</html>
	
	<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetchUser.php",
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
	<?php
}
?>
	
	

