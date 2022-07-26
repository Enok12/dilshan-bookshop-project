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
	
$P_ID = $_POST['P_ID'];
$P_Name = $_POST['P_Name'];
$P_Description = $_POST['P_Description'];
$Boxq = $_POST['NOI'];
$Handling_Type = $_POST['Handle'];

$sql = "UPDATE `product` SET `P_Name`='$P_Name',`P_Description`='$P_Description',`NOI_Box`='$Boxq',`Handling_Type`='$Handling_Type' WHERE P_ID = '$P_ID'";
if(mysqli_query($conn,$sql)){
	
	 echo "<script>alert('Product Successfully Updated');</script>";
	header("refresh:0; url=Product_Edit Menu.php");
	
}
else {
	
	 echo "<script>alert('Product FAILED to Update');</script>";
}
}
?>
<?php
$id = "";
if(isset($_GET['id'])) //Edit
{
	$id = $_GET['id'];
	$search_Query = "SELECT * FROM `product` where P_ID = '$id'";
	$search_Result = mysqli_query($conn, $search_Query);
	
	while ($row1 = mysqli_fetch_array($search_Result)) 
	{
        $code = $row1['P_ID'];
        $name = $row1['P_Name'];
		$Desc = $row1['P_Description'];
		$NOI = $row1['NOI_Box'];
		$Handle = $row1['Handling_Type'];
		
	}
}
else
{
		$code = "";
        $name = "";
		$Desc = "";
		$NOI = "";
		$Handle = "";
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Product Update  - Dilshan Bookshop</title>
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
	function validateproduct2() {
  var P_ID = document.forms["P_Insertion2"]["P_ID"].value;
	var P_Name = document.forms["P_Insertion2"]["P_Name"].value;
	var P_Description = document.forms["P_Insertion2"]["P_Description"].value;
	var NOI = document.forms["P_Insertion2"]["NOI"].value;
	

  if (P_ID == "") {
    alert("Enter an Product ID");
    return false;
  }
	
	
	 if(P_Name == ""){
		 alert("Enter an Product Name ");
    return false;
		
	}
	
	if(P_Description == ""){
		 alert("Enter Product Description  ");
    return false;
		
	}
		
		if(NOI == ""){
		 alert("Enter Quantity amount in Package");
    return false;
		
	}
		
		if(isNaN(NOI)){
		 alert("Numbers Only");
    return false;
		
	}
	
}
	</script>
</head>

<body>
	<div class="container-fluid" align="center">
		<a href="admindashboard.php">
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
					<h3 align="center"><strong>PRODUCT UPDATE</strong></h3>
	<form  action="" method="POST" onSubmit="return validateproduct2()" name="P_Insertion2" enctype="multipart/form-data">
		
				
    	    <label> Product ID :</label>
     		 <input type="text" name="P_ID" value="<?php echo $code; ?>" placeholder="" readonly>
   			
				
    	    <label> Product Name :</label>
     		 <input type="text" name="P_Name" value="<?php echo $name; ?>" placeholder="Enter Product Name" >
   			
				
    	    <label>Product Description :</label>
     		 <input type="text" name="P_Description" value="<?php echo $Desc; ?>" placeholder="Enter Product Description">
   			
		
		 	<label> No of items in Box :</label>
     		 <input type="number" name="NOI" value="<?php echo $NOI; ?>" placeholder="No.of items in Box" min="1" max="10000000">

			  <label> Stock Handling Method :</label><br>
			  <input type="radio" name="Handle" value="Manual" required 
			  <?php
			 	if($Handle == "Manual"){
					 echo "checked";
				 } 
			  ?> >Manual
			  <input type="radio" name="Handle" value="Automatic" required 
			  <?php
			 	if($Handle == "Automatic"){
					 echo "checked";
				 } 
			  ?> 
			  >Automatic
			  <br>  <br>
   			
		
		<center><input type="submit" name="Save" value = "UPDATE"></center>
		</form>
		</div>
	</div>
		<br>
		<div class="container-fluid">
		<div class="container" style="background-color: #ffffff; padding: 20px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">
			<h3><strong>PRODUCT TABLE</strong></h3>
			
		<input type="text" name="search_text" id="search_text" placeholder="Search by Product Name" class="form-control" />
			<br>
			<br>
			<div id="result"></div>
			</div>
			</div>
			
			
</body>
</html>
	<script>
$(document).ready(function(){

 load_data();
 function load_data(query)
 {
  $.ajax({
   url:"fetch2.php",
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