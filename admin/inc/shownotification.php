<?php
include_once '../../auth/session.php';
include_once '../../auth/dbc.php';
require "../../auth/access_levels.php";

?>
       <?php $usercheck=mysqli_query($con, "SELECT * FROM users WHERE id='".$user_id."' AND notifications=1 ");
             $usercheck1=mysqli_num_rows($usercheck);
       if ($usercheck1>0) {
            echo '<span class="label label-danger" id="omo"><i class="glyphicon glyphicon-circle" >!</i></span>';
            }else{
                echo '<span  id="omo"></span>';
            }
       ?>