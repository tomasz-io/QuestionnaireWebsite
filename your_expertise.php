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
              echo
              '
                <form action="choose_startups.php" method="post">
                  <p class="lead">What are your main industries?</p>
                  <table class="table" id="table">
                    <tr>
                      <td><input type="checkbox" name="industry[]" value="art & design"/> Art & Design</td>
                      <td><input type="checkbox" name="industry[]" value="charity & non-profit"/> Charity & non-profit</td>
                      <td><input type="checkbox" name="industry[]" value="consumer goods"/> Consumer goods</td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" name="industry[]" value="education"/> Education</td>
                      <td><input type="checkbox" name="industry[]" value="energy"/> Energy</td>
                      <td><input type="checkbox" name="industry[]" value="family & home care"/> Family & home care</td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" name="industry[]" value="fashion & textile"/> Fashion & textile</td>
                      <td><input type="checkbox" name="industry[]" value="financial services"/> Financial services</td>
                      <td><input type="checkbox" name="industry[]" value="food/beverages/tobacco"/> Food/beverages/tobacco</td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" name="industry[]" value="healthcare"/> Healthcare</td>
                      <td><input type="checkbox" name="industry[]" value="lifestyle & leisure"/> Lifestyle & leisure</td>
                      <td><input type="checkbox" name="industry[]" value="marketing & communication"/> Marketing & communication</td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" name="industry[]" value="media & entertainment"/> Media & entertainment</td>
                      <td><input type="checkbox" name="industry[]" value="professional services"/> Professional services</td>
                      <td><input type="checkbox" name="industry[]" value="security"/> Security</td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" name="industry[]" value="semiconductors"/> Semiconductors</td>
                      <td><input type="checkbox" name="industry[]" value="software"/> Software</td>
                      <td><input type="checkbox" name="industry[]" value="tech hardware"/> Tech hardware</td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" name="industry[]" value="telecommunications"/> Telecommunications</td>
                      <td><input type="checkbox" name="industry[]" value="transport/logistics./mobility"/> Transport/logistics/mobility</td>
                      <td><input type="checkbox" name="industry[]" value="travel & tourism"/> Travel & tourism</td>
                    </tr>
                  </table>
                  <br>
                  <br>
                  <p class="lead">List all the tags relevant to your area of expertise. The more tags you provide, the better we can select the right startups for you!</p>
                  <input type="text" class="form-control" id="tokenfield" name="tags" placeholder="Enter as many tags as you want"/>
                  <input type="hidden" name="email" value='.$email.' >
                  <br>
                  <button type="submit" class="btn btn-primary pull-right">Next</button>

                </form>';
            } else {
              include 'email_fail.php';
            }
            ?>

          <!-- Empty space -->
            <div class="col-xs-12" style="height:300px;"></div>
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
