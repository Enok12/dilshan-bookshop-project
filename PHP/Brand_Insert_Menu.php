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
	
$Brand_ID = $_POST['Brand_ID'];
$Brand_Name = $_POST['Brand_Name'];

$sql = "INSERT INTO brand (B_ID,B_Name) VALUES ('$Brand_ID','$Brand_Name')";


if(mysqli_query($conn,$sql)){
	
	echo "<script>alert('Brand Successfully Entered');</script>";
	header("refresh:0; url=Brand_Insert_Menu.php");
}
else {
	
	echo "<script>alert('Brand Insertion FAILED');</script>";
}
}

?>

<?php
// Auto ID for Sub Categories
$query = "select * from brand order by B_ID desc limit 1";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$lastid = $row['B_ID'];
if($lastid == "")
{
	$number = "B001";
}
else
{
	$pid = str_replace("B","",$lastid);
	$proid = str_pad($pid + 1, 3,0, STR_PAD_LEFT);
	$number = "B" . $proid;

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
	
function validatebrand() {
  var subBid = document.forms["Brand"]["Brand_ID"].value;
	var subBname = document.forms["Brand"]["Brand_Name"].value;
	

  if (subBid == "") {
    alert("Enter Brand ID");
    return false;
  }
	 if(subBname == ""){
		 alert("Enter Brand Name");
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
					<h3 align="center"><strong>BRAND INSERTION</strong></h3>
	<h1>Add Brand</h1>
		<form name="Brand"   action="" onsubmit="return validatebrand()" method="POST" enctype="multipart/form-data">  
		
				
    	    <label><b> Brand ID :</b></label>
     		 <input type="text" name="Brand_ID" value="<?php echo $number ?>" placeholder="Enter Brand ID" readonly >
   			
				
    	    <label><b> Brand Name :</b></label>
     		 <input type="text" name="Brand_Name" value="" placeholder="Enter Brand Name">
   			 
				
        <br>
       
         
        <center><input type="submit" name="Save" value = "INSERT"></center>
		
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
   url:"fetchBrand.php",
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