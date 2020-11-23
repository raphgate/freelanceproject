<?php
require "../../auth/access_levels.php";
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
?>

                        <div class="col-lg-12">
                            <div class="tabs-container">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a data-toggle="tab" href="#tab-1">Open</a>
                                    </li>
                                    <li class="">
                                        <a data-toggle="tab" href="#tab-2"> Work in Progress</a>
                                    </li>
                                    <li class="">
                                        <a data-toggle="tab" href="#tab-3"> Past Projects</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab-1" class="tab-pane active">
                                        <div class="panel-body" id="sid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form method="POST" class="form-horizontal">
                                                        <div class="form-group has-feedback">
                                                            <div class="col-md-9 col-sm-9 ">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control input-lg" id="search1" placeholder="Enter project Name ">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-default btn-lg" type="button" onclick="search()"><i class="fa fa-search"></i></button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                     
                                                            <div class="col-md-1 col-sm-1">
                                                                <button class="btn btn-white btn-lg btn-block" ><i class="fa fa-repeat"></i></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 table-responsive">
                                                    <table class="table table-hover table-striped border-top-bottom border-left-right">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Bids</th>
                                                                <th>Average Bid</th>
                                                                <th>Bid End Date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="change">
                                                        <?php                                                                                                            
                                                        function countDown($time){
                                                         $currentday= strtotime(date("Y-m-d h:i:sa"));
                                                         $timeelapsed=round((($currentday-$time)/86400),1);
                                                         $timeleft=(7-$timeelapsed);
                                                         if (strpos($timeleft, '.')) {
                                                             $i=explode('.', $timeleft);
                                                         $hr=($i[1]/10)*24;
                                                         echo $i[0]."day(s) ".round($hr,0)."hr(s)";
                                                         }else{
                                                            echo $timeleft."day(s)";
                                                         }
                                                           
                                                        }
                                                        $bidtimequery=mysqli_query($con, "SELECT * FROM bids WHERE bider_id='$user_id' AND status=0  GROUP BY project_id ORDER BY id DESC LIMIT $start_from, $record_per_page");
                                                        while ($bidarray=mysqli_fetch_array($bidtimequery)) {
                                                        $projectId=mysqli_real_escape_string($con, $bidarray['project_id']);
                                                        $databaseDate=mysqli_real_escape_string($con, $bidarray['date']);
                                                 
                                                        $selectQuery=mysqli_query($con, "SELECT * FROM projects WHERE id='$projectId' ");
                                                        $selectQuery2=mysqli_fetch_array($selectQuery);
                                                        $projectname=mysqli_real_escape_string($con, $selectQuery2['projectName']);
                                                        $bidQuery=mysqli_query($con, "SELECT project_id FROM bids WHERE project_id='$projectId'  ");
                                                        $bidCount=mysqli_num_rows($bidQuery);
                                                        $cur=strtotime(date("Y-m-d h:i:sa"));
                                                        $str=strtotime($databaseDate);
                                                        $rountime=round((($cur-$str)/86400),0);
                                                        $timeleft=7-$rountime;
                                                        if($timeleft>1){
                                                        $Averagebid=mysqli_query($con, "SELECT AVG(bidAmount) AS averageamount, date FROM bids WHERE DATE_SUB(date, INTERVAL 1 HOUR) AND project_id='$projectId' GROUP BY project_id,HOUR(date)");
                                                        $Av=mysqli_fetch_array($Averagebid);
                                                        $showAvg=mysqli_real_escape_string($con, $Av['averageamount']);
                                                        ?>
                                                            <tr >
                                                                <td><a href=""><h4><?php echo $projectname; ?></h4></a></td>
                                                                <td><?php echo $bidCount; ?></td>
                                                                <td><?php echo floor($showAvg); ?> NGN / Hour</td>
                                                                <td>in <?php  $time = strtotime($databaseDate);
                                                                         echo countDown($time) ?> </td>
                                                                <td>
                                                                      <div class="dropdown">
                                                                    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">select
                                                                    <span class="caret"></span></button>
                                                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                                         <li role="presentation"><a role="menuitem" tabindex="-1" href="retract.php?id=<?php echo base64_encode($projectId); ?>">Retract Bid</a></li>
                                                                      <li role="presentation"><a role="menuitem" tabindex="-1" href="editbid.php?id=<?php echo base64_encode($projectId); ?>">Edit</a></li>
                                                                    <!--   <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Send message</a></li> -->
                                                                       <li role="presentation"><a role="menuitem" tabindex="-1" href="clearify.php?id=<?php echo base64_encode($projectId); ?>">Clarify</a></li>
                                                                    </ul>
                                                                  </div>
                                                                </td>
                                                            </tr>
                                                            <?php } }?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                       <div class="col-md-2 col-sm-2">
                                                       <?php
                                                         $try=mysqli_query($con, "SELECT * FROM bids WHERE bider_id='$user_id' AND status=0  GROUP BY project_id ORDER BY id DESC");
							                             $total_records = mysqli_num_rows($try);  
							 							 $total_pages = ceil($total_records/$record_per_page);
							 		
							                                             for($i=1; $i<=$total_pages; $i++)  
																		 {  
																		     $output .= "<span class='btn btn-sm btn-white pagination_link' style='cursor:pointer;' id='".$i."'>".$i."</span>";
																		 }
							                                        echo $output; 
                                                  		?>
                                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab-2" class="tab-pane">
                                        <div class="panel-body" id="sid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form method="POST" class="form-horizontal">
                                                        <div class="form-group has-feedback">
                                                            <div class="col-md-9 col-sm-9 ">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control input-lg" id="search2" placeholder="Enter project Name">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-default btn-lg" type="button" onclick="search()"><i class="fa fa-search"></i></button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                          
                                                            <div class="col-md-1 col-sm-1">
                                                                <button class="btn btn-white btn-lg btn-block"><i class="fa fa-repeat"></i></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 table-responsive">
                                                    <table class="table table-hover table-striped border-top-bottom border-left-right">
                                                        <thead>
                                                        <tr>
                                                            <th>Project Name</th>
                                                            <th>Freelancer</th>
                                                            <th>Awarded Bid</th>
                                                            <th>Deadline</th>
                                                            <th>Attachment</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="delete">
                                                        <?php

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
                                                        $progressQuery=mysqli_query($con, "SELECT * FROM currentworks WHERE status=0 AND owner_id='$user_id' OR activated_id='$user_id' AND status=0 GROUP BY project_id,owner_id ORDER BY id DESC LIMIT $start_from, $record_per_page ");
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
                                                                      }else{  echo $queryname; } ?></td>
                                                                <td>&#x20A6;  <?php   echo $valueaccepted; ?></td>
                                                                <td><?php $Time=strtotime($dateTime); echo newTime($Time); ?></td>
                                                                 <td>
                                                                    <?php 
                                                                    $doc=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM documents WHERE project_id='".$rows['project_id']."'  "));
                                                                    if ($doc['pix']=="") {
                                                                       echo "No file";
                                                                    }else{
                                                                    ?>
                                                                   <a href="inc/Downloadproject.php?file=<?php echo $doc['pix']; ?> "><button>Download</button></a>
                                                                   <?php } ?>
                                                                </td>
                                                                <td>
                                                                  <div class="dropdown">
                                                                    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">select
                                                                    <span class="caret"></span></button>
                                                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                                        <li role="presentation"><a href="#" class="delete_project" data-custom-value="<?php echo $rows['project_id']; ?>" >Delete</a></li>
                                  

                                                                    </ul>
                                                                  </div>
                                                                </td>                                                             
                                                            </tr>
                                                        <?php  } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-2 col-sm-2">
                                                     <?php
                                                 $try1=mysqli_query($con, "SELECT * FROM currentworks WHERE status=0 AND owner_id='$user_id' OR activated_id='$user_id' GROUP BY project_id,owner_id ORDER BY id DESC");
					                             $total_records1 = mysqli_num_rows($try1);  
					 							 $total_pages = ceil($total_records1/$record_per_page);
					 		
					                                             for($i=1; $i<=$total_pages; $i++)  
																 {  
																     $output1 .= "<span class='btn btn-sm btn-white pagination_link' style='cursor:pointer;' id='".$i."'>".$i."</span>";
																      
																 } 
					                                                 
					                                        echo $output1; 
                                                      ?>
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab-3" class="tab-pane">
                                        <div class="panel-body" id="sid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form method="POST" class="form-horizontal">
                                                        <div class="form-group has-feedback">
                                                            <div class="col-md-9 col-sm-9 ">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control input-lg" id="search3" placeholder="Enter project Name">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-default btn-lg" type="button" onclick="search()"><i class="fa fa-search"></i></button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                          
                                                            <div class="col-md-1 col-sm-1">
                                                                <button class="btn btn-white btn-lg btn-block"><i class="fa fa-repeat"></i></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 table-responsive">
                                                    <table class="table table-hover table-striped border-top-bottom border-left-right">
                                                        <thead>
                                                        <tr>
                                                            <th>Project Name</th>
                                                            <th>Bids</th>
                                                            <th>Freelancer</th>
                                                            <th>Awarded Bid</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                          <?php
                                                          $pastworksQuery=mysqli_query($con,"SELECT * FROM currentworks WHERE status=1 AND owner_id='$user_id' OR activated_id='$user_id' AND status=1 GROUP BY project_id ORDER BY id DESC LIMIT $start_from, $record_per_page");
                                                          while($pastworksQuery1=mysqli_fetch_array($pastworksQuery)){
                                                          $selectpastworks=mysqli_query($con, "SELECT * FROM projects WHERE id='".$pastworksQuery1['project_id']."' ");
                                                          while($pastquery=mysqli_fetch_array($selectpastworks)){
                                                          $workname=$pastquery['projectName'];
                                                          $userpastworkquery=mysqli_query($con, "SELECT * FROM users WHERE id='".$pastworksQuery1['activated_id']."' ");
                                                          $userarray=mysqli_fetch_array($userpastworkquery); 
                                                          $awardedname=$userarray['first_name']." ".$userarray['last_name'];
                                                          $awardedusername=$userarray['username'];
                                                          $awardbid=mysqli_query($con, "SELECT project_id FROM bids WHERE project_id='".$pastworksQuery1['project_id']."' ");
                                                          $awardbid1=mysqli_num_rows($awardbid);
                                                          $awardedbid=mysqli_query($con, "SELECT * FROM bids WHERE bider_id='".$pastworksQuery1['activated_id']."' AND project_id='".$pastworksQuery1['project_id']."'  ");
                                                          while($awardarray=mysqli_fetch_array($awardedbid)){ 
                                                          $awardvalue=$awardarray['bidAmount']; 
                                                          ?>
                                                            <tr>
                                                                <td>
                                                                  <a href=""><h4><?php echo $workname; ?></h4></a>
                                                                </td>
                                                                <td><?php echo $awardbid1; ?></td>
                                                                <td> 
                                                                <?php
                                                                  if($awardedusername!=="") {
                                                                    echo $awardedusername;
                                                                  }else{echo $awardedname;}
                                                                  ?>
                                                                </td>
                                                                <td>$<?php echo $awardvalue; ?></td>
                                                                <td>
                                                                </td>
                                                                <td>
                                                                </td>
                                                                <td>
                                                                </td>
                                                            </tr>
                                                          <?php }}} ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                          <div class="col-md-2 col-sm-2">
                                                     <?php
                                                 $try2=mysqli_query($con, "SELECT * FROM currentworks WHERE status=1 AND owner_id='$user_id' OR activated_id='$user_id' AND status=1 GROUP BY project_id ORDER BY id DESC");
					                             $total_records1 = mysqli_num_rows($try2);  
					 							 $total_pages = ceil($total_records1/$record_per_page);
					 		
					                                             for($i=1; $i<=$total_pages; $i++)  
																 {  
																     $output2 .= "<span class='btn btn-sm btn-white pagination_link' style='cursor:pointer;' id='".$i."'>".$i."</span>";
																      
																 } 
					                                                 
					                                        echo $output2; 
                                                      ?>
                                                  </div>
                                </div>
                            </div>
                        </div>
                       <script type="text/javascript">
           function search(){
           	var search2=$('#search2').val();
           	var search1=$('#search1').val();
           	var search3=$('#search3').val();
           	// alert(search2)
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			  if (xhttp.readyState == 4 && xhttp.status == 200) {
			    document.getElementById("sid").innerHTML = xhttp.responseText;
			  }
			};
			xhttp.open("POST", "inc/searchproject.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("search1="+search1+"&search2="+search2+"&search3="+search3);
		  }
			$(document).ready(function () {
            $('.delete_project').on('click', function() {
                 var check=$(this).data("custom-value");
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this project file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                }, function () {
                    swal("Deleted!", "Your project has been deleted.", "success");
                    var wow=check;
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
              
                      document.getElementById("delete").innerHTML = xhttp.responseText;
                    } };
                  xhttp.open("POST", "inc/deleteAction.php", true);
                  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                  xhttp.send("projects="+wow);
               
                });
               
            });
            $('.chosen-select').chosen({width: "100%"});
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
                       </script>