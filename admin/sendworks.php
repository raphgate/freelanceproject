<?php 
require "../auth/access_levels.php";
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | Shareworks</title>

    <?php include_once('inc/css.php'); ?>
    <!-- Toastr style -->
    <link href="../css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="../css/plugins/bootstrapSocial/bootstrap-social.css" rel="stylesheet">

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
                                    <h1 class="font-bold">Share Your Works </h1>
                                    <p>Download and clear all works here</p>
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
                        
                            </ul>
                        </div>
                    </div>
                  
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="container">
                    <div class="row" id="">
                      <div class="col-md-8">
                        <div class="ibox-content material-shadow">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="pull-left m-r-sm">
                               <!--  <img src="img/a4.jpg" class="img img-responsive img-rounded" width="70" height="70"> -->
                              </div>
                              <div class="">
                                <div class="pull-right">
                                 <a href="messanger.php"><button class="btn btn-default"><i class="fa fa-comment"></i> Chat</button></a>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="pull-right">
                              </div>
                              
                              <small class="font-bold"></small>
                            </div>
                          </div>
                          <hr class="">
                          <div class="row">
                            <?php
                            if (isset($_GET['success'])==1) {
                              echo "<h3 style='text-align:center; color:green;'>Successfully Sent</h3>";
                            }
                            if (isset($_GET['updated'])==1) {
                              echo "<h3 style='text-align:center; color:green;'>Updated Successfully</h3>";
                            }

                            ?>
                            <div class="col-md-12">
                              <h3 class="font-bold">Note: If file is more than one please ensure that you zip the file before sending and ensure that this is the correct project you are sending before you click!</h3>
                              <small></small>
                            </div>

                            <div class="col-md-12 m-t-md">
                            <?php 
                              $query=mysqli_query($con, "SELECT * FROM currentworks WHERE activated_id='".$user_id."' AND status=0 GROUP BY project_id");        
                                   while ($row=mysqli_fetch_array($query)) {
                                    $pnma=mysqli_query($con, "SELECT projectName FROM projects WHERE id='".$row['project_id']."'");
                                    $pnma2=mysqli_fetch_array($pnma);
                                  ?>
                                  <form role="" class="form-inline" action="inc/works.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col-xs-7">
                                    <h3 >Project Title:<span style="color:blue;"> <?php echo $pnma2['projectName']; ?></span></h3>
                                      <label>send documents</label>
                                    <div class="form-inline">
                                    <input type="hidden" name="awardedPrice" value="<?php echo $row['awardedPrice'];?>">
                                    <input type="hidden" name="activated_id" value="<?php echo $row['activated_id'];?>">
                                    <input type="hidden" name="owner_id" value="<?php echo $row['owner_id']; ?>">
                                    <input type="hidden" name="pId" value="<?php echo $row['project_id']; ?>">
                                        <input type="file" name="uploads" class="form-control" required="required"><br>
                                       <button  class="btn btn-primary" >Send</button> 
                                    </div>
                                  </div>
                                 
                                </div>
                                 </form>
                                 <?php }?>
                            </div>
                          </div>
                          <br>
                            <div class="col-md-6">
                              <div class="pull-left">
                              </div> 
                            </div>
                          <hr class="">
                        </div>
                      </div>
                      <?php
                    $Downloadquery=mysqli_query($con, "SELECT * FROM completedworks WHERE owner_id='".$user_id."' AND status=0");
                      ?>
                      <div class="col-md-4">
                        <div class="ibox-content material-shadow">
                          <h4 class="font-bold">Active projects</h4>
                          <p>Ensure you go through all project before you click Approve payment</p>
                             <!-- <form class="form" method="POST" enctype="multipart/form-data" > -->
                          <div class="form-inline" id="html">
                            <?php 
                         while ($down=mysqli_fetch_array($Downloadquery)) {
                          $use=mysqli_query($con, "SELECT wallet FROM users WHERE id='".$down['owner_id']."' ");
                          $countquery=mysqli_query($con, "SELECT SUM(awardedPrice) AS chee FROM completedworks WHERE owner_id='".$down['owner_id']."' AND status=0 ");
                          $countquery1=mysqli_fetch_array($countquery);
                      $long=mysqli_fetch_array(mysqli_query($con, "SELECT projectName FROM projects WHERE id='".$down['project_id']."' "));
                          $use1=mysqli_fetch_array($use);
                             $checkuse1=$use1['wallet'];
                             $checkdown=$countquery1['chee'];
                             if ($checkuse1>=$checkdown) {
                              ?>
                            <h4>Title: <?php echo $long['projectName']; ?> </h4>
                         <?php
                         if ($down['documents']=="") {
                            echo '<button class="btn btn-success" onclick="check()">Download</button>';
                         }else{
                            echo '<a href="inc/download.php?file='.$down['documents'].'"><button class="btn btn-success">Download</button></a>';
                         }
                           ?>
                         <button class="btn btn-warning" onclick="work(<?php echo $use1['wallet']; ?>,<?php echo $down['owner_id'];?>,<?php echo $down['project_id'];?>, <?php echo $down['activated_id']; ?>, <?php echo $down['awardedPrice']; ?>)">Approve payment</button>
                              <div class="m-t-xs" id="owo">
                                            rate work
                                            <span class="label label-primary">.</span>
                                            &nbsp;
                                            <i class="fa fa-star text-default" onclick="rate(1,<?php echo $down['activated_id']; ?>)"></i>
                                            <i class="fa fa-star text-default" onclick="rate(2,<?php echo $down['activated_id']; ?>)"></i>
                                            <i class="fa fa-star text-default" onclick="rate(3,<?php echo $down['activated_id']; ?>)"></i>
                                            <i class="fa fa-star text-default" onclick="rate(4,<?php echo $down['activated_id']; ?>)"></i>
                                            <i class="fa fa-star text-default" onclick="rate(5,<?php echo $down['activated_id']; ?>)"></i>
                                        </div>

                            <?php 
                          }else{
                            echo "<h3 style='color:red;'>You have pending Downloads please credit wallet</h3>";
                            
                          }
                              }?>
                        </div>
                      <!--   </form> -->
                        </div>
                     
                      </div>
                    </div>
                    <div class="row">                        
                    </div>
                </div>
            </div>
            
            <?php include_once('inc/footer.php'); ?>

        </div>
    </div>
    <?php include_once('inc/jScript.php'); ?>
    <script type="text/javascript">
      function check(){
        alert('Oops empty download')
      }
      function rate(x,y){
         var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            alert(x+' star(s) rated')
              document.getElementById("owo").innerHTML = xhttp.responseText;        
          } };
    xhttp.open("POST", "inc/ratings.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("rate="+x+"&id="+y);
      }
      function work (v,w,x,y,z) {
        var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
              document.getElementById("html").innerHTML = xhttp.responseText;        
          } };
    xhttp.open("POST", "inc/approvepayment.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("o="+w+"&p="+x+"&a="+y+"&awp="+z+"&wallet="+v);
      }
    </script>

</body>
</html>

