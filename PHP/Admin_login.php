 <?php
session_start();
include_once 'Connection.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/stylebody1.css">
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
function validateLogin() {
  var Username = document.forms["Login"]["Username"].value;
	var Password = document.forms["Login"]["Password"].value;

  if (Username == "") {
    alert("Enter an Username");
    return false;
  }
	 if(Password == ""){
		 alert("Password is Empty");
    return false;
		
	}
	
}

</script>
	</head>
	
	
	
	
	
<body>
	
	<div class="container-fluid" align="center">
		<a href="Home.php">
			<img src="../images/dbshoplogo.png" width="300" height="300" alt="" class="fadeInUp" />
		</a>
	</div>
	<div class="container" style="background-color: #FFFFFF; border: 3px solid #00D2CF; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6); padding: 40px;">
		<div class="col-lg-12">
					<h3 align="center"><strong>LOGIN</strong></h3>

	<form name="Login" action="" onsubmit="return validateLogin()" method="post"  style="border: 3px solid #f1f1f1; padding: 10px;">
		
		
				
    	    <b><label> Username :</label></b>
     		 <input type="text" name="Username" value="" placeholder="Enter your Username">
		<br>
   		
		
				
    	    <b><label>Password :</label></b>
     		 <input type="password" name="Password" value="" placeholder="Enter your Password">
   			
		<center><input type="submit" name="login" class="Login-btn" value="LOGIN"></center>
		</form>
	
	</div>
	</div>
    <?php
		
		if(isset($_POST['login'])){
			
			
			$uname = $_POST['Username'];
			$pass = $_POST['Password'];
			$mpass1 = hash('sha1',$pass);
			
			 // password hashing using SHA1
			
			$query = "Select * from admin where Username = '$uname'";
			$data = mysqli_query($conn,$query);
			$row = mysqli_fetch_array($data);
		
			/*echo hash('sha1',$pass);*/echo "<br>";
			
			
			
			if($row['Password'] == $mpass1){
				
			$_SESSION['AdminUser_name'] = $uname;
			 echo "<script>alert('Successfully Logged to the System');</script>";
			header("refresh:0; url=admindashboard.php");
			}else{
				 echo "<script>alert('Invalid Credentials');</script>";
			header("refresh:0; url=Admin_login.php");
				 
			}
			
		}
		
		?>
</body>
</html>
