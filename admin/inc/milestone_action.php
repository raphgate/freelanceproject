<?php
include_once '../../auth/session.php';
include_once '../../auth/dbc.php';
require "../../auth/access_levels.php"; 
$project_id=mysqli_real_escape_string($con, $_POST['p']);
$owner=mysqli_real_escape_string($con, $_POST['owner']);
$activ=mysqli_real_escape_string($con, $_POST['ac']);
$d=mysqli_real_escape_string($con, $_POST['d']);
$ac=mysqli_real_escape_string($con, $_POST['p']);
$query=mysqli_query($con, "INSERT INTO projectsaccount (id,project_id,request_id,payer_id,milestoneRequest,descriptions) VALUES ('','".$project_id."','".$activ."','".$owner."','".$ac."','".$d."') ");
// print('<script>window.location.assign("home.php")</script>');

?>