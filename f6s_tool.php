<?php

require 'vendor/autoload.php';
use Parse\ParseClient;
use Parse\ParseUser;

session_start();

ParseClient::initialize('XYVa8aop9gJj7A7GC4Rl5KELXIJCOD2dceWu1QhP', 'jxxaxaNj0avTQXQPH51DLT8f3vXRRqPBLm6ssiuY', 'hMaVrHtAn7YZB0Gmtvr0xKxj5DPILRlNRUHqaIQG');

$currentUser = ParseUser::getCurrentUser();
if ($currentUser) {
  // do stuff with the user
  $url = 'https://api.parse.com/1/functions/getAssignments';
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
  curl_close($rest);
  //echo $response;
} else {
  // show the signup or login page
  header("Location: f6s_login.php");
  die();
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
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="css/bootstrap-tokenfield.css">


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
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>To be assigned</h1>
            </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <p class="lead"><?php echo $first ?></p>
            <form action="submit_assignments.php" method="post">
              <table class="table" id="table">
                  <thead>
                      <tr>
                          <th data-field="email">Email</th>
                          <th data-field="startups">Startups</th>
                          <th data-field="assigned">Assigned</th>
                      </tr>

                      <?php

                      $jsonIterator = new RecursiveIteratorIterator(
                          new RecursiveArrayIterator(array_values($decoded)[0]),
                          RecursiveIteratorIterator::SELF_FIRST);
                      foreach ($jsonIterator as $key => $val) {
                        if (is_array($val)) {
                          if (array_key_exists("Assigned",$val)) {
                            $assigned = filter_var($val[Assigned], FILTER_VALIDATE_BOOLEAN);
                            if ($assigned == false) {
                              echo "<tr>";
                              echo "<td>$val[Email]</td>";
                              echo "<td>$val[Startups]</td>";
                              echo "<td><input type='checkbox' name='assignments[]' value='$val[Id]'></td>";
                              echo "</tr>";
                            }
                          }
                        }
                      }
                      ?>
                  </thead>
              </table>
              <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
              <button type="submit" class="btn btn-primary pull-right">Update</button>
            </form>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>Assigned</h1>
                </div>
            </div>
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th data-field="email">Email</th>
                        <th data-field="startups">Startups</th>
                        <th data-field="assigned">Date Assigned</th>
                    </tr>

                    <?php

                    $jsonIterator = new RecursiveIteratorIterator(
                        new RecursiveArrayIterator(array_values($decoded)[0]),
                        RecursiveIteratorIterator::SELF_FIRST);
                    foreach ($jsonIterator as $key => $val) {
                      if (is_array($val)) {
                        if (array_key_exists("Assigned",$val)) {
                          $assigned = filter_var($val[Assigned], FILTER_VALIDATE_BOOLEAN);
                          if ($assigned == true) {

                            echo "<tr>";
                            echo "<td>$val[Email]</td>";
                            echo "<td>$val[Startups]</td>";
                            echo "<td>$val[PrettyDate]</td>";
                            echo "</tr>";
                          }
                        }
                      }
                    }
                    ?>
                </thead>
            </table>


          </div>
        </div>

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

    <script src="js/bootstrap-tokenfield.js"></script>


    <script>
    function clearRadioGroup(GroupName)
    {
      var ele = document.getElementsByName(GroupName);
    	for(var i=0;i<ele.length;i++)
        ele[i].checked = false;
    }
    </script>



</body>

</html>
