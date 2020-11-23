<?php
include_once '../../auth/session.php';
include_once '../../auth/dbc.php';
require "../../auth/access_levels.php";
$uid=$_POST['user_id'];
$activated_id=$_POST['activated_id'];
$project_id=$_POST['project_id'];
?>
    <div class="ibox-content" id="chat">

        <div class="row">
            <div class="col-md-3">
                <button class="btn btn-warning">Create Milestone <?php echo $activated_id; ?></button>
                      <?php echo $project_id; ?>
                      <?php echo $uid; ?>
            </div>
            <div class="col-md-6 " >
                <div class="chat-discussion">
                    <div id="fill">
                <?php 
                include_once "refreshmessages.php"; 
                ?>
                    <!-- <div id="last">
                        ghjghjghj
                    </div> -->
                   </div>
                 
               
                </div>
                <div class="">
                    <div class="input-group">
                        <input type="hidden" value="<?php echo $activated_id; ?>" id="reciever">
                        <input type="hidden" value="<?php echo $uid; ?>" id="sender">
                        <input type="hidden" value="<?php echo $project_id;?>" id="project_id">
                        <input class="form-control" name="message" id="message" required="required" placeholder="Enter message text">
                        <div class="input-group-btn">
                            <button tabindex="-1" class="btn btn-white" type="button" style="border-left: none !important; border-right: none !important;"><i class="fa fa-smile-o"></i></button>
                            <button class="btn btn-white" type="submit" onclick="message()" style="border-left: none !important;">send</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="chat-users">
                     <?php 
                        $messagequery=mysqli_query($con, "SELECT * FROM currentworks WHERE status=0  AND owner_id='".$user_id."' OR  activated_id='".$user_id."' AND status=0  GROUP BY project_id ");
                        while($messagequery2=mysqli_fetch_array($messagequery)){
                        $activated_id=$messagequery2['activated_id'];
                        $date=$messagequery2['date'];
                        $owner=$messagequery2['owner_id'];
                        $project_id=$messagequery2['project_id'];
                        $selectproject=mysqli_query($con, "SELECT * FROM projects WHERE id='".$messagequery2['project_id']."' ");
                        $rows=mysqli_fetch_array($selectproject);
                        $projectName=$rows['projectName'];
                        $selectactivatedperson=mysqli_query($con, "SELECT * FROM users WHERE id='".$activated_id."' ");
                        $row=mysqli_fetch_array($selectactivatedperson);
                        $pix=$row['pix'];
                        $queryname=$row['first_name']." ".$row['last_name'];
                        $queryusername=$row['username'];   
                        $ownerquery=mysqli_query($con, "SELECT * FROM users WHERE id='".$owner."' ");
                        $rose=mysqli_fetch_array($ownerquery); 
                        $pixel=$rose['pix'];
                        $ownerqueryname=$rose['first_name']." ".$rose['last_name'];
                        $ownerqueryusername=$rose['username'];                                                          
                        ?>
                        <?php if ($user_id==$activated_id) { ?>
               <!-- -->
                        <div class="users-list"  onclick="divonclick(<?php echo $user_id; ?>,<?php echo $owner; ?>,<?php echo $project_id;?>)">
                       <?php }
                        else{ ?>
                 <!--  -->
                        <div class="users-list"  onclick="divonclick(<?php echo $user_id; ?>,<?php echo $activated_id; ?>,<?php echo $project_id;?>)">
                        <?php  } ?>
                        <div class="chat-user">
                            <div class="user-contact" >
                                <!-- <a href="#"> -->
                                    <div class="media">
                                        <div class="pull-left one-user" href="#">
                                            <img class="media-object img img-responive img-circle" src="img/a3.jpg" alt="" width="40">
                                        </div>
                                        <div class="media-body">
                                            <small class="pull-right text-muted"> 16.02.2015</small>
                                            <h4 class="media-heading">
                                                <?php
                                                   if ($queryusername==$username) {
                                                       echo $ownerqueryusername;
                                                       if ($queryname==$fullname) {
                                                           echo $ownerqueryname;
                                                       }
                                                    }
                                                    elseif ($queryusername!=="") {
                                                            echo $queryusername;
                                                    }elseif($queryusername=="")
                                                    {echo $queryname; }
                                                ?>
                                            </h4>
                                            <p><span class="pull-right label label-success">Online</span><?php echo $projectName; ?></p>
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
   
