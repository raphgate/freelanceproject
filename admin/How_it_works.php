<?php 
require "../auth/access_levels.php"; 
$loggedinquery=mysqli_query($con, "UPDATE users SET loggedin='".date("Y-m-d h:i:sa")."' WHERE id='".$user_id."' ");
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | How_it_works</title>

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
                                    <h1 class="font-bold">How eBrang Works</h1>
       
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
             				<!-- <h1>What Kind Of Work Can I get Done?</h1> -->
                        </div>
                    </div>
                   
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="container">
                    <section>
                    	
	                    <div class="row">
	                    	<div class="col-md-9">

	                    		<div class="row">
	                    			<div class="col-md-12">
	                    				<div class="ibox-content material-shadow p-xs">
			                    		
				                           
				                               
				                                	<div  class="tab">
				                                		<div class="panel-body">
				                                		<div class="col-md-12 table-responsive">
				                                			<b>
				                                				<h2>
				                                			<p>
			                                               How does "anything you want" sound?  We have experts representing every<br> technical, professional and creative field. </p><br>
			                                              </div>
			                                                <p>
			                                               Just give us the details about your work and our freelancers will get it done faster, better and cheaper than you could possibly expect. These includes:<br><br>
			                                               * Small and large jobs. <br>
			                                               * Works that require some specific dexterity sets, cost or scheduling requirements.
			                                                </p>
			                                                <a href="post-project.php"><button class="btn btn-primary btn-sm">POST JOB</button></a><br><br><br>
			                                                <h3><b>How does it Work? </b></h3>
			                                                <p>
			                                                	<h4><b>1. Post your Project </b></h4>
			                                                	It's always free to post your project. You'll start receiving bids from our freelancers. Alternatively, you can browse through the talent available on our site and make direct offer to freelancers instead.
			                                                </p><br>
			                                                <h3><b>2. Choose/select the bidder/freelancer</b></h3>
			                                                <p><b>
			                                                	* Browse freelancer profiles<br>
			                                                	* Chat in real-time<br>
			                                                	* Compare proposals<br>
			                                                	* Select your favourite and award the job. Your freelancer will get to work right away.
			                                                </b>
			                                            </p><br>
			                                            <h3><b>3. Pay when you are satisfied! </b></h3>
			                                                <p><b>
			                                                Pay safely using our payment system. This means that you can release payment on completion 100% work completed. You are in control so you get to make the decisions.
			                                                </b>
			                                            </h2>
			                                                </b>

				                                		</div>
				                                		<a href="post-project.php"><button class="btn btn-primary btn-lg">Post Project</button>


				                                	</div>
				                                
				                         
				           
				                                </div>
				                            </div>



			                    		</div><!--  -->

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
    </script>

</body>
</html>
