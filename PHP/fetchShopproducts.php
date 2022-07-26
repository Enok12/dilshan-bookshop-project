<?php
session_start();
include_once 'connection.php';
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
 SELECT a.P_Image,a.P_ID,a.P_Name,a.P_Description,b.S_P,b.Availability FROM product a,grn_details b WHERE P_Name LIKE '%".$search."%' and a.P_ID = b.P_ID and b.Activation_Status = 'Active'
 ";

 

}
else
{
 $query = "
 SELECT a.P_Image,a.P_ID,a.P_Name,a.P_Description,b.S_P,b.Availability FROM product a,grn_details b WHERE a.P_ID = b.P_ID and b.Activation_Status = 'Active' ORDER BY P_ID
 ";
}
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
	$P_ID = $row["P_ID"];

	
	 $Stock = $row["Availability"];
	
	 if ($Stock < 1){
		  
		 echo '<div class="col-lg-4">
		<div class="card" style="width:250px">
		<img class="card-img-top"src="images/'.$row["P_Image"].'" alt="Card image" style="width:100%;">
		<div class="card-body" align="center">
		 <h6 class="card-title">'.$row["P_Name"].'</h6>
		 <p class="card-text" style="font-size:15px;"><em>('.$row["P_Description"].')</em></p>
		<p class="card-text" style="font-size:20px; color: #c80c0c;"><strong>LKR '.$row["S_P"].'</strong></p>
		<br>
		<a onClick="javascript:void(0)" class="btn btn-secondary rounded">NOT AVAILABLE</i></a>
		</div>
		</div>		
		</div>';
		 
	 }elseif($Stock >= 1 && $Stock <=10){
		 echo ' <div class="col-lg-4">
									<div class="card" style="width:250px">
										<img class="card-img-top" src="images/'.$row["P_Image"].'" alt="Card image" style="width:100%;">
										<div class="card-body" align="center">
										  <h6 class="card-title">'.$row["P_Name"].'</h6>
										  <p class="card-text" style="font-size:15px;"><em>('.$row["P_Description"].')</em></p>
									  	<p class="card-text" style="font-size:20px; color: #c80c0c;"><strong>LKR '.$row["S_P"].'</strong></p>
											<a onClick="javascript:void(0)"" class="btn btn-danger rounded">HURRY UP '.$row["Availability"].' LEFT!!</i></a>
											<br>
											<br>
											<form method = "post">
											<div class="input-group">
												  <input type="number" name="quantity" class="form-control input-number" value="10" min="1" max="25"> 
											</div>
											<br>';
											?><input type="hidden" name="hidden_ID" value="<?php echo $row["P_ID"]; ?>"><?php
										 echo ' <button type="submit" name = "add_to_cart" class="btn btn-primary rounded"><i class="fa fa-cart-plus fa-2x"></i></button>
										</div>
									  </div>
									  </div>
									   </form>
									
									';
	 }
	 else{
		echo '<div class="col-lg-4">
								<!--PHP Code for Search Actual-->
								<div class="card" style="width:250px">
									<img class="card-img-top" src="images/'.$row["P_Image"].'" alt="Card image" style="width:100%;">
									<div class="card-body" align="center">
									  <h6 class="card-title">'.$row["P_Name"].'</h6>
									  <p class="card-text" style="font-size:15px;"><em>('.$row["P_Description"].')</em></p>
									  <p class="card-text" style="font-size:20px; color: #c80c0c;"><strong>LKR '.$row["S_P"].'</strong></p>
									  <form method = "post">
										<div class="input-group">
											  <input type="number" name="quantity" class="form-control input-number" value="10" min="1" max="25">
										</div>
										<br>
										';
									?><input type="hidden" name="hidden_ID" value="<?php echo $row["P_ID"]; ?>"><?php
								echo'
								<button type="submit" name = "add_to_cart" class="btn btn-primary rounded"><i class="fa fa-cart-plus fa-2x"></i></button>
										
									</div>
								  </div>
								  </div>
								  </form>
								
								';
	 }
 }

}
else
{
 echo 'No items Found';
}


?>

