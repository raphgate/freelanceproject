<?php
require "../../auth/access_levels.php";
$getid=$_POST['id'];
$getownerid=$_POST['owner_id'];
$getpid=$_POST['pid'];
$checkproject=mysqli_query($con, "SELECT * FROM projects WHERE post_id='".$user_id."' ");
$checkproject1=mysqli_num_rows($checkproject);

if ($checkproject1>0) {
		echo '
		<form action="">
			<input type="hidden"  name="pid" >
			<span class="btn btn-info" onclick="bider('.$getpid.','.$getownerid.','.$getid.')">Click Award</span>
		</form>
		     ';  
}elseif($checkproject1==0){
    echo "Notice! Post a project before you can use this feature";
}
?>
