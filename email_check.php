<?php
include('resources/config.php');

$url = 'https://api.parse.com/1/functions/emailCheck';

session_start();

$email = $_POST["email"];
if(!$email) {
  $email = $_SESSION["email"];
}

$data =  array(email => $email);
$objectData = json_encode($data);

$rest = curl_init();
curl_setopt($rest,CURLOPT_URL,$url);
curl_setopt($rest,CURLOPT_POST,1);
curl_setopt($rest,CURLOPT_POSTFIELDS,$objectData);
curl_setopt($rest,CURLOPT_HTTPHEADER,$headers);
curl_setopt($rest,CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($rest,CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($rest);
$decoded = json_decode($response, true);
curl_close($rest);


// echo $response;


$valid = $decoded['result'][0]['isValid'];
$complete = $decoded['result'][0]['isComplete'];

$_SESSION["email"] = $email;
$_SESSION["isValid"] = $valid;
$_SESSION["isComplete"] = $complete;

if(!$valid){
  header("Location: email_fail.php");
} else if ($valid){
  if(!$complete){
    header("Location: new_evaluator.php");
  } else if ($complete){
    // echo 'redirecting to expertise';
    header("Location: your_expertise.php");
  }
}
die();
?>
