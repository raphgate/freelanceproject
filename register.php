<?php
require_once 'auth/config.php';
include_once 'auth/dbc.php';
if (isset($_SESSION['accessToken'])) {
    $accessToken=$_SESSION['accessToken'];
    header("location:admin/home.php");
}
$redirectURL = "https://www.ebrang.com/auth/fb-callback.php";
$permissions = ['email'];
$loginURL = $helper->getLoginUrl($redirectURL,$permissions);

//echo $loginURL;
?>
<!DOCTYPE html>
<html>
<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Mar 2017 13:36:49 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | Register</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/bootstrapSocial/bootstrap-social.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
        @import url("https://fonts.googleapis.com/css?family=Roboto");
        input[type=radio] {
          position: absolute;
          visibility: hidden;
          display: none;
        }

        label {
          color: #9a929e;
          display: inline-block;
          cursor: pointer;
          font-weight: bold;
          padding: 4px 3.672em;
        }
        input[type=radio]:checked + label {
          color: #ccc8ce;
          background: #675f6b;
        }

        label + input[type=radio] + label {
          border-left: solid 1px #675f6b;
        }
        .radio-group {
          border: solid 1px #675f6b;
          display: inline-block;
          border-radius: 2px;
          overflow: hidden;
          width: 100%;
          height: 28px;
        }

    </style>
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div class="register">
            <div>
                <h2 class="logo-name">FL+</h2>
            </div>
            <hr>
            <h3>Sign up for free today!</h3>
            <div>
                 <input class="btn btn-block btn-social btn-facebook" type="button" value="Sigup in with Facebook" onclick="window.location='<?php echo $loginURL?>';">
            </div>
            <br>
            <p>OR</p>
            <?php include_once'inc/signaction.php' ?>
            <form class="m-t" role="form" method="POST">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <div class="form-group">
                    <div class="radio-group">
                        <input type="radio" id="option-one" name="selector" value="Hire">
                        <label for="option-one">Hire</label>
                        <input type="radio" id="option-three" name="selector" value="Work">
                        <label for="option-three">Work</label>
                    </div>
                </div>
                <button type="submit" name="create" class="btn btn-primary block full-width m-b">Create Account</button>
                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="login.php">Login</a>
            </form>
            <?php  ?>
            <p class="m-t"> <small>By registering you confirm that you accept the Terms and Conditions of eBrang &copy; 2018</small></p>
        </div>
    </div>
   

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>
</html>
