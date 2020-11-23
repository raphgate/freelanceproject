<?php
require "../../auth/access_levels.php";

$rate=mysqli_query($con, "UPDATE users SET ratings='".$_POST['rate']."' WHERE id='".$_POST['id']."' ");
 $query=mysqli_query($con, "SELECT * FROM users WHERE id='".$_POST['id']."' ");
  $query2=mysqli_fetch_array($query);

                           if ($query2['ratings']==1) {
                                            echo '  <span class="label label-primary">1</span>
                                            &nbsp;
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-default"></i>
                                            <i class="fa fa-star text-default"></i>
                                            <i class="fa fa-star text-default"></i>
                                            <i class="fa fa-star text-default"></i>
                                            ';
                                        }elseif ($query2['ratings']==2) {
                                           echo '  <span class="label label-primary">2</span>
                                            &nbsp;
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-default"></i>
                                            <i class="fa fa-star text-default"></i>
                                            <i class="fa fa-star text-default"></i>
                                            ';
                                        }elseif ($query2['ratings']==3) {
                                            echo '  <span class="label label-primary">3</span>
                                            &nbsp;
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-default"></i>
                                            <i class="fa fa-star text-default"></i>
                                            ';
                                        }elseif ($query2['ratings']==4) {
                                            echo '  <span class="label label-primary">4</span>
                                            &nbsp;
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-default"></i>
                                            ';
                                        }elseif ($query2['ratings']==5) {
                                            echo '  <span class="label label-primary">5</span>
                                            &nbsp;
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            ';
                                        }elseif ($query2['ratings']==0) {
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