<?php require "../auth/access_levels.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>eBrang | Project</title>

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
                      
                            <li class="active">
                                <strong> </strong>
                            </li>
                        </ol>
                        <h2 class="font-bold">Payment</h2>
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
                                   <h3><b>Payment Method</b></h3> 
                                </div>
                                <div class="ibox-content">
                                    <div class="panel-group payments-method" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <div class="pull-right">
                                                   <!--  <i class="fa fa-cc-paypal text-success"></i> -->
                                                </div>
                                                <h5 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">PayStack</a>
                                                </h5>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse">
                                                <div class="panel-body">

                                                    <div class="row">
                                                        <div class="col-md-10">
                                            

                                                        </div>

                                                    </div>


                                                     </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <div class="pull-right">
                                                    <i class="fa fa-cc-amex text-success"></i>
                                                    <i class="fa fa-cc-mastercard text-warning"></i>
                                                    <i class="fa fa-cc-discover text-danger"></i>
                                                </div>
                                                <h5 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Credit 
                                                        Wallet</a>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse in">
                                                <div class="panel-body">

                                                    <div class="row">
                                                        <div class="col-md-4">
                             
                                                        </div>
                                                        <div class="col-md-12">
                                                            <form id='' action="" method="POST" enctype="multipart/form-data" class="panel" style="width: 80%;margin-left: 10%;margin-top: 5%">
                                                            <script src="https://js.paystack.co/v1/inline.js"></script>
                                                              <center><label>Amount</label><br>
                                                              <input type="number" id="amount" placeholder="Enter amount here" style="width: 70%" class="form-control">
                                                              <input type="hidden" id="email" value="<?php echo $email;?>"  style="width: 50%" class="form-control">
                                                              <br><br>
                                                              <button type="button" class="btn btn-large btn-primary" style="margin-bottom: 5%" onclick="payWithPaystack()">Pay now</button>
                                                              </center>
                                                          </form>
                                                                           <!--  -->

                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>
                </div>
            </div>
            
            <?php include_once('inc/footer.php'); ?>
        </div>
    </div>

   <?php include_once('inc/jScript.php'); ?>

     <script>
  function payWithPaystack(){
    var check=0;
    var amount = $('#amount').val();
    var email = $('#email').val();
    amount = amount*100;
    var handler = PaystackPop.setup({
      key: 'pk_live_ef548ae7de5cb6e8d179b4a077f7d1c15d464ec0',
      email: email,
      amount: amount,
      check: check,
      // ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          $.ajax({
                url: "inc/funding.php",
                method: "POST",
                data: {payment:response.reference,amount:amount,check:check},
                cache: false,
                success: function (data) {
                    if (data = 'done') {
                        window.location.href = 'success.php';
                    } else {
                        //Do something here
                        alert('Error! Try Again.');
                        // window.location.reload();
                    }
                }
            });
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }</script>
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
