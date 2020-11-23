<?php 
require "../auth/access_levels.php";
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Brang | Showroom</title>

    <?php include_once('inc/css.php'); ?>
    <!-- Toastr style -->
    <link href="../css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="../css/plugins/bootstrapSocial/bootstrap-social.css" rel="stylesheet">

</head>
<?php $id=base64_decode($_GET['id']);
   $data_id= explode(' ', $id);
    echo $data_id[0];
    echo $data_id[1]; 
    echo $data_id[2];

  ?>
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
                                    <h1 class="font-bold">Invite your Friends to Freelansa</h1>
                                    <p>See Who You Already Know on Freelancer</p>
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
                            <ul class="">
                                <li class="active">    
                                    <a href="#">All</a>
                                </li>
                                  
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="" style="padding-top: 5px;">
                            <a href="create-blog.php" class="btn btn-outline btn-primary">Create Article</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="container">
                    <div class="row" id="">
                      <div class="col-md-8">
                        <div class="ibox-content material-shadow">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="pull-left m-r-sm">
                                <img src="img/a4.jpg" class="img img-responsive img-rounded" width="70" height="70">
                              </div>
                              <div class="">
                                <div class="pull-right">
                                  <button class="btn btn-default"><i class="fa fa-comment"></i> Chat</button>
                                </div>
                                <h4 class="font-bold">Daniel Alisi </h4>
                                <small>1:02<span>PM</span></small>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="pull-right">
                                <button class="btn btn-danger">End Project</button>
                              </div>
                              <h2>$55 USD in 8 Days</h2>
                              <small class="font-bold">ACCEPTED</small>
                            </div>
                          </div>
                          <hr class="">
                          <div class="row">
                            <div class="col-md-12">
                              <h2 class="font-bold">Next Step? Add a task for Daniel Akpeyi.</h2>
                              <small>Projects wit an initial milestone are more successfull</small>
                            </div>

                            <div class="col-md-12 m-t-md">
                              <form role="" class="form-inline">
                                <input type="hidden" id="project_id" value="<?php echo $data_id[0];; ?>">
                                <input type="hidden" id="owner" value="<?php echo $data_id[2];; ?>">
                                <input type="hidden" id="activated" value="<?php echo $data_id[1];; ?>">
                                <div class="row">
                                  <div class="col-xs-3">
                                    <div class="form-group">
                                      <label>Milestone Amount</label>
                                      <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="number" id="price" class="form-control">
                                        <span class="input-group-addon">.00</span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xs-4">
                                    <div class="form-group">
                                      <label>Description</label>
                                      <input type="text" id="discrib" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col-xs-2">
                                    <label></label>
                                    <button  class="btn btn-primary" onclick="send()">Create Milestone</button>
                                  </div>
                                </div>

                              </form>
                             
                            </div>
                          </div>
                          <br>
                            <div class="col-md-6">
                              <div class="pull-left">
                           <!--    -->
                              </div> 
                            </div>
                          <hr class="">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="ibox-content material-shadow">
                          <h4 class="font-bold">Whate are Milestone Payments?</h4>
                          <p>We hold your funds so the consultant can't get to them until the point when you discharge them. You should just discharge a breakthrough when you are 100% satisfied</p>
                        </div>
                      </div>
                    </div>
                    <div class="row">                        
                    </div>
                </div>
            </div>
            
            <?php include_once('inc/footer.php'); ?>

        </div>
    </div>

    <?php include_once('inc/preview-modal.php'); ?>

    <?php include_once('inc/jScript.php'); ?>


</body>
</html>
 <?php include_once 'scripts.php'; ?>
