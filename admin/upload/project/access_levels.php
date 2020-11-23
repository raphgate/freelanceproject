<?php 
include_once 'session.php';
include_once 'dbc.php';
// if (!$_SESSION['accessToken'] ) {
//     header("location:login.php");
// }
date_default_timezone_set("Africa/Lagos");
if (isset($_SESSION['email'])) {
   $email=$_SESSION['email'];
   $query=mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
   while ($selectquery=mysqli_fetch_assoc($query)) {
    $user_id=$selectquery['id'];
   $first_name=$selectquery['first_name'];
   $last_name=$selectquery['last_name'];
   $username=$selectquery['username']; 
   $fullname=$first_name." ".$last_name;
   $pix=$selectquery['pix'];
   $_SESSION['loggedin'] = true;
 }

}
elseif ($_SESSION['userData']['id'] && $_SESSION['userData']['email']) {
    $user_id = $_SESSION['userData']['id'];
    $email  = $_SESSION['userData']['email'];
    $first_name = $_SESSION['userData']['first_name'];
    $last_name = $_SESSION['userData']['last_name'];
    $pix = $_SESSION['userData']['picture']['url'];
    $fullname=$first_name." ".$last_name;
    $_SESSION['loggedin'] = true;
    $check_user = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE email ='$email' "));
if ($check_user > 0) {
    $update_user = mysqli_query($con, "UPDATE users SET pix='".$_SESSION['userData']['picture']['url']."',id='".$user_id."' WHERE email='$email' ");
}
elseif($check_user < 1){
    $insert_user = mysqli_query($con, "INSERT INTO users (id,email,first_name,last_name,pix) VALUES('$user_id','".$_SESSION['userData']['email']."','".$_SESSION['userData']['first_name']."','".$_SESSION['userData']['last_name']."','".$_SESSION['userData']['picture']['url']."')");
}
  
}
else{
    header("location:../login.php");
}


?>