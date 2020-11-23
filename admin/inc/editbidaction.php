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

$query1=mysqli_query($con, "UPDATE bids SET bidAmount='$amount',charges='$charge',post_id='$postid',bider_id='$user_id',project_id='$projectID',deliveryTime='$days',skillRequired='$skills',status='0' WHERE bider_id='$user_id' AND project_id='$projectID' ");






?>