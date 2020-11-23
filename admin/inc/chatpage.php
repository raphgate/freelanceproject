<?php
include_once '../../auth/session.php';
include_once '../../auth/dbc.php';
require "../../auth/access_levels.php";
$getid=$_POST['id'];
$update=mysqli_query($con, "UPDATE messagebox SET status=1 WHERE receive_id='".$getid."'");

$messagequery=mysqli_query($con, "SELECT * FROM messagebox WHERE receive_id='".$user_id."' AND status=0 GROUP BY sender_id");
$messagequery0=mysqli_num_rows($messagequery);
?>
<span  id="chatdisplay"><?php echo $messagequery0; ?></span>