<?php
session_start();
include_once 'connection.php';

if(!isset($_SESSION['AdminUser_name'])){
	echo "<script>alert('Please Login to the System');</script>";
	header("refresh:0; url=Admin_login.php");
}else{
?>

<?php
$id = "";
if(isset($_GET['id'])) //Edit
{
	$id = $_GET['id'];
	$search_Query = "SELECT * FROM `supplier` where S_ID = '$id'";
	$search_Result = mysqli_query($conn, $search_Query);
	
	while ($row1 = mysqli_fetch_array($search_Result)) 
	{
        $code = $row1['S_ID'];
        $name = $row1['S_Name'];
		$Desc = $row1['S_Description'];
        $Address = $row1['S_Address'];
		$Mobile = $row1['S_Telephone'];
		$Email = $row1['S_Email'];
		
	}
}
else
{
		 $code = "";
        $name = "";
		$Desc = "";
        $Address ="";
		$Mobile = "";
		$Email = "";
}
?>
<?php
if(isset($_POST['update']))
{
	
														 

$Sup_ID = $_POST['Supplier_ID'];
$Sup_Name = $_POST['Supplier_Name'];
$Sup_Description = $_POST['Supplier_Description'];
$sup_address = $_POST['Supplier_address'];
$sup_telephone = $_POST['Supplier_telephone'];
$sup_email = $_POST['Supplier_email'];


	
$qury = "update supplier set S_Name='".$Sup_Name."',S_Description='".$Sup_Description."',S_Address='".$sup_address."',S_Telephone='".$sup_telephone."', S_Email='".$sup_email."'where S_ID = '".$Sup_ID."'";
	
	
	
	if(mysqli_query($conn,$qury)){
		
	
	echo "<script>alert('Supplier Updated Successfully');</script>";
		header("refresh:0; url=Supplier_Edit_Menu.php");
}
else {
	
	echo "<script>alert('Supplier Update FAILED');</script>";
}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/stylebody1.css">
	<link rel="stylesheet" href="../css/stylenavbar.css">
	<link rel="stylesheet" href="../css/stylefooter.css">
	<link rel="stylesheet" href="../css/stylecarousel.css">
	
	<script src="Validations.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
	<script>
	function validatesupplier2() {
	var subid = document.forms["Supplier2"]["Supplier_ID"].value;
  	var subname = document.forms["Supplier2"]["Supplier_Name"].value;
	var subDep = document.forms["Supplier2"]["Supplier_Description"].value;
	var subAdd = document.forms["Supplier2"]["Supplier_address"].value;
	var subTel = document.forms["Supplier2"]["Supplier_telephone"].value;
	var subEmail = document.forms["Supplier2"]["Supplier_email"].value;
	

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
			 
	return true;
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
		<form name="Supplier2" onsubmit="return validatesupplier2()" method="POST" enctype="multipart/form-data">  
		
				
    	    <label><b> Supplier ID :</b></label>
     		 <input type="text" name="Supplier_ID" value="<?php echo $code?>" placeholder="Enter Supplier ID" readonly>
   			 
			
    	    <label><b> Supplier Name :</b></label>
     		 <input type="text" name="Supplier_Name" value="<?php echo $name?>" placeholder="Enter Supplier Name">
   			 
				
    	    <label><b>Supplier Description :</b></label>
     		 <input type="text" name="Supplier_Description" value="<?php echo $Desc?>" placeholder="Enter Supplier Description">
   			 
				
    	    <label><b>Supplier Address :</b></label>
     		 <input type="text" name="Supplier_address" value="<?php echo $Address?>" placeholder="Enter Supplier Address">
   			
				
    	    <label><b>Supplier Telephone :</b></label>
     		 <input type="text" name="Supplier_telephone" value="<?php echo $Mobile?>" placeholder="Enter Supplier Telephone">
   			 
				
    	    <label><b>Supplier Email :</b></label>
     		 <input type="text" name="Supplier_email" value="<?php echo $Email?>" placeholder="Enter Supplier Email">
   			 
        <br>
       
       <center><input type="submit" name="update" value="UPDATE"></center> 
		
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
   url:"Supplier_Update.php",
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