<?php
include_once '../../auth/session.php';
include_once '../../auth/dbc.php';
require "../../auth/access_levels.php";

	$query=mysqli_query($con, "SELECT password FROM users WHERE email='".$email."' ");
	$row=mysqli_fetch_array($query);
	$dbpassword=$row['password'];
		$cpass=$_POST['cpass'];
		$npass=$_POST['npass'];
		$npass1=$_POST['npass1'];
		if ($npass==$npass1) {
		if ($dbpassword==$cpass) {
			$passquery=mysqli_query($con, "UPDATE users SET password='".$npass."' WHERE email='".$email."' ");
			 header("location:../change-password.php?success=1");
		}elseif($dbpassword !==$cpass){
			 header("location:../change-password.php?err=1");
		}
	  }elseif($npass!==$npass1){
	  	// echo "password mismatch";
	   header("location:../change-password.php?error=2");
	  }

?>