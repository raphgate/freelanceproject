<?php require "../auth/access_levels.php"; 
if ($email=='eBrang@info.com') {
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | Adminportal</title>

    <?php include_once('inc/css.php'); ?>
    <link href="../css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="../css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="../css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
    <link href="../css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="../css/plugins/select2/select2.min.css" rel="stylesheet">



</head>

<body class="top-navigation">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        
        <?php include_once('inc/header.php'); ?>

        <div class="wrapper wrapper-content" style="margin-top: 30px;">
            <div class="container">
                
                <section class="">
                
                    <div class="row">
                        <div class="col-md-12">
                        
                        </div>
                    </div>
                    <div class="row">
                             <div class="col-md-6">
                    <a class="btn btn-warning " href="Admindisputes.php"> Disputes</a>
                    <a class="btn btn-info" href="Adminchat.php"> Chat With Clients</a>
                    <a class="btn btn-warning" href="Adminportal.php">Payment Request</a> 
                        </div>
                           <div class="col-md-6">
                          <a class="btn btn-primary">
                            <?php 
                            $Numberusers=mysqli_query($con, "SELECT * FROM users ");
                            $countNumberusers=mysqli_num_rows($Numberusers);
                            echo number_format($countNumberusers)." Users";
                            ?>
                            </a>
                        </div>
                    
                    
               
                    </div>
                    <div class="row m-t-md m-b-md">
                        <div class="col-md-12">
                            <div class="ibox-content material-shadow no-padding">
                                <div class="project-list table-responsive">
                                    <table class="table table-hover">
                                    <thead>
                                    <th> Dispute Title</th>
                                    <th> Dispute Summary</th>
                                    <th> Dispute Attachments</th>
                                

                                    </thead>
                                <tbody>
                                    <?php
                                    $query=mysqli_query($con, "SELECT * FROM disputes ");
                                    while ($row=mysqli_fetch_array($query)) {

                                    ?>
                                     <tr>
                                        <td class="project-title">
                                        <?php echo $row['titles']; ?>
                                        </td>

                                        <td class="project-title">
                                        <?php echo $row['statements']; ?>
                                        </td>

                                        <td class="project-title">
                                    <?php  
                                    echo '<a href="inc/admindisputes.php?file='.$row['files'].'"><button class="btn btn-default">Download file</button></a>'; ?>
                                        </td>
                                         <td class="project-actions" width="170">
                                      <?php  
                                    echo '<a href="inc/admindelete.php?file='.$row['id'].'"><button class="btn btn-warning">Delete</button></a>'; ?>
                                         </td>
                                    </tr>
                                    <?php  } ?>
                                    </tbody>
                                    </table>
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

    <script type="text/javascript">

        $(document).ready(function() {
            $('.chosen-select').chosen({width: "100%"});
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });

    </script>
</body>
</html>
<?php }else{
    header("location:../login.php");
} ?>