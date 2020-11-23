<?php require "../auth/access_levels.php"; 
    $projectId=base64_decode($_GET['id']);
  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | award projects</title>

    <?php include_once('inc/css.php'); ?>
    <link href="../css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="../css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="../css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
    <link href="../css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="../css/plugins/select2/select2.min.css" rel="stylesheet">
</head>

<body class="top-navigation">
    <div id="wrapper">
        <div id="page-wrapper" class="white-bg">
        
            <?php include_once('inc/header.php'); ?>

            <div class="row wrapper border-bottom page-heading bg-primary"  style="margin-top: 56px;">
                <div class="container">
                    <div class="col-lg-10">
                        <ol class="breadcrumb bg-primary">
                            <li>
              
                        </ol>
                        <h2 class="font-bold">Award project</h2>
                    </div>
                    <div class="col-lg-2">

                    </div>
                    <div></div>
                </div>
            </div>
            <div class="wrapper">
                <div class="container">
                    <section class="m-b-lg m-t-lg">
                       <div class="row">
                           <div class="col-md-8">
                                <!-- Nav tabs -->
                                <div class="card">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active">
                                            <a href="#tabpanel1" aria-controls="tabpanel1" role="tab" data-toggle="tab">All Proposals</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#tabpanel2" aria-controls="tabpanel2" role="tab" data-toggle="tab">Online</a>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="tabpanel1">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                    <?php
                                                     $bidQuery=mysqli_query($con, "SELECT * FROM bids WHERE project_id='$projectId' AND post_id='$user_id'  GROUP BY bider_id ");
                                                     $bidCount=mysqli_num_rows($bidQuery);
                                                     while($bider_data=mysqli_fetch_array($bidQuery)){
                                                        $ownerid=$bider_data['post_id'];
                                                        $productamont=$bider_data['bidAmount'];
                                                     $getbid=mysqli_query($con, "SELECT * FROM users WHERE id='".$bider_data['bider_id']."' ");
                                                     $getbid1=mysqli_fetch_array($getbid);
                                                     $username=$getbid1['username'];
                                                     $fullname1=$getbid1['first_name']." ".$getbid1['last_name'];
                                                     $pix=$getbid1['pix'];
                                                     $uid=$getbid1['id'];

                                                     ?>
                                                        <tr>
                                                            <td class="" width="150">
                                                                    <?php
                                                              if ($getbid1['pix']=="") {
                                                                 echo '<img src="upload/userimg.png " class="img img-responsive img-rounded">';
                                                              }else{ 
                                                              echo  '<img src="upload/'.$getbid1['pix'];' " class="img img-responsive img-rounded"> '; 
                                                              }
                                                              ?>
                                                            </td>
                                                            <td class="" width="250">
                                                                <a href="profile.php">
                                                                    <h4 class="font-bold">
                                                                        <?php
                                                                         if ($username!=="") {
                                                                           echo $username;
                                                                        }else{ echo $fullname1; }

                                                                        ?></h4>
                                                                </a>
                                                                <p>Hey, I'm interested in your project. Please send me a message so that we can discuss more.
                                                                 </p>
                                                                <h5 class="font-bold">
                                                                    <!-- 40 hours per week <span> From India</span> -->
                                                                </h5>
                                                            
                                                                <form method="POST" action="inc/awardaction.php">
                                                                    <input type="hidden" name="check" value="1"> 
                                                                    <input type="hidden" name="product_id" value="<?php echo $projectId;?>">
                                                                    <input type="hidden" value="<?php echo $uid; ?>" name="userid" >
                                                                    <input type="hidden" name="ower_id" value="<?php echo $ownerid; ?>">
                                                                    <input type="hidden" name="productamont" value="<?php echo $productamont; ?>">
                                                                <small>
                                                                    <button class="btn btn-primary btn-small" type="submit" >Award</button> 
                                                                    <a class="open-small-chat1 btn btn-default" onclick="badoo(<?php echo $projectId; ?>, <?php echo $ownerid; ?>, <?php echo $uid; ?>)"><i class="fa fa-comment"></i> Chat</a>
                                                                </small>
                                                                </form>
                                                            </td>
                                                            <td class="" width="150">
                                                               
                                                               <div class="">
                                                                <?php
                                                                     if ($getbid1['ratings']==1) {
                                                                        echo '  <span class="label label-primary">1</span>
                                                                        &nbsp;
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-default"></i>
                                                                        <i class="fa fa-star text-default"></i>
                                                                        <i class="fa fa-star text-default"></i>
                                                                        <i class="fa fa-star text-default"></i>
                                                                        ';
                                                                    }elseif ($getbid1['ratings']==2) {
                                                                       echo '  <span class="label label-primary">2</span>
                                                                        &nbsp;
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-default"></i>
                                                                        <i class="fa fa-star text-default"></i>
                                                                        <i class="fa fa-star text-default"></i>
                                                                        ';
                                                                    }elseif ($getbid1['ratings']==3) {
                                                                        echo '  <span class="label label-primary">3</span>
                                                                        &nbsp;
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-default"></i>
                                                                        <i class="fa fa-star text-default"></i>
                                                                        ';
                                                                    }elseif ($getbid1['ratings']==4) {
                                                                        echo '  <span class="label label-primary">4</span>
                                                                        &nbsp;
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-default"></i>
                                                                        ';
                                                                    }elseif ($getbid1['ratings']==5) {
                                                                        echo '  <span class="label label-primary">5</span>
                                                                        &nbsp;
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        ';
                                                                    }elseif ($getbid1['ratings']==0) {
                                                                          echo '  <span class="label label-primary">0</span>
                                                                        &nbsp;
                                                                        <i class="fa fa-star text-default"></i>
                                                                        <i class="fa fa-star text-default"></i>
                                                                        <i class="fa fa-star text-default"></i>
                                                                        <i class="fa fa-star text-default"></i>
                                                                        <i class="fa fa-star text-default"></i>
                                                                        ';
                                                                    }
                                                                      
                                                                    ?>
                                                                </div>
                                                                <h5><?php echo $getbid1['views']; ?> Reviews</h5>
                                                                <!-- <h5>99% Jobs Completed</h5> -->
                                                            </td>
                                                            <td width="50">
                                                                <span class="btn btn-default"><i class="fa fa-heart-o"></i></span>
                                                                
                                                            </td>
                                                            <td class="" width="50">
                                                                <span class="btn btn-default"><i class="fa fa-trash"></i></span>
                                                            </td>
                                                        </tr>
                                                        <?php }?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="tabpanel2"> 
                                        </div>
                                    </div>
                                </div>
                           </div>
                           <div class="col-md-4">                       
                               <div class="ibox card">
                                   <div class="ibox-title">
                                       <h3>Filters</h3> 
                                   </div>
                                   <div class="ibox-content"></div>
                               </div>
                           </div>
                       </div>
                    </section>
                </div>
            </div>
            <?php include_once('inc/footer.php'); ?>
          
            <div class="small-chat-box fadeInRight animated">
                <div class="heading" draggable="true">
                    <small class="chat-date pull-right">
                        <!-- 02.19.2015 -->
                    </small>
                    Chat
                </div>
                <div id="cool">
                <div class="content" >
                    <div class="left">
                        <div class="author-name">
                            Monica Jackson <small class="chat-date">
                            10:02 am
                        </small>
                        </div>
                        <div class="chat-message active">
                            Lorem Ipsum is simply dummy text input.
                        </div>
                    </div>
                    <div class="right">
                        <div class="author-name">
                            Mick Smith
                            <small class="chat-date">
                                11:24 am
                            </small>
                        </div>
                        <div class="chat-message">
                            Lorem Ipsum is simpl.
                        </div>
                    </div>
                                     
                </div>
                <div class="form-chat">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control">
                        <span class="input-group-btn"> <button
                            class="btn btn-primary" type="button">Send
                    </button> </span></div>
                </div>
            </div>
            </div>
            <div id="small-chat">
                <span class="badge badge-warning pull-right"></span>
                <a class="open-small-chat">
                    <i class="fa fa-comments"></i>
                </a>
            </div>
      
        <!-- Chart ends here -->

        </div>
    </div>



   <?php include_once('inc/jScript.php'); ?>
    <!-- Chosen -->
    <script src="../js/plugins/chosen/chosen.jquery.js"></script>
    <!-- Select2 -->
    <script src="../js/plugins/select2/select2.full.min.js"></script>
     <!-- Tags Input -->
    <script src="../js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>


    <script type="text/javascript">
    function send(){
            var msg=$('#mg').val();
        if (msg !=="") {
        $("#btn").prop('disabled', true);
        $.ajax({
            url: 'inc/insertmessage.php',
            type: 'post',
            data: ( { "message": $('#mg').val(), "sender": $('#sender').val(), "reciever": $('#reciever').val(), "project_id": $('#project_id').val() } ),
            processData: true,
            success: function( data, textStatus, jQxhr ){
            $("#btn").prop('disabled', false);
            $('#mg')[0].reset();
            },
            error: function( jqXhr, textStatus, errorThrown){
                alert(errorThrown) }           
        });   
        }else{alert("Oops empty");} 
        }
    function badoo(x,y,z){
        
        setInterval(function(){
              badoo1(x,y,z); 
                 },1000);
                       
          var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                   
                document.getElementById("cool").innerHTML = xhttp.responseText;      
                } };
          xhttp.open("POST", "inc/badoochat.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("project_id="+x+"&me="+y+"&you="+z);
    }
    function badoo1(x,y,z){         
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    var newm = xhttp.responseText;
               $("#appendmessage").before(newm).fadeIn();
                // document.getElementById("appendmessage").prepend(newm);      
                } };
          xhttp.open("POST", "inc/badoochat1.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("project_id="+x+"&me="+y+"&you="+z);
    }
        $(document).ready(function() {

            $('.chosen-select').chosen({width: "100%"});
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
            
        });
    </script>
</body>
</html>
