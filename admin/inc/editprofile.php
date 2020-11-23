<?php
include_once '../../auth/session.php';
include_once '../../auth/dbc.php';
require "../../auth/access_levels.php";

if (isset($_POST['save'])) {
	$updatequery=mysqli_query($con, "UPDATE users SET first_name='".$_POST['first_name']."',last_name='".$_POST['last_name']."',Address='".$_POST['Address']."',city='".$_POST['city']."',State='".$_POST['State']."',Phone='".$_POST['Phone']."',Country='".$_POST['Country']."' WHERE id='".$user_id."' ");
	if($updatequery==true){
		header("location:../edit-profile.php?ok=1");
	}else{
		echo "editprofile error";
	}
}
?>
