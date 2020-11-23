<?php require "../auth/access_levels.php"; 
   if ($email=='eBrang@info.com') {
  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | Adminchat</title>

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
                        <h2 class="font-bold">Welcome Admin</h2>
                    </div>
                        <div class="row">
                            <div class="col-md-6">
                    <a class="btn btn-warning " href="Admindisputes.php"> Disputes</a>
                    <a class="btn btn-info" href="Adminchat.php"> Chat With Clients</a>
                    <a class="btn btn-warning" href="Adminportal.php">Payment Request</a> 
                        </div>
                        
                           <div class="col-md-6">
                          <a class="btn btn-primary">
                            <?php 
                            $Numberusers=mysqli_query($con, "SELECT * FROM users ");
                            $countNumberusers=mysqli_num_rows($Numberusers);
                            echo number_format($countNumberusers)." Users";
                            ?>
                            </a>
                        </div>
                    
               
                    </div>
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
                                            <a href="#tabpanel1" aria-controls="tabpanel1" role="tab" data-toggle="tab"> Online</a>
                                        </li>
                                     <!--    <li role="presentation">
                                            <a href="#tabpanel2" aria-controls="tabpanel2" role="tab" data-toggle="tab">Online</a>
                                        </li> -->
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="tabpanel1">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                        <?php
                                      $query=mysqli_query($con, "SELECT * FROM messagebox WHERE status=0 AND project_id=0 AND receive_id='852269177' GROUP BY sender_id ");
                                      while ($row=mysqli_fetch_array($query)) {
                                         $projectId=0;
                                         $uid=$row['sender_id'];
                                    $userdetail=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id='".$row['sender_id']."' "));
                                        ?>
                                                        <tr>
                                                            <td class="" width="150">
                                                                <img src="upload/avatar.png" class="img img-responsive img-rounded" width="50">
                                                            </td>
                                                         <td class="" width="250">
                                                            <a >
                                                                <h4 class="font-bold">
                                                                         <?php if($userdetail['username']!=="")
                                                                   echo $userdetail['username'];
                                                                   elseif($userdetail['username']==""){
                                                                    echo $userdetail['first_name']." ".$userdetail['last_name'];
                                                                  } ?>
                                                                </h4>
                                                            </a>
                                                      
                                                         </td>
                                                         <td width="50">

                                                   <a class="open-small-chat1 btn btn-default" onclick="badoo(<?php echo $projectId; ?>, <?php echo $user_id; ?>, <?php echo $uid; ?>)"><i class="fa fa-comment"></i> Chat</a>
                                                                
                                                         </td>
                                                       
                                                        </tr>
                                                        <?php } ?>
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="tabpanel2"> 
                                        </div>
                                    </div>
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
                             Admin <small class="chat-date">
                            10:02 am
                        </small>
                        </div>
                        <div class="chat-message active">
                            Welcome admin
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
                            sent client messages
                        </div>
                    </div>
                                     
                </div>
                <div class="form-chat">
                    <div class="input-group input-group-sm"><!-- 
                        <input type="text" class="form-control"> -->
                        <span class="input-group-btn"> <!-- <button
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
            badoo(x,y,z);
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
<?php }else{
    header("location:../login.php");
} ?>