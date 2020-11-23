<?php require "../auth/access_levels.php"; 
   $loggedinquery=mysqli_query($con, "UPDATE users SET loggedin='".date("Y-m-d h:i:sa")."' WHERE id='".$user_id."' ");
  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | eBrang help center</title>

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
                       
                        <h2 class="font-bold">eBrang Help Center</h2>
                    </div>
                   
                </div>
            </div>
            <div class="wrapper">
                     <div class="showroom border-bottom white-bg m-t-xl" style="">
                <div class="overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-8">
                                <div class="text-center m-t-xl p-xl">
                                    <h1 class="font-bold">eBrang Live Support</h1>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br><br>
                <div class="container">
                    <div>
                        <img src="upload/avatar.png" class="message-avatar ">
                        <h2>

                         Live Support system<br>
                        Still have questions?<br>
                         Our awesome Live Customer Support Team is ready to assist you.<br>
                         <?php
                         $projectId='0';
                         $uid='852269177';
                         ?>
    <a class="open-small-chat1 btn btn-default" onclick="badoo(<?php echo $projectId; ?>, <?php echo $user_id; ?>, <?php echo $uid; ?>)"><i class="fa fa-comment"></i> Chat with admin</a>
                        </h2>
                    </div>
                
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
                <div class="content">
                    <div class="left">
                        <div class="author-name">
                            Admin <small class="chat-date">
                            10:02 am
                        </small>
                        </div>
                        <div class="chat-message active">
                            Hello! just ask 
                        </div>
                    </div>
                    <div class="right">
                        <div class="author-name">
                            Admin
                            <small class="chat-date">
                                11:24 am
                            </small>
                        </div>
                        <div class="chat-message">
                            What's your question
                        </div>
                    </div>
                                     
                </div>
                <div class="form-chat">
                    <div class="input-group input-group-sm">
                        <input type="hidden" id="sender" value="<?php echo $user_id; ?>">
                        <input type="hidden" id="reciever" value="852269177">
                       <!--  <input type="text" class="form-control" id="mg"> -->
                        <span class="input-group-btn"> 
                 <!-- <button
                            class="btn btn-primary" type="button">Send
                    </button> --> </span></div>
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
