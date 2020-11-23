<?php require "../auth/access_levels.php"; 
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

    <title>eBrang | works</title>

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
                <section class="m-b-lg m-t-lg">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ibox-content material-shadow">
                                <div class="text-center">
                                    <h1 class="font-bold">Your 3 Steps to Success</h1>
                                    <p>A big warm welcome to eBrang.com! Here's how it works in 3 easy steps:</p>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="img/a4.jpg" class="img-thumbnail img-circle m-b-md" alt="profile">
                                            <div>
                                                <h4>Search for Relevant Projects</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <img src="img/a3.jpg" class="img-thumbnail img-circle m-b-md" alt="profile">
                                            <div>
                                                <h4>Place Bids</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <img src="img/a2.jpg" class="img-thumbnail img-circle m-b-md" alt="profile">
                                            <div>
                                                <h4>Get Awarded and Start Working</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-t-md">
                                        <p>New Freelancers Keep on bidding to increase your chance of being awarded a project.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- <div class="pull-right m-t-md"><a href="">Edit Skills</a> </div> -->
                            <h1 class="font-bold">Jobs Matching My Skills</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" class="form-horizontal">
                                <div class="form-group has-feedback">
                                    <label class="col-md-1 col-sm-2 control-label pull-left"><h3>Search</h3></label>
                                    <div class="col-md-11 col-sm-10">
                                        <input type="text" id="search_text" class="form-control input-lg" placeholder="Search for projects by name" onkeyup="find()">
                                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                    </div>
                                </div>
                                <hr class="">
                                <div class="form-group">
                                    <label class="col-md-1 col-sm-2 control-label pull-left"><h3>Skills</h3></label>
                                    <div class="col-md-11 col-sm-10">
                                        <select data-placeholder="" class="chosen-select form-control input-lg" multiple style="width:350px;" onchange="find()" tabindex="4" id="sk" name="projectSkills">
                                           
                                                        <option selected value="Adobe Photoshop">Adobe Photoshop </option>
                                                        <option selected value="Android Development">Android Development </option>
                                                        <option selected value="Animation">Animation</option>
                                                        <option selected value="AutoCAD">AutoCAD</option>
                                                        <option selected value="Article Writing">Article Writing</option>
                                                        <option selected value="Advertising">Advertising</option>
                                                        <option selected value="Content-Writing">Content-Writing</option>
                                                        <option selected value="Copy Writing">Copy Writing</option>
                                                        <option selected value="Css">Css</option>
                                                        <option selected value="Customer Service">Customer Service</option>
                                                        <option selected value="Email Marketing">Email Marketing</option>
                                                        <option selected value="Facebook Apps">Facebook Apps</option>
                                                        <option selected value="Graphic Design">Graphic Design</option>
                                                        <option selected value="Html">Html</option>
                                                        <option selected value="Internet Research">Internet Research</option>
                                                        <option selected value="iOS Development">iOS Development</option>
                                                        <option selected value="Internet Marketing">Internet Marketing</option>
                                                        <option selected value="iPhone Development">iPhone Development </option>
                                                        <option selected value="Javascript">Javascript</option>
                                                        <option selected value="Joomla!">Joomla! </option>
                                                        <option selected value="Java">Java</option>
                                                        <option selected value="Jquery">Jquery</option>
                                                        <option selected value="Lead Generation">Lead Generation </option>
                                                        <option selected value="Marketing">Marketing</option>
                                                        <option selected value="Mobile App">Mobile App</option>
                                                        <option selected value="Microsoft Excel">Microsoft Excel </option>
                                                        <option selected value="Magento">Magento</option>
                                                        <option selected value="Php">Php</option>
                                                        <option selected value="Presentations">Presentations </option>
                                                        <option selected value="PDF">PDF</option>
                                                        <option selected value="Reporting">Reporting</option>

                                                        <option selected value="Social Media Marketing (SMM)">Social Media Marketing (SMM)</option>
                                                        <option selected value="Software Architecture">Software Architecture</option>
                                                        <option selected value="Software Design">Software Design</option>
                                                        <option selected value="Search Engine Optimization (SEO)">Search Engine Optimization (SEO)</option>
                                                        <option selected value="Sql">Sql</option>
                                                        <option selected value="Translation">Translation</option>
                                                        <option selected value="Telemarketing ">Telemarketing </option>
                                                        <option selected value="Typing">Typing</option>
                                                        <option selected value="Sales">Sales</option>
                                                        <option selected value="Video">Video</option>
                                                        
                                                        <option selected value="Twitter Marketing ">Twitter Marketing </option>
                                                       <option selected value="Virtual Assistant">Virtual Assistant </option>
                                                        
                                                        <option selected value="Website Development">Website Development</option>
                                                        <option selected value="Wordpress">Wordpress</option>
                                                        <option selected value="Web design">Web design</option>
                                                     
                                                        <option selected value="Youtube Marketing">Youtube Marketing</option>

                                        </select>
                                    </div>
                                </div>
                                <hr>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-md-offset-4">
                            <div id="loader" style="display: none;"><img src="../img/loader.gif" style=""></div>
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
    function find(){
         document.getElementById('loader').style.setProperty('display','block');
        var search=$('#search_text').val();
        var skill=$('#sk').val();
          var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
             document.getElementById('loader').style.setProperty('display','none');
            document.getElementById("pagination_data").innerHTML = xhttp.responseText;
          }
       };
       xhttp.open("POST", "inc/searchmyskills.php", true);
       xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       xhttp.send("search="+search+"&skill="+skill);
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
