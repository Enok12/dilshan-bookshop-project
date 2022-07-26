<?php
session_start();
include_once 'connection.php';

if(!isset($_SESSION['AdminUser_name'])){
	echo "<script>alert('Please Login to the System');</script>";
	header("refresh:0; url=Admin_login.php");
}else{
?>

<?php
// Auto ID for Products


$query = "select * from grn order by GRN desc limit 1";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$lastid = $row['GRN'];
if($lastid == "") 
{
	$number = "GRN0001";
}
else
{
	$pid = str_replace("GRN","",$lastid);
	$proid = str_pad($pid + 1, 4,0, STR_PAD_LEFT);
	$number = "GRN" . $proid;

}

?>

<?php
if(isset($_POST['Save'])){
	
$GRN_ID = $_POST['SRN_ID'];
$Re_Date = $_POST['Re_Date'];
$Supplier_ID = $_POST['Supplier_ID'];
	
$sql = "INSERT INTO `grn`(`GRN`,`Received_Date`,`Status`) VALUES ('$GRN_ID','$Re_Date','R')";

if(mysqli_query($conn,$sql)){
$_SESSION['GRN_ID2'] = $_POST['SRN_ID'];
$_SESSION['Received_Date2'] = $_POST['Re_Date'];
	$_SESSION['Supplier_ID2'] = $Supplier_ID;
	
	
	echo "<script>alert('SRN Created');</script>";
	header("refresh:0; url=Insert_SRN.php");
}
else {
	 echo "<script>alert('SRN Creation FAILED');</script>";
}
}
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SRN Creation - Dilshan Bookshop</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/stylebody1.css">
	<link rel="stylesheet" href="../css/stylenavbar.css">
	<link rel="stylesheet" href="../css/stylefooter.css">
	<link rel="stylesheet" href="../css/stylecarousel.css">
	<script src="Validations2.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
	<script>
	function validateSRN() {
	var Supplier_ID = document.forms["SRN_Creation"]["Supplier_ID"].value;
	
	var SRN_ID = document.forms["SRN_Creation"]["SRN_ID"].value;
	var Re_Date = document.forms["SRN_Creation"]["Re_Date"].value;
	
		var myDate = new Date(Re_Date);
		var today = new Date();
	
	 if(Supplier_ID == "Choose Supplier"){
		 alert("Select a Supplier");
    return false;
		
	}
	
	if(SRN_ID == ""){
		 alert("Enter GRN ID");
    return false;
	}
	
	if(Re_Date == ""){
		 alert("Enter Date");
    return false;
	}
			if(myDate > today){
		 alert("Cannot enter future dates");
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
					<h3 align="center"><strong>SRN (Supplier Receive Note)</strong></h3>
	<form  action="" method="POST" onSubmit="return validateSRN()" name="SRN_Creation" enctype="multipart/form-data">
		
		<select name="Supplier_ID" id="selection1">
			<option>Choose Supplier</option>
			<?php
			$link = mysqli_query($conn,"select * from supplier");
			
				while($row1 = mysqli_fetch_array($link)){
					?> <option value="<?php echo $row1["S_ID"];?>"><?php echo $row1["S_Name"];?></option><?php
				}
			?>
			</select>
			<br>
    	    <label> SRN ID :</label>
     		 <input type="text" name="SRN_ID" value="<?php echo $number ?>" placeholder="SRN ID" readonly >
    	    <label> Received Date :</label>
     		 <input type="date" name="Re_Date" value="" placeholder="" >
   			
				
    	   
		<center><input type="submit" name="Save" value="RETURN PRODUCTS" ></center>
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
	
	