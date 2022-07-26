<?php
session_start();
include_once 'connection.php';

if(isset($_SESSION['AdminUser_name'])){
	
}else{
	echo "<script>alert('Please Login to the System');</script>";
	header("refresh:0; url=Admin_login.php");
}
?>

<?php
// Auto ID for Sub Categories


$query = "select * from sub_category order by SU_ID desc limit 1";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$lastid = $row['SU_ID'];
if($lastid == "")
{
	$number = "SU001";
}
else
{
	$pid = str_replace("SU","",$lastid);
	$proid = str_pad($pid + 1, 3,0, STR_PAD_LEFT);
	$number = "SU" . $proid;

}

?>


<?php
//Insert Code for Categories
if(isset($_POST['Save'])){
	
$SP_ID = $_POST['Sub_ID'];
$SP_Name = $_POST['Sub_Name'];
$Category_ID = $_POST['Category_ID'];



$sql = "INSERT INTO sub_category (SU_ID,SU_Name,C_ID) VALUES ('$SP_ID','$SP_Name','$Category_ID')";



if(mysqli_query($conn,$sql)){
	
	echo "<script>alert('Category Successfully Inserted');</script>";
	header("refresh:0; url=Category_Insert_Menu.php");
}
else {
	
	echo "<script>alert('Category Insertion FAILED');</script>";
}
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
	function validatecategory() {
  var subid = document.forms["Category"]["Sub_ID"].value;
	var subname = document.forms["Category"]["Sub_Name"].value;
	var CategoryID = document.forms["Category"]["Category_ID"].value;
	

		if(CategoryID == "Choose Category"){
		 alert("Select Category");
    return false;
		
	}
		
  if (subid == "") {
    alert("Enter Category ID");
    return false;
  }
	 if(subname == ""){
		 alert("Enter Category Name");
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
			<input type="submit" value="BACK TO DASHBOARD " style="font-size: 1.5vw;">
		</a>
	</div>
	
	<br>
	<div class="container" style="background-color: #FFFFFF; border: 3px solid #00D2CF; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6); padding: 20px;">
		<div class="col-lg-12">
					<h3 align="center"><strong>CATEGORY INSERTION</strong></h3>
      
			<form name="Category" form  action="" onsubmit="return validatecategory()" method="POST" enctype="multipart/form-data"  style="border: 3px solid #f1f1f1; padding: 10px;">
            
		<select name="Category_ID">
			<option><b>Choose Category</b></option>
			<br>
			<?php
			$link = mysqli_query($conn,"select * from category");
			
				while($row1 = mysqli_fetch_array($link)){
					?> <option value="<?php echo $row1["C_ID"];?>"><?php echo $row1["C_Name"];?></option><?php
	
				}
			?>
			</select><br>
		
		
				
    	    <label><b> Category ID :</b></label>
     		 <input type="text" name="Sub_ID" value="<?php echo $number ?>" placeholder="Enter Product ID" readonly >
   			<br>
		
				
    	    <label><b> Category Name :</b></label>
     		 <input type="text" name="Sub_Name" value="" placeholder="Enter Category Name">
   			
         
        <br>
       
         
        <center><button type="submit" name="Save"  class=""><b>Save</b></button></center>
		
		</form>
	
		<br>
		</div>
	
	</div>
	<br>
	<br>
	<br>
	
	<div class="container-fluid">
		<div class="container" style="background-color: #ffffff; padding: 20px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">
			<h3><strong>CATEGORY TABLE</strong></h3>
	<input type="text" name="search_text" id="search_text" placeholder="Search by Category Name" class="form-control" />
			<br>
			
			<div id="result"></div>
			
		</div>
		</div>
		
	
	


<body>
</body>
</html>

<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetchCategory.php",
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
