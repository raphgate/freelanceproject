<?php
include_once 'auth/session.php';
include_once 'auth/dbc.php';
if (isset($_POST['lgn'])) {

$password=mysqli_real_escape_string($con, trim($_POST['password']));
$email=mysqli_real_escape_string($con, trim($_POST['username']));
$conn=mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password' OR username='$email' AND password='$password'");
$conn1=mysqli_num_rows($conn);
	   while ($row=mysqli_fetch_assoc($conn)) {
	   		$user_id=$row['id'];
	   		$email=$row['email'];
	   		$username=$row['username'];
	   		if ($conn1>0) {
	   			$_SESSION['email']=$email;
	   			$_SESSION['id']=$user_id;
	   		if ($row['email']=='eBrang@info.com') {
	   			print'<script>window.location.assign("admin/Adminportal.php")</script>';	
	   		}else{
	   			print'<script>window.location.assign("admin/home.php")</script>';
	   		}
	   				   		
	   			}	
	  		 }print'<script>window.location.assign("login.php?err=1")</script>';

	}
?>