<?php 
include_once 'session.php';
include_once 'dbc.php';

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
   $_SESSION['loggedin']=false;
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
    $date=date("Y-m-d h:i:sa");
     $tmp_name = $_FILES[$pix]["tmp_name"];
      $name = $_FILES[$pix]["name"];
      $target="../../admin/upload/profile/".$name;
      move_uploaded_file($tmp_name, $target); 
    $check_user = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE email ='$email' "));
if ($check_user > 0) {
    $update_user = mysqli_query($con, "UPDATE users SET pix='".$_SESSION['userData']['picture']['url']."',id='".$user_id."' WHERE email='$email' ");
}
elseif($check_user < 1){
   $random=rand(72891,92729);
     $message="Your password is ".$random;
     $subject = "Password Reset";
       $date = date("Y");
     $from=" <admin@eBrang.com>";
     $headers = 'From: ' . $from. "\r\n";   
     $headers  .= 'MIME-Version: 1.0' . "\r\n";
     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
     $htmlContent = '<html>
      <body style="background: #e4e2e2">
      <center><div style="width: 50%;border-radius: 5px 5px 5px 5px;height:60%">

      <div style="background: white;padding:10%;margin-top:25px">
       <div>
        <h6>Password Reset</h6>
       </div>
      <h3  style="color: #1ab394;font-family: Open Sans, helvetica, arial, sans-serif;margin:3%">eBrang password </h3>
      <p style="padding:10px;line-height:200%">You have successfully Reset <em style="color: #1ab394;font-family: CASTELLAR;font-size:1.2em;">Your password is</em> : '.$message.'</p>
     <div >
        <div></div>
         </div>
       <br>
       <div>
        <p><strong>Copyright</strong> &copy; <i id="today_d">'.$date.'</i> eBrang </p>
       </div>
   </div>

   </div>
 </center>
</body>
</html>';
     mail($_SESSION['userData']['email'], $subject, $htmlContent, $headers);
    
    $insert_user = mysqli_query($con, "INSERT INTO users (id,email,first_name,last_name,pix,date_registered) VALUES('$user_id','".$_SESSION['userData']['email']."','".$_SESSION['userData']['first_name']."','".$_SESSION['userData']['last_name']."','".$_SESSION['userData']['picture']['url']."','".$date."')");
  if($insert_user==true){
   mysqli_query($con, "UPDATE users SET password='".$random."' WHERE email='".$_SESSION['userData']['email']."' ");
   }
}
  
}
else{
    header("location:../login.php");
}


?>