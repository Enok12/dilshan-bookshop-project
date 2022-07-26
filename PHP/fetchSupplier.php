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
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Supplier Name</th>
     <th>Supplier Descritpion</th>
     <th>Supplier Address</th>
     <th>Supplier Mobile Number</th>
     <th>Supplier Email</th>
	 
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["S_Name"].'</td>
    <td>'.$row["S_Description"].'</td>
     <td>'.$row["S_Address"].'</td>
	  <td>'.$row["S_Telephone"].'</td>
	   <td>'.$row["S_Email"].'</td>
	   
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}


?>

