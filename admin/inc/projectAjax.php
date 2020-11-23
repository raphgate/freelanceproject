<?php
include_once '../../auth/session.php';
include_once '../../auth/dbc.php';
require "../../auth/access_levels.php"; 

$projectID=mysqli_real_escape_string($con, $_POST['project']);
$actiontoperform=mysqli_real_escape_string($con, $_POST['actiontoperform']);
$updateQuery=mysqli_query($con, "UPDATE projects SET status='$actiontoperform' WHERE id='$projectID' ");
$updateQuery2=mysqli_query($con, "UPDATE bids SET status='$actiontoperform' WHERE project_id='$projectID' ");
    function countDown($time){
         $currentday= strtotime(date("Y-m-d h:i:sa"));
         $timeelapsed=round((($currentday-$time)/86400),1);
         $timeleft=(7-$timeelapsed);
         $i=explode('.', $timeleft);
         $hr=($i[1]/10)*24;
         echo $i[0]."  day(s) ".round($hr,0)."hr(s)";
  
        
        }
         
         $bidtimequery=mysqli_query($con, "SELECT * FROM bids WHERE bider_id='$user_id'  GROUP BY project_id ");
            while ($bidarray=mysqli_fetch_array($bidtimequery)) {
                  $projectId=mysqli_real_escape_string($con, $bidarray['project_id']);
                  $databaseDate=mysqli_real_escape_string($con, $bidarray['date']);
           		
                  $selectQuery=mysqli_query($con, "SELECT * FROM projects WHERE id='$projectId'  GROUP BY id ");
                  $selectQuery2=mysqli_fetch_array($selectQuery);
                  $projectname=mysqli_real_escape_string($con, $selectQuery2['projectName']);
            $bidQuery=mysqli_query($con, "SELECT project_id FROM bids WHERE project_id='$projectId'   ");
            $bidCount=mysqli_num_rows($bidQuery);
              $cur=strtotime(date("Y-m-d h:i:sa"));
              $str=strtotime($databaseDate);
              $rountime=round((($cur-$str)/86400),0);
              $timeleft=7-$rountime;
              if($timeleft>=0){
            $Averagebid=mysqli_query($con, "SELECT AVG(bidAmount) AS averageamount, date FROM bids WHERE DATE_SUB(date, INTERVAL 1 HOUR) AND project_id='$projectId'  GROUP BY project_id,HOUR(date)");
            $Av=mysqli_fetch_array($Averagebid);
            $showAvg=mysqli_real_escape_string($con, $Av['averageamount']);
        

?>		

		<tr >
        <td><a href=""><h4><?php echo $projectname; ?></h4></a></td>
        <td><?php echo $bidCount; ?></td>
        <td><?php echo floor($showAvg); ?> USD / Hour</td>
        <td>in <?php  $time = strtotime($databaseDate);
                    echo countDown($time); ?> days</td>
        <td>
           <div class="dropdown">
              <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">select
              <span class="caret"></span></button>
              <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                   <li role="presentation"><a role="menuitem" tabindex="-1" href="retract.php">Retact Bid</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="editbid.php">Edit</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Send message</a></li>
                 <li role="presentation"><a role="menuitem" tabindex="-1" href="clearify.php">Clarify</a></li>
              </ul>
            </div>
        </td>
    </tr>
   <?php }}?>