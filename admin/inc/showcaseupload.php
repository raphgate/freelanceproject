<?php
require "../../auth/access_levels.php"; 
$showcasecategory=mysqli_real_escape_string($con, $_POST['showcasecategory']);
$showcasesubcategory=mysqli_real_escape_string($con, $_POST['showcasesubcategory']);
$showcasemoney=mysqli_real_escape_string($con, $_POST['showcasemoney']);
$showcasecurrency=mysqli_real_escape_string($con, $_POST['showcasecurrency']);
$showcasedescribe=mysqli_real_escape_string($con, $_POST['showcasedescribe']);
$showcasetitle=mysqli_real_escape_string($con, $_POST['showcasetitle']);
$showcasetype=mysqli_real_escape_string($con, $_POST['showcasetype']);
	// if ($_FILES["file"]["error"] !==" ") {	
	// foreach ($_FILES["file"]["error"] as $key => $error) {
    // if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["pics"]["tmp_name"];
        $name = basename($_FILES["pics"]["name"]);
        $target="../../admin/upload/".$name;
        move_uploaded_file($tmp_name, $target);
		$showcasequery=mysqli_query($con, "INSERT INTO showcaseupload (id,showcasecategory,showcasesubcategory,showcasemoney,showcasecurrency,showcasedescribe,showcasetitle,showcasetype,documents,post_id) VALUES ('','$showcasecategory','$showcasesubcategory','$showcasemoney','$showcasecurrency','$showcasedescribe','$showcasetitle','$showcasetype','".$name."','".$user_id."') ");
		if ($showcasequery==true) {
			header("location:../showroom.php");
		}
// }
// }}
?>