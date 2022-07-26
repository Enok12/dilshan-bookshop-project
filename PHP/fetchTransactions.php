<?php
//fetch.php
include_once 'connection.php';
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT DISTINCT Transaction_No,Tr_Date,Username,Status,Status_2 FROM order_table where Transaction_No LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT DISTINCT Transaction_No,Tr_Date,Username,Status,Status_2 FROM order_table ORDER BY Transaction_No DESC
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 echo " <div class='table-responsive'>
   <table class='table table bordered'>
    <tr>
     <th>Transaction Number</th>
     <th>Transaction Date</th>
     <th>Customer Username</th>
	 <th>Status</th>
	 <th>ACTIVE/INACTIVE</th>
	  <th>Action</th>
	 
    </tr>";
 while($row = mysqli_fetch_array($result))
 {
  echo "<tr>";
	 echo "<td>"; echo $row["Transaction_No"]; "</td>";
	echo "<td>"; echo $row["Tr_Date"]; "</td>";
	echo "<td>"; echo $row["Username"]; "</td>";
	 if($row["Status"] == "Approved"){
		 echo "<td style = 'color:green;'><strong>"; echo $row["Status"]; "</strong></td>";
	 }else{
		  echo "<td style = 'color:red;'><strong>"; echo $row["Status"]; "</strong></td>";
	 }
	 if($row["Status_2"] == "ACTIVE"){
		  echo "<td style = 'color:green;'><strong>"; echo $row["Status_2"]; "</strong></td>";
		  echo "<td>"; ?><a href="UpdateTransaction.php?id=<?php echo $row["Transaction_No"];?>"><button type="button">View</button> </a><?php echo "</td>";
	 echo "<td>"; ?><a href="DeleteWholeTransaction.php?id=<?php echo $row["Transaction_No"];?>" onClick="return  confirm('Do you want to Deactivate this Transaction?')"><button type="button">Deactivate</button> </a><?php echo "</td>";
  echo "</tr>";
	 }else{
		  echo "<td style = 'color:red;'><strong>"; echo $row["Status_2"]; "</strong></td>";
		 echo "<td>"; ?><a href="UpdateTransaction.php?id=<?php echo $row["Transaction_No"];?>"><button type="button">View</button> </a><?php echo "</td>";
	
	 }
	
 }
}
else
{
 echo 'Data Not Found';
}


?>

