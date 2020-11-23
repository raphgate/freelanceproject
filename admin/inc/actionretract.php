<?php
include_once '../../auth/session.php';
include_once '../../auth/dbc.php';
require "../../auth/access_levels.php"; 
if (isset($_POST['retract'])) {
	$projectId=$_POST['pid'];
$query=mysqli_query($con, "UPDATE bids SET status='1' WHERE project_id='$projectId' AND bider_id='$user_id' ");

	print("<script>window.location.assign('../project.php')</script>");
}


?>