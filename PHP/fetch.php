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
  SELECT * FROM product ORDER BY P_ID
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Product ID</th>
     <th>Product Name</th>
     <th>Product Description</th>
	 <th>Box Quantity</th>
	 <th>Image</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td><br><br>'.$row["P_ID"].'</td>
    <td><br>'.$row["P_Name"].'</td>
     <td><br>'.$row["P_Description"].'</td>
	 <td><br>'.$row["NOI_Box"].'</td>
	    <td><img src="images/'.$row["P_Image"].'" height = 100px width =100px </td>
	   
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

