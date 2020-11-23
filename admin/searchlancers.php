<?php require "../auth/access_levels.php";
$getid=base64_decode($_GET['id']);
    mysqli_query($con, "UPDATE users SET views=views+1 WHERE id='".$getid."' ");
    $loggedinquery=mysqli_query($con, "UPDATE users SET loggedin='".date("Y-m-d h:i:sa")."' WHERE id='".$user_id."' ");
 ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | Profile</title>

    <?php include_once('inc/css.php'); ?>

</head>

<body class="top-navigation">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        
        <?php include_once('inc/header.php'); ?>

        <div class="wrapper wrapper-content" style="margin-top: 30px;">
            <div class="container">
                <div class="m-b-lg m-t-lg">
                    <div class="ibox-content material-shadow">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="text-center">
                                    <?php
                                    $query=mysqli_query($con, "SELECT * FROM users WHERE id='".$getid."' ");
                                    $query2=mysqli_fetch_array($query);
                                    ?>
                                    <div class="m-t-n-lg" style="margin-left: auto; margin-right: auto; width: 100%; " id="imgh">
           				          <?php
                                      if ($query2['pix']=="") {
                                        echo '<img src="upload/profile/userimg.png" id="output"  name="showimg" class="img img-responsive my-img-thumbnail" width="200">';          
                                         } elseif (substr($query2['pix'], 0, 8) === 'https://') {
                                        echo '<img src="'.$query2['pix'].'" id="output"  name="showimg" class="img img-responsive my-img-thumbnail" width="200">';
                                         }else{  echo '<img src="upload/profile/'.$query2['pix'].'" id="output"  name="showimg" class="img img-responsive my-img-thumbnail" width="200">';
                                         }
                                         ?>
                                    </div>
                                    <div>
                                        
                                    </div>
                                    <div class="m-sm">
                                        <p class="small font-bold">
                                          <!--   <span><i class="fa fa-circle text-navy"></i> Available</span> -->
                                        </p>
                                    </div>

                                    <div class="">
                                          <div class="m-t-xs">
                                            <?php
                                            if ($query2['ratings']==1) {
                                            echo '  <span class="label label-primary">1</span>
                                            &nbsp;
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-default"></i>
                                            <i class="fa fa-star text-default"></i>
                                            <i class="fa fa-star text-default"></i>
                                            <i class="fa fa-star text-default"></i>
                                            ';
                                        }elseif ($query2['ratings']==2) {
                                           echo '  <span class="label label-primary">2</span>
                                            &nbsp;
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-default"></i>
                                            <i class="fa fa-star text-default"></i>
                                            <i class="fa fa-star text-default"></i>
                                            ';
                                        }elseif ($query2['ratings']==3) {
                                            echo '  <span class="label label-primary">3</span>
                                            &nbsp;
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-default"></i>
                                            <i class="fa fa-star text-default"></i>
                                            ';
                                        }elseif ($query2['ratings']==4) {
                                            echo '  <span class="label label-primary">4</span>
                                            &nbsp;
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-default"></i>
                                            ';
                                        }elseif ($query2['ratings']==5) {
                                            echo '  <span class="label label-primary">5</span>
                                            &nbsp;
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            ';
                                        }elseif ($query2['ratings']==0) {
                                              echo '  <span class="label label-primary">0</span>
                                            &nbsp;
                                            <i class="fa fa-star text-default"></i>
                                            <i class="fa fa-star text-default"></i>
                                            <i class="fa fa-star text-default"></i>
                                            <i class="fa fa-star text-default"></i>
                                            <i class="fa fa-star text-default"></i>
                                            ';
                                        }


                                            ?>
                                            <small>&nbsp; <?php echo $query2['views']; ?> reviews</small>
                                        </div>
                                        <hr class="hr-line-dashed">
                                    </div>
                                </div>
             
                            </div>
                            <div class="col-md-5">
                                <div class="">
                                    <div>
                                        <h2 class="no-margins font-bold">
                                               <?php 
                                        if ($query2['username']=="") {
                                            echo $query2['first_name']." ".$query2['last_name'];
                                        }else{
                                            echo $query2['username'];
                                        }?>
                                        </h2>

                                        <h4><?php echo $query2['userSkills']; ?></h4>
                                      
                                        <div class="btn-container">
                                           
                                        </div><br>
                                        <div>
                                          <a href="#"><button onclick="alert('Send freelancer private message to bid on your project ')" class="btn btn-block btn-primary  m-t-n-xs">Hire freelancer</button></a>
                                          </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <div>
                                        <h4 class="no-margins">SEND A PRIVATE MESSAGE</h4>
                                        <h3 class="text-info">
                                            Contact          
                                             <?php 
                                               
                                        if ($query2['username']=="") {
                                            echo $query2['first_name']." ".$query2['last_name'];
                                        }else{
                                            echo $query2['username'];
                                        }?> About Your Work Opportunity
                                        </h3>
                                    </div>
                                     <form role="form">
                                        <div class="form-group"> 
                                            <textarea require="required" placeholder="Whats on your mind" id="inbox" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div>
                                        </div>
                                        <div>
                                            <button class="btn btn-block btn-primary  m-t-n-xs" onclick="hiremsg(<?php echo $getid; ?>, <?php echo $user_id; ?>)" type="button"><strong>message           
                                                <?php 
                                        if ($query2['username']=="") {
                                            echo $query2['first_name']." ".$query2['last_name'];
                                        }else{
                                            echo $query2['username'];
                                        }?></strong></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-12">

                        <div class="ibox">
                            <div class="ibox-content">
                                    <h3>             <?php 
                                        if ($query2['username']=="") {
                                            echo $query2['first_name']." ".$query2['last_name'];
                                        }else{
                                            echo $query2['username'];
                                        }?> portfolio</h3>

                                <p class="small">
                                 <?php echo $query2['portforlio']; ?>
                                </p>

                            </div>
                        </div>
                    </div>
                    <!-- project list ends -->
                </div>

            </div>

        </div>
        
        <?php include_once('inc/footer.php'); ?>

        </div>
        </div>



   <?php include_once('inc/jScript.php'); ?>
    <script type="text/javascript">
     function hiremsg(x,y){
        var msg= document.getElementById("inbox").value;
        if (msg=="") {
            alert('empty inbox')
        }else{
        var msg= document.getElementById("inbox").value;
         var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            alert('message sent')
              // document.getElementById("html").innerHTML = xhttp.responseText;        
          } };
    xhttp.open("POST", "inc/sendmessage.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("receive="+x+"&sender_id="+y+"&msg="+msg);
    }
     }

        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
            $("#toggle").click(function() {
                var elem = $("#toggle").text();
                if (elem == "Read More") {
                  //Stuff to do when btn is in the read more state
                  $("#toggle").text("Read Less");
                  $("#text").slideDown(1500);
                } else {
                  //Stuff to do when btn is in the read less state
                  $("#toggle").text("Read More");
                  $("#text").slideUp(1500);
                }
            });
            $("#sparkline1").sparkline([34, 43, 43, 35, 44, 32, 44, 48], {
                type: 'line',
                width: '100%',
                height: '50',
                lineColor: '#1ab394',
                fillColor: "transparent"
            });
        });
    </script>
</body>
</html>
