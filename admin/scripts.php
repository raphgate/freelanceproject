<script type="text/javascript">
//milestone ajax
        function send(){
          var x=document.getElementById("project_id").value;
          var y=document.getElementById("owner").value;
          var z=document.getElementById("activated").value;
          var d=document.getElementById("discrib").value;
          var p=document.getElementById("price").value;
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
              if (xhttp.readyState == 4 && xhttp.status == 200) {
                alert("success")
                  // document.getElementById("chatdisplay").innerHTML = xhttp.responseText;        
              } };
        xhttp.open("POST", "inc/milestone_action.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("p="+x+"&owner="+y+"&ac="+z+"&d="+d+"&p="+p);
        }


//messanger ajax
        function updatechat(x,y){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("chatdisplay").innerHTML = xhttp.responseText;        
                } };
          xhttp.open("POST", "inc/updatemessage.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("id="+x+"&projectId="+y);
        }
        function divonclick(x,y,z){   
               setInterval(function(){
                    refresh(x,y,z);      
                },1000);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("chat").innerHTML = xhttp.responseText;        
                } };
          xhttp.open("POST", "inc/messangeraction.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("user_id="+x+"&activated_id="+y+"&project_id="+z);
      
        }
            function message(){
                var msg=$('#message').val();
                var attach=$('#attach').val();
                if (msg !=="") {
                $("#btnn").prop('disabled', true);
                $.ajax({
                    url: 'inc/insertmessage.php',
                    type: 'post',
                    data: ( { "message": $('#message').val(), "sender": $('#sender').val(), "reciever": $('#reciever').val(), "project_id": $('#project_id').val(), "attach": $('#attach').val() } ),
                    processData: true,
                    success: function( data, textStatus, jQxhr ){
                    $("#btnn").prop('disabled', false);
                    $('#message')[0].reset();
                    },
                    error: function( jqXhr, textStatus, errorThrown){
                        alert(errorThrown) }           
                });   
                }else{alert("Oops empty");}       
             }   
        function refresh(x,y,z){

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
            if (xhttp.readyState == 4 && xhttp.status == 200) {
            var newm = xhttp.responseText;
                 $("#last").before(newm).fadeIn();
             // document.getElementById("last").innerHTML=prepend(newm);
         } };
          xhttp.open("POST", "inc/refresh2.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("user_id="+x+"&activated_id="+y+"&project_id="+z);
        }
        $(document).on("click", "#btn-prev", function () {
         window.back('messanger.php');
             });
        $(document).ready(function(){
       
        });


//full-post ajax
        function comments(){
        var post_id=document.getElementById("post_id").value;
        var blog_id=document.getElementById("blog_id").value;
        var msg=document.getElementById("message").value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) { 
                document.getElementById("comm").innerHTML = xhttp.responseText;  
                  
            } };
      xhttp.open("POST", "inc/commentAjax.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("msg="+msg+"&post_id="+post_id+"&blog_id="+blog_id);
        }
        function blog(x){
            var search=document.getElementById("search").value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("blog").innerHTML = xhttp.responseText;        
            } };
      xhttp.open("POST", "inc/blogAjax.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("value="+x+"&search="+search);
        }

//showcase-upload ajax
         //Dropzone.autoDiscover = false;
        // Dropzone.options.myDropzone = {
        //     url: 'inc/showcaseupload.php',
        //     autoProcessQueue: false,
        //     uploadMultiple: true,
        //     parallelUploads: 5,
        //     maxFiles: 5,
        //     maxFilesize: 5000,
        //     acceptedFiles: 'image/*',
        //     addRemoveLinks: true,
        //  init: function() {
        //         var myDropzone = this,
        //             submitButton = document.querySelector("[type=submit]");
                    
        //         submitButton.addEventListener('click', function(e) {
                  
        //             e.preventDefault();
        //             e.stopPropagation();
        //             myDropzone.processQueue();
        //         });

        //         myDropzone.on('sendingmultiple', function(data, xhr, formData) {
        //             // this will get sent
        //             formData.append('showcasecategory', jQuery('#showcasecategory').val());
        //             formData.append('showcasesubcategory', jQuery('#showcasesubcategory').val());
        //             formData.append('showcasemoney', jQuery('#showcasemoney').val());
        //             formData.append('showcasecurrency', jQuery('#showcasecurrency').val());
        //             formData.append('showcasedescribe', jQuery('#showcasedescribe').val());
        //             formData.append('showcasetitle', jQuery('#showcasetitle').val());
        //             formData.append('showcasetype', jQuery('#showcasetype').val());
                 
        //         });
        //         myDropzone.on('successmultiple', function(files, response) {      
        //             alert(response);
        //         });
        //         myDropzone.on('errormultiple', function(files, response) {
        //             alert(response);
        //         });
        //     }

        // }
    function showcaseuploadajax(s1,s2){

    var s1 = document.getElementById(s1);
    var s2 = document.getElementById(s2);
    s2.innerHTML = "";
    if(s1.value == "$"){
        var optionArray = ["10|10","30|30","250|250","750|750","1500|1500","3000|3000","5000|5000","5000+|5000+"];


    } else if(s1.value == "₦"){
        var optionArray = ["1500|1500","3000|3000","5000|5000","5000|5000","7000|7000","9000|9000","11000|11000",
                          "15000|15000","20000|20000","30000|30000","40000|40000","50000|50000","100000|100000",
                          "200000|200000","300000|300000","400000|400000","500000|500000+"];
    }
            for(var option in optionArray){
                var pair = optionArray[option].split("|");
                var newOption = document.createElement("option");
                newOption.value = pair[0];
                newOption.innerHTML = pair[1];
                s2.options.add(newOption);

            }
    }

//showroom ajax

    function showcase(x){
        document.getElementById('loader').style.setProperty('display','block');
             $('.active').removeClass('active');
           var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById('loader').style.setProperty('display','none');
                    document.getElementById("show").innerHTML = xhttp.responseText;        
                } };
          xhttp.open("POST", "inc/showcaseajax.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("value="+x);
     }
     function search(){
        document.getElementById('loader').style.setProperty('display','block');
            var budget=document.getElementById("budget").value;
            var currency=document.getElementById("currency").value;
            var name=document.getElementById("name").value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById('loader').style.setProperty('display','none');
                    document.getElementById("show").innerHTML = xhttp.responseText;        
                } };
          xhttp.open("POST", "inc/showcasesearch.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("budget="+budget+"&search="+name+"&currency="+currency); 
           }
    function showscript(s1,s2){

    var s1 = document.getElementById(s1);
    var s2 = document.getElementById(s2);
    s2.innerHTML = "";
    if(s1.value == "$"){
        var optionArray = ["10|10","30|30","250|250","750|750","1500|1500","3000|3000","5000|5000","5000+|5000+"];


    } else if(s1.value == "₦"){
        var optionArray = ["1500|1500","3000|3000","5000|5000","5000|5000","7000|7000","9000|9000","11000|11000",
                          "15000|15000","20000|20000","30000|30000","40000|40000","50000|50000","100000|100000",
                          "200000|200000","300000|300000","400000|400000","500000|500000+"];
    }
            for(var option in optionArray){
                var pair = optionArray[option].split("|");
                var newOption = document.createElement("option");
                newOption.value = pair[0];
                newOption.innerHTML = pair[1];
                s2.options.add(newOption);

            }
    }






<!--  -->
//delete ajax 
  $(document).ready(function () {

            $('.delete_project').on('click', function() {
                 var check=$(this).data("custom-value");
                   
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this project file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                }, function () {
                    swal("Deleted!", "Your project has been deleted.", "success");
                    var wow=check;
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                       // location.reload()
                      document.getElementById("delete").innerHTML = xhttp.responseText;
                    } };
                  xhttp.open("POST", "inc/deleteAction.php", true);
                  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                  xhttp.send("projects="+wow);
               
                });
               
            });

            $('.chosen-select').chosen({width: "100%"});
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
        
        function action(x,y){
            alert(y)
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("change").innerHTML = xhttp.responseText;
                }
            };
              xhttp.open("POST", "inc/projectAjax.php", true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("project="+x+"&actiontoperform="+y);
             }
</script>