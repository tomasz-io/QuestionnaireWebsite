<?php

$url = 'https://api.parse.com/1/functions/completeEvaluator';
$appId = 'XYVa8aop9gJj7A7GC4Rl5KELXIJCOD2dceWu1QhP';
$restKey = 'jxxaxaNj0avTQXQPH51DLT8f3vXRRqPBLm6ssiuY';
$headers = array(
 "Content-Type: application/json",
 "X-Parse-Application-Id: " . $appId,
 "X-Parse-REST-API-Key: " . $restKey
);

session_start();
$email = $_SESSION["email"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$job_title = $_POST["job_title"];
$based_in = $_POST["city"];
$gender = $_POST["gender"];
$proud_project = $_POST["proud_project"];
$skill_profile = $_POST["skillProfile"];
$organisation = $_POST["organisation"];
$linkedIn = $_POST["linkedIn"];
$languages = $_POST["languages"];

$data =  array(email => $email, firstName => $first_name, lastName => $last_name, jobTitle => $job_title,
                basedIn => $based_in, gender => $gender, skillProfile => $skill_profile,
                organisation => $organisation, linkedIn => $linkedIn, languages => $languages, proudProject => $proud_project);

$objectData = json_encode($data);

// echo $objectData;

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

header("Location: email_check.php");
die();
?>
