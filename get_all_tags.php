<?php
include('resources/config.php');

$url = 'https://api.parse.com/1/functions/getTagsList';
// $appId = 'XYVa8aop9gJj7A7GC4Rl5KELXIJCOD2dceWu1QhP';
// $restKey = 'jxxaxaNj0avTQXQPH51DLT8f3vXRRqPBLm6ssiuY';
// $headers = array(
//  "Content-Type: application/json",
//  "X-Parse-Application-Id: " . $appId,
//  "X-Parse-REST-API-Key: " . $restKey
// );

$rest = curl_init();
curl_setopt($rest,CURLOPT_URL,$url);
curl_setopt($rest,CURLOPT_POST,1);
curl_setopt($rest,CURLOPT_POSTFIELDS,$objectData);
curl_setopt($rest,CURLOPT_HTTPHEADER,$headers);
curl_setopt($rest,CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($rest,CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($rest);
$decoded = json_decode($response, true);
$all_tags = $decoded['result'];

return json_encode($all_tags);
?>
