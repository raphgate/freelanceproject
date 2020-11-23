<?php
include_once '../../auth/session.php';
include_once '../../auth/dbc.php';
require "../../auth/access_levels.php"; 

$amount=mysqli_real_escape_string($con, $_POST['amount']);
$days=mysqli_real_escape_string($con, $_POST['days']);
$projectID=mysqli_real_escape_string($con, $_POST['pid']);
$date=date("Y-m-d h:i:sa");
$skills=mysqli_real_escape_string($con, $_POST['skillrequired']);
$postid=mysqli_real_escape_string($con, $_POST['post_id']);
$charge=mysqli_real_escape_string($con, $_POST['percentage']);

$milestone=mysqli_real_escape_string($con, $_POST['milestone']);
$question=mysqli_real_escape_string($con, $_POST['question']);
$summarise=mysqli_real_escape_string($con, $_POST['summarise']);
$description=mysqli_real_escape_string($con, $_POST['description']);

$checkquery=mysqli_query($con, "SELECT * FROM bids WHERE project_id='$projectID' AND bider_id='$user_id' ");
$checkqueryrow=mysqli_num_rows($checkquery);
if ($checkqueryrow>0) {
	$updatequery=mysqli_query($con, "UPDATE bids SET bidAmount='$amount',charges='$charge',deliveryTime='$days' WHERE project_id='$projectID' AND bider_id='$user_id' ");
}
else{
	$query1=mysqli_query($con, "INSERT INTO bids(id,bidAmount,charges,post_id,bider_id,project_id,deliveryTime,skillRequired,status,date,bidMilestoneAmount,bidMilestoneDescription,bidSummary,question)VALUES('','$amount','$charge','$postid','$user_id','$projectID','$days','$skills','0','$date','$milestone','$description','$summarise','$question')");
}



?>