<?php 
require "../auth/access_levels.php"; 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
   <title>Earnings | Find & Discover Premium Social Media Gurus To Market Your Stuff - postomg.com</title>
    <link rel="shortcut icon" type="image/png" href="images/favicon.ico"/>
    <meta name="keywords" content="social media, facebook marketing, twitter marketing, social media marketing, influencers, followers, share, post to millions"/>
    
    <meta name="description" content="social media, facebook marketing, twitter marketing, social media marketing, influencers, followers, share, post to millions" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="css/app.v2.css" type="text/css" />
    <link rel="stylesheet" href="css/font.css" type="text/css" cache="false" />
    <link rel="stylesheet" href="js/select2/select2.css" type="text/css">
    <link rel="stylesheet" href="js/fuelux/fuelux.css" type="text/css">
    <link rel="stylesheet" href="js/datepicker/datepicker.css" type="text/css">
    <link rel="stylesheet" href="js/slider/slider.css" type="text/css">
    <!--[if lt IE 9]> <script src="js/ie/respond.min.js" cache="false"></script> <script src="js/ie/html5.js" cache="false"></script> <script src="js/ie/fix.js" cache="false"></script> <![endif]-->
</head>

<body>
    <section class="hbox stretch">
       <?php include_once 'inc/sidebar.php'; ?>
        <!-- .vbox -->
      <section id="content">
            <section class="vbox">
                <header class="header bg-white b-b">
                    <p>Welcome to <?php echo $_SESSION['fullname']; ?>'s profile</p>
                </header>
                <section class="scrollable">
                    <section class="hbox stretch">
                        <aside class="aside-lg bg-light lter b-r">
                            <section class="vbox">
                                <section class="scrollable">
                                    <div class="panel">
                                        <center>
                                            <h5>My Wallet</h5>
                                            <table class="table table-bordered">
                                            <tr class="bg-warning">
                                            <th>Deposit</th>
                                            <th>Income</th>
                                            </tr>
                                            <tr>
                                             <th>N<?php echo $wallet; ?></th>
                                             <th>N<?php echo $earned; ?></th>
                                            </tr>
                                            </table>
                                        </center>
                                </div>
                                 <div class="panel">
                                    <h6 id="withdraw"></h6>
                                        <center>
                                            <a class="btn btn-twitter btn-bg" onclick="withdraw()" style="margin-bottom:3%">Withdraw</a>
                                        </center>
                                </div>
                            <section id="billing">
                                 <div class="panel">
                                        <center>
                                            <h5>My Facebook Billing rate</h5>
                                            <h4 class="text-warning">Normal: N<b class="text-muted"><input type="number" id="bill" value="<?php echo $bill; ?>" style="width: 30%;border:0px"></b></h4>
                                            <h4 class="text-warning">Pinned: N<b class="text-muted"><input type="number" id="pinned" value="<?php echo $pinned; ?>" style="width: 30%;border:0px"></b></h4>
                                        </center>
                                </div>
                                <div class="panel">
                                        <center>
                                            <h5>My Twitter Billing rate</h5>
                                            <h4 class="text-warning">Normal: N<b class="text-muted"><input type="number" id="tw_bill" value="<?php echo $tw_bill; ?>" style="width: 30%;border:0px"></b></h4>
                                            <h4 class="text-warning">Pinned: N<b class="text-muted"><input type="number" id="tw_pinned" value="<?php echo $tw_pinned; ?>" style="width: 30%;border:0px"></b></h4>
                                        </center>
                                </div>
                                <div class="panel">
                                        <center>
                                            <h5>My Instagram Billing rate</h5>
                                            <h4 class="text-warning">Normal: N<b class="text-muted"><input type="number" id="in_bill" value="<?php echo $in_bill; ?>" style="width: 30%;border:0px"></b></h4>
                                            <h4 class="text-warning">Pinned: N<b class="text-muted"><input type="number" id="in_pinned" value="<?php echo $in_pinned; ?>" style="width: 30%;border:0px"></b></h4>
                                        </center>
                                </div>
                                
                                <a class="btn btn-success btn-block" style="margin-top: 20px" <?php echo"onclick='update_bill(".$user_id.")'";?>>Update </a>
                                
                            </section>    
                              </section>
                          </section>
                        </aside>
                        <aside class="bg-white">
                            <section class="vbox">
                                <header class="header bg-gradient">
                                    <ul class="nav nav-tabs nav-white">
                                        <li class="active"><a href="profile.html#activity" data-toggle="tab">Income</a>
                                        </li>
                                        <li class=""><a href="profile.html#events" data-toggle="tab">Expenses</a>
                                        </li>
                                        <li class=""><a href="profile.html#interaction" data-toggle="tab">Fund Wallet</a>
                                        </li>
                                        <li class=""><a href="profile.html#bank" data-toggle="tab">Bank Details</a>
                                        </li>
                                        <li class=""><a href="profile.html#pending" data-toggle="tab">Withdrawals</a>
                                        </li>
                                    </ul>
                                </header>
                                <section class="scrollable">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="activity">
                                            <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
                                                
                                               <?php
                                                    
                                                $get_total = mysqli_fetch_array(mysqli_query($con, "SELECT earned FROM users WHERE user_id='$user_id' "));
                                                $total = $get_total['earned'];
                                                ?>
                                                <li class="list-group-item">
                                                    <b>Total : N<?php echo $total; ?> </b> 
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" id="events">
                                         <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
                            
                                               <?php
                                                $get_total = mysqli_fetch_array(mysqli_query($con, "SELECT sum(amount) AS total FROM posts WHERE advertiser_id='$user_id' "));
                                                $total = $get_total['total'];
                                                ?>
                                                <li class="list-group-item">
                                                    <b>Total : N<?php echo $total; ?></b> 
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" id="interaction">
                                          <form id='createScoolForm1' action="" method="post" enctype="multipart/form-data" class="panel" style="width: 80%;margin-left: 10%;margin-top: 5%">
                                            <script src="https://js.paystack.co/v1/inline.js"></script>
                                              <center><label>Amount</label><br>
                                              <input type="number" id="amount" placeholder="Enter amount here" style="width: 50%" class="form-control">
                                              <input type="hidden" id="email" value="<?php echo $email;?>"  style="width: 50%" class="form-control">
                                              <br><br>
                                              <button class="btn btn-large btn-primary" style="margin-bottom: 5%" onclick="payWithPaystack()">Pay now</button>
                                              </center>
                                          </form>
                                        </div>

                                         <div ;class="tab-pane" id="bank">
                                          <form id='bank' action="" method="post" enctype="multipart/form-data" class="panel" style="width: 80%;margin-left: 10%;margin-top: 5%">
                                              <center><label>Bank Name</label><br>
                                              <input type="text" id="bank_name" style="width: 50%" class="form-control" value="<?php echo $bank_name; ?>">
                                              <br>
                                              <label>Account Name</label><br>
                                              <input type="text" id="acc_name" style="width: 50%" class="form-control" value="<?php echo $acc_name; ?>">
                                              <br>
                                              <label>Account Number</label><br>
                                              <input type="number" id="acc_num" style="width: 50%" class="form-control" value="<?php echo $acc_num; ?>">
                                              <br>
                                              <label>Account Type</label><br>
                                             <select class="form-control" style="width: 50%" id="acc_type">
                                            <option value="<?php echo $acc_type; ?>"><?php echo $acc_type; ?></option>
                                                <option value="current">Current</option>
                                                <option value="savings">Savings</option> 
                                             </select><br>
                                              <a class="btn btn-large btn-primary" style="margin-bottom: 5%" onclick="saveBank()">Save Changes</a>
                                              </center>
                                          </form>
                                        </div>
                                        <div class="tab-pane" id="pending">
                                            <?php
                                            $pending = mysqli_query($con, "SELECT * FROM payments WHERE user_id='$user_id' AND status=0 ");
                                               while ($row = mysqli_fetch_array($pending)) {
                                                   $pending_amount = $row['amount'];
                                                   $date_requested = $row['date_requested'];

                                                   echo '<div class="panel"><center><h5>Amount: N'
                                                            .$pending_amount.'</h5><h5>Date: '
                                                            .$date_requested.'</h5></center>
                                                        </div>';
                                               }
                                            ?>
                                        </div>
                                    </div>
                                </section>
                            </section>
                        </aside>
                        <aside class="col-lg-4 b-l">
                            <section class="vbox">
                                <section class="scrollable">
                                 
                                </section>
                            </section>
                        </aside>
                    </section>
                </section>
            </section>
            <a href="profile.html#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
        <!-- /.vbox -->
    </section>

 
<script>
  function payWithPaystack(){
    event.preventDefault();
    var amount = $('#amount').val();
    var email = $('#email').val();
    amount = amount*100;
    var handler = PaystackPop.setup({
      key: 'pk_live_703f094b1d8faa044453a6c040162e3e9756f37f',
      email: email,
      amount: amount,
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
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
          alert('Payment Successful ');
          $.ajax({
                url: "https://postomg.com/funding.php?payment=" + response.reference+"&amount="+amount,
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                    if (data == 'done') {
                        window.location.href = 'earnings.php';
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
  }



  function saveBank() {
      alert('Updated');
        var bank_name = document.getElementById("bank_name").value;
        var acc_num = document.getElementById("acc_num").value;
         var acc_name = document.getElementById("acc_name").value;
         var acc_type = document.getElementById("acc_type").value;

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("bank").innerHTML = xhttp.responseText;
          }
       };
       xhttp.open("POST", "saveBank.php", true);
       xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       xhttp.send("bank_name="+bank_name+"&acc_num="+acc_num+"&acc_name="+acc_name+"&acc_type="+acc_type);
  }


  function withdraw() {
      var amount = prompt("Enter Amount (Note:Minimum of N1000)");
if (amount == null || amount == "") {
    alert('Please enter valid amount')
} else {  
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("withdraw").innerHTML = xhttp.responseText;
          }
       };
       xhttp.open("POST", "withdraw.php", true);
       xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       xhttp.send("amount="+amount);
}
  }
</script>
    <!-- Bootstrap -->
    <!-- app -->
    <script src="js/app.v2.js"></script>
    <!-- fuelux -->
    <script src="js/fuelux/fuelux.js"></script>
    <!-- datepicker -->
    <script src="js/datepicker/bootstrap-datepicker.js"></script>
    <!-- slider -->
    <script src="js/slider/bootstrap-slider.js"></script>
    <!-- file input -->
    <script src="js/file-input/bootstrap.file-input.js"></script>
    <!-- combodate -->
    <script src="js/libs/moment.min.js"></script>
    <script src="js/combodate/combodate.js" cache="false"></script>
    <!-- parsley -->
    <script src="js/parsley/parsley.min.js" cache="false"></script>
    <script src="js/parsley/parsley.extend.js" cache="false"></script>
    <!-- select2 -->
    <script src="js/select2/select2.min.js" cache="false"></script>
    <!-- wysiwyg -->
    <script src="js/wysiwyg/jquery.hotkeys.js" cache="false"></script>
    <script src="js/wysiwyg/bootstrap-wysiwyg.js" cache="false"></script>
    <script src="js/wysiwyg/demo.js" cache="false"></script>
    <!-- markdown -->
    <script src="js/markdown/epiceditor.min.js" cache="false"></script>
    <script src="js/markdown/demo.js" cache="false"></script>
</body>
<script type="text/javascript">
    /////////////////Ajax to Update user profile//////////////////
    function update_bill(d){
        alert('Updated');
        var bill = document.getElementById("bill").value;
        var pinned = document.getElementById("pinned").value;
         var tw_bill = document.getElementById("tw_bill").value;
         var tw_pinned = document.getElementById("tw_pinned").value;
        var in_bill = document.getElementById("in_bill").value;
         var in_pinned = document.getElementById("in_pinned").value;

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("billing").innerHTML = xhttp.responseText;
          }
       };
       xhttp.open("POST", "update_bill.php", true);
       xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       xhttp.send("bill="+bill+"&pinned="+pinned+"&tw_bill="+tw_bill+"&tw_pinned="+tw_pinned+"&in_pinned="+in_pinned+"&in_bill="+in_bill);
    }
</script>
</html>