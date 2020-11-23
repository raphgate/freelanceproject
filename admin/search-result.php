<?php 
require "../auth/access_levels.php"; 
 if (isset($_POST['searchname'])) {
    $name=$_POST['searchname'];
}
$loggedinquery=mysqli_query($con, "UPDATE users SET loggedin='".date("Y-m-d h:i:sa")."' WHERE id='".$user_id."' ");
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | Search</title>

    <?php include_once('inc/css.php'); ?>
    <link href="../css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="../css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="../css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="../css/plugins/bootstrapSocial/bootstrap-social.css" rel="stylesheet">


</head>

<body class="top-navigation">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        
            <?php include_once('inc/header.php'); ?>
            <div class="wrapper border-bottom gray-bg" style="margin-top: 60px;">
                <div class="container">
                    <div class="col-md-10">
                        <div class="mini-nav">
                            <ul class="">
                                <li onclick="" class="">
                                    <a href="#">Search page</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="ibox-content float-e-margins material-shadow">
                                <div class="row border-bottom">
                                    <div class="col-md-12">
                                         <h1 class="btn btn-sm" id="result"></h1>
                                        <div class=" pull-right">
                                        
                                        </div>
                                    </div>
                                </div>
                                 <input type="hidden" value="<?php echo $name; ?>" id="sea">
                                <div class="row" id="pagination_data">

                            
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="ibox-content float-e-margins material-shadow">
                                <h3>Freelancers for Hire</h3>
                      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php include_once('inc/footer.php'); ?>

        </div>
    </div>

    <?php include_once('inc/jScript.php'); ?>

    <!-- IonRangeSlider -->
    <script src="../js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>
    <script>

 $(document).ready(function(){  
      load_data();  
      function load_data(page)  
      {  
           $.ajax({  
                url:"inc/search-pagination.php",  
                method:"POST",  
                data:{page:page,"searchname":$('#sea').val()},  
                success:function(data){  
                     $('#pagination_data').html(data);  
                }  
           })  
      }  
      $(document).on('click', '.pagination_link', function(){  
           var page = $(this).attr("id");  
           load_data(page);  
      });  
 });    

   
        $(document).ready(function(){
            $("#ionrange_1").ionRangeSlider({
                min: 0,
                max: 5000,
                type: 'double',
                prefix: "$",
                maxPostfix: "+",
                prettify: false,
                hasGrid: true
            });
       });
    </script>

</body>
</html>
