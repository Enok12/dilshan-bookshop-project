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
$query = "select * from product order by P_ID desc limit 1";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$lastid = $row['P_ID'];
if($lastid == "")
{
	$number = "P0001";
}
else
{
	$pid = str_replace("P","",$lastid);
	$proid = str_pad($pid + 1, 4,0, STR_PAD_LEFT);
	$number = "P" . $proid;

}
?>



<?php
if(isset($_POST['Save'])){
	
$P_ID = $_POST['P_ID'];
$P_Name = $_POST['P_Name'];
$P_Description = $_POST['P_Description'];
$NOI_Box = $_POST['NOI_Box'];
$SubCategory_ID = $_POST['SubCategory_ID'];
$Brand_ID = $_POST['Brand_ID'];
$Handle = $_POST['Handle'];

$filename = $_FILES["P_Img"]["name"];
$tempname = $_FILES["P_Img"]["tmp_name"];
$folder = "images/".$filename;
move_uploaded_file($tempname,$folder);

$sql = "INSERT INTO product (P_ID,P_Name,P_Description,NOI_Box,P_Image,B_ID,SU_ID,Handling_Type) VALUES ('$P_ID','$P_Name','$P_Description','$NOI_Box','$filename','$Brand_ID','$SubCategory_ID','$Handle')";

if(mysqli_query($conn,$sql)){
	
	 echo "<script>alert('Product Successfully Inserted');</script>";
	header("refresh:0; url=Product_Insert_Menu.php");
	
}
else {
	
	 echo "<script>alert('Product FAILED to Insert');</script>";
}
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Product Insertion - Dilshan Bookshop </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/stylebody1.css">
	<link rel="stylesheet" href="../css/stylenavbar.css">
	<link rel="stylesheet" href="../css/stylefooter.css">
	<link rel="stylesheet" href="../css/stylecarousel.css">
	<style>
	th,tr,td {
			text-align: center;
			border: #090101 1px solid;
		}
		
		td {
			
			font-size: 15px;
			text-align: center;
			
		}
		th{
			font-size: 20px;
			
		}
	</style>
	<script src="Validations.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
	
	<script>
	function validateproduct() {
  var P_ID = document.forms["P_Insertion"]["P_ID"].value;
	var Sub_ID = document.forms["P_Insertion"]["SubCategory_ID"].value;
	 var B_ID = document.forms["P_Insertion"]["Brand_ID"].value;
	var P_Name = document.forms["P_Insertion"]["P_Name"].value;
	var P_Description = document.forms["P_Insertion"]["P_Description"].value;
	var NOI_Box = document.forms["P_Insertion"]["NOI_Box"].value;
	var Handle = document.forms["P_Insertion"]["Handle"];
	var valid = false;

	for(i=0; i<Handle.length;i++){
		if(Handle[i].checked){
			valid = true;
			break;
		}
	}

		
		var fileInput =  
               document.forms["P_Insertion"]["P_Img"].value;
		
              
            var filePath = fileInput.value; 
            // Allowing file type 
            var allowedExtensions =  
                    /(\.jpg|\.jpeg|\.png|\.gif)$/i; 
	

  if (P_ID == "") {
    alert("Enter Product ID");
    return false;
  }
	 if(Sub_ID == "Choose Category"){
		 alert("Select Category");
    return false;
		
	}
	
	 if(B_ID == "Choose Brand"){
		 alert("Select a Brand");
    return false;
		
	}
	
	 if(P_Name == ""){
		 alert("Enter Product Name ");
    return false;
		
	}
	
	if(P_Description == ""){
		 alert("Enter Product Description  ");
    return false;
		
	}
	
	if(NOI_Box == ""){
		 alert("Enter Quantity in Box of the Product");
    return false;
		
	}
		if(isNaN(NOI_Box)){
		 alert("Numbers Only");
    return false;
		
	}

		
		if(valid==false){
			alert("Please Select a Stock Handling Type");
			return false;
		}

		if(fileInput == ""){
			 alert("Please Select Image");
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
	
	<div class="container" align="center">
		<a href="admindashboard.php">
			<input type="submit" value="BACK TO DASHBOARD" style="font-size: 1.5vw;">
		</a>
	</div>
	<br>
	<div class="container" style="background-color: #FFFFFF; border: 3px solid #00D2CF; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6); padding: 20px;">
		<div class="col-lg-12">
			<h3 align="center"><strong>PRODUCT INSERTION</strong></h3>
			<form  action="" method="POST" onSubmit="return validateproduct()" name="P_Insertion" enctype="multipart/form-data">
		
				
    	    <label> Product ID :</label>
     		 <input type="text" name="P_ID" value="<?php echo $number ?>" placeholder="" readonly >
   			
		<br>
		<br>
		<select name="SubCategory_ID" id="selection">
			<option>Choose Category</option>
			<?php
			$link = mysqli_query($conn,"select * from Sub_Category");
			
				while($row1 = mysqli_fetch_array($link)){
					?> <option value="<?php echo $row1["SU_ID"];?>"><?php echo $row1["SU_Name"];?></option><?php
				}
			?>
			</select>
			<br>
			<select name="Brand_ID" id="selection1">
			<option>Choose Brand</option>
			<?php
			$link = mysqli_query($conn,"select * from Brand");
			
				while($row1 = mysqli_fetch_array($link)){
					?> <option value="<?php echo $row1["B_ID"];?>"><?php echo $row1["B_Name"];?></option><?php
				}
			?>
			</select>
			<br>
		
				
    	    <label> Product Name :</label>
     		 <input type="text" name="P_Name" value="" placeholder="Enter Product Name" >
   			
		
				
    	    <label>Product Description :</label>
     		 <input type="text" name="P_Description" value="" placeholder="Enter Product Description">
   			
				
    	    <label> No of Items in Box :</label>
     		 <input type="number" name="NOI_Box" value="" placeholder="Enter No of items in Box" min="1" max="10000000">

			  <label> Stock Handling Method :</label><br>
			  <input type="radio" name="Handle" value="Manual"  >Manual
			  <input type="radio" name="Handle" value="Automatic"  >Automatic
			  <br>  <br>


    	    <label> Image :</label>
     		 <input type="file" name="P_Img" value="" placeholder="" >
			<br>
		
			<center><button type="submit" name="Save">INSERT</button></center>		
			

		</form>
			
		</div>
	</div>
		
			<br>
		<div class="container-fluid">
		<div class="container-fluid" style="background-color: #ffffff; padding: 20px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">
			<div class="col-lg-12">
			<h3><strong>PRODUCT TABLE</strong></h3>
			
				<input type="text" name="search_text" id="search_text" placeholder="Search by Product Name" class="form-control" />
					<br>
					<br>
					<div id="result"></div>
					</div>
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
   url:"fetch.php",
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