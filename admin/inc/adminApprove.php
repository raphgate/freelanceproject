<?php
require "../../auth/access_levels.php";

$select=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id='".$_POST['id']."' "));
$acc_amount=$select['wallet'];
$am=$_POST['amount'];

$tamount=$acc_amount-$am;
$update=mysqli_query($con, "UPDATE users SET wallet='".$tamount."',Confirm_status='Approved' WHERE id='".$_POST['id']."' ");

?>
<?php
                         $payments=mysqli_query($con, "SELECT * FROM users WHERE Confirm_status='Awaiting Approval'");
                         while ($row=mysqli_fetch_array($payments)) {
                         ?>
                                       <tr >
                                         <td class="project-title">
                                        <?php 
                                        if ($row['username']=="") {
                                            echo $row['first_name']." ".$row['last_name'];
                                        }else{
                                            echo $row['username'];
                                        }
                                         ?>
                                         </td>
                                          <td class="project-title">
                                        <?php echo $row['email']; ?>
                                         </td>
                                         <td class="project-title">
                                        <?php echo $row['bank_name']; ?>
                                         </td>
                                          <td class="project-title">
                                        <?php echo $row['acc_name']; ?>
                                         </td>
                                          <td class="project-title">
                                        <?php echo $row['acc_num']; ?>
                                         </td>
                                        <td class="project-title">
                                        <?php echo $row['acc_type']; ?>
                                         </td>
                                           <td class="project-title">
                                        <?php echo $row['Amount_request']; ?>
                                         </td>


                                         <td class="project-actions" width="170">
                                        <button class="btn btn-warning" onclick="approved(<?php echo $row['id'];?>,<?php echo $row['Amount_request'];?>)">Approve payment</button>
                                         </td>
                                        </tr>
                                <?php    } ?>