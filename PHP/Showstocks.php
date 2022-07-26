<?php
//fetch.php
include_once 'connection.php';
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM product 
  WHERE P_Name LIKE '%".$search."%'
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
 echo "
  <div class='table-responsive'>
   <table class='table table bordered'>
    <tr>
    <th>Product ID </th>
     <th>Product Name </th>
     <th>Show Stock</th>
  
	 
    </tr>
 ";
 while($row = mysqli_fetch_array($result))
 {
	 $P_ID = $row['P_ID'];
	 $P_Name = $row['P_Name'];

	 
   echo "<tr>";
	echo "<td>"; echo $P_ID;"</td>";
	 echo "<td>"; echo $P_Name;"</td>";
		echo "<td>"; ?><a href="Stockdetails.php?id=<?php echo $P_ID;?>"><button type="button">SHOW STOCKS</button> </a><?php echo "</td>";
		echo "</tr>";
	 echo "</div>";
 }
 
}
else
{
 echo 'Data Not Found';
}


?>

