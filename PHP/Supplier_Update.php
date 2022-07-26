<?php
//fetch.php
include_once 'connection.php';
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM supplier 
  WHERE S_Name LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM supplier ORDER BY S_ID
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 echo "
  <div class='table-responsive'>
   <table class='table table bordered'>
    <tr>
     <th>Supplier Name</th>
     <th>Supplier Descritpion</th>
     <th>Supplier Address</th>
     <th>Supplier Mobile Number</th>
     <th>Supplier Email</th>
	 
    </tr>
 ";
 while($row = mysqli_fetch_array($result))
 {
	 $S_ID = $row['S_ID'];
	 $S_Name = $row['S_Name'];
	 $S_Description = $row['S_Description'];
	 $S_Telephone = $row['S_Telephone'];
	 $S_Email = $row['S_Email'];
	 $S_Address = $row['S_Address'];
	 
   echo "<tr>";
	echo "<td>"; echo $S_Name;"</td>";
	 echo "<td>"; echo $S_Description;"</td>";
	 echo "<td>"; echo $S_Address;"</td>";
	 echo "<td>"; echo $S_Telephone;"</td>";
	 echo "<td>"; echo $S_Email;"</td>";
		echo "<td>"; ?><a href="Supplier_Edit_Menu.php?id=<?php echo $S_ID;?>"><button type="button">Edit</button> </a><?php echo "</td>";
		echo "</tr>";
	 echo "</div>";
 }
 
}
else
{
 echo 'Data Not Found';
}


?>

