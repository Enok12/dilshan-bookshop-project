<?php
session_start();
include_once 'connection.php';

if(!isset($_SESSION['AdminUser_name'])){
	echo "<script>alert('Please Login to the System');</script>";
	header("refresh:0; url=Admin_login.php");
}else{
	
	if(isset($_GET['id'])){
		$_SESSION['Transaction_No'] = $_GET['id'];
	}else{
		echo "<script>alert('Select a Transaction');</script>";
	header("refresh:0; url=ManageTransactions_Menu.php");
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/stylebody1.css">
	<link rel="stylesheet" href="../css/stylenavbar.css">
	<link rel="stylesheet" href="../css/stylefooter.css">
	<link rel="stylesheet" href="../css/stylecarousel.css">
<title>Untitled Document</title>
	<script src="Validations.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
</head>
</head>

<body>
	
	<br>
	<br>
	<br>
	<div class="container-fluid">
		<div class="container" style="background-color: #ffffff; padding: 20px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">
			<h3>TRANSACTION NUMBER : <?php echo $_SESSION['Transaction_No']; ?></h3>
		<div class="table-responsive">
   					<table class="table table-striped table-bordered rounded">
                          <tr>  
							   
                               <th >Product Name</th>
							   <th >GRN Number</th>  
							  <th style = 'text-align:center;' >Quantity</th>
							  <th  style = 'text-align:center;'>Selling Price</th>
							  <th  style = 'text-align:center;'>Total</th> 
                          </tr> 
	<?php
	$sql = "SELECT * FROM order_table a, Product b WHERE a.P_ID =b.P_ID and Transaction_No = '".$_SESSION['Transaction_No']."'";
	$rows = mysqli_query($conn,$sql);
						
	$Total = 0;
		while ($row1 = mysqli_fetch_array($rows)) 
	{
         $Sum = $row1["Sell_P"] * $row1["qty"];
			$Total = $Total + $Sum;
		
		echo "<tr>";
			echo "<td>"; echo $row1["P_Name"];"</td>";
			echo "<td>"; echo $row1["GRN_ID"];"</td>";
			echo "<td  style = 'text-align:center;'>"; echo $row1["qty"];"</td>";
			echo "<td style = 'text-align:right;'>Rs. "; echo $row1["Sell_P"];"</td>";
			echo "<td style = 'text-align:right;'>Rs. "; echo $Sum; echo "</td>";
			echo "</tr>";
			echo "</div>";
			echo "</div>";
	}
	echo "<td colspan=2>";"</td>";
	/*echo "<td>";"</td>";*/
	echo "<td  style = 'text-align:right;'><strong>Total</strong> ";"</td>";
	echo "<td style = 'text-align:right;'>Rs. "; echo $Total;"</td>";			
	?>
		</table>
			</div>
		</div>
					
</body>
</html>

<?php
}
?>