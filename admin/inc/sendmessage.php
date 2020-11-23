<?php
require "../../auth/access_levels.php";
$date=date('Y-m-d h:i:sa');
$mesg=mysqli_query($con, "INSERT INTO messagebox (id,post,sender_id,receive_id,date_of_messages)VALUES('','".$_POST['msg']."','".$_POST['sender_id']."','".$_POST['receive']."','".$date."')");

?>