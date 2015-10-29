<?php
$url = 'https://api.parse.com/1/functions/emailCheck';
$appId = 'XYVa8aop9gJj7A7GC4Rl5KELXIJCOD2dceWu1QhP';
$restKey = 'jxxaxaNj0avTQXQPH51DLT8f3vXRRqPBLm6ssiuY';
$headers = array(
 "Content-Type: application/json",
 "X-Parse-Application-Id: " . $appId,
 "X-Parse-REST-API-Key: " . $restKey
);

$email = $_POST["email"];

//echo $email;

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
//echo $decoded['result'];

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

              <?php
              if($decoded['result']) {
                echo  '<h1>Your expertise</h1>';
              } else {
                echo  '<h1>Oops!</h1>';
              }
              ?>


            </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-md-offset-2">

            <?php
            if($decoded['result']) {
              include 'industries_table.php';
            } else {
              include 'email_fail.php';
            }
            ?>

          <!-- Empty space -->
<!--             <div class="col-xs-12" style="height:300px;"></div> -->
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

  <input type="hidden" name="email" value=$_POST['email']>

    <script>
      $('#tokenfield').tokenfield({
        autocomplete: {
          source: ['UX','UI','IoT','mobile','social','tourism','algorithms','B2B','B2C'],
          delay: 100
        },
        showAutocompleteOnFocus: true
      })
    </script>

    <!-- <p class="lead">List all the tags relevant to your area of expertise. The more tags you provide, the better we can select the right startups for you!</p>
    <form action="choose_startups.php" method="post">
        <input type="text" class="form-control" id="tokenfield" name="tags" placeholder="Enter as many tags as you want"/>
        <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
        <br>
        <button type="submit" class="btn btn-primary">Next</button>
    </form> -->


</body>

</html>
