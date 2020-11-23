<?php require "../auth/dbc.php"; ?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang </title>

    <?php include_once('../admin/inc/css.php'); ?>
    <!-- Toastr style -->
    <link href="../css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="../css/plugins/bootstrapSocial/bootstrap-social.css" rel="stylesheet">

</head>

<body class="top-navigation" onload="submit()">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        
           <div class="row border-bottom white-bg" style="padding-bottom: 0px !important;">
            <nav class="navbar navbar-static-top  navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                            <i class="fa fa-reorder"></i>
                        </button>
                        <a href="../index.php" class="navbar-brand">eBrang</a>
                    </div>
                   </div>
                </nav>
            </div>
                                   
            <div class="showroom border-bottom white-bg m-t-xl" style="">
                <div class="overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-8">
                                <div class="text-center m-t-xl p-xl">
                                    <h1 class="font-bold">eBrang</h1>
                                    <p>Password Recovery</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight" >
                <div class="container" style="position:center;">
                    <section>
                    	<div class="row" id="">
	                    	<div class="col-md-12">
	                    		<h1 class="font-bold">Retrieve Password</h1>
	                    	</div>
	                    </div>
	                    <div class="row">
                            <?php
                            if (isset($_POST['submit'])) {
                        
                            $query=mysqli_query($con, "SELECT email FROM users WHERE email='".$_POST['email']."' ");
                            $query1=mysqli_num_rows($query);
                                if ($query1>0) {
                                     $random=rand(72891,92729);
                                     $message=$random;
                                     
                                     $date = date("Y");
                                      $subject = "Password Reset";

                                    $htmlContent = '<html>
                                      <body style="background: #e4e2e2">
                                      <center><div style="width: 50%;border-radius: 5px 5px 5px 5px;height:60%">
                        
                                      <div style="background: white;padding:10%;margin-top:25px">
                                       <div>
                                        <h6>Password Reset</h6>
                                       </div>
                                      <h3  style="color: #1ab394;font-family: Open Sans, helvetica, arial, sans-serif;margin:3%">eBrang password reset</h3>
                                      <p style="padding:10px;line-height:200%">You have successfully Reset <em style="color: #1ab394;font-family: CASTELLAR;font-size:1.2em;">Your password</em> to : '.$message.'</p>
                                     <div >
                                        <div></div>
                                         </div>
                                       <br>
                                       <div>
                                        <p><strong>Copyright</strong> &copy; <i id="today_d">'.$date.'</i> eBrang</p>
                                       </div>
                                   </div>
                        
                                   </div>
                                 </center>
                              </body>
                              </html>';

                                $from ='<password_reset@eBrang.com>';
                                // Additional headers
                                $headers = 'From: ' . $from. "\r\n";   
                                $headers  .= 'MIME-Version: 1.0' . "\r\n";
                                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                                     mail($_POST['email'], $subject, $htmlContent, $headers);
                                     mysqli_query($con, "UPDATE users SET password='".$random."' WHERE email='".$_POST['email']."' ");
                                    echo "<h3 style='color:green; margin-left:20px;'>Your new password is sent to your Email</h3>";
                                }elseif ($query1<1) {
                                   echo "<h3 style='color:red; margin-left:20px;'>Email not found</h3>";
                                }
                            }
                            ?>
	                    	<div class="col-md-9">
	                    		<div class="ibox-content material-shadow">
	                    			<form role="form" method="POST">
	                    				<h2 class="font-bold">Enter Email</h2>
	                    				<div class="row">
	                    					<div class="col-md-6">
	                    						<div class="form-group">
	                    							<label></label>
	                    							<input type="" required="required" name="email" class="form-control" placeholder="enter email">
	                    						</div>
                                                <input type="submit" class="btn btn-info" name="submit" value="send" />
	                    					</div>
	                    				
	                    				</div>
	                    			</form>
	                    		</div>
	                       	</div>                        
	                    </div>
                    </section>
                </div>
            </div>
            
            <?php include_once('../admin/inc/footer.php'); ?>

        </div>
    </div>
    <?php include_once('../admin/inc/jScript.php'); ?>
 </body>
</html>
