<?php 
require "../auth/access_levels.php"; 
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
                                    <h1 class="font-bold">Update Your Profile Details</h1>
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
	                    		<h1 class="font-bold">Change Password</h1>
	                    	</div>
                            <?php
                            if (isset($_GET['err'])==1) {
                               echo "<h4 style='color:red; margin-left:20px;'>Oops wrong password! </h6>";
                            }elseif (isset($_GET['error'])==2) {
                               echo "<h4 style='color:red; margin-left:20px;'>Oops password mismatch! </h6>";
                            }elseif (isset($_GET['success'])==1) {
                               echo "<h4 style='color:green; margin-left:20px;'>Password changed successfully! </h6>";   
                            }
                            ?>
	                    </div>
	                    <div class="row">
	                    	<div class="col-md-9">
	                    		<div class="ibox-content material-shadow">
	                    			<form role="form" method="POST" action="inc/password.php">
	                    				<h2 class="font-bold">Name</h2>
	                    				<div class="row">
	                    					<div class="col-md-6">
	                    						<div class="form-group">
	                    							<label>Current password  *</label>
	                    							<input type="password" name="cpass" class="form-control" placeholder="" required="required">
	                    						</div>
	                    					</div>
	                    					<div class="col-md-6">
	                    						<div class="form-group">
	                    							<label>New password *</label>
	                    							<input type="password" name="npass" class="form-control" placeholder="" required="required">
	                    						</div>
	                    					</div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Comfirm password *</label>
                                                    <input type="password" name="npass1" class="form-control" placeholder="" required="required">
                                                </div>
                                            </div>
	                    				</div>
                                          <button class="btn btn-info" name="save" type="submit">Save changes</button>
	                    				<hr>	
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

    <?php include_once('inc/preview-modal.php'); ?>

    <?php include_once('inc/jScript.php'); ?>
    <script type="text/javascript">
    </script>

</body>
</html>
