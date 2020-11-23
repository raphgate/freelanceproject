<?php 
include_once '../../auth/session.php';
include_once '../../auth/dbc.php';
require "../../auth/access_levels.php";
$query=mysqli_query($con, "UPDATE users SET notifications=1");

?>
<span class="label label-danger" id="omo"><i class="glyphicon glyphicon-circle" >!</i></span>