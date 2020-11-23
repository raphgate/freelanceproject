<?php 
require "../auth/access_levels.php"; 
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
  $loggedinquery=mysqli_query($con, "UPDATE users SET loggedin='".date("Y-m-d h:i:sa")."' WHERE id='".$user_id."' ");
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang  | Blog</title>

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
                                    <h1 class="font-bold">eBrang Blog</h1>
                                    <p>Let the work Speak for itself</p>
                                    <form class="form-horizontal" role="form">
                                       <div class="row">
                                           <div class="col-xs-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control input-lg" id="search" placeholder="Search among the best jobs available...">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-primary btn-lg" onclick="blog(6)" type="button"><i class="fa fa-search"></i></button>
                                                    </span>
                                                </div>
                                           </div>
                                       </div>
                                    </form>
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
                                <li onclick="blog(0)" class="active">    
                                    <a href="#">All</a>
                                </li>
                                  <li onclick="blog(1)" class="">
                                    <a href="#">Design</a>
                                </li>
                                  <li onclick="blog(2)" class="">
                                    <a href="#">Sales & Marketing</a>
                                </li>
                                  <li onclick="blog(3)" class="">
                                    <a href="#">Development</a>
                                </li>
                                 <li onclick="blog(4)" class="">
                                    <a href="#">Entrepreneurship</a>
                                </li>
                                   <li onclick="blog(5)" class="">
                                    <a href="#">Freelancing</a>
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

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="container">
                  <div class="col-md-offset-4" id="loader" style="display: none;"><img src="../img/loader.gif" style=""></div>
                    <div class="row" id="blog">

                        <?php
                        $query=mysqli_query($con, "SELECT * FROM blogs ORDER BY id DESC");
                        while ($row=mysqli_fetch_array($query)) {  
                        $queryuser=mysqli_query($con, "SELECT * FROM users WHERE id='".$row['post_id']."' ");
                        $queryuser1=mysqli_fetch_array($queryuser);  
                        ?>
                        <div class="col-md-4">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <div class="" >
                                        <a href="full-post.php?id=<?php echo base64_encode($row['id']); ?>">
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
                                                <div> <i class="fa fa-comments-o"> </i>  </div>
                                                <i class="fa fa-eye"> </i> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php  } ?>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
           
                        </div>
                    </div>
                </div>
            </div>
            
            <?php include_once('inc/footer.php'); ?>

        </div>
    </div>

   

    <?php include_once('inc/jScript.php'); ?>
    <script type="text/javascript">
        function blog(x){
            document.getElementById('loader').style.setProperty('display','block');
            var search=document.getElementById("search").value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById('loader').style.setProperty('display','none');
                document.getElementById("blog").innerHTML = xhttp.responseText;        
            } };
      xhttp.open("POST", "inc/blogAjax.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("value="+x+"&search="+search);
        }
    </script>

</body>
</html>
