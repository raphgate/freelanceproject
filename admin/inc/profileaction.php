<?php
include_once '../../auth/session.php';
include_once '../../auth/dbc.php';
require "../../auth/access_levels.php";

      $tmpname=$_FILES["uploads"]["tmp_name"];
      $name = basename($_FILES["uploads"]["name"]);
      $target="../../admin/upload/profile/".$name;
      move_uploaded_file($tmpname, $target);
      $query=mysqli_query($con, "UPDATE users SET pix='".$name."' WHERE id='".$user_id."' ");
      if ($query==true) {
      	      	header("location:../profile.php");
      }

?>