<?php require "../auth/access_levels.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>eBrang | payment</title>

        <?php include_once('inc/css.php'); ?>
        <link href="../css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
        <link href="../css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
        <link href="../css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
        <link href="../css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
        <link href="../css/plugins/select2/select2.min.css" rel="stylesheet">
    </head>
 
<body class="top-navigation">
    <div id="wrapper">
        <div id="page-wrapper" class="white-bg messanger">
        
            <?php include_once('inc/header.php'); ?>

            <div class="row wrapper border-bottom page-heading bg-primary"  style="margin-top: 56px;">
                <div class="container">
                    <div class="col-lg-10">
                        <ol class="breadcrumb bg-primary">
               
                        </ol>
                        <h2 class="font-bold">Payments</h2>
                    </div>
                    <div class="col-lg-2">

                    </div>
                    <div></div>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="ibox card">
                                <div class="ibox-title">
                                    Payment 
                                </div>
                                <div class="ibox-content">
                                    <div class="panel-group payments-method" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                          
                                       
                                        <div class="panel panel-default">
                                     
                                            <div id="collapseTwo" class="panel-collapse collapse in">
                                                <div class="panel-body">


                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <center>
                                                            <h2 class="text text-success">Transaction Successful</h2>
                                                            </center>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                     
                    </div>
                </div>
            </div>
            
           
        </div>

    </div>
 <?php include_once('inc/footer.php'); ?>
   <?php include_once('inc/jScript.php'); ?>

   <script>

  </script>
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
