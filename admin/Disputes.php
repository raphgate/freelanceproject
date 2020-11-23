<?php 
require "../auth/access_levels.php"; 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | Disputes</title>

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
                                    <h1 class="font-bold">Disputes</h1>
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
	                    		<h1 class="font-bold"></h1>
	                    	</div>
	                    </div>
	                    <div class="row">
	                    	<div class="col-md-9">

	                    		<div class="row">
	                    			<div class="col-md-12">
	                    				<div class="ibox-content material-shadow p-xs">
			                    			<div class="tabs-container">
				                   <!--              <ul class="nav nav-tabs">
				                                    <li class="active">
				                                        <a data-toggle="tab" href="#tab-1">Active dispute</a>
				                                    </li>
				                                    <li class="">
				                                        <a data-toggle="tab" href="#tab-2">Attach file</a>
				                                    </li>
				                          
				                                </ul> -->
				                                <div class="tab-content">
				                                	<div id="tab-1" class="tab-pane active">
				                                		<div class="panel-body">
				                                			<div class="col-md-12 table-responsive">
				                                				<form class="role col-md-6" id="admission-part-3" enctype="mutlipart/form-data" method="POST">
				                                					<h3>What disputes do you wish to resolve</h3>
				                                					<div class="form-group">
				                                						<label>Type:</label>
				                                						<select type="text" class="form-control" name="title">
				                                							<option>Project disputes</option>
				                                							<option>Financial disputes</option>
				                                						</select>
				                                					</div>
				                                					<div class="form-group">
				                                						<label>Disputes Statements:</label>
				                                						<textarea type="text" class="form-control" name="stmt" placeholder="Type here" >
				                 
				                                						</textarea>
				                                					</div>
				                                					<div class="form-group">
				                                						<label>Documents:</label>
				                                						<input type="file" class="form-control" name="pixel" >
				                 
				                                						
				                                					</div>
				                                					<button class="btn btn-info" id="btn-adm-3-next">Submit</button>
				                                				</form>
			                                         
			                                                </div>
				                                		</div>
				                                	</div>
				                                	<div id="tab-2" class="tab-pane">
				                                		<div class="panel-body">
				                                			<div class="col-md-12 table-responsive">
			                                                    <table class="table table-hover table-striped border-top-bottom border-left-right">
			                                                        <thead>
			                                                    
			                                                            <tr>
			                                                              
			                                                                <!-- <th>Amount</th> -->
			                                                             
			                                                            </tr>
			                                                        </thead>
			                                                        <tbody>

			                                                        	<tr>
			                                                        		<td>
			                                                        			
			                                                        		</td>
			                                                        		
			                                                        	
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
     $("#admission-part-3").on("submit", function (e) {
    $('#btn-adm-3-next').html('<div class="loader-sm center-block"></div>');
    e.preventDefault();
    $.ajax({
        url: "inc/file.php?use=disputes",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            if (data == 'Continue') {
                 $('#btn-adm-3-next').html('loading...');
                alert('Successfully uploaded')
               window.location.reload();
            } else {
                $('#btn-adm-3-next').html('loading...');
                alert('Successfully uploaded');
                window.location.reload();
                }
            }
        });

    });

    </script>

</body>
</html>
