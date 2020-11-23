  <?php
include_once '../../auth/session.php';
include_once '../../auth/dbc.php';
require "../../auth/access_levels.php";
$uid=mysqli_real_escape_string($con, $_POST['user_id']);
$activated_id=mysqli_real_escape_string($con,$_POST['activated_id']);
$project_id=mysqli_real_escape_string($con, $_POST['project_id']);
     function humanTiming ($time){

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
?>
    <?php
     $chatquery=mysqli_query($con, "SELECT * FROM messagebox WHERE project_id='".$project_id."' AND sender_id='".$user_id."' OR receive_id='".$user_id."' AND project_id='".$project_id."'  GROUP BY id ASC");
        $num = mysqli_num_rows($chatquery);

        if($num > 0){
          while ($row=mysqli_fetch_array($chatquery)) {
              $_SESSION['chat_id']=$row['id'];
              $sender=$row['sender_id'];
              $receive=$row['receive_id'];
              $dateposted=$row['date_of_messages'];
              $u1=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id='".$sender."'"));
              $u2=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id='".$receive."'"));
                    ?>
            <?php if ($sender==$user_id) {?>
                 <div class="chat-message left">
                    <img class="message-avatar img img-circle" src="upload/avatar.png" alt="user Avatar" >
                  <div class="message">
                      <a class="message-author" href="#">
                       <?php if($u1['username']!=="")
                       echo $u1['username'];
                       elseif($u1['username']==""){
                        echo $u1['first_name']." ".$u1['last_name'];
                      } ?>
                        </a>
                      <span class="message-date">
                        <?php 
                            $time = strtotime($dateposted);
                            echo humanTiming($time);  
                        ?> ago
                      </span>
                       <?php     $chattext=$row['post'];
                             echo'<span class="message-content" id="txt"> 
                                    '.$chattext.'                         
                                 </span>';
                      
                    echo "</div>"; 

                    echo "</div>";
                    
                  }elseif($receive==$user_id){?>
                   <div class="chat-message right">
                       <img class="message-avatar img img-circle" src="upload/avatar.png" alt="user Avatar" >
                  <div class="message">
                      <a class="message-author" href="#"> 
                         <?php if($u1['username']!=="")
                       echo $u1['username'];
                       elseif($u1['username']==""){
                        echo $u1['first_name']." ".$u1['last_name'];
                      } ?>
                      </a>
                      <span class="message-date"> 
                          <?php 
                            $time = strtotime($dateposted);
                            echo humanTiming($time);  
                        ?> ago
                       </span>
                    <?php     
                       $chattext=$row['post'];
                   echo'<span class="message-content" id="txt"> 
                          '.$chattext.'                         
                       </span>';
            
                    echo "</div>"; 

                    echo "</div>";
                  } ?>
                 
                   <?php   }
           }else {
          $_SESSION['chat_id'] = 0;
            }
      ?>
