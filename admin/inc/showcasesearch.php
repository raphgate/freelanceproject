<?php 

require "../../auth/access_levels.php"; 
$budget=mysqli_real_escape_string($con, $_POST['budget']);
$search=mysqli_real_escape_string($con, $_POST['search']);
$currency=mysqli_real_escape_string($con, $_POST['currency']);
$searchquery=mysqli_query($con, "SELECT * FROM showcaseupload WHERE showcasecurrency LIKE '%$currency%' AND showcasemoney LIKE '%$budget%' AND showcasetitle LIKE '%$search%' ");
while ($row=mysqli_fetch_array($searchquery)) {

?>
		<div class="col-md-3" id="show">
			<a href="preview-modal.php?id=<?php echo $row['post_id']." ".$row['id']; ?>">
		    <div class="ibox material-shadow">
		        <div class="ibox-content product-box">
		            <div class="product-imitation">
		               <?php echo '<img src="upload/'.$row['documents'].'" class="img" width="100%" height="200">'; ?>
		            </div>
		            <div class="product-desc">
		                <span class="product-price">
		                    <?php echo $row['showcasecurrency']." ".$row['showcasemoney']; ?>
		                </span>
		                <a href="#" class="product-name"> <?php echo $row['showcasetitle']; ?></a>
		                <div class="small m-t-xs">
		                    <?php echo $row['showcasedescribe']; ?>
		                </div>
		                  <p class="m-t">
                           <!--  <a href="#" class="btn btn-xs btn-outline btn-primary" onclick="modal(<?php echo $row['post_id']; ?>,<?php echo $row['id'];?>)"  data-toggle="modal"  data-target="#myModal5"><i class="fa fa-heart-o"></i></a> -->
                                <?php echo $row['likes']; ?>
                         Like(s)
                            
                        </p>
		            </div>
		        </div>
		    </div>
		</a>
		</div> 
		<?php }?>

