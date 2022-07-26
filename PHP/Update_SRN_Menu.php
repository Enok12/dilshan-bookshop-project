<?php
session_start();
include_once 'connection.php';

if(!isset($_SESSION['AdminUser_name'])){
	echo "<script>alert('Please Login to the System');</script>";
	header("refresh:0; url=Admin_login.php");
}else{

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
</head>
<body>
	<div class="container-fluid" align="center">
		<a href="index.php">
			<img src="../images/dbshoplogo.png" width="300" height="300" alt="" class="fadeInUp" />
		</a>
	</div>
	
	<div class="container" align="center">
		<a href="STSRN_Update.php">
			<input type="submit" value="BACK TO SEARCH SRN" style="font-size: 1.5vw;">
		</a>
	</div>
	<br>
	
	<div class="container-fluid">
		<div class="container" style="background-color: #ffffff; padding: 20px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">
	  <h3>SRN Details</h3>  
                <div class="table-responsive">
   					<table class="table table bordered">
                          <tr>  
                               <th >SRN No </th>  
                               <th >Date</th>  
							   <th >View</th>  
							  <th >Action</th> 
                          </tr> 
	<?php
	$sql = "SELECT *
			FROM grn
			WHERE Received_Date BETWEEN '".$_SESSION['FromDate11']."' AND '".$_SESSION['ToDate11']."' and Status = 'R'";
						 
	$query = mysqli_query($conn,$sql);
	if (mysqli_num_rows($query) > 0) {
		$n=0;
		while ($row=mysqli_fetch_array($query)) {
				$n++;
				$GRN = $row["GRN"];
				$Date = $row["Received_Date"];
			
			echo "<tr>";
			echo "<td>"; echo $row["GRN"];"</td>";
			echo "<td>"; echo $row["Received_Date"]."</td>";
			echo "<td>"; ?><a href="View_SRN_Records2.php?id=<?php echo $GRN = $row["GRN"];?>"><button type="button">View</button> </a><?php echo "</td>";
			echo "<td>"; ?><a href="View_SRN_Records.php?id=<?php echo  $row["GRN"];?>"><button type="button">Update</button> </a><?php echo "</td>";
			echo "</tr>";
	 		echo "</div>";	
		}
	}else{
		echo "<script>alert('NO RESULTS');</script>";
	header("refresh:0; url=STSRN_Update.php");
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