<?php
require "../../auth/access_levels.php"; 
 $record_per_page = 15;  
 $page = '';  
 $output = '';  
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

    <div class="row" id="pagination_data">

                                    <?php 
                                    if (isset($_POST['searchname'])) {
                                        $name=$_POST['searchname'];
                                    }
                                    $searchquery=mysqli_query($con, "SELECT * FROM users WHERE portforlio LIKE '%$name%' OR username LIKE '%$name%' OR userSkills LIKE '%$name%' OR first_name LIKE '%$name%' OR last_name LIKE '%$name%' ORDER BY id DESC LIMIT $start_from, $record_per_page ");
                                    $searchquery1=mysqli_num_rows($searchquery);
                                    if ($searchquery1<1) {
                                        echo "<h2 class=' text text-center'> No result found</h2>";
                                    }
                                    while ($row=mysqli_fetch_array($searchquery)) {
                                            $collect=mysqli_query($con, "SELECT * FROM projects WHERE post_id='".$user_id."' AND status=0 ORDER BY id DESC");
                                            $collect1=mysqli_num_rows($collect);
                                            $rows=mysqli_fetch_array($collect);
                                    ?>
                                    <div class="col-md-12 border-bottom p-xs">

                                        <div class="media">
                                            <a class="pull-left m-t-sm" href="#">
                                                <div class="media-object">
                                                 <?php  
                                                if ($row['pix']=="") {
                                                echo '<img class="img img-responsive img-rounded" width="70" src="upload/profile/userimg.png" alt="" width="90">'; 
                                                }elseif (substr($row['pix'], 0, 8) === 'https://') {
                                                echo '<img class="img img-responsive img-rounded" src="'.$row['pix'].'" alt="" width="90">'; 
                                                }else{
                                                echo '<img class="img img-responsive img-rounded" src="upload/profile/'.$row['pix'].'" alt="" width="90">'; 
                                                  }
                                                ?>
                                                </div>
                                            </a>
                                            <div class="media-body">
                                                <div class="media-heading ">
                                                    <a href="searchlancers.php?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-primary pull-right btn-sm " style="margin-left:10px;"> View profile</a>
                                                    <?php
                                                    if ($collect1>0) { ?>
                                                    <button  class="btn btn-primary pull-right btn-sm" onclick="bider(<?php echo $row['id']; ?>,<?php echo $user_id; ?>, <?php echo $rows['id']; ?>)"><i class="fa fa-user-plus" ></i>Hire me</button>
                                                   <?php }else{
                                                    echo '<button  class="btn btn-primary pull-right btn-sm" onclick="not()"><i class="fa fa-user-plus" ></i>Hire me </button>';
                                                   }
                                                    
                                                    ?>
                                                    <h4>
                                                        <?php
                                                        if ($row['username']=="") {
                                                            echo $row['first_name']." ".$row['last_name'];
                                                        }else{
                                                            echo $row['username'];
                                                        }
                                                          ?>
                                                    </h4>
                                                </div>
                                                <div>
                                                    <?php
                                                        if ($row['ratings']==1) {
                                            echo '  <span class="label label-primary">1</span>
                                            &nbsp;
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-default"></i>
                                            <i class="fa fa-star text-default"></i>
                                            <i class="fa fa-star text-default"></i>
                                            <i class="fa fa-star text-default"></i>
                                            ';
                                        }elseif ($row['ratings']==2) {
                                           echo '  <span class="label label-primary">2</span>
                                            &nbsp;
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-default"></i>
                                            <i class="fa fa-star text-default"></i>
                                            <i class="fa fa-star text-default"></i>
                                            ';
                                        }elseif ($row['ratings']==3) {
                                            echo '  <span class="label label-primary">3</span>
                                            &nbsp;
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-default"></i>
                                            <i class="fa fa-star text-default"></i>
                                            ';
                                        }elseif ($row['ratings']==4) {
                                            echo '  <span class="label label-primary">4</span>
                                            &nbsp;
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-default"></i>
                                            ';
                                        }elseif ($row['ratings']==5) {
                                            echo '  <span class="label label-primary">5</span>
                                            &nbsp;
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            ';
                                        }elseif ($row['ratings']==0) {
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
                                                    <small>&nbsp; <?php echo $row['views']; ?> reviews</small>
                                                </div>
                                                <p><?php echo $row['portforlio']; ?></p>
                                                <span class="vertical-date">
                                                   <?php echo $row['userSkills']; ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php  }
                            $try=mysqli_query($con, "SELECT * FROM users WHERE portforlio LIKE '%$name%' OR username LIKE '%$name%' OR userSkills LIKE '%$name%' OR first_name LIKE '%$name%' OR last_name LIKE '%$name%' ORDER BY id DESC");
                             $total_records = mysqli_num_rows($try);  
 							 $total_pages = ceil($total_records/$record_per_page);
 							   $output .= '<div class=" pull-right">
                                            <div data-toggle="buttons" class="btn-group">';
                                             for($i=1; $i<=$total_pages; $i++)  
											 {  
											      $output .= "<label class='btn btn-sm btn-white pagination_link' style='cursor:pointer;' id='".$i."'> <input type='radio' id='option1' name='options'> ".$i."</label>";  
											 } 
                                                   
                                      $output .= '</div>
                                        </div>';
                                        echo $output; 
                              ?>
            <script type="text/javascript">
        function bider(x,y,z) {
      var amount = prompt("Enter Awarding Amount for your Project");
      var check =2;
     if (amount == null || amount == "") {
      alert('Please enter valid amount')
  } else {  
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
              alert('successfully awarded Please check my project')
              // document.getElementById("withdraw").innerHTML = xhttp.responseText;
            }
         };
         xhttp.open("POST", "inc/awardaction.php", true);
         xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xhttp.send("product_id="+x+"&ower_id="+y+"&userid="+z+"&productamont="+amount+"&check="+check);
  }
  }

        function hireme(x,y,z){
    
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                  
                document.getElementById("result").innerHTML = xhttp.responseText;      
                } };
          xhttp.open("POST", "inc/hire.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("id="+x+"&owner_id="+y+"&pid="+z);
        }
        function not(){alert('Please Upload a Project before you can hire a freelancer')}
                              </script>