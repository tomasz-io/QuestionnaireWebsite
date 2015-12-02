<?php include('resources/config.php'); ?>

<?php


$selected = $_POST["selected"];
$expertise = $_POST["expertise"];
$tags = $_POST['tags'];

session_start();
$email = $_SESSION["email"];
$industry = $_SESSION["industry"];
// echo $industry;

$final_submission =  array(selected => $selected, expertise => $expertise, industry => $industry, tags => $tags, email => $email);
$objectData = json_encode($final_submission);

// echo $objectData;


$url = 'https://api.parse.com/1/functions/submit';

$appId = 'XYVa8aop9gJj7A7GC4Rl5KELXIJCOD2dceWu1QhP';
$restKey = 'jxxaxaNj0avTQXQPH51DLT8f3vXRRqPBLm6ssiuY';
$headers = array(
 "Content-Type: application/json",
 "X-Parse-Application-Id: " . $appId,
 "X-Parse-REST-API-Key: " . $restKey
);
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

<?php include('header.php'); ?>

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
