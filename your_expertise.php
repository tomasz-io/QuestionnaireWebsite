<?php

$url = 'https://api.parse.com/1/functions/getTagsAndIndustries';
$appId = 'XYVa8aop9gJj7A7GC4Rl5KELXIJCOD2dceWu1QhP';
$restKey = 'jxxaxaNj0avTQXQPH51DLT8f3vXRRqPBLm6ssiuY';
$headers = array(
 "Content-Type: application/json",
 "X-Parse-Application-Id: " . $appId,
 "X-Parse-REST-API-Key: " . $restKey
);

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

// $all_tags = (include 'get_all_tags.php');
// echo $all_tags;

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
    header("Location: new_evaluator.php");
  } else if ($complete){
    // stay on this page
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NUMA EVALUATORS</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="css/bootstrap-tokenfield.css">
    <link rel="stylesheet" href="css/custom.css"></style>


    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

    <script src="js/bootstrap-tokenfield.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>

    <!-- Navigation -->
    <?php include 'navbar.php'; ?>

    <!-- Page Content -->
    <div class="container jumbotron">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">

            <?php
            if($decoded['result']) {
              echo "<h1>Hello $first_name</h1>";
              echo "<p>Let's find the startups that match best with your profile</p>";
              include 'expertise_form.php';
            }
            ?>

          <!-- Empty space -->
            <div class="col-xs-12" style="height:300px;"></div>
          </div>
        </div>
    </div>
    <!-- /.container -->




  <!-- <script>
    var tags = ['art_&_design', 'education', 'fuck'];
    for (var i = 0; i < tags.length; ++i) {
      var element = $(document.getElementById(tags[i]));
      if(element.is(":checkbox")) {
        element.prop("checked", true);
      }
    }
  </script> -->



</body>

</html>
