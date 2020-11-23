<?php
require "../../auth/access_levels.php";
$updatebank=mysqli_query($con, "UPDATE users SET bank_name='".$_POST['bank_name']."',acc_num='".$_POST['acc_num']."',acc_name='".$_POST['acc_name']."',acc_type='".$_POST['acc_type']."' WHERE id='".$user_id."' ");

?>
