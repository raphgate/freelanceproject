<?php require "../auth/access_levels.php"; ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | Profile</title>
   
         <link href="../css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="../css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="../css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
    <link href="../css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="../css/plugins/select2/select2.min.css" rel="stylesheet">

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
                                    $query=mysqli_query($con, "SELECT * FROM users WHERE id='".$user_id."' ");
                                    $query2=mysqli_fetch_array($query);
                                    ?>
                                    <div class="m-t-n-lg" style="margin-left: auto; margin-right: auto; width: 100%; " id="imgh">
			<?php 
                                      if ($query2['pix']=="") {
                                         echo '<img src="upload/profile/userimg.png" id="output" width="100"  name="showimg" class="img img-responsive my-img-thumbnail" width="200">';  
                                       }elseif (substr($query2['pix'], 0, 8) === "https://") {
                                           echo '<img src="'.$query2['pix'].'" id="output" width="100"  name="showimg" class="img img-responsive my-img-thumbnail" width="200">';   
                                       } else { echo '<img src="upload/profile/'.$query2['pix'].'" id="output"  name="showimg" class="img img-responsive my-img-thumbnail" width="200">'; } ?>
                                    </div>
                                    <div>
                                        <form role="form" method="POST" enctype="multipart/form-data" action="inc/profileaction.php">
                                            <div class="row"> 
                                                <div class="col-md-offset-2 col-md-8">
                                                    <div class="form-group">
                                                        <label class="fileContainer btn btn-sm btn-primary btn-block">
                                                            <i class="fa fa-camera"></i> Upload Image
                                                            <input type="file" accept="image/video/" required="required" name="uploads" id="output1" onchange="Validate(event);">
                                                        </label>
                                                    </div>

                                                </div>
                                                  <input class="btn btn-info"  type="submit" name="pics" value="Submit" style="margin-right:90px;">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="m-sm">
                                        <p class="small font-bold">

                                            <span><i class="fa fa-circle text-navy"></i> Available</span>
                                        </p>
                                    </div>
   
                                    <div class="">
                                        
                                    </div>
                                </div>
              
                            </div>
                            <div class="col-md-5">
                                <div class="">
                                    <div>
                                        <h2 class="no-margins font-bold">
                                               <?php 
                                        if ($username=="") {
                                            echo $fullname;
                                        }else{
                                            echo $username;
                                        }?>
                                        </h2>

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
                                          
                                        ?><small>&nbsp; <?php echo $query2['views']; ?>reviews</small>
                                        </div>
                                        <!-- <hr class="hr-line-dashed"> -->

                                        
                                        <span id="text">
                                  
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <div>
            
                                        <h3>
                                            Edit       
                                        Your Portforlio
                                        </h3>
                                    </div>
                                     <form role="form" >
                                        <div class="form-group"> 
                                            <textarea id="portforlio" placeholder="Whats on your mind" rows="5" class="form-control"></textarea>
                                        </div>
                                        <button class="btn btn-block btn-primary  m-t-n-xs" type="button" onclick="pro()">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-3">

                        <div class="ibox">
                            <div class="ibox-content">
                                    <h3>About           <?php 
                                        if ($username=="") {
                                            echo $fullname;
                                        }else{
                                            echo $username;
                                        }?></h3>
                                <?php 
                                $does=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id='".$user_id."' "));
                                ?>
                                <p class="small" id="portforlios">
                                        <?php echo $does['portforlio']; ?>                 
                                </p>
                            </div>
                        </div>

                

                    </div>

                    <div class="col-lg-6">

                        <div class="ibox material-shadow no-margins">
                            <div class="ibox-title">
                                <h5>All projects assigned to this account</h5>
                                <div class="ibox-tools">
                                    <a href="post-project.php" class="btn btn-primary btn-xs">Create new project</a>
                                </div>
                            </div>
                            <div class="ibox-content no-padding">
                                <div class="row p-sm">
                                    <div class="col-md-2">
                                      <a href="profile.php">  <button type="button" id="loading-example-btn" class="btn btn-white btn-sm" ><i class="fa fa-refresh"></i> Refresh</button></a>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="input-group"><input type="text" id="value" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                            <button type="button" class="btn btn-sm btn-primary" onclick="search()"> Go!</button> </span></div>
                                    </div>
                                </div>

                                <div class="project-list ">

                                    <table class="table table-hover">
                                        <tbody id="searchid">
                                        <?php 
                                        $assigned=mysqli_query($con, "SELECT * FROM currentworks WHERE activated_id='".$user_id."' ");
                                        while ($row=mysqli_fetch_array($assigned)) {
                                        $showpname=mysqli_fetch_array(mysqli_query($con, "SELECT projectName FROM projects WHERE id='".$row['project_id']."' "));
                                        ?>
                                        <tr>
                                            <td class="project-status">
                                                <?php 
                                                if ($row['status']==0) {
                                                   echo '<span class="label label-primary">Active</span>';
                                                }else{
                                                    echo '<span class="label label-default">Completed</span>';
                                                }
                                                
                                                ?>
                                            </td>
                                            <td class="project-title">
                                                <a href="project.php"><?php echo $showpname['projectName']; ?></a>
                                                <br/>
                                                <!-- <small>Created 14.08.2014</small> -->
                                            </td>
                                            <td class="project-completion">
                                                 
                                                <?php 
                                                if ($row['status']==0) {
                                                   echo '<small>Completion rate: 50%</small>
                                                     <div class="progress progress-mini">';
                                                   echo '<div style="width: 50%;" class="progress-bar"></div>';
                                                }else{
                                                      echo '<small>Completion rate: 100%</small>
                                                     <div class="progress progress-mini">';
                                                    echo '<div style="width: 100%;" class="progress-bar"></div>';
                                                }
                                                
                                                ?>       
                                            </div>
                                            </td>
                                            <td class="project-actions" width="90">
                                                <a  class="btn btn-white btn-sm"><i class="fa fa-folder"></i></a>
                                                <a  class="btn btn-white btn-sm"><i class="fa fa-pencil"></i></a>
                                            </td>
                                        </tr>
                                        <?php    } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- project list ends -->

                    <div class="col-lg-3 m-b-lg">
               
                        <div><h3>Skills</h3></div>
                        <div id="vertical-timeline" class="vertical-container light-timeline no-margins" style="width: 100%;">
                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon navy-bg">
        
                                </div>
                                <?php
                                $skill=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM bids WHERE bider_id='".$user_id."' "));
                                $projectskills=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM projects WHERE id='".$skill['project_id']."' "));
                                mysqli_query($con, "UPDATE users SET userSkills='".$projectskills['skillRequired']."' WHERE id='".$user_id."' ");
                                ?>
                                <div class="vertical-timeline-content">
                                    <span class="vertical-date">
                                        <?php echo $projectskills['skillRequired']; ?>
                                    </span>

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
      <script src="../js/plugins/chosen/chosen.jquery.js"></script>
    <!-- Tags Input -->
    <script src="../js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    <script type="text/javascript">
        function pro(){
            var check=1;
            var msg=document.getElementById("portforlio").value;
            if (msg=="") {alert('empty')
        }else{
            var xhttp = new XMLHttpRequest();
           xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            alert("updated portforlio")
            document.getElementById("portforlios").innerHTML = xhttp.responseText;
          }
       }
             xhttp.open("POST", "inc/ajaxprofile.php", true);
       xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       xhttp.send("msg="+msg+"&check="+check);
       }
   }
       function search(){
            var check=2;
            var search=document.getElementById("value").value;
            var xhttp = new XMLHttpRequest();
           xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("searchid").innerHTML = xhttp.responseText;
          }
       }
       xhttp.open("POST", "inc/ajaxprofile.php", true);
       xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       xhttp.send("search="+search+"&check="+check);
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
