<?php
require "../../auth/access_levels.php";
$name=mysqli_real_escape_string($con, $_POST['search']);
 $record_per_page = 20;  
 $page = '';  
 $output = '';  
 $output1 = '';
 $output2 = '';
 if(isset($_POST["page"]))  
 {  
      $page = $_POST["page"];  
 }  
 else  
 {  
      $page = 1;  
 }  
 $start_from = ($page - 1)*$record_per_page;

?>
 <table class="table table-hover">
                <thead>
                    <th></th>
                    <th>PROJECT/CONTEXT</th>
                    <th>ID</th>
                    <th>BIDS/ENTRIES</th>
                    <th>STARTED</th>
                    <th>AVG BID PRICE(&#x20A6;)</th>
                    <th><i class="fa fa-bookmark fa-2x"></i></th>
                </thead>
                                    <?php 
                               

                                    function humanTiming ($time)
                                    {

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
                                  
                                    $myskillsquery=mysqli_query($con, "SELECT * FROM projects WHERE projectName LIKE '%$name%' OR category LIKE '%$name%' OR pro_id LIKE '%$name%' ORDER BY id DESC LIMIT $start_from, $record_per_page ");
                                    while ($skillarray=mysqli_fetch_array($myskillsquery)) {
                                            $project_id=$skillarray['id'];
                                            $projectTile=$skillarray['projectName'];
                                            $projectsummary=$skillarray['projectDescribe'];
                                            $dateposted=$skillarray['postDate'];
                                            $skillsrequired=$skillarray['skillRequired'];   
                                            $budget=$skillarray['estimated_budget']; 
                                            $pd=$skillarray['pro_id'];                        
                                    $bidsquery=mysqli_query($con, "SELECT * FROM bids WHERE project_id='$project_id' ");
                                    $bidno=mysqli_num_rows($bidsquery);
                                    $averagbidquery=mysqli_query($con, "SELECT project_id, AVG(bidAmount) AS Avgbid FROM bids WHERE project_id='$project_id' GROUP BY project_id ");
                                    $bidarray=mysqli_fetch_array($averagbidquery);
                                    $showAvg=$bidarray['Avgbid'];
                               
                                      ?>
                                        <tbody>
                                        <tr>
                                            <td class="project-status">
                                                <i class="fa fa-laptop fa-3x"></i>
                                            </td>
                                            <td class="project-title">
                                                <a href="project_detail.php"><h3> <?php echo $projectTile; ?></h3></a>
                                                <p><?php echo $projectsummary; ?></p>
                                                <h6><?php echo $pd; ?></h6>
                                                <small><a href=""><?php echo $skillsrequired; ?></a></small>
                                            </td>
                                            <td>
                                                 <h6><?php echo $pd; ?></h6>
                                            </td>
                                            <td class="project-completion">
                                                <?php echo $bidno; ?>
                                            </td>
                                            <td width="150"><?php
                                             $time = strtotime($dateposted);
                                             echo humanTiming($time);  ?> <i class="fa fa-clock-o"> ago </i>
                                            </td>
                                            <td class="project-actions" width="170">
                                                <?php echo floor($showAvg); ?>
											<?php
											 // $freetrail=mysqli_query($con, "SELECT * FROM users WHERE id='".$user_id."' AND date_registered>=(NOW(), INTERVAL 7 DAYS) ");
                                                // $freetrail1=mysqli_num_rows($freetrail);
                                                // if ($freetrail1>0) {
                                                   
                                                // }else{
                                                    
                                                // }
                                                $checkplan=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM annual_plans WHERE user_id='".$user_id."' AND date>=DATE_SUB(NOW(), INTERVAL 1 YEAR) "));
                                                // echo $checkplan['date'];
                                                $amount=$checkplan['paidAmount'];
                                                // echo $amount;
                                                if ($budget=='Meduim project') {
                                                    if ($amount>=2500) {
                                                        echo '<a href="bid-project.php?id='.base64_encode($project_id).'"><button class="btn btn-primary" style="width:75%;">Bid Now</button></a>';
                                                    }else{
                                                     echo '<a href="payment.php"><button class="btn btn-warning">Upgrade plan</button></a>';  
                                                    }
                                                }elseif ($budget=='Large project') {
                                                    if ($amount>=5000) {
                                                     echo '<a href="bid-project.php?id='.base64_encode($project_id).'"><button class="btn btn-primary" style="width:75%;">Bid Now</button></a>';
                                                    }else{
                                                     echo '<a href="payment.php"><button class="btn btn-warning">Upgrade plan</button></a>';  
                                                    }
                                                }elseif ($budget=='Larger project') {
                                                    if ($amount>=10000) {
                                                       echo '<a href="bid-project.php?id='.base64_encode($project_id).'"><button class="btn btn-primary" style="width:75%;">Bid Now</button></a>';
                                                    }else{
                                                         echo '<a href="payment.php"><button class="btn btn-warning">Upgrade plan</button></a>';  
                                                    } 
                                                }elseif ($budget=='Very Large project') {
                                                    if ($amount>=20000) {
                                                      echo '<a href="bid-project.php?id='.base64_encode($project_id).'"><button class="btn btn-primary" style="width:75%;">Bid Now</button></a>';
                                                    }else{
                                                      echo '<a href="payment.php"><button class="btn btn-warning">Upgrade plan</button></a>';    
                                                    }
                                                    
                                                }elseif ($budget=='Huge project') {
                                                    if ($amount>=50000) {
                                                       echo '<a href="bid-project.php?id='.base64_encode($project_id).'"><button class="btn btn-primary" style="width:75%;">Bid Now</button></a>';
                                                    }else{ echo '<a href="payment.php"><button class="btn btn-warning">Upgrade plan</button></a>';}
                                                  
                                                }elseif ($budget=='Major project') {
                                                    if ($amount>=100000) {
                                                      echo '<a href="bid-project.php?id='.base64_encode($project_id).'"><button class="btn btn-primary" style="width:75%;">Bid Now</button></a>';
                                                 
                                                    }else{
                                                       echo '<a href="payment.php"><button class="btn btn-warning">Upgrade plan</button></a>';   
                                                    }
                                                }
	 										?>
                                                
                                            </td>
                                            <td><i class="fa fa-bookmark-o fa-2x"></i></td>
                                        </tr>
                                       <?php   }  ?>
                                        </tbody>
                                    </table>

                       