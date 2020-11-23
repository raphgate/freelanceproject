<?php 
require "../auth/access_levels.php"; 
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | finacial</title>

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
                                    <h1 class="font-bold">Financial Dashboard</h1>
                                    <p></p>
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
	                    		<h1 class="font-bold">Financial Auditor</h1>
	                    	</div>
	                    </div>
	                    <div class="row">
	                    	<div class="col-md-9">

	                    		<div class="row">
	                    			<div class="col-md-12">
	                    				<div class="ibox-content material-shadow p-xs">
			                    			<div class="tabs-container">
				                                <ul class="nav nav-tabs">
				                                    <li class="active">
				                                        <a data-toggle="tab" href="#tab-1"> Payments</a>
				                                    </li>
				                                    <li class="">
				                                        <a data-toggle="tab" href="#tab-2"> Withdrawals</a>
				                                    </li>
				                          
				                                </ul>
				                                <div class="tab-content">
				                                	<div id="tab-1" class="tab-pane active">
				                                		<div class="panel-body">
				                                			<div class="col-md-12 table-responsive">
			                                                    <table class="table table-hover table-striped border-top-bottom border-left-right">
			                                                        <thead>
			                                                            <tr>
			                                                                
			                                                                <th>Amount</th>
			                                                                <th>Description</th>
			                                                             
			                                                            </tr>
			                                                        </thead>
			                                                        <tbody>
			                                                        	<?php
			                                                        	$wow=mysqli_query($con, "SELECT * FROM funds WHERE user_id='".$user_id."' ");
			                                                        	while ($ron=mysqli_fetch_array($wow)) {
			                                                        	?>
			                                                        	<tr>
			                                                        		<td><?php echo $ron['amount']; ?></td>
			                                                        		<td><?php echo $ron['title']; ?></td>
			                                                        	
			                                                        	</tr>
			                                                        	<?php }?>
			                                                        </tbody>
			                                                    </table>
			                                                </div>
				                                		</div>
				                                	</div>
				                                	<div id="tab-2" class="tab-pane">
				                                		<div class="panel-body">
				                                			<div class="col-md-12 table-responsive">
			                                                    <table class="table table-hover table-striped border-top-bottom border-left-right">
			                                                        <thead>
			                                                        	<?php 
			                                                        	$query=mysqli_query($con, "SELECT * FROM users WHERE id='".$user_id."' ");
			                                                        	$row=mysqli_fetch_array($query);
			                                                        	?>
			                                                            <tr>
			                                                              
			                                                                <th>Amount</th>
			                                                                <th>Status</th>
			                                                                <th>Actions</th>
			                                                            </tr>
			                                                        </thead>
			                                                        <tbody>

			                                                        	<tr>
			                                                        		<td>&#x20A6; <?php echo $row['wallet']; ?></td>
			                                                        		<td><?php echo $row['Confirm_status']; ?></td>
			                                                        		<td></td>
			                                                        	
			                                                        	</tr>
			                                                        </tbody>
			                                                    </table>
			                                                </div>
				                                		</div>
				                                	</div>
				                         
				           
				                                </div>
				                            </div>

			                    		</div><!--  -->

	                    		
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
    <script type="text/javascript">
    </script>

</body>
</html>
