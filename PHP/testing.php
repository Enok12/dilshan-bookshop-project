<?php
session_start();
include_once 'connection.php';


$sql0= "SELECT a.ID,b.GRN_ID,b.P_ID, a.Availability, c.Handling_Type FROM grn_details a, order_table b, product c WHERE b.Transaction_No = 'TR0012' and a.ID = b.GRN_No and a.Activation_Status = 'Active' and b.P_ID = c.P_ID
			";
			$query0 = mysqli_query($conn,$sql0);
			if (mysqli_num_rows($query0) > 0) {
   				 while ($row7=mysqli_fetch_array($query0)) {
					$GRN_ID0[] = $row7["GRN_ID"];
					$GRN_No0[] = $row7["ID"];
					$P_ID0[] = $row7["P_ID"];
					$Availability[] = $row7["Availability"];
					$Handle[] = $row7["Handling_Type"];
  
       			 }

		for ($i=0; $i < count($P_ID0); $i++) { 
            echo $P_ID0[$i]; echo "<br>";
		if ($Availability[$i] == 0 && $Handle[$i] == "Automatic"){
            $sql77= "SELECT * FROM `grn_details` WHERE Activation_Status = 'Deactivated' AND P_ID = '".$P_ID0[$i]."' ORDER BY ID ASC LIMIT 1;";
			$query77 = mysqli_query($conn,$sql77);
			while ($row87=mysqli_fetch_array($query77)) {
                $GRN_ID32 = $row87["ID"];
            }
		echo $GRN_ID32; echo "<br>";
        $sql21= "UPDATE `grn_details` SET `Activation_Status`= 'Active' WHERE ID = '$GRN_ID32';";
		$query21 = mysqli_query($conn,$sql21);
            }
        }

    }

?>