<?php 
require "../auth/access_levels.php"; 
$Url = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
$Url .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
$loggedinquery=mysqli_query($con, "UPDATE users SET loggedin='".date("Y-m-d h:i:sa")."' WHERE id='".$user_id."' ");

?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | Showroom</title>

    <?php include_once('inc/css.php'); ?>
    <link href="css/plugins/bootstrapSocial/bootstrap-social.css" rel="stylesheet">

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
                                    <form class="form-horizontal" role="form">
                                       <div class="row">
                                        <div class="col-xs-2">
                                            <div class="form-group">
                                            <select class="form-control input-lg" id="currency"  onchange="showscript(this.id,'budget')">
                                                  <option>currency</option>
                                                  <option value="$">$</option> 
                                                  <option value="₦">&#8358;</option> >
                                            </select>
                                            </div>
                                        </div>
                                            <div class="col-xs-3">
                                             
                                               <div class="form-group">

                                                   <select class="form-control input-lg" id="budget">
                                                  <!--  -->
                                                   </select>
                                               </div>
                                           </div>
                                           <div class="col-xs-7">
                                                <div class="input-group">
                                                    <input type="text" class="form-control input-lg" id="name" placeholder="Search among the best jobs available...">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-primary btn-lg" onclick="search()" type="button"><i class="fa fa-search"></i></button>
                                                    </span>
                                                </div>
                                           </div>
                                       </div>
                                    </form>

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
                                <li onclick="showcase(0)" class="active" id="0">
                                    <a href="#">All</a>
                                </li>
                                <li onclick="showcase(1)" id="1">
                                    <a>Logo</a>
                                </li>
                                <li onclick="showcase(2)">
                                    <a>Websites</a>
                                </li>
                                <li onclick="showcase(3)">
                                    <a>Mobile Apps</a>
                                </li>
                                <li onclick="showcase(4)">
                                    <a>Graphic Design</a>
                                </li>
                                <li onclick="showcase(5)">
                                    <a>Illustration</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="" style="padding-top: 5px;">
                            <a href="showcase-upload.php" class="btn btn-outline btn-primary">Add Content</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="container">
                    <div class="col-md-offset-4" id="loader" style="display: none;"><img src="../img/loader.gif" style=""></div>
             
                <div class="row" id="show">
                <?php 
                $query=mysqli_query($con, "SELECT * FROM showcaseupload ORDER BY id DESC");
                while ($row=mysqli_fetch_array($query)) { ?>
                        <div class="col-md-3">
                            <a href="preview-modal.php?id=<?php echo $row['post_id']." ".$row['id']; ?>">
                            <div class="ibox material-shadow">
                                <div class="ibox-content product-box">
                                    <div class="product-imitation">
                                     <?php  echo ' <img src="upload/'.$row['documents'].'" class="img" width="100%" height="200">'; ?>
                                    </div>
                                    <div class="product-desc">
                                        <span class="product-price">
                                           <?php echo $row['showcasecurrency']." ".$row['showcasemoney']; ?>
                                        </span>
                                        <a href="#" class="product-name"> <?php echo $row['showcasetitle']; ?></a>
                                        <div class="small m-t-xs">
                                           <?php echo $row['showcasedescribe']; ?>
                                        </div>
                                        <p class="m-t" id="countlikes">
                                        
                                         <?php echo $row['likes']; ?>
                                         Like(s)</a>
                                         
                                       
                                        </p>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                         <?php  } ?>


                    </div>
                    
                </div>
            </div>


            <?php include_once('inc/footer.php'); ?>

        </div>
    </div>

   

    <?php include_once('inc/jScript.php'); ?>
      <?php include_once 'scripts.php'; ?>
      <script type="text/javascript">
 function addlikes(x,y){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("countlikes").innerHTML = xhttp.responseText;        
        } };
  xhttp.open("POST", "inc/likepages.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("id="+x+"&project="+y);
    }
    </script>
</body>
</html>
