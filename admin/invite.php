<?php 
require "../auth/access_levels.php"; 
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta property="og:url"           content="https://www.ebrang.com" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="eBrang" />
  <meta property="og:description"   content="Your description" />
  <meta property="og:image"         content="https://www.ebrang.com/img/dashboard4_1.jpg" />

    <title>eBrang | invite</title>

    <?php include_once('inc/css.php'); ?>
    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="css/plugins/bootstrapSocial/bootstrap-social.css" rel="stylesheet">

</head>

<body class="top-navigation">
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=1952149205110861&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        
            <?php include_once('inc/header.php'); ?>

            <div class="showroom border-bottom white-bg m-t-xl" style="">
                <div class="overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-8">
                                <div class="text-center m-t-xl p-xl">
                                    <h1 class="font-bold">Invite your Friends to eBrang</h1>
                               <!--   <p>See Who You Already Know on Freelancer</p> -->
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
                              
                                  
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                       <!--  <div class="" style="padding-top: 5px;">
                            <a href="create-blog.php" class="btn btn-outline btn-primary">Create Article</a>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content animated white-bg fadeInRight">
                <div class="container">
                    <div class="row" id="">
                      <div class="col-md-6">
                        <div class="border-bottom m-b-sm">
                                       <div class="fb-send" data-href="https://developers.facebook.com/docs/plugins/"></div>
                          <h3 class="font-bold">Get Started by sending facebook invitation to friends </h3>
                        </div>
                        <div class="">
            
                        <a class="btn btn-block btn-social btn-facebook"  
                           onclick="FBInvite()"  class="fb-send"  data-href="https://www.ebrang.com/index.html" 
    data-layout="button_count">
                              <span class="fa fa-facebook"></span> Invite your friends from  Facebook
                          </a>
                          
                       <div class="fb-share-button" data-href="http://ebrang.com/index.php" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Febrang.com%2Findex.php&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                          
                          <div id="facebook_invite"></div>
                   	      <a class="btn btn-block btn-social btn-google" href="https://plus.google.com/share?url=https://www.ebrang.com" target="_blank">
                              <span class="fa fa-google"></span> Invite your friends from Google
                          </a>
                        
                          <a class="btn btn-block btn-social btn-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://www.ebrang.com" target="_blank">
                              <span class="fa fa-linkedin"></span>  Invite your friends from LinkedIn
                          </a>
                          <a class="btn btn-block btn-social btn-twitter" href="https://twitter.com/share?url=https://www.ebrang.com&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank">
                              <span class="fa fa-twitter"></span> Invite your friends from  Twitter
                          </a>
                          <a class="btn btn-block btn-social btn-yahoo" href="mailto:?Subject=Simple Share Buttons&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 https://www.eBrang.com" >
                              <span class="fa fa-yahoo"></span>  Invite your friends from Yahoo!
                          </a>
                        </div>

                      </div>
                      <div class="col-md-6">
                        <h2 class="font-bold">
                         <!--  Connect with friends who are already on Freelanca -->
                        </h2>
                        <h2 class="font-bold">
                          Invite friends who are looking for work or needs to outsource a job
                        </h2>
                        <div class="m-lg">
                          <h4><i class="fa fa-key"></i> Your contacts are safe with us!</h4>
                          <p>
                          <!--   We'll import your address book to suggest contacts. We won't store your password or email without your permission. -->
                          </p>
                        </div>
                            <div id="fb-root"></div>


                      </div>
                    </div>
                </div>
            </div>
            
            <?php include_once('inc/footer.php'); ?>

        </div>
    </div>

    <?php include_once('inc/jScript.php'); ?>
    <script type="text/javascript">
    </script>
<script>
FB.init({
appId:'1952149205110861',
cookie:true,
status:true,
xfbml:true
});
function FBInvite(){
  FB.ui({
   method: 'send',
   message: 'Invite your Facebook Friends',
   link: 'http://www.ebrang.com',
  },function(response) {
   if (response) {
    alert('Successfully Invited');
   } else {
    alert('Failed To Invite');
   }
  });
 }
</script>


</body>
</html>


