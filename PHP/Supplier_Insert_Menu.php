<?php
session_start();
include_once 'connection.php';

if(!isset($_SESSION['AdminUser_name'])){
	echo "<script>alert('Please Login to the System');</script>";
	header("refresh:0; url=Admin_login.php");
}else{

?>

<?php
if(isset($_POST['Save'])){
	
$Sup_ID = $_POST['Supplier_ID'];
$Sup_Name = $_POST['Supplier_Name'];
$Sup_Description = $_POST['Supplier_Description'];
$sup_address = $_POST['Supplier_address'];
$sup_telephone = $_POST['Supplier_telephone'];
$sup_email = $_POST['Supplier_email'];

$sql = "INSERT INTO supplier (S_ID,S_Name,S_Description,S_Address,S_Telephone,S_Email) VALUES ('$Sup_ID','$Sup_Name','$Sup_Description','$sup_address','$sup_telephone','$sup_email')";

if(mysqli_query($conn,$sql)){
	
	echo "<script>alert('Supplier Successfully Registered');</script>";
	header("refresh:0; url=Supplier_Insert_Menu.php");
}
else {
	
echo "<script>alert('Supplier FAILED to Register');</script>";
}

}

?>

<?php
// Auto ID for Sub Categories
$query = "select * from supplier order by S_ID desc limit 1";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$lastid = $row['S_ID'];
if($lastid == "")
{
	$number = "S001";
}
else
{
	$pid = str_replace("S","",$lastid);
	$proid = str_pad($pid + 1, 3,0, STR_PAD_LEFT);
	$number = "S" . $proid;

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
	
	<script src="Validations.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

	
<title>Untitled Document</title> 
	<script>
	function validatesupplier() {
	var subid = document.forms["Supplier"]["Supplier_ID"].value;
  	var subname = document.forms["Supplier"]["Supplier_Name"].value;
	var subDep = document.forms["Supplier"]["Supplier_Description"].value;
	var subAdd = document.forms["Supplier"]["Supplier_address"].value;
	var subTel = document.forms["Supplier"]["Supplier_telephone"].value;
	var subEmail = document.forms["Supplier"]["Supplier_email"].value;
	

  if (subid == "") {
    alert("Enter Supplier ID");
    return false;
  }
	 if(subname == ""){
		 alert("Enter Supplier Name");
    return false;
		
	}
	if(subDep == ""){
		 alert("Enter Supplier Description");
    return false;
		
	}
	if(subAdd == ""){
		 alert("Enter Supplier Address");
    return false;
		
	}
	if(subTel == ""){
		 alert("Enter Supplier Telephone");
    return false;
		
	}
		if(isNaN(subTel)){
		 alert("Mobile Number should contain Numbers only");
    return false;
		
	}
		if(subTel.length < 10 || subTel.length > 10 ){
		 alert("Invalid Number");
    return false;
		
	}
		
	if(subEmail == ""){
		 alert("Enter Supplier Email");
    return false;
		
	}
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(subEmail) ){
			 
	
	}else{
				
	alert("Invalid format of Email");
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
			<input type="submit" value="BACK TO DASHBOARD">
		</a>
	</div>
	<br>
	
	<div class="container" style="background-color: #FFFFFF; border: 3px solid #00D2CF; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6); padding: 20px;">
		<div class="col-lg-12">
				<h3 align="center"><strong>SUPPLIER UPDATE</strong></h3>
	<h1>Add Supplier</h1>
		<form name="Supplier" form  action="" onsubmit="return validatesupplier()" method="POST" enctype="multipart/form-data">  
		
				
    	    <label><b> Supplier ID :</b></label>
     		 <input type="text" name="Supplier_ID" value="<?php echo $number?>" placeholder="Enter Supplier ID" readonly >
   		
				
    	    <label><b> Supplier Name :</b></label>
     		 <input type="text" name="Supplier_Name" value="" placeholder="Enter Supplier Name">
   		
				
    	    <label><b>Supplier Description :</b></label>
     		 <input type="text" name="Supplier_Description" value="" placeholder="Enter Supplier Description">
   			 
				
    	    <label><b>Supplier Address :</b></label>
     		 <input type="text" name="Supplier_address" value="" placeholder="Enter Supplier Address">
   		
				
    	    <label><b>Supplier Telephone :</b></label>
     		 <input type="text" name="Supplier_telephone" value="" placeholder="Enter Supplier Telephone">
   		
				
    	    <label><b>Supplier Email :</b></label>
     		 <input type="text" name="Supplier_email" value="" placeholder="Enter Supplier Email">
   			
         
        <br>
        <center><input type="submit" name="Save"  value = "INSERT"></center>
		
		</form>
	</div>
	</div>
	<br>
		<div class="container-fluid">
		<div class="container" style="background-color: #ffffff; padding: 20px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">
			<h3><strong>SUPPLIER TABLE</strong></h3>
		<input type="text" name="search_text" id="search_text" placeholder="Search by Supplier Name" class="form-control" />
			
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
   url:"fetchSupplier.php",
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