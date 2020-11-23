<?php 
require "../auth/access_levels.php"; 
$loggedinquery=mysqli_query($con, "UPDATE users SET loggedin='".date("Y-m-d h:i:sa")."' WHERE id='".$user_id."' ");
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | Edit Profile</title>

    <?php include_once('inc/css.php'); ?>
    <!-- Toastr style -->
    <link href="../css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="../css/plugins/bootstrapSocial/bootstrap-social.css" rel="stylesheet">

</head>

<body class="top-navigation">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        
            <?php include_once('inc/header.php'); ?>

            <div class="showroom border-bottom white-bg m-t-xl" style="">
                <div class="overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-8">
                                <div class="text-center m-t-xl p-xl">
                                    <h1 class="font-bold">Profile Details</h1>
                                    <!-- <p>See Who You Already Know on Freelancer</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrapper border-bottom gray-bg">
                <div class="container">
                    <div class="col-md-10">
                        <div class="mini-nav">
                         
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="" style="padding-top: 5px;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="container">
                    <section>
                    	<div class="row" id="">
	                    	<div class="col-md-12">
	                    		<h1 class="font-bold">Edit Profile</h1>
	                    	</div>
	                    </div>
	                    <div class="row">
	                    	<div class="col-md-7">
                                <?php
                                    if (isset($_GET['ok'])==1) {
                                      echo "<h3 style='color:green; margin-left:7px;'> Changed successfully! </h3>";   
                                 }
                                ?>
	                    		<div class="ibox-content material-shadow">
                                    <?php
                                    $query=mysqli_query($con, "SELECT * FROM users WHERE id='".$user_id."' ");
                                    $row=mysqli_fetch_array($query);
                                   ?>
	                    			<form role="form" method="POST" action="inc/editprofile.php">
	                    				<h2 class="font-bold">Name</h2>
	                    				<div class="row">
	                    					<div class="col-md-6">
	                    						<div class="form-group">
	                    							<label>First Name  *</label>
	                    							<input type="text" name="first_name" class="form-control" value="<?php echo $row['first_name']; ?>">
	                    						</div>
	                    					</div>
	                    					<div class="col-md-6">
	                    						<div class="form-group">
	                    							<label>Last Name *</label>
	                    							<input type="text" name="last_name" class="form-control"  value="<?php echo $row['last_name']; ?>">
	                    						</div>
	                    					</div>
	                    				</div>
	                    				<hr>
	                    				<h2 class="font-bold">Address</h2>
	                    				<div class="row">
	                    					<div class="col-md-12">
	                    						<div class="form-group">
	                    							<label>Address  *</label>
	                    							<input type="text" name="Address" class="form-control"  value="<?php echo $row['Address']; ?>">
	                    						</div>
	                    					</div>
	                    				
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>City  *</label>
                                                    <input type="text" name="city" class="form-control"  value="<?php echo $row['city']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                    <label>State  *</label>
                                                    <input type="" name="State" class="form-control"  value="<?php echo $row['State']; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                            <div class="form-group">
                                                    <label>Country  *</label>
                                                    <input type="text" name="Country" class="form-control"  value="<?php echo $row['Country']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                    <label>Phone number  *</label>
                                                    <input type="text" name="Phone" class="form-control"  value="<?php echo $row['Phone']; ?>">
                                                </div>
                                            </div>
	                    				</div>
                                        <button class="btn btn-info" name="save" type="submit">Save changes</button>
	                    			</form>
	                    		</div>
	                       	</div> 
                            <?php
                            $bank=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id='".$user_id."' "));
                            ?>
                            <div class="col-md-5">
                                <div class="ibox-content material-shadow">
                                 <div id="bank"></div>
                               <form id='bank' action="" role="form" method="POST" enctype="multipart/form-data" class="panel" style="width: 80%;margin-left: 10%;margin-top: 5%">
                                 <label>Bank Name</label><br>
                                  <input type="text" id="bank_name" class="form-control" value="<?php echo $bank['bank_name']; ?>">
                                  <br>
                                  <label>Account Name</label><br>
                                  <input type="text" id="acc_name"  class="form-control" value="<?php echo $bank['acc_name']; ?>">
                                  <br>
                                  <label>Account Number</label><br>
                                  <input type="number" id="acc_num" class="form-control" value="<?php echo $bank['acc_num']; ?>">
                                  <br>
                                  <label>Account Type</label><br>
                                 <select type="text" class="form-control" id="acc_type">
                                 <option value="<?php echo $bank['acc_type']; ?>"><?php echo $bank['acc_type']; ?></option>
                                    <option value="current">Current</option>
                                    <option value="savings">Savings</option> 
                                 </select><br>
                                  <a class="btn btn-large btn-primary" style="margin-bottom: 5%" onclick="saveBank()">Save Changes</a>
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
    <script type="text/javascript">
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
       xhttp.open("POST", "inc/saveBank.php", true);
       xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       xhttp.send("bank_name="+bank_name+"&acc_num="+acc_num+"&acc_name="+acc_name+"&acc_type="+acc_type);
  }
    </script>

</body>
</html>
