<?php require "../auth/access_levels.php"; 
$loggedinquery=mysqli_query($con, "UPDATE users SET loggedin='".date("Y-m-d h:i:sa")."' WHERE id='".$user_id."' ");
 $record_per_page = 20;  
 $page = '';  
 $output = '';  
 $output1 = '';
 $output2 = '';
 if(isset($_POST["page"]))  
 {  
      $page = $_POST["page"];  
 }  
 else  
 {  
      $page = 1;  
 }  
 $start_from = ($page - 1)*$record_per_page;
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | browse Category</title>

    <?php include_once('inc/css.php'); ?>
    <link href="../css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="../css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="../css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
    <link href="../css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="../css/plugins/select2/select2.min.css" rel="stylesheet">



</head>

<body class="top-navigation">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        
        <?php include_once('inc/header.php'); ?>

        <div class="wrapper wrapper-content" style="margin-top: 30px;">
            <div class="container">
         <!--  -->

                <section class="">
                        <div class="row">
                        <div class="col-md-12">
                          <!--   <div class="pull-right m-t-md"><a href="">Edit Skills</a> </div> -->
                            <h1 class="font-bold">Search by Category</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" class="form-horizontal">
                                <div class="form-group has-feedback">
                                    <label class="col-md-1 col-sm-2 control-label pull-left"><h3>Search</h3></label>
                                    <div class="col-md-11 col-sm-10">
                                      
                                        <select type="text" id="search_text" class="form-control input-lg" placeholder="Search category"  onclick="find1()">
                                               <option value="Accounting & Consulting">Accounting & Consulting</option>
                                                    <option value="Admin Support">Admin Support</option>
                                                    <option value="Customer Service">Customer Service</option>
                                                    <option value="Data Science & Analytics">Data Science & Analytics</option>
                                                    <option value="Design & Creative">Design & Creative</option>
                                                    <option value="Engineering & Architecture">Engineering & Architecture</option>
                                                    <option value="IT & Networking">IT & Networking</option>
                                                    <option value="Legal">Legal</option>
                                                    <option value="Sales & Marketing">Sales & Marketing</option>
                                                    <option value="Translation">Translation</option>
                                                    <option value="Web, Mobile & Software Development">Web, Mobile & Software Development</option>
                                                    <option value="Writing">Writing</option>
                                        </select>
                                       <!--  <span class="glyphicon glyphicon-search form-control-feedback"></span> -->
                                    </div>
                                </div>
                                <hr class="">
                         <!--   -->
                                <hr>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-md-offset-4">
                          <div id="loader" style="display: none;"><img src="../img/loader.gif" style=""></div>
                        <!--     <button class="btn btn-default"> Clear Filters</button>
                            <button class="btn btn-default"><i class="fa fa-bookmark-o"></i> Show Bookmarks</button> -->
                        </div>
                 
                    </div>
                    <div class="row m-t-md m-b-md">
                        <div class="col-md-12">
                            <div class="ibox-content material-shadow no-padding">
                                <div class="project-list table-responsive" id="pagination_data">
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                         <div class="row">
                                    <div class="col-md-12">
                                        <div data-toggle="buttons" class="btn-group pull-right">
                                    <?php
                                     $try1=mysqli_query($con, "SELECT * FROM projects ORDER BY id DESC ");
                                     $total_records1 = mysqli_num_rows($try1);  
                                     $total_pages = ceil($total_records1/$record_per_page);
                
                                                     for($i=1; $i<=$total_pages; $i++)  
                                                     {  
                                                         $output1 .= "<label class='btn btn-sm btn-white pagination_link' style='cursor:pointer;' id='".$i."'><input type='radio' id='option1' name='options'>".$i."</label>";
                                                          
                                                     } 
                                                         
                                                echo $output1; 
                                          ?>
                                        </div>
                                    </div>
                                </div>
                </section>
            </div>

        </div>
        
        <?php include_once('inc/footer.php'); ?>

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
        function find1(){
            document.getElementById('loader').style.setProperty('display','block');
        var search=$('#search_text').val();
          var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
             document.getElementById('loader').style.setProperty('display','none');
            document.getElementById("pagination_data").innerHTML = xhttp.responseText;
          }
       };
       xhttp.open("POST", "inc/searchbrowseproject.php", true);
       xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       xhttp.send("search="+search);
    }
      $(document).ready(function(){  
      document.getElementById('loader').style.setProperty('display','block');
      load_data();  
      function load_data(page)  

      {  
           $.ajax({  
                url:"inc/upgradeplan.php",  
                method:"POST",  
                data:{page:page},  
                success:function(data){  
                   document.getElementById('loader').style.setProperty('display','none');
                     $('#pagination_data').html(data);  

                }  
           })  
      }  
      $(document).on('click', '.pagination_link', function(){  
           var page = $(this).attr("id");  
           load_data(page);  
      });  
 });
     
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
