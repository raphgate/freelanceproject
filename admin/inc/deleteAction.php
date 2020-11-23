<?php

require "../../auth/access_levels.php"; 
$projects=$_POST['projects'];
 $record_per_page = 10;  
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
$deleteproject=mysqli_query($con, "UPDATE currentworks SET status=2 WHERE project_id='".$projects."'   ");
$completedwork=mysqli_query($con, "UPDATE completedworks SET status=1 WHERE project_id='".$projects."' ");
echo '<tbody id="delete">';
    function newTime ($Time) {
         $currentday= strtotime(date("Y-m-d h:i:sa"));
         $timeelapsed=round((($currentday-$Time)/86400),1);
         $timeleft=(7-$timeelapsed);
         if (strpos($timeleft, '.')) {
            $i=explode('.', $timeleft);
             $hr=24*($i[1]/10);
             if ($i[0]<1) {
                 echo "Expired";
             }else{
                 echo $i[0]." day(s) ".round($hr,0)."hr(s)";
             }
         }elseif(!strpos($timeleft, '.')){
            if ($timeleft<1) {
                echo "Expired";
            }else{
                echo $timeleft."day(s)";
            }
            
         }  }
$progressQuery=mysqli_query($con, "SELECT * FROM currentworks WHERE status=0 AND owner_id='$user_id' OR activated_id='$user_id' AND status=0  GROUP BY project_id,owner_id ORDER BY id DESC LIMIT $start_from, $record_per_page ");
while ($rows=mysqli_fetch_array($progressQuery)) {
$dateTime=$rows['date'];

$selectproject=mysqli_query($con, "SELECT * FROM projects WHERE id='".$rows['project_id']."' GROUP BY id ");
$progressarray=mysqli_fetch_array($selectproject);
$progressname=$progressarray['projectName'];  
                                         
$querycount=mysqli_query($con, "SELECT * FROM users WHERE id='".$rows['activated_id']."' GROUP BY id ");
$querycount1=mysqli_fetch_array($querycount); 
$queryname=$querycount1['first_name']." ".$querycount1['last_name'];
$queryusername=$querycount1['username'];
$queryuserbid=mysqli_query($con, "SELECT * FROM bids WHERE bider_id='".$rows['activated_id']."' AND project_id='".$rows['project_id']."' GROUP BY project_id  ");
$bidvalue=mysqli_fetch_array($queryuserbid);
$valueaccepted=$bidvalue['bidAmount'];  
?>

<tr >
    <td>
        <a href=""><h4><?php echo $progressname; ?></h4></a>
    </td>
    <td><?php if ($queryusername!=="") {
            echo $queryusername;
          }else{ echo $queryname; } ?></td>
    <td>$ <?php echo $valueaccepted; ?></td>
    <td><?php $Time=strtotime($dateTime); echo newTime($Time); ?></td>
     <td>-
    </td>
    <td>
      <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">select
        <span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
            <li role="presentation"><a href="#" class="delete_project" data-custom-value="<?php echo $rows['project_id']; ?>" >Delete</a></li>

            <li role="presentation"><a role="menuitem" tabindex="-1" href="milestone.php?id=<?php echo base64_encode($rows['project_id'].' '.$rows['activated_id'].' '.$rows['owner_id']); ?>">Create Milestone Request</a></li>

        </ul>
      </div>
    </td>                                                             
</tr>
<?php }  ?>
  </tbody>
  