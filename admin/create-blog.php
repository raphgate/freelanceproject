<?php 
require "../auth/access_levels.php"; 
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eBrang | Showroom</title>

    <?php include_once('inc/css.php'); ?>
    <link href="../css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="../css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="../css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="../css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="../css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="../css/plugins/bootstrapSocial/bootstrap-social.css" rel="stylesheet">

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
                                    <h1 class="font-bold">eBrang Blog</h1>
                                    <p>Let the work Speak for itself</p>
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
                                <li onclick="" class="">
                                    <a href="blog.php">Blog</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="" style="padding-top: 5px;">
                         <!--<a href="showcase-upload.php" class="btn btn-outline btn-primary">Create Article</a> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="container">
                    <div class="row">
                         <div class="col-lg-12">
                            <div class="ibox float-e-margins material-shadow">
                                <div class="ibox-title">
                                    <h5>Create a Blog</h5>
                                    <div class="ibox-tools">
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <form role="form" action="inc/summarnoteupload.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="" name="title" placeholder="Enter your post title here">
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="summernote form-control" name="doc">
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="fileContainer btn btn-primary btn-block">
                                                        <i class="fa fa-camera"></i> Upload Image/Video
                                                        <input type="file" accept="image/video/" name="uploads" id="output1" onchange="Validate(event);">
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="">Make it easier for others to find your article on Freelancer blog: </label>
                                                    <textarea class="form-control" rows="4" name="text" placeholder="Describe your article here" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="">Tag your blog</label>
                                                    <select  data-placeholder="Pick some category" class="chosen-select form-control" name="skills" multiple style="width:350px;" tabindex="4">
                                                        <option value="Design">Design</option>
                                                        <option value="Sale and Marketing">Sale and Marketing</option>
                                                        <option value="Development">Development</option>
                                                        <option value="Entrepreneurship">Entrepreneurship</option>  
                                                        <option value="Freelancing">Freelancing</option>
                                                        <option value="Software Architecture">Software Architecture</option>
                                                        <option value="Software Design">Software Design</option>
                                                        <option value="Mobile App">Mobile App</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-block" onclick="send()" name="send">Submit</button>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="col-md-12" id="imgh" style="display: none;">
                                                    <img id="output" name="showimg" class="img img-responsive" />
                                                </div>
                                                <div class="col-md-12" id="vdh" style="display: none">
                                                    <video width="100%" controls autoplay="true">
                                                      <source src="" id="video_here" name="showvd">
                                                    </video>
                                                </div>
                                                <h3>NOTE:</h3>
                                                <p>Articles that are well described and tagged are easier and faster to find.</p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
    <!-- Tags Input -->
    <script src="../js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
     <!-- SUMMERNOTE -->
    <script src="../js/plugins/summernote/summernote.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.chosen-select').chosen({width: "100%"});
            $('.summernote').summernote({
                height: 150,
                placeholder: 'write your article here...',
                toolbar: [
                    // [groupName, [list of button]]

                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']]
                    // ['height', ['height']], 
                ]
            });

       });
        function Validate(event) {
            var arrInputs = document.getElementById("output1").value;
            //alert(arrInputs);
            var detrim = arrInputs.split(".");
            var mytype = detrim[1];
            if (mytype == "jpg" || mytype == "jpeg" || mytype == "png" || mytype == "bmp" || mytype == "gif") {
                var reader = new FileReader();
                reader.onload = function(){
                document.getElementById('vdh').setAttribute("style", "display: none !important;");
                document.getElementById('imgh').setAttribute("style", "display: true !important;");
                var output = document.getElementById('output');
                output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            }
            else if (mytype == "mov" || mytype == "wmv" || mytype == "flv" || mytype == "mp4" || mytype == "avi" || mytype == "3gp" || mytype == "mkv") {
                var $source = $('#video_here');
                document.getElementById('imgh').setAttribute("style", "display: none !important;");
                     document.getElementById('vdh').setAttribute("style", "display: true !important;");
                $source[0].src = URL.createObjectURL($("#output1").files[0]);
                $source.parent()[0].load();
            }
        }

    </script>

</body>
</html>
