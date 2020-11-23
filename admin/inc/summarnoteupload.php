<?php

require "../../auth/access_levels.php"; 

      $doc=mysqli_real_escape_string($con, $_POST['doc']);
      $text=mysqli_real_escape_string($con, $_POST['text']);
      $jobs=mysqli_real_escape_string($con, $_POST['skills']);
      $title=mysqli_real_escape_string($con, $_POST['title']);
      $tmpname=$_FILES["uploads"]["tmp_name"];
      $name = basename($_FILES["uploads"]["name"]);
      $target="../../admin/upload/blogs/".$name;
      move_uploaded_file($tmpname, $target);
      $date=date("Y-m-d h:i:sa");
      $query=mysqli_query($con, "INSERT INTO blogs (id,img,title,category,doc,description,date,post_id)VALUES('','".$name."','".$title."','".$jobs."','".$doc."','".$text."','".$date."','".$user_id."')");
      header("location:../blog.php");


 ?>