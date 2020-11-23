<?php 
require "../auth/access_levels.php"; 
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | Dashboard</title>

    <?php include_once('inc/css.php'); ?>
    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="css/plugins/bootstrapSocial/bootstrap-social.css" rel="stylesheet">

</head>

<body class="top-navigation">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">

        <?php include_once('inc/header.php'); ?>

        <div class="wrapper wrapper-content" style="margin-top: 30px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h3 class="font-bold">
                          Freelancer Fees and Charges
                        </h3>
                            </div>
                            <div class="ibox-content inspinia-timeline">
                              <b>
                        
                        <div class="m-lg">
                          <h3><i class="fa fa-key"></i> <b>For Employers</b></h3>
                          <p>
                            
                        
                      

                        Freelancers are free to sign up on eBrang, post a project, receive bids from freelancers, review the freelancer's profile and discuss the project requirements. If you choose to award the project, and the freelancer accepts, we charge you a small project fee relative to the value of the selected bid.

                        For all projects, a fee of 7% commision will be charged with respect to the project value. 

                        You may cancel the project from your dashboard at any time. 
                  

                          </p> <br>
                            <h3><i class="fa fa-book"></i> <b>For Freelancers</b></h3>
                          <p>                   
                         eBrang is free to sign up, create a profile, select skills of projects you are interested in, upload a profile, receive project notifications, discuss project details with the employer and bid on projects 

                          </p>
                            <br>

                              <h3><i class="fa fa-key"></i> <b>Services</b></h3>
                          <p>                   
                          At the time of ordering a service, employers must provide funds equivalent to the total project price. The payment system is protected by the eBrang. Only make the payment once you are satisfied with the work that has been delivered.

                          </p>
                          <br>
               
                              <h3><i class="fa fa-book"></i><b>Membership Plans</b></h3>
                          <p>                   
                         eBrang Membership plans are renewed annually, You can not bid for jobs if you are not on any plan. 
                         The membership plans are drafted with respect to the contract value.<br><br>

                          They are all yearly plans.<br><br>

                          The Membership Plans are as follows:<br><br>

                          1. Bronze A plan: fee &#x20A6;2500  less than or equal to N1m contract value <br><br>

                          2. Bronze B plan: fee &#x20A6;5000 less than or equal to N5m contract value <br><br>

                          3. Silver A plan: fee &#x20A6;10,000 less than or equal to N10m contract value <br><br>

                          4. Silver B plan: fee &#x20A6;20,000 less than or equal to N50m contract value<br><br>

                          5. Gold plan: fee &#x20A6;50,000 less than or equal to N250m contract value<br><br>

                          6. Platinum plan: fee &#x20A6;100,000 greater than 250m contract value

                          </p>
                        </div>
                         

                            </b>
                            </div>
                        </div>
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
      FB.init({
      appId:'1952149205110861',
      cookie:true,
      status:true,
      xfbml:true
      });
      function FacebookInviteFriends()
      {
      FB.ui({
      method: 'send',
       link: 'https://yelocode.com/eBrang/',
      });
      }
    </script>

</body>
</html>

