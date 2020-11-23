<?php
require "../auth/access_levels.php"; 
 $projectId=base64_decode($_GET['id']);
 $bidsquery=mysqli_query($con, "SELECT * FROM bids WHERE project_id='$projectId' ");
 $bidno=mysqli_num_rows($bidsquery);
    $averagbidquery=mysqli_query($con, "SELECT project_id, AVG(bidAmount) AS Avgbid FROM bids WHERE project_id='$projectId' GROUP BY project_id ");
    $bidarray=mysqli_fetch_array($averagbidquery);
    $showAvg=$bidarray['Avgbid'];
    $query=mysqli_query($con, "SELECT * FROM projects WHERE id='$projectId'");
    $query1=mysqli_fetch_array($query);
    $estimatedbudget=mysqli_real_escape_string($con,$query1['estimated_budget']);
    $projectName=$query1['projectName'];
    $projectsum=$query1['projectDescribe'];
    $Skills=$query1['skillRequired'];
    $post_id=$query1['post_id'];
    ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | clearify</title>

    <?php include_once('inc/css.php'); ?>
    <!-- Ladda style -->
    <link href="../css/plugins/ladda/ladda-themeless.min.css" rel="stylesheet">
    <link href="../css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="../css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="../css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
    <link href="../css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="../css/plugins/select2/select2.min.css" rel="stylesheet">
  



</head>

<body class="top-navigation" ng-app="mainApp">
    <div id="wrapper">
        <div id="page-wrapper" class="white-bg">
        
            <?php include_once('inc/header.php'); ?>

            <div class="wrapper wrapper-content" style="margin-top: 30px;">
                <div class="container">
                    <section class="m-b-lg">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="font-bold">MCQ functionality issue fixing on PHP Core Website</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="well">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="project ibox-content text-center border-left-right border-top-bottom p-xxs">
                                                <div class="row">
                                                    <div class="col-xs-2 border-right">
                                                        <p>Bids</p>
                                                        <h2 class="font-bold text-info"><?php echo $bidno; ?></h2>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <p>Avg Bid </p>
                                                        <h2 class="font-bold text-info">&#x20A6; <?php echo floor($showAvg); ?></h2>
                                                    </div>
                                                    <div class="col-xs-6 border-left">
                                                        <p>Project Budget(NGN)</p>
                                                        <h4 class="font-bold text-info"><?php echo $estimatedbudget; ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-offset-6 col-md-2">
                                            <div class="ibox-content text-center border-left-right border-top-bottom p-xxs">
                                             
                                              <?php
                                                $projectstatus=mysqli_query($con, "SELECT * FROM currentworks WHERE id='".$projectId."' ");
                                                $projectstatus1=mysqli_fetch_array($projectstatus);
                                                if ($projectstatus1['status']==1) {
                                                  echo '<h1 class="font-bold text-info">CLOSED</h1>';
                                                }elseif($projectstatus1['status']==0){echo '<h1 class="font-bold text-info">OPEN</h1>';}
                                                
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div></div>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10">
                              <!--  -->
                            </div>
                            <div class="col-md-offset-1 col-md-10">
                                <p class="alert alert-info"><b> Great! Your bid has been placed successfully! Good job!</p>
                            </div>
                            <div class="col-md-offset-1 col-md-10">
                                <div class="project-bid-table">
                                    <form class="form-horizontal" method="POST">
                                        <input type="hidden" id="postId" value="<?php echo $post_id; ?>">
                                        <input type="hidden" id="skillrequired" value="<?php echo $Skills; ?>">
                                        <input value="<?php echo $projectId; ?>" id="pid" type="hidden">
                                        <div class="row">
                                            <div class="col-sm-7">
                                               
                                            </div>
                                        </div>
                                        <div class="row">
                                            <hr>
                                        
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="m-b-lg">
                        <div class="ibox material-shadow">
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-md-7">
                                        <h1 class="font-bold">Project Description</h1>
                                        <h3><?php echo $query1['projectName']; ?></h3>
                                        <p><?php echo $projectsum; ?></p>
                                        <h3>About the Projector</h3>
                                        <h3 class="no-margins font-bold">Alex Smith</h3>
                                        <div class="m-t-xs">
                                            <span class="label label-primary">5</span>
                                            &nbsp;
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <small>&nbsp; 326 reviews</small>
                                        </div>
                                        <h3>Skills required</h3>
                                        <span class="vertical-date">
                                        <?php echo $Skills;?> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        
        <?php include_once('inc/footer.php'); ?>

        </div>
    </div>



   <?php include_once('inc/jScript.php'); ?>
    <!-- Chosen -->
    <script src="../js/plugins/chosen/chosen.jquery.js"></script>
    <!-- Select2 -->
    <script src="../js/plugins/select2/select2.full.min.js"></script>
     <!-- Tags Input -->
    <script src="../js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- Ladda -->
    <script src="../js/plugins/ladda/spin.min.js"></script>
    <script src="../js/plugins/ladda/ladda.min.js"></script>
    <script src="../js/plugins/ladda/ladda.jquery.min.js"></script>


    <script type="text/javascript">
    //Ajax script//
  
    //end//
        $(document).ready(function() {
            $('.chosen-select').chosen({width: "100%"});
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
            // Bind normal buttons
            Ladda.bind('.ladda-button',{ timeout: 2000 });

            // Bind progress buttons and simulate loading progress
            Ladda.bind( '.progress-demo .ladda-button',{
                callback: function( instance ){
                    var progress = 0;
                    var interval = setInterval( function(){
                        progress = Math.min( progress + Math.random() * 0.1, 1 );
                        instance.setProgress( progress );

                        if( progress === 1 ){
                            instance.stop();
                            clearInterval( interval );
                        }
                    }, 200 );
                }
            });


            var l = Ladda.bind('.ladda-button-demo');

            l.click(function(){
                // Start loading
                l.ladda( 'start' );

                // Timeout example
                // Do something in backend and then stop ladda
                setTimeout(function(){
                    l.ladda('stop');
                },12000)


            });

        });
    </script>
</body>
</html>
