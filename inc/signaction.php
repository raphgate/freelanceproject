<?php
include_once'auth/session.php';
include 'auth/dbc.php';
if (isset($_POST['create'])) {
$email=mysqli_real_escape_string($con, trim($_POST['email']));
$password=mysqli_real_escape_string($con, trim($_POST['password']));
$username=mysqli_real_escape_string($con, trim($_POST['username']));
$userstatus=mysqli_real_escape_string($con, $_POST['selector']);
 $date=date("Y-m-d h:i:sa");
$check_email=mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
$count=mysqli_num_rows($check_email);
		if ($count>0) {
		print'<script>window.location.assign("login.php")</script>';
		}
		else{
		$UID=mt_rand();
		$query=mysqli_query($con, "SELECT id FROM users WHERE id='$UID'");
		$query1=mysqli_num_rows($query);
		if ($query1>0) {
			print'<script>window.location.assign("index.php?err=1")</script>';
		}else{
		$_SESSION['email']=$email;
		$conn=mysqli_query($con,"INSERT INTO users(id,email,password,userType,username,date_registered)VALUES('$UID','$email','$password','$userstatus','$username','$date') ");
		print'<script>window.location.assign("admin/home.php")</script>';
		}
		 }}
?>