<?php
session_start();
if(!isset($_SESSION['AdminUser_name'])){
	echo "<script>alert('Please Login to the System');</script>";
	header("refresh:0; url=Admin_login.php");
}else{
?>

<?php
if(isset($_POST['Search'])){
	
$Fdate = $_POST["From_Date"];
 $TDate = $_POST["To_Date"];

$_SESSION['FromDate11'] = $Fdate ;
$_SESSION['ToDate11'] = $TDate;
			
header("refresh:0; url=Update_SRN_Menu.php");
		}
		
		?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SRN Update</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/stylebody1.css">
	<link rel="stylesheet" href="../css/stylenavbar.css">
	<link rel="stylesheet" href="../css/stylefooter.css">
	<link rel="stylesheet" href="../css/stylecarousel.css">
	<script>
	function validateSRN() {
  var From_Date = document.forms["SRN"]["From_Date"].value;
	var To_Date = document.forms["SRN"]["To_Date"].value;
	
	

  if (From_Date == "") {
    alert("Select a Date");
    return false;
  }
	 if(To_Date == ""){
		 alert("Select a Date");
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
					<h3 align="center"><strong>SRN SEARCH</strong></h3>
	
	<form  action="" method="POST" onSubmit="return validateSRN()" name="SRN" enctype="multipart/form-data">
				
    	    <label> From :</label>
     		 <input type="date" name="From_Date" value="" placeholder="" >
   		
				
    	    <label> To :</label>
     		 <input type="date" name="To_Date" value="" placeholder="Enter Product Name" >
		<center><input type="submit" name="Search" value="SEARCH SRN" ></center>
		</form>	
		</div>
	</div>
	<br>
	<br>
</body>
</html> 
	<?php
	 }
	?>