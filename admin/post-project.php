<?php require "../auth/access_levels.php"; 
$loggedinquery=mysqli_query($con, "UPDATE users SET loggedin='".date("Y-m-d h:i:sa")."' WHERE id='".$user_id."' ");?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | Post Project</title>

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
                <div class="m-b-lg m-t-lg">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="ibox-content material-shadow">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div>
                                            <h1 class="font-bold">Tell us what you need </h1>
                                            <p>Get free quotes from skilled freelancers within minutes, view profiles, ratings and chat with them. Pay the freelancer only when you are satisfied with the work.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form  role="form" method="POST" id="admission-part-3" enctype="multipart/form-data" class="">
                                            <input type="hidden" id="user" name="user"  value="<?php echo $user_id; ?>">
                                            <div class="form-group">
                                                <label><h3> Choose a name for your project</h3></label> 
                                                <input type="text" id="pname" name="pname" placeholder="" required="required" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label><h3> Project Details</h3></label> 
                                                <textarea rows="6" id="pd" name="pd" placeholder="Describe your project" required="required"  class="form-control"></textarea>
                                            </div>
                                            <div class="form-group"  >
                                                <input type="file" class="form-control" name="pix">
                                            </div>
                                            <br>
                                              <div class="form-group">
                                                <label><h3> Job Category </h3></label>
                                               <select  class="form-control" name="push" id="push" onchange="Category(this.id,'txt')" required="required">
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
                                                    <option>Others</option>
                                               </select>
                                            </div>
                                            <div class="form-group">
                                                <label><h4>Sub Category</h4></label>
                                                <select type="text" class="form-control" id="txt" name="txt" required="required">

                                                </select>

                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label><h3> What skills are required?</h3></label>
                                                <div>
                                                    <select id="skills" name="skills" data-placeholder="What skills are required?" class="chosen-select form-control" multiple style="width:350px;" tabindex="4" required="required">
                                                        <option>Adobe Photoshop </option>
                                                        <option>Android Development </option>
                                                        <option>Animation</option>
                                                        <option>AutoCAD</option>
                                                        <option>Article Writing</option>
                                                        <option>Advertising </option>
                                                        <option>Content-Writing</option>
                                                        <option>Copy Writing </option>
                                                        <option value="Css">Css</option>
                                                        <option>Customer Service</option>
                                                        <option>Email Marketing </option>
                                                        <option>Facebook Apps </option>
                                                        <option>Graphic Design </option>
                                                        <option value="Html">Html</option>
                                                        <option>Internet Research</option>
                                                        <option>iOS Development </option>
                                                        <option>Internet Marketing </option>
                                                        <option>iPhone Development </option>
                                                        <option value="Javascript">Javascript</option>
                                                        <option>Joomla! </option>
                                                        <option>Java</option>
                                                        <option value="Jquery">Jquery</option>
                                                        <option>Lead Generation </option>
                                                        <option>Marketing</option>
                                                        <option value="Mobile App">Mobile App</option>
                                                        <option>Microsoft Excel </option>
                                                        <option>Magento</option>
                                                        <option value="Php">Php</option>
                                                        <option>Presentations </option>
                                                        <option>PDF</option>
                                                        <option>Reporting </option>

                                                        <option>Social Media Marketing (SMM)</option>
                                                        <option value="Software Architecture">Software Architecture</option>
                                                        <option value="Software Design">Software Design</option>
                                                        <option>Search Engine Optimization (SEO)</option>
                                                        <option value="Sql">Sql</option>
                                                        <option>Translation</option>
                                                        <option>Telemarketing </option>
                                                        <option>Typing</option>
                                                        <option>Sales</option>
                                                        <option>Video</option>
                                                        
                                                        <option>Twitter Marketing </option>
                                                       <option>Virtual Assistant </option>
                                                        
                                                        <option>Website Development </option>
                                                        <option >Wordpress</option>
                                                        <option value="Web design">Web design</option>
                                                     
                                                        <option>Youtube Marketing </option>
                                                        <option>Others</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label><h3>How do you want to pay?</h3></label>
                                                <div class="i-checks">
                                                    <label> 
                                                        <input type="radio" checked=""  value="Fixed price project " name="a" id="a"> <i></i> Fixed price project 
                                                    </label>
                                                </div>
                                                <div class="i-checks">
                                                    <label> 
                                                        <input type="radio" value="Hourly project" name="a" id="a"> <i></i>  Hourly project 
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>
                                                        <h3>What is your estimated budget?</h3>
                                                    </label>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <select class="form-control"  id="slct1" name="slct1">
                                                            <option value="NGN">NGN</option>
                                                           
                                                    </select>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <select class="form-control" id="slct2" name="slct2" required="required" >
                                                        <option value="Meduim project" >Meduim project (&#x20A6;1m  or less)</option>
                                                        <option value="Large project">Large project (&#x20A6;5m or less)</option>
                                                        <option value="Larger project">Larger project (&#x20A6;10m  or less)</option>
                                                        <option value="Very Large project">Very Large project (&#x20A6;50m  or less)</option>
                                                        <option value="Huge project">Huge project (&#x20A6;250m  or less)</option>
                                                        <option value="Major project">Major project (greater than &#x20A6;250m )</option>
                                                       
                                                    </select><br>
                                                   
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" id="btn-adm-3-next" class="btn btn-primary btn-lg">Post My Project</button>
                                            </div>
                                        </form>
                                        <hr>
                                        <h3 style="color:red"><b>By clicking 'Post My Project’, you agree to the Terms & Conditions.<br> If you decide to award your project we charge 7% commission on all projects.</b></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>

            </div>

        </div>
        
        <?php include_once('inc/footer.php'); ?>

        </div>
        </div>

   <?php include_once('inc/jScript.php'); ?>
    <!-- Chosen -->
    <script src="../js/plugins/chosen/chosen.jquery.js"></script>
   <!-- DROPZONE -->
   <!--  // <script src="../js/plugins/dropzone/dropzone.js"></script> -->
    <!-- Select2 -->
    <script src="../js/plugins/select2/select2.full.min.js"></script>
    <!-- Tags Input -->
    <script src="../js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <script type="text/javascript">
    function Category(s1,s2){

    var s1 = document.getElementById(s1);
    var s2 = document.getElementById(s2);
    s2.innerHTML = "";
    if(s1.value == "Accounting & Consulting"){
        var optionArray = ["Accounting|Accounting", "Financial Planning|Financial Planning","Human Resources|Human Resources","Management Consulting|Management Consulting"];
    }else if(s1.value == "Admin Support"){
        var optionArray = ["Data Entry|Data Entry","Personal / Virtual Assistant|Personal / Virtual Assistant","Project Management|Project Management","Transcription|Transcription","Web Research|Web Research"];
    }else if(s1.value == "Customer Service"){
        var optionArray = ["Customer Service|Customer Service","Technical Support|Technical Support"];
    }else if(s1.value == "Data Science & Analytics"){
        var optionArray = ["Data Visualization|Data Visualization","Data Extraction|Data Extraction","Data Mining & Management|Data Mining & Management","Machine Learning|Machine Learning","Quantitative Analysis|Quantitative Analysis"];
    }else if(s1.value == "Design & Creative"){
        var optionArray = ["Animation|Animation","Audio Production|Audio Production","Graphic Design|Graphic Design","Illustration|Illustration","Logo Design & Branding|Logo Design & Branding","Photography|Photography", 
                           "Presentations|Presentations","Video Production|Video Production","Voice Talen|Voice Talen"];
    }else if(s1.value == "Engineering & Architecture"){
        var optionArray = ["3D Modelling & CAD|3D Modelling & CAD","Architecture|Architecture","Chemical Engineering|Chemical Engineering","Civil & Structural Engineering|Civil & Structural Engineering","Contract Manufacturing|Contract Manufacturing", 
                       "Electrical/Electronics Engineering|Electrical/Electronics Engineering","Interior Design|Interior Design","Mechanical Engineering|Mechanical Engineering","Product Design|Product Design" ];
    }else if(s1.value == "IT & Networking"){
        var optionArray = ["Database Administration|Database Administration","ERP / CRM Software|ERP / CRM Software","Information Security|Information Security","Network & System Administration|Network & System Administration"];
    }else if(s1.value == "Legal"){
        var optionArray = ["Contract Law|Contract Law","Corporate Law|Corporate Law","Criminal Law|Criminal Law","Family Law|Family Law","Intellectual Property Law|Intellectual Property Law","Paralegal Services|Paralegal Services"];
    }else if(s1.value == "Sales & Marketing"){
        var optionArray = ["Display Advertising|Display Advertising","Email & Marketing Automation|Email & Marketing Automation","Lead Generation|Lead Generation","Market & Customer Research|Market & Customer Research","Marketing Strategy|Marketing Strategy","Public Relations|Public Relations","Search Engine Marketing (SEM)|Search Engine Marketing (SEM)","Search Engine Optimization (SEO)|Search Engine Optimization (SEO)","Social Media Marketing (SMM)|Social Media Marketing (SMM)","Telemarketing & Telesales|Telemarketing & Telesales"];
    }else if(s1.value == "Translation"){
        var optionArray = ["General Translation|General Translation","Legal Translation|Legal Translation","Medical Translation|Medical Translation","Technical Translation|Technical Translation"];
    }else if(s1.value == "Web, Mobile & Software Development"){
        var optionArray = ["Desktop Software Development|Desktop Software Development","Ecommerce Development|Ecommerce Development","Game Development|Game Development","Mobile Development|Mobile Development","Product Management|Product Management","QA & Testing|QA & Testing","Scripts & Utilities|Scripts & Utilities","Web Development|Web Development","Web & Mobile Design|Web & Mobile Design"];
    }else if(s1.value == "Writing"){
        var optionArray = ["Academic Writing & Research|Academic Writing & Research","Article & Blog Writing|Article & Blog Writing","Copywriting|Copywriting","Creative Writing|Creative Writing","Editing & Proofreading|Editing & Proofreading","Grant Writing|Grant Writing","Resumes & Cover Letters|Resumes & Cover Letters","Technical Writing|Technical Writing","Web Content|Web Content"];
    }else if (s1.value== "Others") {
        var optionArray = ["Others|Others"];
    }
            for(var option in optionArray){
                var pair = optionArray[option].split("|");
                var newOption = document.createElement("option");
                newOption.value = pair[0];
                newOption.innerHTML = pair[1];
                s2.options.add(newOption);

            }
    }
        
        //Dropzone.autoDiscover = false;
    $("#admission-part-3").on("submit", function (e) {
    $('#btn-adm-3-next').html('<div class="loader-sm center-block"></div>');
    e.preventDefault();
    $.ajax({
        url: "inc/file.php?use=postdata",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            if (data == 'Continue') {
                 $('#btn-adm-3-next').html('loading...');
                alert('successfully uploaded')
               updatenotification();
               window.location.reload();
            } else {
                updatenotification();
                $('#btn-adm-3-next').html('loading...');
                alert('successfully uploaded');
                window.location.reload();
                }
            }
        });

    });


        function updatenotification(){
              var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                  
                document.getElementById("omo").innerHTML = xhttp.responseText;      
                } };
          xhttp.open("POST", "inc/projectnotification.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send();
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
