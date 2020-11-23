<?php
include_once '../../auth/session.php';
include_once '../../auth/dbc.php';
require "../../auth/access_levels.php";
$uid=$_POST['user_id'];
$activated_id=$_POST['activated_id'];
$project_id=$_POST['project_id'];
?>
    <a href="messanger.php" id="btn-prev">Back</a>
    <div class="ibox-content" id="chat" >
        <div class="row">
            <div class="col-md-3">
               <!--  <a href="milestone.php?id=<?php echo base64_encode($project_id." ".$activated_id." ".$uid); ?>"><button class="btn btn-warning">Create Milestone </button></a> -->
                     
            </div>
            <div class="col-md-6 " >
                <div class="chat-discussion">
                <div id="fill">
                <?php 
                include_once "refreshmessages.php"; 
                ?>
                </div>
                    <div id="last">
                    </div>
                </div>
                <div class="">
                    <div class="input-group">
                        <input type="hidden" value="<?php echo $activated_id; ?>" id="reciever">
                        <input type="hidden" value="<?php echo $uid; ?>" id="sender">
                        <input type="hidden" value="<?php echo $project_id;?>" id="project_id">

                        <input class="form-control" name="message" id="message" required="required" placeholder="Enter message text">

                        <div class="input-group-btn">

                            
                            <button class="btn btn-white" id="btnn" type="submit" onclick="message()" style="border-left: none !important;">send</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="chat-users">
                            