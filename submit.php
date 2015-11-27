<?php
$url = 'https://api.parse.com/1/functions/submit';
$appId = 'XYVa8aop9gJj7A7GC4Rl5KELXIJCOD2dceWu1QhP';
$restKey = 'jxxaxaNj0avTQXQPH51DLT8f3vXRRqPBLm6ssiuY';
$headers = array(
 "Content-Type: application/json",
 "X-Parse-Application-Id: " . $appId,
 "X-Parse-REST-API-Key: " . $restKey
);

$selected = $_POST["selected"];
$expertise = $_POST["expertise"];
$tags = $_POST['tags'];

session_start();
$email = $_SESSION["email"];
$industry = $_SESSION["industry"];
echo $industry;

$final_submission =  array(selected => $selected, expertise => $expertise, industry => $industry, tags => $tags, email => $email);
$objectData = json_encode($final_submission);

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
//$first = array_shift($decoded);
curl_close($rest);

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
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="css/bootstrap-tokenfield.css">
    <link href="css/custom.css" rel="stylesheet">



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
            <div class="col-lg-12 text-center">
                <h1>Done! What now?</h1>
            </div>
        </div>

        <div class="row">
          <div class="col-md-8 col-md-offset-2 text-center">
            <p class="lead">Within 24 hours, you should receive an email from f6s.com</p>
          </div>
          <div class="col-md-8 col-md-offset-2">
          <br>
          <p>While you wait...</p>
          <p>Read the Evaluator's Guide to understand the process and how to rate the startups</p>
          <a type="button" href="https://docs.google.com/document/d/1SeV_zyVw9eHq5sSdlkbzKl7hQluo3NZFfIpDHdApSE0/edit?usp=sharing" class="btn btn-lg btn-primary">Read the guide</a>
          </div>
          <div class="col-md-8 col-md-offset-2">
              <hr>
              <small>
              <h4>Didn't get the email?</h4>
              <ul>
                <li>Check your promotions/social/spam folders for any emails from <u>donotreply@f6s.com</u></li>
                <li>Make sure you're checking the right inbox and not "that other one" :-)</li>
                <li>If all else fails, shoot an email to <a href="mailto:tomasz.s@numa.co">tomasz.s@numa.co</a></li>
              </ul>
              </div>
          </div>
        </div>

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>


</body>

</html>
