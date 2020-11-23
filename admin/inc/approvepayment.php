<?php

require "../../auth/access_levels.php";

$updateme=mysqli_query($con, "UPDATE completedworks SET status=1 WHERE project_id='".$_POST['p']."' ");
$getwallet=$_POST['wallet'];
$getawardedPrice=$_POST['awp'];
$gettotal=$getwallet-$getawardedPrice;
$updateusers=mysqli_query($con, "UPDATE users SET wallet='".$gettotal."' WHERE id='".$_POST['o']."' ");
$percent=floor(7/100*$getawardedPrice);
$mainamount=$getawardedPrice-$percent;
$updateusers2=mysqli_query($con, "UPDATE users SET wallet=wallet+'".$mainamount."' WHERE id='".$_POST['a']."' ");
$updateusers3=mysqli_query($con, "UPDATE currentworks SET status=5 WHERE project_id='".$_POST['p']."' ");

               $Downloadquery=mysqli_query($con, "SELECT * FROM completedworks WHERE owner_id='".$user_id."' AND status=0");
                         ?>
                          <div class="form-inline" id="html">
                         <?php
                         while ($down=mysqli_fetch_array($Downloadquery)) {
                          $use=mysqli_query($con, "SELECT wallet FROM users WHERE id='".$down['owner_id']."' ");
                          $countquery=mysqli_query($con, "SELECT SUM(awardedPrice) AS chee FROM completedworks WHERE owner_id='".$down['owner_id']."' AND status=0 ");
                          $countquery1=mysqli_fetch_array($countquery);
                          $use1=mysqli_fetch_array($use);
	                         $checkuse1=$use1['wallet'];
	                         $checkdown=$countquery1['chee'];
                             if ($checkuse1>=$checkdown) {
                              ?>
                            <h4>Title: </h4>
                         <?php
                          echo '<a href="inc/download.php?file='.$down['documents'].'"><button class="btn btn-success">Download</button></a>'; ?>
                         <button class="btn btn-warning" onclick="work(<?php echo $use1['wallet']; ?>,<?php echo $down['owner_id'];?>,<?php echo $down['project_id'];?>, <?php echo $down['activated_id']; ?>, <?php echo $down['awardedPrice']; ?>)">Approve payment</button>

                            <?php 
                          }else{
                            echo "<h3 style='color:red;'>You have pending Downloads please credit wallet</h3>";
                            
                          }
                              }?>
                         </div>