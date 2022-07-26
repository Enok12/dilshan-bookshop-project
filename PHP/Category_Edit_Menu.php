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
if(isset($_GET['id'])) //Fetching Category Details to Textfields
{
	$id = $_GET['id'];
	$search_Query = "SELECT * FROM `sub_category` where SU_ID = '$id'";
	$search_Result = mysqli_query($conn, $search_Query);
	
	while ($row1 = mysqli_fetch_array($search_Result)) 
	{
        $SU_ID = $row1['SU_ID'];
        $SU_Name = $row1['SU_Name'];	
	}
}
else
{
		 $SU_ID = "";
        $SU_Name = "";
		
}

		// Update Code											 
if(isset($_POST['update']))
{
														 

$Subcate_ID = $_POST['Sub_ID'];
$Subcate_Name = $_POST['Sub_Name'];
	
$qury = "update sub_category set SU_Name='".$Subcate_Name."' where SU_ID  = '".$Subcate_ID."'";
	
	
	
	if(mysqli_query($conn,$qury)){
		
	
	echo "<script>alert('Category Successfully Updated');</script>";
		header("refresh:0; url=Category_Edit_Menu.php");
}
else {
	
	echo "<script>alert('Category Update FALIED');</script>";
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
	function validatecategory2() {
  var sub = document.forms["Category2"]["Sub_ID"].value;
	var subn = document.forms["Category2"]["Sub_Name"].value;

	

  if (sub == "") {
    alert("Enter Product ID");
    return false;
  }
	 if(subn == ""){
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
			<input type="submit" value="BACK TO DASHBOARD"  style="font-size: 1.5vw;">
		</a>
	</div>
	<br>
       <div class="container" style="background-color: #FFFFFF; border: 3px solid #00D2CF; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6); padding: 20px;">
		<div class="col-lg-12">
					<h3 align="center"><strong>CATEGORY UPDATE</strong></h3>
			<form name="Category2" action="" onSubmit="return validatecategory2()" method="POST" enctype="multipart/form-data">
            
		
		
				
    	    <label><b> Category ID :</b></label>
     		 <input type="text" name="Sub_ID" value="<?php echo $SU_ID?>" readonly >
   			
		
				
    	    <label><b> Category Name :</b></label>
     		 <input type="text" name="Sub_Name" value="<?php echo $SU_Name?>" placeholder="Enter Product Name">
   			
         
        <br>
       
         
        <center><input type="submit" name="update"   value = "UPDATE"></button></center>
		
		</form>
				</div>
				</div>
	
		<br>
		<div class="container-fluid">
		<div class="container" style="background-color: #ffffff; padding: 20px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">
			<h3><strong>CATEGORY TABLE</strong></h3>
		<input type="text" name="search_text" id="search_text" placeholder="Search by Product Name" class="form-control" />
			
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
   url:"Category_Update.php",
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
