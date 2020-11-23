<?php

require "../../auth/access_levels.php";
$ownerid=mysqli_real_escape_string($con, $_POST['id']);
$project_id=mysqli_real_escape_string($con, $_POST['project']);
$query=mysqli_query($con, "UPDATE showcaseupload SET likes=likes+1 WHERE id='".$project_id."' AND post_id='".$ownerid."' ");
   $query=mysqli_query($con, "SELECT * FROM showcaseupload WHERE id='".$project_id."'  ");
   $row=mysqli_fetch_array($query);
?>

  <div class="" id="countlikes">
            <p>Like</p>
            <a href="#" class="btn btn-outline btn-primary" onclick="addlikes(<?php echo $row['post_id']; ?>,<?php echo $row['id'];?>)"><i class="fa fa-heart-o"></i></a> 
            <?php echo $row['likes']; ?>
             Like(s)
        </div>