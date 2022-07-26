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
  OR P_Description LIKE '%".$search."%' 
 ";
}
else
{
 $query = "
  SELECT * FROM product ORDER BY P_ID limit 5
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){
  echo "<div class='table-responsive'>
   <table class='table table bordered'>
    <tr>
     <th>Product ID</th>
     <th>Product Name</th>
     <th>Product Description</th>
	 <th>Action</th>
    </tr>";
 while($row = mysqli_fetch_array($result)){
	 $mid = $row['P_ID'];
	 $name = $row['P_Name'];
	 $Desc = $row['P_Description'];
	 
	
	 echo "<tr>";
		echo "<td>"; echo $mid;"</td>";
		echo "<td>"; echo $name;"</td>";
		echo "<td>"; echo $Desc;"</td>";
		echo "<td>"; ?><a href="Insert_GRN.php?id=<?php echo $mid;?>"><button type="button">Select</button> </a><?php echo "</td>";
		echo "</tr>";
	 echo "</div>";
 }
}
else{
 echo 'Data Not Found';
}
?>

