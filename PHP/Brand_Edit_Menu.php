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
if(isset($_GET['id'])) //Fetching Update Details to Textfields
{
	$id = $_GET['id'];
	$search_Query = "SELECT * FROM `brand` where B_ID = '$id'";
	$search_Result = mysqli_query($conn, $search_Query);
	
	while ($row1 = mysqli_fetch_array($search_Result)) 
	{
        $B_ID = $row1['B_ID'];
        $B_Name = $row1['B_Name'];
	}
}
else
{
		 $B_ID = "";
        $B_Name = "";
}
	
?>
<?php
if(isset($_POST['update']))
{
	
$brand_ID = $_POST['Brand_ID'];
$brand_Name = $_POST['Brand_Name'];
	
$qury = "update brand set B_Name='".$brand_Name."' where B_ID  = '".$brand_ID."'";
	
	if(mysqli_query($conn,$qury)){
		
	
	echo "<script>alert('Brand Successfully Updated');</script>";
		
	header("refresh:0; url=Brand_Edit_Menu.php");
}
else {
	
	echo "<script>alert('Brand Update FAILED');</script>";
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
<title>Untitled Document</title>
	<script src="Validations2.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
	<script>
	function validatebrand2() {
  var subBid = document.forms["Brand2"]["Brand_ID"].value;
	var subBname = document.forms["Brand2"]["Brand_Name"].value;
	

  if (subBid == "") {
    alert("Enter an Brand ID");
    return false;
  }
	 if(subBname == ""){
		 alert("Enter an Brand Name");
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
					<h3 align="center"><strong>BRAND UPDATE</strong></h3>
<form  name = "Brand2" action="" onSubmit="return validatebrand2()" method="POST" enctype="multipart/form-data">  
		
				
    	    <label><b> Brand ID :</b></label>
     		 <input type="text" name="Brand_ID" value="<?php echo $B_ID?>" placeholder="Enter Brand ID" readonly >
   			
				
    	    <label><b> Brand Name :</b></label>
     		 <input type="text" name="Brand_Name" value="<?php echo $B_Name ?>" placeholder="Enter Brand Name">
   			 </div>
        
         
        <center><input type="submit" name="update"  value = "UPDATE"></center>
		
		</form>
	</div>
	</div>
	<br>
	<div class="container-fluid">
		<div class="container" style="background-color: #ffffff; padding: 20px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">
			<h3><strong>BRAND TABLE</strong></h3>
	<input type="text" name="search_text" id="search_text" placeholder="Search by Brand Name" class="form-control" />
			
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
   url:"Brand_Update.php",
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
