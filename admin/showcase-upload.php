<?php 
require "../auth/access_levels.php"; 
$loggedinquery=mysqli_query($con, "UPDATE users SET loggedin='".date("Y-m-d h:i:sa")."' WHERE id='".$user_id."' ");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | Showroom</title>

    <?php include_once('inc/css.php'); ?>
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
                                    <h1 class="font-bold">eBrang Display Box</h1>
                                    <p>Let the work Speak for itself</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="container">
                    <div class="ibox-content material-shadow">
                        <form  role="form" method="POST" enctype="multipart/form-data" action="inc/showcaseupload.php">
                            <input type="hidden" id="user" name="user"  value="<?php echo $user_id; ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2>UPLOAD IMAGES OF COMPLETED WORKS HERE</h2>
                                    <br>
                                    <p>Select your image</p>
                                    <div class="form-group">
                                        <input  type="file" accept="image/video/" name="pics" class="form-control" required="required">
                                    </div>
                                    <div class="row">
                                        <br><br>
                                        <div class="col-md-6">
                                            <h5>Do Upload</h5>
                                            <p>JPG, GIF or PNG. The higher the resolution the better. Image sizes need to have a minimum size of 800x600</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Don't Upload</h5>
                                            <p>Low quality photos. Screenshots of data entry work, written material, PDF, Multi-page TIFF or eps formats.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h2>DESCRIBE YOUR UPLOADED CONTENT</h2>
                                    <br>
                                    <div class="form-group">
                                        <label for="">Type of Showcase</label>
                                        <select class="form-control" id="showcasetype" name="showcasetype" required="required">
                                            <option value="Create a new showcase">Create a new showcase</option>
                                            <option value="Project">Project</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Showcase Title</label>
                                        <input id="showcasetitle" name="showcasetitle" class="form-control" type="text" name="" placeholder="Enter your showcase title here" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Describe your showcase</label>
                                        <textarea id="showcasedescribe" name="showcasedescribe" class="form-control" placeholder="Enter your showcase description here" rows="6"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Budget</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="form-control" name="showcasecurrency" id="showcasecurrency" onchange="showcaseuploadajax(this.id,'showcasemoney')" required="required">
                                                    <option>currency</option>
                                                   <option value="$">$</option> 
                                                   <option value="₦">&#8358;</option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select type="text" name="showcasemoney" id="showcasemoney" class="form-control" placeholder="" required="required">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Showcase Category</label>
                                        <select class="form-control" id="showcasecategory" name="showcasecategory">
                                            <option value="Logo">Logo</option>
                                            <option value="Websites">Websites</option>
                                            <option value="Mobile Apps" >Mobile Apps</option>
                                            <option value="Graphic Design">Graphic Design</option>
                                            <option value="Illustration">Illustration</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Showcase Sub Category</label>
                                        <select class="form-control" id="showcasesubcategory" name="showcasesubcategory">
                                            <option value="Create a new showcase">Create a new showcase</option>
                                            <option value="Project">Project</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group pull-right">
                                        <button type="submit" id="submit-all" class="btn btn-primary btn-lg "><i class="fa fa-upload"></i> Upload</button>
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                        <hr>
                        <p>By uploading photos, you are approving their display by Freelancer.com, saying that you either own the rights to the image or that you have permission or a license to do so from the copyright holder, and agreeing to abide by terms of use. </p>
                    </div>
                </div>
            </div>
            
            <?php include_once('inc/footer.php'); ?>

        </div>
    </div>

    <?php include_once('inc/jScript.php'); ?>
    <!-- DROPZONE -->
   <!--  // <script src="../js/plugins/dropzone/dropzone.js"></script> -->
</body>
</html>

  <?php include_once 'scripts.php'; ?>
