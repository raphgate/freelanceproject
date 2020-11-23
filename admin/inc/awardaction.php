<?php
require "../../auth/access_levels.php"; 
$product_id=$_POST['product_id'];
$activate_id=$_POST['userid'];
$owner_id=$_POST['ower_id'];
$date=date("Y-m-d h:i:sa");
$productamont=$_POST['productamont'];
$check=$_POST['check'];
if ($check==2) {
	mysqli_query($con, "INSERT INTO bids (id,bidAmount,post_id,bider_id,date,project_id) VALUES ('','".$productamont."','".$owner_id."','".$activate_id."','".$date."','".$product_id."') ");
}
$query=mysqli_query($con, "UPDATE bids SET status=1 WHERE project_id='$product_id' ");
$query2=mysqli_query($con, "INSERT INTO currentworks(project_id,owner_id,activated_id,awardedPrice,date)VALUES('$product_id','$owner_id','$activate_id','$productamont','$date')");
if ($query2==true) {
print '<script>window.location.assign("../project.php")</script>';
}

?>