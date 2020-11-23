<?php 
require "../auth/access_levels.php"; 
$Url = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
$Url .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
$loggedinquery=mysqli_query($con, "UPDATE users SET loggedin='".date("Y-m-d h:i:sa")."' WHERE id='".$user_id."' ");
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | Showroom</title>

    <?php include_once('inc/css.php'); ?>
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
                                    <h1 class="font-bold">eBrang Display Box</h1>
                                    <p>Let the work Speak for itself</p>
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
$id=$_GET['id'];
   $data_id= explode(' ', $id);

    $query=mysqli_query($con, "SELECT * FROM users WHERE id='".$data_id[0]."' ");
    $query1=mysqli_fetch_array($query);
       $query=mysqli_query($con, "SELECT * FROM showcaseupload WHERE id='".$data_id[1]."' ");
                $row=mysqli_fetch_array($query);
?>
<!--     <div class="modal inmodal" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg preview-modal">
            <div class="modal-content animated bounceIn">
                <div class="modal-body"> -->
                    <div class="row"> 
                        <div class="col-md-8">
                            <div class="carousel slide" id="carousel1">
                                <div class="carousel-inner">
                                    <?php $pixels=mysqli_query($con, "SELECT * FROM showcaseupload WHERE id='".$data_id[1]."' ");
                                          while($pixels1=mysqli_fetch_array($pixels)){
                                        ?>
                                    <div class="item active">
                                       <?php echo' <img alt="image" class="img-responsive" src="upload/'.$pixels1['documents'].'">'; ?>
                                    </div>
                                  <?php } ?>
                                </div>
                                <a data-slide="prev" href="#carousel1" class="left carousel-control">
                                    <span class="icon-prev"></span>
                                </a>
                                <a data-slide="next" href="#carousel1" class="right carousel-control">
                                    <span class="icon-next"></span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 modal-detail">
                            <div class="">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h2>eBrang</h2>
                            </div>
                            <div class="">
                                <h2><?php echo $row['showcasetitle']; ?></h2>
                                <p>Designed by</p>
                                <div class="p-h-xs">
                                    <div class="media p-h-xs">
                                        <a class="pull-left" href="#">
                                       <?php echo' <img class="media-object img img-responsive" src="upload/'.$query1['pix'].'" alt="" width="50">'; ?>
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading text-info">
                                                 <?php 
                                                 if($query1['username']!=="")
                                                   echo $query1['username'];
                                                 elseif($query1['username']==""){
                                                   echo $query1['first_name']." ".$query1['last_name'];
                                                  } ?>
                                            </h4>
                                            <p class=""><?php echo $row['showcasecategory']; ?></p>
                                        </div>
                                    </div>
                                    <a href="hire.php?id=<?php echo base64_encode($data_id[0]); ?>" class="btn btn-primary btn-block">hire me</a>
                                </div>
                                <div class="">
                                    <div class="pull-right">
                                        <p>Share this on your timeline</p>
                                         <a  href="https://www.facebook.com/sharer.php?u=<?php echo 'https://yelocode.com/eBrang/'; ?>"  target="_blank" class="btn btn-social-icon btn-facebook" ><span class="fa fa-facebook"></span></a>
                                         <a  href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $Url; ?>" target="_blank" class="btn btn-social-icon btn-linkedin" ><span class="fa fa-linkedin"></span></a>
                                         <a  href="https://twitter.com/share?url=<?php echo $Url; ?>" target="_blank" class="btn btn-social-icon btn-twitter" ><span class="fa fa-twitter"></span></a>
                                         

                                    </div>
                                    <div class="" id="countlikes">
                                        <p>Like</p>
                                        <a href="#" class="btn btn-outline btn-primary" onclick="addlikes(<?php echo $data_id[0]; ?>,<?php echo $data_id[1];?>)"><i class="fa fa-heart-o"></i></a> 
                                        <?php echo $row['likes']; ?>
                                         Like(s)
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    <!--             </div>
              
            </div>
        </div>
    </div>
 -->
            <?php include_once('inc/footer.php'); ?>

        </div>
    </div>
<script type="text/javascript">
    function addlikes(x,y){
 
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("countlikes").innerHTML = xhttp.responseText;        
        } };
  xhttp.open("POST", "inc/likepages.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("id="+x+"&project="+y);
        }</script>
   

    <?php include_once('inc/jScript.php'); ?>
      <?php include_once 'scripts.php'; ?>
</body>
</html>
