<?php
session_start();
include_once 'connection.php';

if(!isset($_SESSION['AdminUser_name'])){
	echo "<script>alert('Please Login to the System');</script>";
	header("refresh:0; url=Admin_login.php");
}else{

if(isset($_GET['id'])){
	$_SESSION['GRN']=$_GET['id'];
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>GRN Result</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/stylebody1.css">
	<link rel="stylesheet" href="../css/stylenavbar.css">
	<link rel="stylesheet" href="../css/stylefooter.css">
	<link rel="stylesheet" href="../css/stylecarousel.css">
	
	<script src="Validations.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
	
</head>

<body>
	<div class="container-fluid" align="center">
		<a href="index.php">
			<img src="../images/dbshoplogo.png" width="300" height="300" alt="" class="fadeInUp" />
		</a>
	</div>
	
	<div class="container" align="center">
		<a href="Update_GRN_Menu.php">
			<input type="submit" value="BACK TO RESULT" style="font-size: 1.5vw;">
		</a>
	</div>
	<br>
	
	<br>
	<br>
	<div class="container" style="background-color: #FFFFFF; border: 3px solid #00D2CF; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6); padding: 20px;">
		<div class="col-lg-12">
			<h3 align="center"><strong>GRN Details</strong></h3>
	 <div class="table-responsive">
   					<table class="table table bordered">
                          <tr>  
							  
                               
                               <th >Product Name</th>  
							  <th >Supplier_Name</th> 
							  <th >Qty</th> 
							  <th >Status</th> 
							  <th >Action</th> 
						
                          </tr> 
	<?php

$id = "";
if(isset($_SESSION["GRN"])) //Fetching Update Details to Textfields
{
	$id = $_SESSION["GRN"];
	$search_Query = "SELECT a.ID,a.P_ID,a.GRN_ID,b.S_Name,c.P_Name,a.QTY,a.Status,a.Activation_Status FROM grn_details a,supplier b,product c WHERE c.P_ID=a.P_ID AND b.S_ID=a.S_ID AND a.GRN_ID = '$id'";
	$search_Result = mysqli_query($conn, $search_Query);
	
	while ($row1 = mysqli_fetch_array($search_Result)) 
	{
		$Activation_Status = $row1["Activation_Status"];
        echo "<tr>";
        echo "<td>"; echo $row1["P_Name"]."</td>";
        echo "<td>"; echo $row1["S_Name"]."</td>";
        echo "<td>"; echo $row1["QTY"]."</td>";
        echo "<td>"; echo $row1["Status"]."</td>";

		if ($Activation_Status == 'OVER' || $Activation_Status == 'ACTIVE'){
			echo "<td>"; echo "NOT ELIGIBLE";echo "</td>";
		}else{
			echo "<td>"; ?><a href="DeleteGRNrecord.php?ids=<?php echo $row1["ID"];?>&p_id=<?php echo $row1["P_ID"]; ?>&Stock=<?php echo $row1["QTY"];?>"><button type="button">Delete</button> </a><?php echo "</td>";
		}
        
        echo "</tr>";
     	echo "</div>";
	}
}	

	?>		
		 </table>
			</div>
		</div>
</body>
</html>
	<?php
}
	?>