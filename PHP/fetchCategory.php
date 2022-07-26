<?php
//fetch.php
include_once 'connection.php';
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM sub_category 
  WHERE SU_Name LIKE '%".$search."%' 
 ";
}
else
{
 $query = "
  SELECT * FROM sub_category ORDER BY C_ID
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
  echo "
  
  <div class='table-responsive'>
   <table class='table table-striped table-bordered rounded'>
    <tr>
	<th>Parent Category </th>
     <th>Category Name</th>
    </tr>"
 ;
 while($row = mysqli_fetch_array($result))
 {
	 $SU_ID = $row['SU_ID'];
	 $SU_Name = $row['SU_Name'];
	 $Parent_ID = $row['C_ID'];
	 $ParentName = '';
	 
	 $query2 = "
  SELECT * FROM Category where C_ID = '".$Parent_ID."' ";
	 $result1 = mysqli_query($conn, $query2);
	 while($row1 = mysqli_fetch_array($result1)){
		 $ParentName = $row1['C_Name'];
	 }
	
	
	 echo "<tr>";
	 echo "<td>"; echo $ParentName;"</td>";
		echo "<td>"; echo $SU_Name;"</td>";
		
	echo "</tr>";
	 echo "</div>";
	
   		

  
 }
	
}
else
{
 echo 'Data Not Found';
}


?>

