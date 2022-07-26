 <?php
//fetch.php
include_once 'connection.php';
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM product 
  WHERE P_Name LIKE '%".$search."%' OR P_ID LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM product ORDER BY P_ID
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 
 echo " <div class='table-responsive'>
   <table class='table table bordered'>
    <tr>
     <th>Product Name</th>
     <th>Cost Price (AVG)</th>
     <th>Selling Price(AVG)</th>
     <th>Available Stock</th>
     <th> Total Average Earnings </th>
     <th> Average Profit</th>
	 
    </tr>";
 while($row = mysqli_fetch_array($result))
 {
$P_ID = $row["P_ID"];

$sql = "SELECT P_ID, SUM(Availability), AVG(S_P),AVG(C_P) FROM grn_details WHERE P_ID = '$P_ID' and Activation_Status = 'Active' or Activation_Status = 'Deactivated'";
$result2 = mysqli_query($conn, $sql);
while($row11 = mysqli_fetch_array($result2))
 {
    $Availability = $row11["SUM(Availability)"];
    $S_P = $row11["AVG(S_P)"];
    $C_P = $row11["AVG(C_P)"];
 }

	 $SellingPrice = $row["Sell_P"];
	  $Stock = $row["T_Stock"];
	 $Earnings =  $Availability* $S_P;
   $Total_CP =  $Availability* $C_P;
   $Profit = $Earnings - $Total_CP;
	  
  echo "<tr>";
			echo "<td>"; echo $row["P_Name"]; "</td>";
      echo "<td>Rd. "; echo $C_P; "</td>";
	echo "<td>Rd. "; echo $S_P; "</td>";
	 echo "<td>"; echo $Availability; "</td>";
	  echo "<td>Rs. "; echo $Earnings; "</td>";
    echo "<td>Rs. "; echo $Profit; "</td>";
			
  echo "</tr>";
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}


?>

