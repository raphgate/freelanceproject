<?php
require "../../auth/access_levels.php";
$project_id=$_POST['project_id'];
$me=$_POST['me'];
$you=$_POST['you'];
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
           <div class="content" >
       <?php 
    
    $chatquery=mysqli_query($con, "SELECT * FROM messagebox WHERE project_id='".$project_id."' AND sender_id='".$me."' OR receive_id='".$me."' AND project_id='".$project_id."'  GROUP BY id ASC");
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
                    <div class="left">
                        <div class="author-name">
                            <?php 
                         if($u1['username']!=="")
	                       echo $u1['username'];
	                       elseif($u1['username']==""){
	                        echo $u1['first_name']." ".$u1['last_name'];
	                      } ?>
                           <small class="chat-date">
                              <?php 
                            $time = strtotime($dateposted);
                            echo humanTiming($time);  
                        ?> ago
                        </small>
                        </div>
                        <div class="chat-message active">
                            <?php echo $row['post']; ?>
                        </div>
                    </div>
                    <?php }elseif($receive==$user_id){?>
                    <div class="right">
                        <div class="author-name">
                             <?php if($u1['username']!=="")
	                       echo $u1['username'];
	                       elseif($u1['username']==""){
	                        echo $u1['first_name']." ".$u1['last_name'];
	                      } ?>
                            <small class="chat-date">
                                 <?php 
                            $time = strtotime($dateposted);
                            echo humanTiming($time);  
                        ?> ago
                            </small>
                        </div>
                        <div class="chat-message">
                             <?php echo $row['post']; ?>
                        </div>
                    </div>
                <?php }
            	}
                 } 
                 else {
                	$_SESSION['chat_id'] = 0;
                	} 
                ?>
                <div id="appendmessage">
                </div>
                </div>
                <div class="form-chat" style="bottom:0;position:absolute;">
                    <div class="input-group input-group-sm">
                    	<input type="hidden" value="<?php echo $you; ?>" id="reciever">
                        <input type="hidden" value="<?php echo $me; ?>" id="sender">
                        <input type="hidden" value="<?php echo $project_id;?>" id="project_id">
                        <input type="text" id="mg" class="form-control">
                        <span class="input-group-btn"> <button onclick="send()"
                            class="btn btn-primary" type="button" id="btn">Send
                    </button> </span></div>
                </div>
