<?php 
include_once '../../auth/session.php';
include_once '../../auth/dbc.php';
require "../../auth/access_levels.php";
$value=$_POST['value'];
$query=mysqli_query($con, "UPDATE bids SET notify='".$value."' WHERE post_id='".$user_id."'  ");
   $checkbidnotification=mysqli_query($con, "SELECT * FROM bids WHERE post_id='".$user_id."' AND notify=0 GROUP BY project_id ");
    $checkbidnotification1=mysqli_num_rows($checkbidnotification);
?>

 <span ><?php echo $checkbidnotification1; ?></span>
