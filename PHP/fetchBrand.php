<?php
//fetch.php
include_once 'connection.php';
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM brand 
  WHERE B_Name LIKE '%".$search."%' 
 ";
}
else
{
 $query = "
  SELECT * FROM brand ORDER BY B_ID
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
  echo "<div class='table-responsive'>
   <table class='table table bordered'>
    <tr>
	<th>Brand ID </th>
     <th>Brand Name</th>
    </tr>"
 ;
 while($row = mysqli_fetch_array($result))
 {
	 $B_ID = $row['B_ID'];
	 $B_Name = $row['B_Name'];
	
	
	
	 echo "<tr>";
	 echo "<td>"; echo $B_ID;"</td>";
		echo "<td>"; echo $B_Name;"</td>";
		
		echo "</tr>";
	 echo "</div>";
   		

  
 }
	
}
else
{
 echo 'Data Not Found';
}


?>

