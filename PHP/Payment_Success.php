<?php
session_start();
include_once 'connection.php';

$user_id = $_SESSION["customerusername"];

if(isset( $_POST['Creditcard'])){
	
}else{
	echo "<script>alert('Select Card to process Transaction ');</script>";
			header("refresh:0; url=Checkout.php");
}
$creditcard = $_POST['Creditcard'];


?>


<?php
// Auto ID for Sub Categories
$query = "select * from order_table order by Transaction_No desc limit 1";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$lastid = $row['Transaction_No'];
if($lastid == "")
{
	$number = "TR0001";
}
else
{
	$pid = str_replace("TR","",$lastid);
	$proid = str_pad($pid + 1, 4,0, STR_PAD_LEFT);
	$number = "TR" . $proid;
}

?>

<?php
$sql = "SELECT * FROM cart WHERE Username = '$user_id'";
		$query = mysqli_query($conn,$sql);
		if (mysqli_num_rows($query) > 0) {
			# code...
			while ($row=mysqli_fetch_array($query)) {
			$product_id[] = $row["P_ID"];
			$qty[] = $row["QTY"];
			$C_P[] = $row["Cost_P"];
			$S_P[] = $row["Sell_P"];
			$GRN_ID[] = $row["GRN_ID"];
			$GRN_No[] = $row["GRN_No"];
			}
			for ($i=0; $i < count($product_id); $i++) { 
				$sql23 = "INSERT INTO order_table (Username,P_ID,qty,Transaction_No,Tr_Date, Cost_P,Sell_P,Status,Status_2,GRN_ID,GRN_No) VALUES ('$user_id','".$product_id[$i]."','".$qty[$i]."','$number','". date("Y-m-d") ."','".$C_P[$i]."','".$S_P[$i]."','Pending','ACTIVE','".$GRN_ID[$i]."','".$GRN_No[$i]."')";
				mysqli_query($conn,$sql23);
				$_SESSION['Status'] = "OK";
			}
			
			if($_SESSION['Status'] == "OK"){
				//Updating Stock
				for ($i=0; $i < count($product_id); $i++) { 
				$sql2= "UPDATE grn_details SET Availability = Availability -'$qty[$i]' WHERE P_ID ='$product_id[$i]' AND Activation_Status = 'Active'";
				mysqli_query($conn,$sql2);
			}

			$sql0= "SELECT a.ID,b.GRN_ID,b.P_ID, a.Availability, c.Handling_Type FROM grn_details a, order_table b, product c WHERE b.Transaction_No = '$number' and a.ID = b.GRN_No and a.Activation_Status = 'Active' and b.P_ID = c.P_ID
			";
			$query0 = mysqli_query($conn,$sql0);
			if (mysqli_num_rows($query0) > 0) {
   				 while ($row7=mysqli_fetch_array($query0)) {
					$GRN_ID0[] = $row7["GRN_ID"];
					$GRN_No0[] = $row7["ID"];
					$P_ID0[] = $row7["P_ID"];
					$Availability[] = $row7["Availability"];
					$Handle[] = $row7["Handling_Type"];
  
       			 }

        	for ($i=0; $i < count($P_ID0); $i++) { 
            if ($Availability[$i] == 0){
            $sql00= "UPDATE `grn_details` SET `Activation_Status`= 'OVER' WHERE ID = '".$GRN_No0[$i]."';";
            $query00 = mysqli_query($conn,$sql00);
               
            }else{
               //DO NOTHING
            }

			
        }
		for ($i=0; $i < count($P_ID0); $i++) { 
            echo $P_ID0[$i]; echo "<br>";
		if ($Availability[$i] == 0 && $Handle[$i] == "Automatic"){
            $sql77= "SELECT * FROM `grn_details` WHERE Activation_Status = 'Deactivated' AND P_ID = '".$P_ID0[$i]."' ORDER BY ID ASC LIMIT 1;";
			$query77 = mysqli_query($conn,$sql77);
			while ($row87=mysqli_fetch_array($query77)) {
                $GRN_ID32 = $row87["ID"];
            }
		echo $GRN_ID32; echo "<br>";
        $sql21= "UPDATE `grn_details` SET `Activation_Status`= 'Active' WHERE ID = '$GRN_ID32';";
		$query21 = mysqli_query($conn,$sql21);
            }
        }

		


    }
			$sql23 = "DELETE FROM cart WHERE Username = '$user_id'";
			mysqli_query($conn,$sql23);
			echo "<script>alert('Transaction Success');</script>";
				
			?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>THANK YOU</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' href='https://themes.audemedia.com/html/goodgrowth/css/owl.theme.default.min.css'>
	<link rel="stylesheet" href="../images/dbshoplogo.jpg">
</head>

<body>
	<div class="container">
  <img class="img-responsive" src="../images/THANK YOU POSTER.jpg" alt="Chania" width="99%" height="90%"> 
</div>
	<div class="container">
		<p id="count">10</p>
		<p>Redirecting to Home Page........</p>
	</div>
	<script type="text/javascript">
		var counter = 10;

		setInterval( function(){
			counter--;
			if( counter >= 0 ){
				id = document.getElementById("count");
				id.innerHTML = counter;
			}
		}, 1000);
	</script>
	
	</body>
</html>
			<?php
			header("refresh:10; url=Home.php");
			}
			else {
	
			echo "<script>alert('Transaction Failed');</script>";
				header("refresh:10; url=Cart_Page.php");
			}	
		}
?>

