<?php

define('BASE_URL', '');
define('CSS_URL', 'public_html/css');
define('JS_URL', 'public_html/js');
define('IMG_URL', 'public_html/images');

function restHelper($url, $data) {

//parse credentials
  $appId = 'XYVa8aop9gJj7A7GC4Rl5KELXIJCOD2dceWu1QhP';
  $restKey = 'jxxaxaNj0avTQXQPH51DLT8f3vXRRqPBLm6ssiuY';
  $headers = array(
   "Content-Type: application/json",
   "X-Parse-Application-Id: " . $appId,
   "X-Parse-REST-API-Key: " . $restKey
  );

  $objectData = json_encode($data);

  echo $objectData;

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
  echo $decoded;
}

?>
