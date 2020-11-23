<?php
require "../../auth/access_levels.php"; 
if(isset($_REQUEST["file"])){
	 $file = ($_REQUEST["file"]);
$query=mysqli_query($con, "DELETE  FROM disputes WHERE id='".$file."' ");
// if ($query) {
	header("location:../Admindisputes.php");
// }

}



?>