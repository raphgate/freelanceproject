<?php
require "../auth/access_levels.php";

$loggedinquery=mysqli_query($con, "UPDATE users SET loggedin='".date("Y-m-d h:i:sa")."' WHERE id='".$user_id."' ");
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | Dashboard</title>

    <?php include_once('inc/css.php'); ?>

</head>

<body class="top-navigation">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">

        <?php include_once('inc/header.php'); ?>

        <div class="wrapper wrapper-content" style="margin-top: 30px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">

                        <div class="widget navy-bg no-padding material-shadow" style="height: 200px; background-image: url(img/background.jpeg);">

                            <div class="overlay">
                              <div class="pull-right">
                               
                              </div>
                              <br>
                              <div class="p-m">
                                  <h1 class="m-xs"></h1>
                                  <h3 class="font-bold no-margins">
                                   Post and Bid for Projects on eBrang

                                  </h3>
                                  <small></small>
                              </div>

                            </div>                            

                            

                            <!-- <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-chart1"></div>
                            </div> -->
                        </div>

                        <br>
                        <div class="ibox float-e-margins material-shadow">
                            <div class="ibox-title">
                                <h3>News Feed</h3>
                            </div>
                            <div class="ibox-content inspinia-timeline no-padding">
                                <div class="timeline-item">
                                    
                            <?php  
                                         //
                            $Awardquery=mysqli_query($con, "SELECT * FROM bids WHERE post_id='$user_id' AND status=0 GROUP BY project_id ");
                        
                            while ($row=mysqli_fetch_array($Awardquery)) {            
                                  $projectId=$row['project_id'];
                                  $bidamount=$row['bidAmount'];
                                  $bidsummary=$row['bidSummary'];
                                  $bidmilestone=$row['bidMilestoneAmount'];
                                  $biddescription=$row['bidMilestoneDescription'];
                                  $days=$row['deliveryTime'];
                                  $skillrequire=$row['skillRequired'];
                                  $getpd=mysqli_query($con,"SELECT * FROM projects WHERE id='$projectId' ");
                                  $queryarray=mysqli_fetch_array($getpd);
                                  $pname=$queryarray['projectName'];
                                  $bidnum=mysqli_query($con, "SELECT * FROM bids WHERE project_id='$projectId'  GROUP BY bider_id ");
                                  $bidloop=mysqli_num_rows($bidnum);                    
                             ?>
                                    <div class="row ">
                                        <div class="col-xs-3 col-md-3 date">
                                            <i class="fa fa-file-text"></i>

                                            <br/>
                                            <small class="text-navy"> </small>
                                        </div>
                                         
                                        <div class="col-xs-9 col-md-9 content  ">
                                            <h4><?php echo $bidloop; ?>  placed a bid on <?php echo $pname; ?></h4>
                                        <div class="well " >
                                <?php
                                    $bidQuery=mysqli_query($con, "SELECT * FROM bids WHERE project_id='$projectId' AND post_id='$user_id' GROUP BY bider_id ");
                                         $bidCount=mysqli_num_rows($bidQuery);
                                         while($bider_data=mysqli_fetch_array($bidQuery)){
                                        $bidamounts=$bider_data['bidAmount'];
                                        $completiondays=$bider_data['deliveryTime'];
                                         $getbid=mysqli_query($con, "SELECT * FROM users WHERE id='".$bider_data['bider_id']."' ");
                                         $getbid1=mysqli_fetch_array($getbid);
                                         $username=$getbid1['username'];
                                         $fullname1=$getbid1['first_name']." ".$getbid1['last_name'];
                                         $pix=$getbid1['pix'];
                                         $uid=$getbid1['id'];

                                    ?>
                                <div class="media " >
                                    <a class="pull-left" href="#">
                                             <?php
                                   	           if ($getbid1['pix']!=="") {
                                           echo '<img class="media-object img-sm" src="upload/'.$getbid1['pix'].'" alt="">';
                                        }elseif (substr($getbid1['pix'], 0, 8) === "https://") {
                                        echo '<img class="media-object img-sm" src="'.$getbid1['pix'].'" alt="">';
                                        }
                                        else{echo '<img class="media-object img-sm" src="upload/profile/userimg.png" alt="">';}
                                        
                                        ?>

                                    </a>
                                        
                                        <div class="media-body ">

                                            <h4 class="media-heading"><a href="">
                                            <?php if ($username!==""){
                                               echo $username;
                                            }else{ echo $fullname1; } ?> </a> Bid &#8358;<?php echo $bidamounts; ?>  to complete in <?php echo $completiondays; ?>day(s) <br>
                                            </h4>
                                            <div class="more">
                                            <p>Hello Sir, <?php echo $bidsummary; ?> 
                            
                                            <b><a>Skillsrequired: <?php echo $skillrequire;  ?></a></b></p>
                                            <h4><a href="award-project.php?id=<?php echo base64_encode($projectId); ?>"><i class="fa fa-share"></i>Award Project</a> </h4>
                                       </div> </div>
                                             
                                </div> 
                                <?php } ?> 
                                    <br>          
                                </div>
                                <p></p>
                                </div>
                                  
                                </div>
                                    <?php }?>
                                </div>
                                <div class="timeline-item">
                                    <?php 
                                        $showpost=mysqli_query($con, "SELECT * FROM projects WHERE post_id='$user_id' GROUP BY id DESC ");
                                        $showpost1=mysqli_num_rows($showpost);
                                        $showpostarray=mysqli_fetch_array($showpost);
                                     ?>
                                    <div class="row">
                                        <div class="col-xs-3 col-md-3 date">
                                            <i class="fa fa-coffee"></i>
                                           
                                            <br/>
                                        </div>
                                        <?php if ($showpost1>0) { ?>
                                        <div class="col-xs-9 col-md-9 content">
                                            <p class="m-b-xs"><b>Recent job posted </b><br><p> <?php echo $showpostarray['projectName'];  ?></p></p>
                                            <p> 
                                             <?php echo $showpostarray['projectDescribe']; ?>
                                             
                                            </p>
                                            <span><b><?php echo $showpostarray['skillRequired']; ?></b></span>
                                        </div>
                                        <?php } else{}?>
                                    </div>
                                </div>
<!--                                 <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-3 date">
                                            <i class="fa fa-user-md"></i>
                                          
                                        </div>
                                        <div class="col-xs-9 col-md-9 content">
                                            <p class="m-b-xs"><strong>Chat with Sandra</strong></p>
                                            <p>
                                                Lorem Ipsum has been the industry's standard dummy text ever since.
                                            </p>
                                        </div>
                                    </div>
                                </div> -->
                            <!--     <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-3 date">
                                            <i class="fa fa-comments"></i>
                                            12:50 pm
                                            <br/>
                                            <small class="text-navy">48 hour ago</small>
                                        </div>
                                        <div class="col-xs-9 col-md-9 content">
                                            <p class="m-b-xs"><strong>Chat with Monica and Sandra</strong></p>
                                            <p>
                                                Web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                            </p>
                                        </div>
                                    </div>
                                </div> -->
                             <!--    <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-3 date">
                                            <i class="fa fa-phone"></i>
                                            08:50 pm
                                            <br/>
                                            <small class="text-navy">68 hour ago</small>
                                        </div>
                                        <div class="col-xs-9 col-md-9 content">
                                            <p class="m-b-xs"><strong>Phone to James</strong></p>
                                            <p>
                                                Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                            </p>
                                        </div>
                                    </div>
                                </div> -->
                            <!--     <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-3 date">
                                            <i class="fa fa-file-text"></i>
                                            7:00 am
                                            <br/>
                                            <small class="text-navy">3 hour ago</small>
                                        </div>
                                        <div class="col-xs-9 col-md-9 content">
                                            <p class="m-b-xs"><strong>Send documents to Mike</strong></p>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                        </div>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                           <?php
                                    $query=mysqli_query($con, "SELECT * FROM users WHERE id='".$user_id."' ");
                                    $query2=mysqli_fetch_array($query);
                                    ?>
                        <div class="ibox">
                            <div class="ibox-content material-shadow">
                                <div>
                                    <div class="pull-left p-xs">
                                        <?php
                                              if ($query2['pix']=="") {
                                          echo '<img class="media-object img-sm" src="upload/profile/userimg.png" alt="">';
                                         }elseif (substr($query2['pix'], 0, 8) === "https://") {
                                           echo '<img class="media-object img-sm"  src="'.$query2['pix'].'" alt="">';
                                         }
                                         else{
                                          echo  '<img src="upload/profile/'.$query2['pix'].'" alt="'.$fullname.'" class="img img-responsive" height="70" width="70">'; 
                                         } 
          				 ?>
                                    </div>
                                    <div class="p-xs">
                                        <small class="font-bold">Welcome Back</small>
                                        <h2><a href="profile.php"><?php 
                                        if ($fullname==" ") {
                                           echo $username;
                                        }else{
                                            echo $fullname;
                                        }
                                             ?></a></h2>
                                        <a href=""> Current Plan: 
                                            <?php 
                                            $queryplan=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM annual_plans WHERE user_id='".$user_id."' "));
                                            if ($queryplan['paidAmount']==2500) {
                                                echo "Bronze A";
                                            }elseif ($queryplan['paidAmount']==5000) {
                                                echo "Bronze B";
                                            }elseif ($queryplan['paidAmount']==10000) {
                                                echo "Silver A";
                                            }elseif ($queryplan['paidAmount']==20000) {
                                                echo "Silver B";
                                            }elseif ($queryplan['paidAmount']==50000) {
                                                echo "Gold";
                                            }elseif ($queryplan['paidAmount']==100000) {
                                                echo "Platinum";
                                            }else{
                                                echo "Zero plan";
                                            }
                                            ?></a><br>
                                       <a href="creadit-account.php"><button class="btn btn-success btn-sm">Credit Wallet</button></a> 
                                    </div>
                                </div>
                                <div>
                                    <p class="alert alert-success"><b>You are eligible to bid for contracts within this contract value: </b><br>
                                         
                                        <?php 
                                            if ($queryplan['paidAmount']==2500) {
                                                echo "*Less than or equal to (&#x20A6; 1m";
                                            }elseif ($queryplan['paidAmount']==5000) {
                                                echo "*Less than or equal to (&#x20A6; 5m";
                                            }elseif ($queryplan['paidAmount']==10000) {
                                                echo "*Less than or equal to (&#x20A6; 10m";
                                            }elseif ($queryplan['paidAmount']==20000) {
                                                echo "*Less than or equal to (&#x20A6; 50m";
                                            }elseif ($queryplan['paidAmount']==50000) {
                                                echo "*Less than or equal to (&#x20A6; 250m";
                                            }elseif ($queryplan['paidAmount']==100000) {
                                                echo "*Greater than (&#x20A6; 250m";
                                            }else{
                                                echo "Zero plan";
                                            }
                                         ?>)</p>
                                </div>
                                <div>
                                    <div>
                                        <span>Set up your account</span>
                                       <!--  <small class="pull-right">73%</small> -->
                                    </div>
                                    <div class="progress progress-small">
                                        <div style="width: 73%;" class="progress-bar"></div>
                                    </div>
                                    <p class="well b-r-xs p-xs">
                                       <!--  Add your address (+5%) -->
                                    </p>

                                </div>
                            </div>
                        </div>

                        <div class="ibox material-shadow">
                            <div class="ibox-title">
                                <h3>My Funds</h3>
                            </div>
                            <div class="ibox-content ">
                                <div>
                                    <p class="pull-right">&#x20A6; <?php echo $q1['wallet']; ?></p>
                                    <p>NGN (Primary)</p>
                                </div>
                                <button class="btn btn-primary">Deposit Funds</button>
                            </div>
                        </div>

                 <!--        <div class="ibox material-shadow">
                            <div class="ibox-title">
                                <a href="" class="text text-navy pull-right">
                                    <i class="fa fa-plus"></i>
                                </a>
                                <h3>Jobs Near You</h3>
                            </div>
                            <div class="ibox-content ">
                                <ul class="sortable-list connectList agile-list" id="completed">
                                    <li class="info-element" id="task16">
                                        <p class="text text-success"> Pickup or Deliver Something</p>
                                        <div class="agile-detail">
                                            <a href="#" class="pull-right btn btn-xs btn-white">&#x20A6;10 - &#x20A6;30</a>
                                            <i class="fa fa-map-marker"></i> Uyo, Nigeria (98.7 km away)
                                        </div>
                                    </li>
                                    <li class="warning-element" id="task17">
                                        <p class="text text-warning">Pickup or Deliver Something</p>
                                        <div class="agile-detail">
                                            <a href="#" class="pull-right btn btn-xs btn-white">&#x20A6;10 - &#x20A6;30</a>
                                            <i class="fa fa-map-marker"></i> Uyo, Nigeria (98.7 km away)
                                        </div>
                                    </li>
                                    <li class="success-element" id="task16">
                                        <p class="text text-info"> Pickup or Deliver Something</p>
                                        <div class="agile-detail">
                                            <a href="#" class="pull-right btn btn-xs btn-white">&#x20A6;10 - &#x20A6;30</a>
                                            <i class="fa fa-map-marker"></i> Uyo, Nigeria (98.7 km away)
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                   <!--      <div class="ibox material-shadow">
                            <div class="ibox-title">
                                <h3>Polls</h3>
                            </div>
                            <div class="ibox-content">

                                <p><span class="badge badge-primary"><i class="fa fa-question"></i></span> What city do you live in?</p>
                                <div class="form-group">
                                    <input type="text" placeholder="Please Enter" id="exampleInputPassword2" class="form-control">
                                </div>
                            </div>

                        </div> -->
                    </div>
                </div>


            </div>

        </div>

        <?php include_once('inc/footer.php'); ?>

        </div>
        </div>



   <?php 
   include_once('inc/jScript.php');
   include_once('../inc/showmore.php');
   // include_once('../inc/showmore2.php');
    ?>

    <script>
        $(document).ready(function() {
           

            var d1 = [[1262304000000, 6], [1264982400000, 3057], [1267401600000, 20434], [1270080000000, 31982], [1272672000000, 26602], [1275350400000, 27826], [1277942400000, 24302], [1280620800000, 24237], [1283299200000, 21004], [1285891200000, 12144], [1288569600000, 10577], [1291161600000, 10295]];
            var d2 = [[1262304000000, 5], [1264982400000, 200], [1267401600000, 1605], [1270080000000, 6129], [1272672000000, 11643], [1275350400000, 19055], [1277942400000, 30062], [1280620800000, 39197], [1283299200000, 37000], [1285891200000, 27000], [1288569600000, 21000], [1291161600000, 17000]];

            var data1 = [
                { label: "Data 1", data: d1, color: '#17a084'},
                { label: "Data 2", data: d2, color: '#127e68' }
            ];
            $.plot($("#flot-chart1"), data1, {
                xaxis: {
                    tickDecimals: 0
                },
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 1
                            }, {
                                opacity: 1
                            }]
                        },
                    },
                    points: {
                        width: 0.1,
                        show: false
                    },
                },
                grid: {
                    show: false,
                    borderWidth: 0
                },
                legend: {
                    show: false,
                }
            });

            var lineData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "Example dataset",
                        backgroundColor: "rgba(26,179,148,0.5)",
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: [48, 48, 60, 39, 56, 37, 30]
                    },
                    {
                        label: "Example dataset",
                        backgroundColor: "rgba(220,220,220,0.5)",
                        borderColor: "rgba(220,220,220,1)",
                        pointBackgroundColor: "rgba(220,220,220,1)",
                        pointBorderColor: "#fff",
                        data: [65, 59, 40, 51, 36, 25, 40]
                    }
                ]
            };

            var lineOptions = {
                responsive: true
            };


            var ctx = document.getElementById("lineChart").getContext("2d");
            new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});

        });
    </script>

</body>
</html>
