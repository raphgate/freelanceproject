<?php require "../auth/access_levels.php";
$loggedinquery=mysqli_query($con, "UPDATE users SET loggedin='".date("Y-m-d h:i:sa")."' WHERE id='".$user_id."' ");
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>eBrang | chat room</title>

        <?php include_once('inc/css.php'); ?>
        <link href="../css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
        <link href="../css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
        <link href="../css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
        <link href="../css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
        <link href="../css/plugins/select2/select2.min.css" rel="stylesheet">   
    </head>
<body class="top-navigation" > 
    <div id="wrapper">
        <div id="page-wrapper" class="white-bg messanger">
        
            <?php include_once('inc/header.php'); ?>

            <div class="row wrapper border-bottom page-heading bg-primary"  style="margin-top: 60px;">
                <div class="container">
                    <div class="col-lg-10">
                        <ol class="breadcrumb bg-primary">
                            <li>
                                <a >Chat room</a>
                            </li>
                          
                         
                        </ol>
                       <!--  <h2 class="font-bold">Website Design</h2> -->
                    </div>
                    <div class="col-lg-2">

                    </div>
                    <div></div>
                </div>
            </div>
            <div class="animated fadeInRight" style="padding-bottom: 15px;">
                <div class="row">
                    <div class="col-lg-12">

                            <div class="ibox chat-view">
                               
                                <div class="ibox-title">
                                    <small class="pull-right text-muted"></small>
                                     Chat room panel
                                </div>
                          
                                <div class="ibox-content" id="chat">

                                    <div class="row">
                                        <div class="col-md-3">
                                           
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="chat-discussion">

                                                <div class="chat-message left">
                                                <!--     <img class="message-avatar" src="img/a1.jpg" alt="" > -->
                                                    <div class="message">
                                                        <a class="message-author" href="#"> Welcome to eBrang chat layer </a>
                                                        <span class="message-date"> <?php echo date("Y-m-d h:i:sa"); ?></span>
                                                        <span class="message-content">
                                                        Here you can chat and monitor all works with respective clients
                                                        </span>
                                                    </div>
                                                </div>
                                           
                                            </div>
                                            <div class="">
                                            </div>
                                        </div>
                                        <div class="col-md-3" >
                                            <div class="chat-users" >
                                                 <?php 
                                                    $messagequery=mysqli_query($con, "SELECT * FROM currentworks WHERE status=0  AND owner_id='".$user_id."' OR  activated_id='$user_id' AND status=0  GROUP BY project_id ");
                                                    while($messagequery2=mysqli_fetch_array($messagequery)){
                                                    $activated_id=$messagequery2['activated_id'];
                                                    $date=$messagequery2['date'];
                                                    $project_id=$messagequery2['project_id'];
                                                    $owner=$messagequery2['owner_id'];
                                                    $selectproject=mysqli_query($con, "SELECT * FROM projects WHERE id='".$messagequery2['project_id']."' ");
                                                    $rows=mysqli_fetch_array($selectproject);
                                                    $projectName=$rows['projectName'];
                                                    $selectactivatedperson=mysqli_query($con, "SELECT * FROM users WHERE id='".$activated_id."' ");
                                                    $row=mysqli_fetch_array($selectactivatedperson);
                                                    $pix=$row['pix'];
                                                    $queryname=$row['first_name']." ".$row['last_name'];
                                                    $queryusername=$row['username'];
                                                    $acemail=$row['email'];
                                                    $ownerquery=mysqli_query($con, "SELECT * FROM users WHERE id='".$owner."' ");
                                                    $rose=mysqli_fetch_array($ownerquery); 
                                                    $pixel=$rose['pix'];
                                                    $ownerqueryname=$rose['first_name']." ".$rose['last_name'];
                                                    $ownerqueryusername=$rose['username']; 
                                                    $owneremail=$row['email'];                                                           
                                                    ?>
                                                    <?php if ($user_id==$activated_id) { ?>
                                                    <input type="hidden" value="<?php echo $owner; ?>" id="reciever">
                                                    <input type="hidden" value="<?php echo $user_id; ?>" id="sender">
                                                    <input type="hidden" value="<?php echo $project_id;?>" id="project_id">
                                                    <div class="users-list"  onclick="divonclick(<?php echo $user_id; ?>,<?php echo $owner; ?>,<?php echo $project_id;?>)">
                                                    
                                          
                                                   <?php }
                                                    else{ ?>
                                                    <input type="hidden" value="<?php echo $activated_id; ?>" id="reciever">
                                                    <input type="hidden" value="<?php echo $user_id; ?>" id="sender">
                                                    <input type="hidden" value="<?php echo $project_id;?>" id="project_id">
                                                    <div class="users-list"  onclick="divonclick(<?php echo $user_id; ?>,<?php echo $activated_id; ?>,<?php echo $project_id;?>)">
                                                    <?php  } ?>
                                                    <div class="chat-user" onclick="updatechat(<?php echo $user_id; ?>,<?php echo $project_id; ?>)">
                                                        <div class="user-contact" >
                                                            <!-- <a href="#"> -->
                                                                <div class="media">
                                                                    <div class="pull-left one-user" href="#">
                                                                        <img class="media-object img img-responive img-circle" src="img/a3.jpg" alt="" width="40">
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <!-- <small class="pull-right text-muted"> 16.02.2015</small> -->
                                                                        <h4 class="media-heading">
                                                                         <?php 
                                                                          if ($queryusername==$username) {
                                                                            echo $ownerqueryusername;
                                                                           if ($queryname==$fullname) {
                                                                               echo $ownerqueryname;
                                                                           }  }
                                                                            elseif (!$queryusername=="") {
                                                                                    echo $queryusername;
                                                                            }elseif($queryusername=="") {
                                                                                echo $queryname; 
                                                                            }
                                                                            ?>
                                                                        </h4>
                                                                        <p> <?php
                                                                           
                                                                            if ($owneremail==$email) {
                                                                                  $checklogin=mysqli_query($con, "SELECT loggedin FROM users WHERE loggedin > DATE_SUB(NOW(), INTERVAL 3 MINUTE ) AND id='".$owner."'  ");
                                                                                  $checklogin1=mysqli_num_rows($checklogin);
                                                                                  if ($checklogin1>0) {
                                                                                       echo '<span class="pull-right " style="color:green;">Online <i class="fa fa-circle" style="color:green;"></i></span>';
                                                                                  }else{
                                                                                       echo '<span class="pull-right " style="color:gray;">Offline <i class="fa fa-circle" style="color:gray;"></i></span>';
                                                                              
                                                                                  }
                                                                                    
                                                                               echo $projectName; 
                                                                            }else{
                                                                                  $checklogin=mysqli_query($con, "SELECT loggedin FROM users WHERE loggedin > DATE_SUB(NOW(), INTERVAL 3 MINUTE ) AND id='".$activated_id."' ");
                                                                                  $checklogin1=mysqli_num_rows($checklogin);

                                                                                  if ($checklogin1>0) {
                                                                                       echo '<span class="pull-right " style="color:green;">Online <i class="fa fa-circle" style="color:green;"></i></span>';
                                                                                  }else{
                                                                                       echo '<span class="pull-right " style="color:gray;">Offline <i class="fa fa-circle" style="color:gray;"></i></span>';
                                                                              
                                                                                  }        
                                                                                echo $projectName;
                                                                               
                                                                            }
                                                
                                                                            ?>
                                                                            
                                                                           
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                          <!--   </a> -->
                                                        </div>
                                                    </div>                                                    
                                                </div>
                                                   <?php } ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            
                                        </div>
                                    </div>


                                </div>

                            </div>
                    </div>

                </div>
            </div>
            
            <?php include_once('inc/footer.php'); ?>
        </div>
    </div>

   <?php include_once('inc/jScript.php'); ?>
    <!-- Chosen -->
    <script src="../js/plugins/chosen/chosen.jquery.js"></script>
    <!-- Select2 -->
    <script src="../js/plugins/select2/select2.full.min.js"></script>
     <!-- Tags Input -->
    <script src="../js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
</body>
</html>



 <?php 
 include_once 'scripts.php';
  ?>
