<?php
require "../../auth/access_levels.php";


if ($_POST['check']==1) {

$msg=mysqli_real_escape_string($con, $_POST['msg']);
$update=mysqli_query($con, "UPDATE users SET portforlio='".$msg."' WHERE id='".$user_id."' ");

$does=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id='".$user_id."' "));
?>
<p class="small" id="portforlio">
        <?php echo $does['portforlio']; ?>                 
</p>

<?php
} elseif ($_POST['check']==2) { ?>
<tbody id="searchid">
        <?php 
        $sa=$_POST['search'];
        $assigned=mysqli_query($con, "SELECT * FROM currentworks WHERE activated_id='".$user_id."' ");
        while ($row=mysqli_fetch_array($assigned)) {
        $showpname1=mysqli_query($con, "SELECT projectName FROM projects WHERE id='".$row['project_id']."' AND projectName LIKE '%$sa%' ");
        	while ($showpname=mysqli_fetch_array($showpname1)) {
        
        
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
        <?php  	}  } ?>
        </tbody>


<?php }  ?>