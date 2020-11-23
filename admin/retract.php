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

    <title>eeBrang | Project</title>

    <?php include_once('inc/css.php'); ?>
    <!-- Ladda style -->
    <link href="../css/plugins/ladda/ladda-themeless.min.css" rel="stylesheet">
    <link href="../css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="../css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="../css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
    <link href="../css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="../css/plugins/select2/select2.min.css" rel="stylesheet">
    <script type="text/javascript" src="../js/angularjstutorial.js"></script>
    <script type="text/javascript" src="../js/angularjstutorial-deps.js"></script>
    <script type="text/javascript" src="../js/mainApp.js"></script>
    <script type="text/javascript" src="../js/eventModule.js"></script>



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
                                <h2 class="font-bold">Confirmation!!</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="well">
                    
                                    <div></div>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10">
                              <!--  -->
                            </div>
                            <div class="col-md-offset-1 col-md-10">
                                <p class="alert alert-info"><b> Hey! Your bid will be removed!</p>
                            </div>
                            <div class="col-md-offset-1 col-md-10">
                                <div class="project-bid-table">
                                
                                    <form class="form-horizontal" action="inc/actionretract.php" method="POST">
                                     
                                        <input type="hidden" name="pid" value="<?php echo $projectId;  ?>">
                                        <button class="btn btn-info" name="retract" type="submit">Yes, Remove my Bid</button>
                                    </form>
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
