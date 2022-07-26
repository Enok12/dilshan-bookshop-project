<?php
include_once 'connection.php';
session_start();

if(!isset($_SESSION['AdminUser_name'])){
	echo "<script>alert('Please Login to the System');</script>";
	header("refresh:0; url=Admin_login.php");
}else{

$S_IDD = $_SESSION['Supplier_ID2'];

if(isset( $_SESSION['GRN_ID2'])){
	
}else{
	
echo "<script>alert('Please create a SRN to return products');</script>";
	header("refresh:0; url=SRN.php");
}
?>

<?php
if(isset($_POST['Complete'])){
	unset($_SESSION["GRN_ID2"]);
	header("refresh:0; url=admindashboard.php");
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
		$NOI_Box = $row1['NOI_Box'];
		
	}
}
else
{
		$code = "";
        $name = "";
	$NOI_Box = "";
}
?>

<?php
if(isset($_POST['Insert'])){
	
$GRN_ID = $_SESSION['GRN_ID2'];
$S_ID = $_SESSION['Supplier_ID2'];
$P_IDs = $_POST['P_IDs'];
$QTY = $_POST['P_qty'];
	$C_P = $_POST['C_P'];
	$S_P = $_POST['S_P'];

	$sql = "SELECT * FROM grn_details WHERE P_ID = '$P_IDs' && GRN_ID = '$GRN_ID'";
		$run_query = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			
			echo "<script>alert('Same Product cannot be returned again');</script>";
			header("refresh:0; url=Insert_GRN.php");
		}else{
			$sql1 = "INSERT INTO `grn_details`(`GRN_ID`, `S_ID`, `P_ID`,`C_P`,`S_P`, `QTY`, `Status`,`Availability`,`Activation_Status`) VALUES ('$GRN_ID','$S_ID','$P_IDs','$C_P','$S_P','$QTY','R','0','Returned')";
			if(mysqli_query($conn,$sql1)){
			echo "<script>alert('Product Successfully Returned');</script>";
				header("refresh:0; url=Insert_SRN.php");
			}
			else {
				echo "<script>alert('Product FAILED to Return');</script>";

			}
		}
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
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
	function validateGRN() {
  var P_Name = document.forms["SRNFORM"]["P_Name"].value;
	var C_P = document.forms["SRNFORM"]["C_P"].value;
	var S_P = document.forms["SRNFORM"]["S_P"].value;
	var Quantity = document.forms["SRNFORM"]["P_qty"].value;
	
  if (P_Name == "") { 
    alert("Select a Product");
    return false;
  }

  if (C_P == "") { 
    alert("Enter Cost Price");
    return false;
  }

  if(isNaN(C_P)){
		 alert("Cost Price - Numbers Only");
    return false;
		
	}

	if (S_P == "") { 
    alert("Enter Selling Price");
    return false;
  }

  if(isNaN(S_P)){
		 alert("Selling Price - Numbers Only");
    return false;
		
	}
		if (Quantity == "") {
    alert("Enter Quantity");
    return false;
  }
	}
	</script>

</head>
	<body>
	<br>
		<div class="container" style="background-color: #FFFFFF; border: 3px solid #00D2CF; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6); padding: 20px;">
<h1>SRN</h1>
	 <label>GRN ID  : <?php echo $_SESSION['GRN_ID2'] ?></label><br>
	<label>Date  : <?php echo $_SESSION['Received_Date2'] ?></label><br>
	
	
	<?php
	//Display Supplier Name using Session from previous page
			$Supplier_Name = '';
			$link = mysqli_query($conn,"select * from supplier where S_ID = '$S_IDD' ");
			while($row1 = mysqli_fetch_array($link)){
				$Supplier_Name = $row1['S_Name'];
			}	
			?>
	<label>Supplier  : <?php echo $Supplier_Name ?></label>
			
	</div>
	<br>
	
	 <div class="container" style="background-color: #FFFFFF; border: 3px solid #00D2CF; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6); padding: 20px;">
		<div class="col-lg-12">
					<h3 align="center"><strong> SRN</strong></h3>
		
	<form  action="" method="POST" onSubmit="return validateGRN()" name="SRNFORM" enctype="multipart/form-data">
		
			
		<label>Product Name :</label>
     		 <input type="text" name="P_Name" value="<?php echo $name ?>" readonly>
   			
				
    	    <label> Cost Price :</label>
     		 <input type="text" name="C_P" value=""  >
   			 
				
    	    <label> Selling Price :</label>
     		 <input type="text" name="S_P" value=""  >
   			
    	    <label> Quantity :</label>
     		 <input type="number" name="P_qty" value="" class="input" placeholder="">
		
			
			<input type="hidden" name="P_IDs" value="<?php echo $code ?>" >
			
		<center><input type="submit" name="Insert" value="RETURN PRODUCTS" ></center>
		</form>
		 
	</div>
	</div>
			<br>
		<div class="container-fluid">
		<div class="container" style="background-color: #ffffff; padding: 20px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">
			<h3><strong>PRODUCT TABLE</strong></h3>
		<input type="text" name="search_text" id="search_text" placeholder="Search by Product Name" class="form-control" />
			
			<div id="result"></div>
			</div>
			</div>
<br>
<br>
	
			
		<div class="container-fluid">
		<div class="container" style="background-color: #ffffff; padding: 20px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">
			<h3><strong>SRN FORM</strong></h3>
			
			<div class='table-responsive'>
   <table class='table table bordered'>
    <tr>
     <th>Product ID</th>
	<th>Product Name</th>
     <th>No of Items Returned </th>
     
    </tr>
			<?php
			$query54 = "
  SELECT a.P_ID,b.P_Name,a.QTY FROM grn_details a, product b where a.P_ID=b.P_ID AND GRN_ID = '".$_SESSION['GRN_ID2']."'
 ";
		$result22 = mysqli_query($conn, $query54);
		while($row = mysqli_fetch_array($result22))
 {
	 $P_ID = $row['P_ID'];
	$P_Name = $row['P_Name'];
	 $qty = $row['QTY'];
	 
	
	 echo "<tr>";
		echo "<td>"; echo $P_ID;"</td>";
				echo "<td>"; echo $P_Name;"</td>";
		echo "<td>"; echo $qty;"</td>";
		echo "</tr>";
	 echo "</div>";
 }
			?>
				</table>
			</div>
			</div>
			<br>
			<br>
			
			<form method="post">
			<center><input type="submit" value="COMPLETE" onClick="return  confirm('Do you want to Complete the SRN Form?')" name="Complete" style="font-size: 1.5vw; background-color: #0DA62A;"></center>
			</form>
			
</body>
</html>
			<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetchSRN.php",
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
		
		
		