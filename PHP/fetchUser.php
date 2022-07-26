<?php
//fetch.php
include_once 'connection.php';
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM admin 
  WHERE Username LIKE '%".$search."%' 
 ";
}
else
{
 $query = "
  SELECT * FROM admin ORDER BY Username
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Admin Username</th>
     <th>Admin Name</th>
     <th>Admin Address</th>
	 <th>Date of Birth</th>
     <th>Contact</th>
     <th>Email</th>
	
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["Username"].'</td>
    <td>'.$row["Name"].'</td>
     <td>'.$row["Address"].'</td>
	 <td>'.$row["DOB"].'</td>
	  <td>'.$row["Contact"].'</td>
	   <td>'.$row["Email"].'</td>
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

