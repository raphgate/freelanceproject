<?php
require "../../auth/access_levels.php";
$person_id=$_POST['use'];
?>

                                <?php 
                                	mysqli_query($con, "UPDATE users SET notifications=0 WHERE id='".$person_id."' "); ?>
                                     <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                  
                                           <span  id="omo"></span>
                                	</a>
                                	<?php
                                    $feedquery=mysqli_query($con, "SELECT * FROM projects  ORDER BY id DESC LIMIT 5  ");
                                    while ($row=mysqli_fetch_array($feedquery)) {
                           
                                ?>
                                     <li>
                                        <div class="dropdown-messages-box">
                                         <a href="myskills.php">
                                            <a href="myskills.php" class="pull-left">
                                               <i class="fa fa-laptop fa-3x"></i>
                                            </a>
                                            <div class="media-body">
                                                <small class="pull-right"></small>
                                                <strong><?php echo $row['projectName']; ?></strong> <br>
                                                 <strong><?php echo $row['skillRequired']; ?></strong> <br>
                                                 <p><?php echo $row['estimated_budget']; ?></p>
                                                <small class="text-muted"><?php echo $row['postDate']; ?></small>
                                            </div>
                                          </a>
                                        </div>
                                        
                                    </li>
                                   
                                    <li class="divider"></li>
                                        <?php  }?>
                                    <li>
                                        <div class="text-center link-block">
                                            <a href="mailbox.html">
                                                <!-- <i class="fa fa-envelope"></i> <strong>Read All Messages</strong> -->
                                            </a>
                                        </div>
                                    </li>