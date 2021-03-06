<?php
include('resources/config.php');

$url = 'https://api.parse.com/1/functions/getTagsAndIndustries';
// $appId = 'XYVa8aop9gJj7A7GC4Rl5KELXIJCOD2dceWu1QhP';
// $restKey = 'jxxaxaNj0avTQXQPH51DLT8f3vXRRqPBLm6ssiuY';
// $headers = array(
//  "Content-Type: application/json",
//  "X-Parse-Application-Id: " . $appId,
//  "X-Parse-REST-API-Key: " . $restKey
// );

session_start();
$email = $_SESSION["email"];
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

$tags_arr = $decoded['result'][0]['tags'];
$valid = $decoded['result'][0]['valid'];

$first_name = $decoded['result'][0]['firstName'];
$user_tags = $decoded['result'][0]['tags'];
$to_check = array();

$valid = $_SESSION["isValid"];
$complete = $_SESSION["isComplete"];

if(!$valid){
  header("Location: email_fail.php");
} else if ($valid){
  if(!$complete){
    // stay on this page
    // header("Location: new_evaluator.php");
  } else if ($complete){
    header("Location: your_expertise.php");  }
}

?>

<?php include('header.php'); ?>

<body>

    <!-- Navigation -->
    <?php include 'navbar.php'; ?>

    <!-- Page Content -->
    <div class="container jumbotron">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">

            <?php
            if($decoded['result']) {
              echo "<h1>Hi, you must be new...</h1>";
              echo "<p>Before we get going, we need some basic info:</p>";
              include 'new_evaluator_form.php';
            }
            ?>

          <!-- Empty space -->
            <div class="col-xs-12" style="height:300px;"></div>
          </div>
        </div>
    </div>
    <!-- /.container -->




</body>

</html>
