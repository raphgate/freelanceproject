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

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/bootstrapSocial/bootstrap-social.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="gray-bg">
        <?php
        if (isset($_GET['err'])==1) {
           echo "<h5  style='color:red; text-align:center;'>Invalid login info </h5>";
        }
        ?>
    <div class="middle-box text-center loginscreen animated fadeInDown">
    
        <div class="register">
            <div>
                <h2 class="logo-name">FL+</h2>
            </div>
            <hr>
            <div>
              <!--   <a class="btn btn-block btn-social btn-facebook" > -->
             <input class="btn btn-block btn-social btn-facebook" type="button" value="Sigup in with Facebook" onclick="window.location='<?php echo $loginURL?>';">
            <!--     </a> -->
            </div>
            <br>
            <p>OR</p>
            <?php include_once'inc/logaction.php'; ?>
            <form class="m-t" role="form" method="POST">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Email or Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" name="lgn" class="btn btn-primary block full-width m-b">Login</button>
               
                <a class="btn btn-sm btn-white btn-block" href="register.php">Register</a>
                 <a href="auth/get-password.php" class="btn btn-sm btn-white btn-block full-width m-b">Forgot password</a>
            </form>
            

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
