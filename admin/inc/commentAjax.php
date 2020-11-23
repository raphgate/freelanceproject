<?php
require "../../auth/access_levels.php"; 
$msg=$_POST['msg'];
$blog_id=$_POST['blog_id'];
$post_id=$_POST['post_id'];
$date=date("Y-m-d h:i:sa");
 function humanTiming ($time){

      $time = time() - $time; // to get the time since that moment
      $time = ($time<1)? 1 : $time;
      $tokens = array (
          31536000 => 'year',
          2592000 => 'month',
          604800 => 'week',
          86400 => 'day',
          3600 => 'hour',
          60 => 'minute',
          1 => 'second'
      );

      foreach ($tokens as $unit => $text) {
          if ($time < $unit) continue;
          $numberOfUnits = floor($time / $unit);
          return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
      }

  }

      $query1=mysqli_query($con, "INSERT INTO blogcomments (id,comment_id,blog_id,comment,comment_date) VALUES ('','".$post_id."','".$blog_id."','".$msg."','".$date."') ");
      $comm=mysqli_query($con, "SELECT * FROM blogcomments WHERE blog_id='".$blog_id."' ORDER BY id DESC LIMIT 50 ");
      $comm1=mysqli_num_rows($comm);
while ($row=mysqli_fetch_array($comm)) {
    $usercomm=mysqli_query($con, "SELECT * FROM users WHERE id='".$row['comment_id']."' ");
     $usercomm1=mysqli_fetch_array($usercomm);

?>	
	<div class="social-feed-box" id="comm">
        <div class="social-avatar">
            <a href="#" class="pull-left">
                <?php echo '<img src="upload/profile/'.$usercomm1['pix'].'" class="img img-responsive">';?>
            </a>
            <div class="media-body">
                <a href="#">
            <?php if($usercomm1['username']!==""){
           echo $usercomm1['username'];}
           elseif($usercomm1['username']==""){
            echo $usercomm1['first_name']." ".$usercomm1['last_name'];
          } ?>
                </a>
                <small class="text-muted">
            <?php   $time = strtotime($row['comment_date']);
            echo humanTiming($time);  ?> ago
                </small>
            </div>
        </div>
        <div class="social-body">
            <p>
              <?php echo $row['comment']; ?>
            </p>
        </div>
    </div>


     <?php } ?>