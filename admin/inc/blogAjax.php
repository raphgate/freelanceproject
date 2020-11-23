<?php

require "../../auth/access_levels.php"; 
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

$value=$_POST['value'];
$search=$_POST['search'];
?>

<?php
if ($value==0) {
	  $query=mysqli_query($con, "SELECT * FROM blogs ORDER BY id DESC");
    while ($row=mysqli_fetch_array($query)) {  
    $queryuser=mysqli_query($con, "SELECT * FROM users WHERE id='".$row['post_id']."' ");
    $queryuser1=mysqli_fetch_array($queryuser); 

?>
<div class="col-md-4">
    <div class="ibox">
        <div class="ibox-content">
            <div class="">
            	<a href="full-post.php?id=<?php echo base64_encode($row['id']); ?>" class="btn-link">
              <?php echo '<img src="upload/blogs/'.$row['img'].'" class="img img-responsive">';?>
          </a>
            </div>
            
            <a href="full-post.php" class="btn-link">
                <h2 class="font-bold">
                    <?php echo $row['title']; ?>
                </h2>
            </a>
            <div class="small m-b-xs">
                <strong>
                       <?php if($queryuser1['username']!=="")
                       echo $queryuser1['username'];
                       elseif($queryuser1['username']==""){
                        echo $queryuser1['first_name']." ".$queryuser1['last_name'];
                      } ?>
                </strong> <span class="text-muted"><i class="fa fa-clock-o"></i>
                <?php
                     $time = strtotime($row['date']);
                        echo humanTiming($time); 
                ?>  ago
                </span>
            </div>
            <p>
               <?php echo $row['description']; ?>
            </p>
            <div class="row">
                <div class="col-md-6">
                        <h5>Tags:</h5>
                        <?php echo'<button class="btn btn-primary btn-xs" type="button">'.$row['category'].'</button>';?>
                   <!--      <button class="btn btn-white btn-xs" type="button">Publishing</button> -->
                </div>
                <div class="col-md-6">
                    <div class="small text-right">
                        <h5>Stats:</h5>
                        <div> <i class="fa fa-comments-o"> </i></div>
                        <i class="fa fa-eye"> </i> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } }

if ($value==1) {
	  $query=mysqli_query($con, "SELECT * FROM blogs WHERE category LIKE '%Design%' ORDER BY id DESC");
    while ($row=mysqli_fetch_array($query)) {  
    $queryuser=mysqli_query($con, "SELECT * FROM users WHERE id='".$row['post_id']."' ");
    $queryuser1=mysqli_fetch_array($queryuser); 

?>
<div class="col-md-4">
    <div class="ibox">
        <div class="ibox-content">
            <div class="">
            	<a href="full-post.php?id=<?php echo base64_encode($row['id']); ?>">

              <?php echo '<img src="upload/blogs/'.$row['img'].'" class="img img-responsive">';?>
               </a>
            </div>
            
            <a href="full-post.php" class="btn-link">
                <h2 class="font-bold">
                    <?php echo $row['title']; ?>
                </h2>
            </a>
            <div class="small m-b-xs">
                <strong>
                       <?php if($queryuser1['username']!=="")
                       echo $queryuser1['username'];
                       elseif($queryuser1['username']==""){
                        echo $queryuser1['first_name']." ".$queryuser1['last_name'];
                      } ?>
                </strong> <span class="text-muted"><i class="fa fa-clock-o"></i>
                <?php
                     $time = strtotime($row['date']);
                        echo humanTiming($time); 
                ?>  ago
                </span>
            </div>
            <p>
               <?php echo $row['description']; ?>
            </p>
            <div class="row">
                <div class="col-md-6">
                        <h5>Tags:</h5>
                        <?php echo'<button class="btn btn-primary btn-xs" type="button">'.$row['category'].'</button>';?>
                   <!--      <button class="btn btn-white btn-xs" type="button">Publishing</button> -->
                </div>
                <div class="col-md-6">
                    <div class="small text-right">
                        <h5>Stats:</h5>
                        <div> <i class="fa fa-comments-o"> </i> </div>
                        <i class="fa fa-eye"> </i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } }

if ($value==2) {
	  $query=mysqli_query($con, "SELECT * FROM blogs WHERE category LIKE '%Sales & Marketing%' ORDER BY id DESC");
    while ($row=mysqli_fetch_array($query)) {  
    $queryuser=mysqli_query($con, "SELECT * FROM users WHERE id='".$row['post_id']."' ");
    $queryuser1=mysqli_fetch_array($queryuser); 

?>
<div class="col-md-4">
    <div class="ibox">
        <div class="ibox-content">
            <div class="">
            	<a href="full-post.php?id=<?php echo base64_encode($row['id']); ?>" class="btn-link">
              <?php echo '<img src="upload/blogs/'.$row['img'].'" class="img img-responsive">';?>
          </a>
            </div>
            
            <a href="full-post.php?id=<?php echo base64_encode($row['id']); ?>" class="btn-link">
                <h2 class="font-bold">
                    <?php echo $row['title']; ?>
                </h2>
            </a>
            <div class="small m-b-xs">
                <strong>
                       <?php if($queryuser1['username']!=="")
                       echo $queryuser1['username'];
                       elseif($queryuser1['username']==""){
                        echo $queryuser1['first_name']." ".$queryuser1['last_name'];
                      } ?>
                </strong> <span class="text-muted"><i class="fa fa-clock-o"></i>
                <?php
                     $time = strtotime($row['date']);
                        echo humanTiming($time); 
                ?>  ago
                </span>
            </div>
            <p>
               <?php echo $row['description']; ?>
            </p>
            <div class="row">
                <div class="col-md-6">
                        <h5>Tags:</h5>
                        <?php echo'<button class="btn btn-primary btn-xs" type="button">'.$row['category'].'</button>';?>
                   <!--      <button class="btn btn-white btn-xs" type="button">Publishing</button> -->
                </div>
                <div class="col-md-6">
                    <div class="small text-right">
                        <h5>Stats:</h5>
                        <div> <i class="fa fa-comments-o"> </i></div>
                        <i class="fa fa-eye"> </i> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } }

if ($value==3) {
	  $query=mysqli_query($con, "SELECT * FROM blogs WHERE category LIKE '%Development%' ORDER BY id DESC");
    while ($row=mysqli_fetch_array($query)) {  
    $queryuser=mysqli_query($con, "SELECT * FROM users WHERE id='".$row['post_id']."' ");
    $queryuser1=mysqli_fetch_array($queryuser); 

?>
<div class="col-md-4">
    <div class="ibox">
        <div class="ibox-content">
            <div class="">
            	<a href="full-post.php?id=<?php echo base64_encode($row['id']); ?>"class="btn-link">
              <?php echo '<img src="upload/blogs/'.$row['img'].'" class="img img-responsive">';?>
          </a>
            </div>
            
            <a href="full-post.php" class="btn-link">
                <h2 class="font-bold">
                    <?php echo $row['title']; ?>
                </h2>
            </a>
            <div class="small m-b-xs">
                <strong>
                       <?php if($queryuser1['username']!=="")
                       echo $queryuser1['username'];
                       elseif($queryuser1['username']==""){
                        echo $queryuser1['first_name']." ".$queryuser1['last_name'];
                      } ?>
                </strong> <span class="text-muted"><i class="fa fa-clock-o"></i>
                <?php
                     $time = strtotime($row['date']);
                        echo humanTiming($time); 
                ?>  ago
                </span>
            </div>
            <p>
               <?php echo $row['description']; ?>
            </p>
            <div class="row">
                <div class="col-md-6">
                        <h5>Tags:</h5>
                        <?php echo'<button class="btn btn-primary btn-xs" type="button">'.$row['category'].'</button>';?>
                   <!--      <button class="btn btn-white btn-xs" type="button">Publishing</button> -->
                </div>
                <div class="col-md-6">
                    <div class="small text-right">
                        <h5>Stats:</h5>
                        <div> <i class="fa fa-comments-o"> </i>  </div>
                        <i class="fa fa-eye"> </i> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } }

if ($value==4) {
	  $query=mysqli_query($con, "SELECT * FROM blogs WHERE category LIKE '%Entrepreneurship%' ORDER BY id DESC");
    while ($row=mysqli_fetch_array($query)) {  
    $queryuser=mysqli_query($con, "SELECT * FROM users WHERE id='".$row['post_id']."' ");
    $queryuser1=mysqli_fetch_array($queryuser); 

?>
<div class="col-md-4">
    <div class="ibox">
        <div class="ibox-content">
            <div class="">
            	<a href="full-post.php?id=<?php echo base64_encode($row['id']); ?>" class="btn-link">
              <?php echo '<img src="upload/blogs/'.$row['img'].'" class="img img-responsive">';?>
          </a>
            </div>
            
            <a href="full-post.php" class="btn-link">
                <h2 class="font-bold">
                    <?php echo $row['title']; ?>
                </h2>
            </a>
            <div class="small m-b-xs">
                <strong>
                       <?php if($queryuser1['username']!=="")
                       echo $queryuser1['username'];
                       elseif($queryuser1['username']==""){
                        echo $queryuser1['first_name']." ".$queryuser1['last_name'];
                      } ?>
                </strong> <span class="text-muted"><i class="fa fa-clock-o"></i>
                <?php
                     $time = strtotime($row['date']);
                        echo humanTiming($time); 
                ?>  ago
                </span>
            </div>
            <p>
               <?php echo $row['description']; ?>
            </p>
            <div class="row">
                <div class="col-md-6">
                        <h5>Tags:</h5>
                        <?php echo'<button class="btn btn-primary btn-xs" type="button">'.$row['category'].'</button>';?>
                   <!--      <button class="btn btn-white btn-xs" type="button">Publishing</button> -->
                </div>
                <div class="col-md-6">
                    <div class="small text-right">
                        <h5>Stats:</h5>
                        <div> <i class="fa fa-comments-o"> </i> </div>
                        <i class="fa fa-eye"> </i> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } }

if ($value==5) {
	  $query=mysqli_query($con, "SELECT * FROM blogs WHERE category LIKE '%Freelancing%' ORDER BY id DESC");
    while ($row=mysqli_fetch_array($query)) {  
    $queryuser=mysqli_query($con, "SELECT * FROM users WHERE id='".$row['post_id']."' ");
    $queryuser1=mysqli_fetch_array($queryuser); 

?>
<div class="col-md-4">
    <div class="ibox">
        <div class="ibox-content">
            <div class="">
            	<a href="full-post.php" class="btn-link">
              <?php echo '<img src="upload/blogs/'.$row['img'].'" class="img img-responsive">';?>
          </a>
            </div>
            
            <a href="full-post.php?id=<?php echo base64_encode($row['id']); ?>" class="btn-link">
                <h2 class="font-bold">
                    <?php echo $row['title']; ?>
                </h2>
            </a>
            <div class="small m-b-xs">
                <strong>
                       <?php if($queryuser1['username']!=="")
                       echo $queryuser1['username'];
                       elseif($queryuser1['username']==""){
                        echo $queryuser1['first_name']." ".$queryuser1['last_name'];
                      } ?>
                </strong> <span class="text-muted"><i class="fa fa-clock-o"></i>
                <?php
                     $time = strtotime($row['date']);
                        echo humanTiming($time); 
                ?>  ago
                </span>
            </div>
            <p>
               <?php echo $row['description']; ?>
            </p>
            <div class="row">
                <div class="col-md-6">
                        <h5>Tags:</h5>
                        <?php echo'<button class="btn btn-primary btn-xs" type="button">'.$row['category'].'</button>';?>
                   <!--      <button class="btn btn-white btn-xs" type="button">Publishing</button> -->
                </div>
                <div class="col-md-6">
                    <div class="small text-right">
                        <h5>Stats:</h5>
                        <div> <i class="fa fa-comments-o"> </i> </div>
                        <i class="fa fa-eye"> </i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } }
if ($value==6) {
	  $query=mysqli_query($con, "SELECT * FROM blogs WHERE category LIKE '%$search%' OR description LIKE '%$search%' OR title LIKE '%$search%' ORDER BY id DESC");
    while ($row=mysqli_fetch_array($query)) {  
    $queryuser=mysqli_query($con, "SELECT * FROM users WHERE id='".$row['post_id']."' ");
    $queryuser1=mysqli_fetch_array($queryuser); 

?>
<div class="col-md-4">
    <div class="ibox">
        <div class="ibox-content">
            <div class="">
            	<a href="full-post.php?id=<?php echo base64_encode($row['id']); ?>" class="btn-link">
              <?php echo '<img src="upload/blogs/'.$row['img'].'" class="img img-responsive">';?>
          </a>
            </div>
            
            <a href="full-post.php" class="btn-link">
                <h2 class="font-bold">
                    <?php echo $row['title']; ?>
                </h2>
            </a>
            <div class="small m-b-xs">
                <strong>
                       <?php if($queryuser1['username']!=="")
                       echo $queryuser1['username'];
                       elseif($queryuser1['username']==""){
                        echo $queryuser1['first_name']." ".$queryuser1['last_name'];
                      } ?>
                </strong> <span class="text-muted"><i class="fa fa-clock-o"></i>
                <?php
                     $time = strtotime($row['date']);
                        echo humanTiming($time); 
                ?>  ago
                </span>
            </div>
            <p>
               <?php echo $row['description']; ?>
            </p>
            <div class="row">
                <div class="col-md-6">
                        <h5>Tags:</h5>
                        <?php echo'<button class="btn btn-primary btn-xs" type="button">'.$row['category'].'</button>';?>
                   <!--      <button class="btn btn-white btn-xs" type="button">Publishing</button> -->
                </div>
                <div class="col-md-6">
                    <div class="small text-right">
                        <h5>Stats:</h5>
                        <div> <i class="fa fa-comments-o"> </i></div>
                        <i class="fa fa-eye"> </i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } }?>