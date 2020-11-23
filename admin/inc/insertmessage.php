<?php
include_once '../../auth/session.php';
include_once '../../auth/dbc.php';
require "../../auth/access_levels.php";
if (isset($_POST['message'])) {
	  $tmpname=$_FILES["attach"]["tmp_name"];
      $name = basename($_FILES["attach"]["name"]);
      $target="../../admin/upload/".$name;
      move_uploaded_file($tmpname, $target);
	$date=date("Y-m-d h:i:sa");
	$message=mysqli_real_escape_string($con, $_POST['message']);
$messagequery=mysqli_query($con, "INSERT INTO messagebox (id,post,sender_id,receive_id,project_id,date_of_messages,files)VALUES('','".$message."','".$_POST['sender']."','".$_POST['reciever']."','".$_POST['project_id']."','".$date."','".$name."')");
if ($messagequery==true) {
	echo "yes";
}else{
	echo "No";
}
}

?>