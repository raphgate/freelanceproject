  <?php
     require "../auth/access_levels.php"; 
  ?>
        <div class="row border-bottom white-bg" style="padding-bottom: 0px !important;">
            <nav class="navbar navbar-static-top  navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                            <i class="fa fa-reorder"></i>
                        </button>
                        <a href="home.php" class="navbar-brand">eBrang</a>
                    </div>
                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">Hire Freelancers<span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li class="p-sm"><h4>FIND A FREELANCER</h4></li>
                                    <li><a href="post-project.php">Post a Project</a></li>
                                    <li class="p-sm"><h4>DISCOVER</h4></li>
                                   <!--  <li><a href="#">Browse Directory</a></li> -->
                                    <li><a href="blog.php">Community</a></li>
                                    <li><a href="showroom.php">Showcase</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">Work<span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li class="p-sm"><h4>FIND WORK</h4></li>
                                    <li><a href="myskills.php">Projects with My Skills</a></li>
                                    <li><a href="browse-project.php">Browse Projects</a></li>
                                    <li><a href="browse-category.php">Browse Category</a></li>
                                  <!--   <li><a href="#">Browse Categories</a></li> -->
                                   <!--  <li><a href="#">Bookmarks</a></li> -->
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">My Projects<span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li class="p-sm">MANAGE</h4></li>
                                    <li><a href="project.php">My Projects</a></li>
                                    <li><a href="home.php">Dashboard</a></li>
                                    <li><a href="messanger.php">Inbox</a></li>
                                    <!-- <li><a href="#">Feedback</a></li> -->
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">Help<span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li class="p-sm"><h4>GET HELP</h4></li>
                                    <li><a href="eBrang_help.php"> Get Support</a></li>
                                    <li><a href="How_it_works.php"> How eBrang.com Works</a></li>
                                   <!--  <li><a href="#"> Frequently Asked Questions</a></li> -->
                                    <li><a href="feesandcharges.php"> Fees and Charges</a></li>
                                    <li><a href="Disputes.php"> Disputes</a></li>
                                </ul>
                            </li>
                             <li>
                                <form role="search" class="navbar-form-custom" action="search-result.php" method="POST">
                                    <div class="input-group">
                                        <input type="text" placeholder="Search" required="required" name="searchname"  class="input-sm form-control"> 
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-sm btn-primary" onclick="topsearch()"> <i class="fa fa-search"></i></button> 
                                        </span>
                                    </div> 
                                </form>
                            </li>
                        </ul>
                        <ul class="nav navbar-top-links navbar-right">
                            <li class="dropdown">
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                    <?php $q=mysqli_query($con, "SELECT wallet FROM users WHERE id='".$user_id."'");
                                    $q1=mysqli_fetch_array($q); ?>
                                   <i class="fa fa-money"></i> &#x20A6; <?php echo $q1['wallet']; ?>
                                </a>
                                <ul class="dropdown-menu dropdown-alerts">
                                    <li class="p-sm"><h4>MANAGE</h4></li>
                                    <li>
                                        <a href="auditor.php">
                                            <i class="fa fa-envelope fa-fw"></i>Financial Dashboard
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                     <!--    <a href="">
                                            <i class="fa fa-upload fa-fw"></i> Transaction History
                                        </a> -->
                                    </li>
                                    <!-- <li class="divider"></li> -->
                                    <li>
                                        <a href="withdraw.php">
                                            <i class="fa fa-upload fa-fw"></i> Withdraw Money
                                        </a>
                                    </li>
                                      <li class="divider"></li>
                                    <li>
                                        <a href="creadit-account.php">
                                            <i class="fa fa-upload fa-fw"></i> Credit Wallet
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown" onmouseover="feedbacks(<?php echo $user_id; ?>)" >
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#"  onclick="changestatus()">
                                   <i class="fa fa-feed"></i>
                                   <p id="shownote">
                                     <?php $usercheck=mysqli_query($con, "SELECT * FROM users WHERE id='".$user_id."' AND notifications=1 ");
                                         $usercheck1=mysqli_num_rows($usercheck);
                                   if ($usercheck1>0) {
                                        echo '<span class="label label-danger" id="omo"><i class="glyphicon glyphicon-circle" >!</i></span>';
                                        }else{
                                            echo '<span  id="omo"></span>';
                                        }
                                   ?>
                                   </p>
                                </a>
                                <ul class="dropdown-menu dropdown-messages" id="fee">
                                <?php 
                                    $feedquery=mysqli_query($con, "SELECT * FROM projects ORDER BY id DESC LIMIT 20  ");
                                    $counfeed=mysqli_num_rows($feedquery);
                                    while ($row=mysqli_fetch_array($feedquery)) {
                                ?>
                                    <li class="">
                                        <a href="myskills.php">
                                        <div class="dropdown-messages-box">
                                         
                                            <a href="#" class="pull-left">
                                                 <i class="fa fa-laptop fa-3x"></i>
                                            </a>
                                            <div class="media-body">
                                                <strong><?php echo $row['projectName']; ?></strong> <br>
                                                 <strong><?php echo $row['skillRequired']; ?></strong> <br>
                                                 <p><?php echo $row['estimated_budget']; ?>)</p>
                                                <small class="text-muted"><?php echo $row['postDate']; ?></small>
                                            </div>
                                          
                                        </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                        <?php  }?>
                                    <li>
                                        <div class="text-center link-block">
                                           <!--  <a href="mailbox.html">
                                                <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                            </a> -->
                                        </div>
                                    </li>
                                </ul>
                           
                            </li>
                            <?php
                            $checkbidnotification=mysqli_query($con, "SELECT * FROM bids WHERE post_id='".$user_id."' AND notify=0 GROUP BY project_id ");
                            $checkbidnotification1=mysqli_num_rows($checkbidnotification);
                            ?>
                            <li class="dropdown" onclick="notification()">
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" >
                                    <i class="glyphicon glyphicon-bell"></i>  <span class="label label-warning" id="jj"><?php echo $checkbidnotification1; ?></span>
                                </a>
                                <ul class="dropdown-menu dropdown-messages">
                                    <?php 
                                   
                                   
                                    $bidnotification=mysqli_query($con, "SELECT * FROM bids WHERE post_id='".$user_id."' GROUP BY project_id ");
                                    while ($bidrow=mysqli_fetch_array($bidnotification)) {
                                    $doo=$bidrow['bider_id'];
                                    $clock=$bidrow['date'];
                                    $project=mysqli_query($con, "SELECT * FROM projects WHERE id='".$bidrow['project_id']."' ");
                                    $projectName=mysqli_fetch_array($project);
                                    $bidcounts=mysqli_query($con, "SELECT COUNT(bider_id) AS foo FROM bids WHERE project_id='".$bidrow['project_id']."' ");
                                    $bidcounts1=mysqli_fetch_array($bidcounts);
                                    $bidav=mysqli_query($con, "SELECT AVG(bidAmount) AS averageamount, date FROM bids WHERE DATE_SUB(date, INTERVAL 1 HOUR) AND project_id='".$bidrow['project_id']."' ");
                                    $bidav1=mysqli_fetch_array($bidav);
                                    $showAvgs=mysqli_real_escape_string($con, $bidav1['averageamount']);
                                    $usersle=mysqli_query($con, "SELECT * FROM users WHERE id='".$doo."' ");
                                    $usersle1=mysqli_fetch_array($usersle);
                                    $ago1=$clock;  
                                    ?>
                                    <li >
                                        <div class="dropdown-messages-box">
                                            <a href="#" class="pull-left">
                                                <i class="fa fa-laptop fa-3x"></i>
                                            </a>
                                           
                                            <div class="media-body">
                                                <small class="pull-right"></small>
                                                <h5>Hi! Please you have bid(s) from <?php  if($usersle1['username'] !==""){echo $usersle1['username'];}else{echo $usersle1['first_name']."".$usersle1['last_name'];} ?> and <?php echo $bidcounts1['foo']-1; ?> other(s) an of average &#8358; <?php echo floor($showAvgs); ?> </h5>
                                                <strong>on <?php echo $projectName['projectName']; ?></strong> <strong></strong>. <br>
                                                <small class="text-muted">
                                                <?php
                                                 echo $ago1;
                                                 ?>
                                                </small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <?php }?>
                                        <li>
                                       <!--  -->
                                    </li>
                                </ul>
                            </li>
                            <?php
                            $messagequery=mysqli_query($con, "SELECT * FROM messagebox WHERE receive_id='".$user_id."' AND status=0 GROUP BY sender_id");
                            $messagequery0=mysqli_num_rows($messagequery);
                            ?>
                            <li class="dropdown" onclick="chat(<?php echo $user_id; ?>)">
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                    <i class="glyphicon glyphicon-comment"></i>  <span class="label label-warning" id="chatdisplay"><?php echo $messagequery0; ?></span>
                                </a>
                                <ul class="dropdown-menu dropdown-messages">
                                    <li>
                                        <?php
                                        $messagequery1=mysqli_num_rows($messagequery);
                                        while ($rond=mysqli_fetch_array($messagequery)) {
                                        $senderone=$rond['sender_id'];
                                        $monica=mysqli_query($con, "SELECT * FROM users WHERE id='".$senderone."' ");
                                        $monica1=mysqli_fetch_array($monica);
                                        ?>
                                        
                                        <div class="dropdown-messages-box">  
                                            <a href="messanger.php" class="pull-left">
                                                <img alt="image" class="img-circle" src="upload/avatar.png">
                                            </a>

                                            <div class="media-body">
                                               
                                                <small class="pull-right"></small>
                                                <p><strong>
            
                                                </strong> <br>
                                                <strong><?php echo $rond['post']; ?></strong></p> 
                                                <small class="text-muted"><?php echo $rond['date_of_messages']; ?></small>
                                                 
                                            </div>
                                            
                                        </div>
                                       
                                        <?php }?>
                                    </li>
                                    <li class="divider"></li>
                       
                                    <li>
                                        <div class="text-center link-block">
                                         <!--    <a href="mailbox.html">
                                                <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                            </a> -->
                                        </div>
                                    </li>
                                </ul>
                            </li>
                               <?php
                                    $query=mysqli_query($con, "SELECT * FROM users WHERE id='".$user_id."' ");
                                    $query2=mysqli_fetch_array($query);
                                    ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                  <?php 
                               	     if ($query2['pix']=="") {
                                echo '<img src="upload/profile/userimg.png" class="img img-circle" height="26" width="26">';
                                  }elseif (substr($query2['pix'], 0, 8) === "https://") {
                                     echo '<img src="'.$query2['pix'].'" class="img img-circle" height="26" width="26">';  
                                  } else{echo  '<img src="upload/profile/'.$query2['pix'].'" class="img img-circle" height="26" width="26">'; } 
                                   ?>
                                    <span class="label label-primary"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-alerts">
                                    <li>
                                        <a href="profile.php">
                                            <div>
                                                <i class="fa fa-user-o fa-fw"></i> Profile
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="invite.php">
                                            <div>
                                                <i class="fa fa-gift fa-fw"></i> Invite Friends
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="edit-profile.php">
                                            <div>
                                                <i class="glyphicon glyphicon-wrench"></i> Settings
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="change-password.php">
                                            <div>
                                                <i class="glyphicon glyphicon-edit"></i> Change Password
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                     <li>
                                        <a href="sendworks.php">
                                            <div>
                                                <i class="glyphicon glyphicon-edit"></i> Send Projects/Works
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="text-center link-block">
                                            <a href="inc/logout.php">
                                                <i class="fa fa-sign-out"></i>
                                                <strong>Logout</strong> 
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
       <script type="text/javascript">
       function chat(x){
           setInterval(function(){
                 },5000) 
          var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                  
                document.getElementById("chatdisplay").innerHTML = xhttp.responseText;      
                } };
          xhttp.open("POST", "inc/chatpage.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("id="+x);
       }
       function changestatus(){
         var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                  
                document.getElementById("shownote").innerHTML = xhttp.responseText;      
                } };
          xhttp.open("POST", "inc/shownotification.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send();
       }
        function notification(){
            var value=1;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                  
                document.getElementById("jj").innerHTML = xhttp.responseText;      
                } };
          xhttp.open("POST", "inc/notify.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("value="+value);
        }
        function feedbacks(x){
            setInterval(function(){
                // alert()
                 },5000) 
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                  
                document.getElementById("fee").innerHTML = xhttp.responseText;      
                } };
          xhttp.open("POST", "inc/displayfeeds.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("use="+x);
        }
   
        
        </script>