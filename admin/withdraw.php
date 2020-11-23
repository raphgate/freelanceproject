<?php 
require "../auth/access_levels.php"; 
$loggedinquery=mysqli_query($con, "UPDATE users SET loggedin='".date("Y-m-d h:i:sa")."' WHERE id='".$user_id."' ");
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | Withdraw</title>

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
                                    <h1 class="font-bold">Withdraw Dashboard</h1>
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
	                    		<h1 class="font-bold">Withdraw Money</h1>
	                    	</div>
	                    </div>
	                    <div class="row">
	                    	<div class="col-md-9">

	                    		<div class="row">
	                    			<div class="col-md-12">
	                    				<div class="ibox-content material-shadow p-xs">
			                    			<div class="tabs-container">
				                                <ul class="nav nav-tabs">
				                                  
				                                    
				                                </ul>
				                                <div class="tab-content">
				                                	<div id="tab-1" class="tab-pane active">
				                                <div class="panel-body">
				                               <?php 
				                              $walletquery=mysqli_fetch_array(mysqli_query($con, "SELECT wallet FROM users WHERE id='".$user_id."' "));
				                                ?>
				                        
		                                <div class="col-md-12 table-responsive">

	                                     <form class="form-horizontal col-md-7" role="form">
	                                     	 <div id="withdraw"></div>
		                                   	<h4>Amount Avaliable: &#x20A6;<?php echo $walletquery['wallet']; ?></h4>
		                                       <input type="number" class="form-control input-lg" required="required"  id="amount" ><br>
		                                     <button class="btn btn-success" type="button" onclick="withdraw()">
		                                      Request Withdraw</button>
			                              </form>
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
      function withdraw() {
      var amount = document.getElementById("amount").value;

if (amount == null || amount == "") {
    alert('Please enter valid amount')
} else {
    
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("withdraw").innerHTML = xhttp.responseText;
          }
       };
       xhttp.open("POST", "inc/Approve_withdraw.php", true);
       xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       xhttp.send("amount="+amount);
}
  }
    </script>

</body>
</html>
