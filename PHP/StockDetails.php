<?php
session_start();
include_once 'connection.php';

if(!isset($_SESSION['AdminUser_name'])){
	echo "<script>alert('Please Login to the System');</script>";
	header("refresh:0; url=Admin_login.php");
}else{
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
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
	
</head>

<body>



<?php
$id = $_GET['id'];
$_SESSION["P_ID"] = $id
?>
<div class="container-fluid">
		<div class="container" style="background-color: #ffffff; padding: 20px; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);">
			<h3><strong>AVAILABLE STOCKS for <?php echo $id ?></strong></h3>

            <?php
$query = "
SELECT * FROM `grn_details` WHERE P_ID = '$id' and Activation_Status = 'Deactivated'
 ";

 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0)
{
 echo "
  <div class='table-responsive'>
   <table class='table table bordered'>
    <tr>
    <th>GRN ID </th>
     <th>Quantity </th>
     <th>Activation Status</th>
  
	 
    </tr>
 ";
 while($row = mysqli_fetch_array($result))
 {
    $Unique_ID = $row['ID'];
	 $GRN_ID = $row['GRN_ID'];
	 $QTY = $row['QTY'];

	 
   echo "<tr>";
	echo "<td>"; echo $GRN_ID;"</td>";
	 echo "<td>"; echo $QTY;"</td>";
		echo "<td>"; ?><a href="ActivateStock.php?id=<?php echo $Unique_ID;?>"><button type="button">ACTIVATE</button> </a><?php echo "</td>";
		echo "</tr>";
	 echo "</div>";
 }
 
}
else
{
 echo 'Data Not Found';
}
?>
	</div>
			</div>	
</body>
</html>


<?php
}
?>