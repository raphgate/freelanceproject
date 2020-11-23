<?php 
require "../../auth/access_levels.php";
$amount=$_POST['amount'];
$checkquery=mysqli_fetch_array(mysqli_query($con, "SELECT wallet FROM users WHERE id='".$user_id."' "));
if ($checkquery['wallet']>=$amount) {
	echo "<h3 style='color:green'>Request was successfull <br> Awaiting Approval </h3>";
	$updatewallet=mysqli_query($con, "UPDATE users SET Amount_request='".$amount."',Confirm_status='Awaiting Approval' WHERE id='".$user_id."' ");
}elseif ($checkquery['wallet']<$amount) {
	echo "<h3 style='color:red'>Oops sorry insufficient fund</h3>";
}else{
   echo "<h3 style='color:pink'>Oops Something went wrong try again!</h3>";
}


?>