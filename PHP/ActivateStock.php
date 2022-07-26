<?php
session_start();
include_once 'connection.php';

$id = $_GET['id']; //GRN ID(Unique)
$p_id = $_SESSION["P_ID"];

$query = "UPDATE `grn_details` SET `Activation_Status`='Active' WHERE ID = '$id'
 ";

 $query2 = "SELECT * FROM `grn_details` WHERE Activation_Status = 'Active' AND P_ID = '$p_id'";


 $result = mysqli_query($conn, $query2);
 if(mysqli_num_rows($result) == 1)
{
    echo "<script>alert('A Stock of this item is currently active. Please Deactivate or Wait until the active stock of this product is finished');</script>";
    header("refresh:0; url=Managestocks.php");
}else{
    $result2 = mysqli_query($conn, $query);
    echo "<script>alert('STOCK IS SUCCESSFULLY ACTIVATED');</script>";
    header("refresh:0; url=Managestocks.php");
    
}

?>