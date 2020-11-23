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
                                    <th> Profile Name</th>
                                    <th>  Email</th>
                                    <th> Phone</th>
                                    <th>  Bank Name </th>
                                    <th>  Account Name </th>
                                    <th> Account Number</th>
                                    <th> Account Type</th>
                                    <th>Amount</th>
                                    <th></th>

                                    </thead>
                                    <tbody id="approved">
                         <?php
                         $payments=mysqli_query($con, "SELECT * FROM users WHERE Confirm_status='Awaiting Approval'");
                         while ($row=mysqli_fetch_array($payments)) {
                         ?>
                                       <tr >
                                         <td class="project-title">
                                        <?php 
                                        if ($row['username']=="") {
                                            echo $row['first_name']." ".$row['last_name'];
                                        }else{
                                            echo $row['username'];
                                        }
                                         ?>
                                         </td>
                                          <td class="project-title">
                                        <?php echo $row['email']; ?>
                                         </td>
                                         <td class="project-title">
                                            <?php echo $row['Phone']; ?>
                                         </td>
                                         <td class="project-title">
                                        <?php echo $row['bank_name']; ?>
                                         </td>
                                          <td class="project-title">
                                        <?php echo $row['acc_name']; ?>
                                         </td>
                                          <td class="project-title">
                                        <?php echo $row['acc_num']; ?>
                                         </td>
                                        <td class="project-title">
                                        <?php echo $row['acc_type']; ?>
                                         </td>
                                           <td class="project-title">&#x20A6;
                                        <?php echo $row['Amount_request']; ?>
                                         </td>


                                         <td class="project-actions" width="170">
                                        <button class="btn btn-warning" onclick="approved(<?php echo $row['id'];?>,<?php echo $row['Amount_request'];?>)">Paid</button>
                                         </td>
                                        </tr>
                                <?php    } ?>
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
    function approved(x,y){
          var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("approved").innerHTML = xhttp.responseText;
          }
       };
       xhttp.open("POST", "inc/adminApprove.php", true);
       xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       xhttp.send("amount="+y+"&id="+x);
    }
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