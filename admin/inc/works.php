<?php
require "../../auth/access_levels.php";

      $tmpname=$_FILES["uploads"]["tmp_name"];
      $name = $_FILES["uploads"]["name"];
      $target="../../admin/upload/project/".$name;
      move_uploaded_file($tmpname, $target);
      $check=mysqli_query($con,"SELECT * FROM completedworks WHERE project_id='".$_POST['pId']."' ");
      $check1=mysqli_num_rows($check);
     if ($check1<1) {
   		 $query=mysqli_query($con, "INSERT INTO completedworks (id,documents,owner_id,activated_id,project_id,awardedPrice) VALUES ('','".$name."','".$_POST['owner_id']."','".$_POST['activated_id']."','".$_POST['pId']."','".$_POST['awardedPrice']."') ");
   		 if ($query==true) {
   		 	header("location:../sendworks.php?success=1");
   		 }
     }
     elseif ($check1>0) {
     	$update=mysqli_query($con, "UPDATE completedworks SET documents='".$name."' WHERE project_id='".$_POST['pId']."' ");
     	 if ($update==true) {
   		 	header("location:../sendworks.php?updated=1");
   		 }
     }
   

?>