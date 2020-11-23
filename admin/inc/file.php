<?php

require "../../auth/access_levels.php"; 
$Dani = (isset($_GET['use'])) ? $_GET['use'] : 0;
switch ($Dani) {
	case 'postdata':
	$projectName=mysqli_real_escape_string($con, $_POST['pname']);
	$currency=mysqli_real_escape_string($con, $_POST['slct1']);
	$projectdiscription=mysqli_real_escape_string($con, $_POST['pd']);
	$skillrequired=mysqli_real_escape_string($con, $_POST['skills']);
	$HowtoPay=mysqli_real_escape_string($con, $_POST['a']);
	$price=mysqli_real_escape_string($con, $_POST['slct2']);
	$date=date("Y-m-d h:i:sa");
	$user_id=mysqli_real_escape_string($con, $_POST['user']);
	$actualprice=mysqli_real_escape_string($con, $_POST['actualvalue']);
	$category=mysqli_real_escape_string($con, $_POST['push']);
	$sub_category=mysqli_real_escape_string($con, $_POST['txt']);
	$UID=mt_rand();
	$query=mysqli_query($con, "INSERT INTO projects (id,projectName,post_id,currency,projectDescribe,skillRequired,estimated_budget,postDate,howTopay,actualprice,category,sub_category,pro_id) VALUES ('','$projectName','$user_id','$currency','$projectdiscription','$skillrequired','$price','$date','$HowtoPay','$actualprice','$category','$sub_category','".$UID."')");
	$checkid= mysqli_query($con,"SELECT last_insert_id() AS last_id from projects WHERE post_id='$user_id'");
	while ($row=mysqli_fetch_assoc($checkid)) {
		$uid=$row['last_id'];
	}
	// if ($_FILES["pix"]["error"] !==" ") {
		
	// foreach ($_FILES["pix"]["error"] as $key => $error) {
 //    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["pix"]["tmp_name"];
        $name = basename($_FILES["pix"]["name"]);
        $target="../../admin/upload/project2/".$name;
        move_uploaded_file($tmp_name, $target);  
        $query1=mysqli_query($con, "INSERT INTO documents(post_id,pix,project_id)VALUES('$user_id','$name','$uid')");
   	     // }}
   	     // }
   	     	if ($query1) {
   	     		echo "Continue";
   	     	}
		
		break;

		case 'disputes':
			$title=mysqli_real_escape_string($con, $_POST['title']);
			$stmt=mysqli_real_escape_string($con, $_POST['stmt']);
			$tmp_name = $_FILES["pixel"]["tmp_name"];
	        $name = basename($_FILES["pixel"]["name"]);
	        $target="../../admin/upload/dispute/".$name;
	        move_uploaded_file($tmp_name, $target); 
	        $querydisputes=mysqli_query($con, "INSERT INTO disputes (id,titles,statements,files) VALUES ('','$title','$stmt','$name') ");
				if ($querydisputes) {
   	     		echo "Continue";
   	     	}
			break;
}
	
   	     	
?>

