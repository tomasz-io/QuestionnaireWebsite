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
echo $objectData;


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
                <h1>Next steps:</h1>
            </div>
        </div>

        <div class="row">
          <div class="col-md-8 col-md-offset-2 text-center">
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
          <h3>STEP 1.</h3>
          <p class="">Within <strong>24 hours</strong>, you should receive an email from <strong>donotreply@f6s.com</strong>, if you don't, please contact <a href="mailto:tomasz.s@numa.co">tomasz.s@numa.co</a> </p>
          <h3>STEP 2.</h3>
          <p class="">From the email, follow the link provided to start evaluating. <br><small>Note: you may have to sign up to F6S</small></p>
          <h3>STEP 3.</h3>
          <p class="">From the F6S dashboard you'll see the list of your startups to evaluate, you will have until <strong>December 21st to complete evaluations</strong></p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-md-offset-2" id="evalinfo">
          <h3>Evaluation Tips</h3>

          <ul>
            <li>
              Your scores save automatically
            </li>
            <li>
              Comment on the positive and negative aspects in the "Notes" field <small><a target="_blank" href="https://docs.google.com/document/d/1SeV_zyVw9eHq5sSdlkbzKl7hQluo3NZFfIpDHdApSE0/edit#heading=h.mspvow1bvqaz">more details</a></small>
            </li>
            <li>
            Use the "favorite" tag when you really love a startup
            </li>
            </ul>
            <br>
          <h3>Evaluation Criteria</h3>
          <div>

              <h4>Team</h4><p>The #1 criteria: we are looking for exceptional teams.
                            <small><a target="_blank" href="https://docs.google.com/document/d/1SeV_zyVw9eHq5sSdlkbzKl7hQluo3NZFfIpDHdApSE0/edit#bookmark=id.eub98y95mww">more details</a></small></p>


            <h4>Opportunity/Market</h4><p>How good an opportunity developing this business would be.
                        <small><a href="https://docs.google.com/document/d/1SeV_zyVw9eHq5sSdlkbzKl7hQluo3NZFfIpDHdApSE0/edit#bookmark=id.kz3opbx1f1z5" target="_blank">more details</a></small></p>


            <h4>Customer Knowledge</h4><p>How well the startup understands the customer’s problem they are solving or the needs and behaviours the aim to leverage.
                        <small><a href="https://docs.google.com/document/d/1SeV_zyVw9eHq5sSdlkbzKl7hQluo3NZFfIpDHdApSE0/edit#bookmark=id.b8dadknr0iwe" target="_blank">more details</a></small></p>


            <h4>Industry Experience</h4><p>How deep an understanding the team has of their industry and market.<small><a href="https://docs.google.com/document/d/1SeV_zyVw9eHq5sSdlkbzKl7hQluo3NZFfIpDHdApSE0/edit#bookmark=id.gysss9qdx2d6" target="_blank">more details</a></small></p>

            <h4>Competitive Advantage</h4><p>How much the startup has an advantage over competitors (proprietary technology, access to privileged resources or something that they do differently)<small><a href="https://docs.google.com/document/d/1SeV_zyVw9eHq5sSdlkbzKl7hQluo3NZFfIpDHdApSE0/edit#bookmark=id.7m6uw7h5qsef" target="_blank">more details</a></small></p>



          </div>
          <br>
          <a target="_blank" type="button" href="https://docs.google.com/document/d/1SeV_zyVw9eHq5sSdlkbzKl7hQluo3NZFfIpDHdApSE0/edit?usp=sharing" class="btn btn-lg btn-primary">Read the full guide</a>
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
