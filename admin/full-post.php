<?php 
$blogid=base64_decode($_GET['id']);
require "../auth/access_levels.php"; 
$loggedinquery=mysqli_query($con, "UPDATE users SET loggedin='".date("Y-m-d h:i:sa")."' WHERE id='".$user_id."' ");
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
  $blogquery=mysqli_query($con,"SELECT * FROM blogs WHERE id='".$blogid."' ");
  $blogquery1=mysqli_fetch_array($blogquery);
  $userquery=mysqli_query($con, "SELECT * FROM users WHERE id='".$blogquery1['post_id']."' ");
  $userquery1=mysqli_fetch_array($userquery);
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | post</title>

    <?php include_once('inc/css.php'); ?>
    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="css/plugins/bootstrapSocial/bootstrap-social.css" rel="stylesheet">

</head>

<body class="top-navigation">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        
            <?php include_once('inc/header.php'); ?>

            <div class="showroom border-bottom white-bg m-t-xl" style="">
                <div class="overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-8">
                                <div class="text-center m-t-xl p-xl">
                                    <h1 class="font-bold"><?php echo $blogquery1['title']; ?></h1>
                                    <p>Let the work Speak for itself</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrapper border-bottom gray-bg">
                <div class="container">
                    <div class="col-md-10">
                        <div class="mini-nav">
                            <ul class="">
                                <li onclick="" class="active">    
                                    <a href="#">All</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="" style="padding-top: 5px;">
                            <a href="create-blog.php" class="btn btn-outline btn-primary">Create Article</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight article">
                <div class="container">
                    <div class="row" id="">
                        <div class="col-md-8">
                          <div class="ibox">
                            <div class="ibox-content">
                                <div class="pull-right">

                                    <button class="btn btn-white btn-xs" type="button"><?php echo $blogquery1['category']; ?></button>
                                   
                                </div>
                                <div class="text-center article-title">
                                <span class="text-muted"><i class="fa fa-clock-o"></i>
                                 <?php   $time = strtotime($blogquery1['date']);
                                                echo humanTiming($time);  ?> ago</span>
                                    <h1>
                                        <?php echo $blogquery1['title']; ?>
                                    </h1>
                                </div>
                                <p>
                                  <?php echo $blogquery1['doc']; ?>
                                </p>
                                <p>
                                    <?php echo $blogquery1['description']; ?>
                                </p>
                                
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                            <h5>Tags:</h5>
                                      <!--       <button class="btn btn-primary btn-xs" type="button">Model</button> -->
                                            <button class="btn btn-white btn-xs" type="button"><?php echo $blogquery1['category']; ?></button>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="small text-right">
                                            <h5>Stats:</h5>
                                            <?php 
                                    $comm=mysqli_query($con, "SELECT * FROM blogcomments WHERE blog_id='".$blogid."' ORDER BY id DESC LIMIT 50 ");
                                    $comm1=mysqli_num_rows($comm);
                                            ?>
                                            <div> <i class="fa fa-comments-o"> </i> <?php echo $comm1; ?> comments </div>
                                           <!--  <i class="fa fa-eye"> </i> 144 views -->
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div >

                                        <h2>Comments:</h2>
                                        <div class="social-feed-box">
                                          <form role="form">
                                            <input type="hidden" id="post_id" value="<?php echo $user_id;?>" >
                                            <input type="hidden" id="blog_id" value="<?php echo $blogid;?>" >
                                            <div class="form-group">
                                              <div class="input-group">
                                                <input type="" id="message" class="form-control" placeholder="Post your comment">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary" onclick="comments()" type="button"><i class="fa fa-comments-o"></i></button>
                                                </span>
                                              </div>
                                            </div>
                                          </form>
                                        </div>
                                       <!--  -->
                                     
                                        <?php 
                           
                                        while ($row=mysqli_fetch_array($comm)) {
                                            $usercomm=mysqli_query($con, "SELECT * FROM users WHERE id='".$row['comment_id']."' ");
                                             $usercomm1=mysqli_fetch_array($usercomm);
                                        ?>
                                        <div class="social-feed-box" id="comm">
                                            <div class="social-avatar">
                                                   <a href="full-post.php?id=<?php echo base64_encode($row['id']); ?>">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                        <div class="col-md-4">
                            <div class="ibox-content material-shadow" style="padding: 10px !important">
                                <div>
                                    <div class="pull-left p-xs">
                                        <img alt="image" class="img img-responsive" src="upload/".<?php echo $userquery1['pix']; ?> "">
                                    </div>
                                    <div class="p-xs">
                                        <small class="font-bold">Welcome Back</small>
                                        <h2><a href="profile.php">
                                                    <?php if($userquery1['username']!==""){
                                               echo $userquery1['username']; }
                                               elseif($userquery1['username']==""){
                                                echo $userquery1['first_name']." ".$userquery1['last_name'];
                                              } ?>
                                        </a></h2>
                                        <a href=""> Member</a><br>
                         <!--               <a href="payment.php"><button class="btn btn-success btn-sm">Upgrade Now</button></a>  -->
                                    </div>
                                </div>
                                <div>
             <!--                        <p class="alert alert-success">You are eligible for a FREE 30 day trial of Professional Membership! Get features to help grow your business. Get started!</p> -->
                                </div>
                                <div>
                                    <div>
                                        <span><!-- Set up your account --></span>
                                        <small class="pull-right"><!-- 73% --></small>
                                    </div>
                                    <div class="progress progress-small">
                                        <div style="width: 73%;" class="progress-bar"></div>
                                    </div>
                                    <p class="well b-r-xs p-xs">
                                     <!--    Add your address (+5%) -->
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                    <!--         <div data-toggle="buttons" class="btn-group pull-right">
                                <label class="btn btn-sm btn-primary"> <input type="radio" id="option1" name="options"><i class="fa fa-angle-double-left"></i> Previous</label>
                                <label class="btn btn-sm btn-white"> <input type="radio" id="option1" name="options"> 1 </label>
                                <label class="btn btn-sm btn-white active"> <input type="radio" id="option2" name="options"> 2 </label>
                                <label class="btn btn-sm btn-white"> <input type="radio" id="option3" name="options"> 3 </label>
                                <label class="btn btn-sm btn-white"> <input type="radio" id="option3" name="options"> 4 </label>
                                <label class="btn btn-sm btn-white"> <input type="radio" id="option3" name="options"> 5 </label>
                                <label class="btn btn-sm btn-white"> <input type="radio" id="option3" name="options"> 6 </label>
                                <label class="btn btn-sm btn-primary"> <input type="radio" id="option1" name="options">Next <i class="fa fa-angle-double-right"></i> </label>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            
            <?php include_once('inc/footer.php'); ?>

        </div>
    </div>



    <?php include_once('inc/jScript.php'); ?>

</body>
</html>
<?php include_once 'scripts.php'; ?>
