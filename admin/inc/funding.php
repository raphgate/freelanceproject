<?php

require "../../auth/access_levels.php";

	$ref = $_POST['payment'];
	$amount = $_POST['amount'] / 100;
	$check=$_POST['check'];
	
	$date = date('Y-m-d h:i:sa');
	$result = array();
//The parameter after verify/ is the transaction reference to be verified
$url = 'https://api.paystack.co/transaction/verify/'.$ref.'';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt(
  $ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer sk_live_89744aec4086c740c0df8311f9fd614fe1e7a284']
);
$request = curl_exec($ch);
if(curl_error($ch)){
 echo 'error:' . curl_error($ch);
 }
curl_close($ch);

if ($request) {
  $result = json_decode($request, true);
}

if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
if ($check==1) {

$insert = mysqli_query($con, "INSERT INTO funds (amount,ref,user_id,date_added,title) VALUES('$amount','$ref','$user_id','$date','Upgradeplan')");

$query=mysqli_query($con, "SELECT * FROM annual_plans WHERE user_id='$user_id' ");
$query1=mysqli_num_rows($query);

if ($query1>0) {
	$update_wallet = mysqli_query($con, "UPDATE annual_plans SET paidAmount='$amount',date='$date' WHERE user_id='$user_id' ");
if ($update_wallet == true) {
	echo "done";
}
else{
	echo "Failed";
}
}else{
	$query2=mysqli_query($con, "INSERT INTO annual_plans (id,user_id,paidAmount,date) VALUES ('','".$user_id."','".$amount."','".$date."')");
	if ($query2 == true) {
	echo "done";
}
else{
	echo "Failed";
}
}

}elseif ($check ==0) {
	$insert = mysqli_query($con, "INSERT INTO funds (amount,ref,user_id,date_added,title) VALUES('$amount','$ref','$user_id','$date','Credited Wallet')");
	$updaequery=mysqli_query($con, "UPDATE users SET wallet='".$amount."' WHERE id='".$user_id."' ");
	if ($updaequery == true) {
	echo "done";
}
else{
	echo "Failed";
}
}
	//Perform necessary action
}else{
  echo "Transaction was unsuccessful";
}


	
?>