<?php
$url = 'https://api.parse.com/1/functions/getStartups';
$appId = 'XYVa8aop9gJj7A7GC4Rl5KELXIJCOD2dceWu1QhP';
$restKey = 'jxxaxaNj0avTQXQPH51DLT8f3vXRRqPBLm6ssiuY';
$headers = array(
 "Content-Type: application/json",
 "X-Parse-Application-Id: " . $appId,
 "X-Parse-REST-API-Key: " . $restKey
);

$expertise = $_POST["expertise"];
$industry = $_POST["industry"];
$tags = $_POST["tags"];
$email = $_POST["email"];
$data =  array(expertise => $expertise, industry => $industry, tags => $tags);
$objectData = json_encode($data);
//echo $email;
//echo $objectData;
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
    <link href="css/custom.css" rel="stylesheet">

    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <style>
    /*button that appears only on row hover*/
      button.custom{visibility:hidden}
      tr:hover button.custom{visibility:visible}
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
            <div class="col-md-10 col-md-push-1 text-center">
                <h1>Select startups to evaluate</h1>
                <p class="lead">They're ordered by proximity to your field of expertise</p>
            </div>
            <!-- <div class="col-md-10 col-md-push-1">
              <div class="panel panel-info" id="infobox">
                    <div class="panel-heading">What expertise should you select?</div>
                      <div class="panel-body">
                      <p><strong>Business</strong>: you act as Business / Financial / Investments expert</p>
                      <p><strong>Product</strong>: you act as Product Strategy / UX / Design / Communication / Marketing expert</p>
                      <p><strong>Tech</strong>: you act as Programming / Engineering / Scientific expert</p>
                      </div>
                </div>
            </div> -->
        </div>

        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <p class="lead"><?php echo $first ?></p>
            <form action="submit.php" method="post">
              <table class="table table-hover" id="table">
                  <thead>

                      <tr>
                          <th data-field="name">Name</th>
                          <th data-field="tagline">Tagline</th>
                          <th data-field="selected">Selected</th>
                          <!-- <th align='center' data-field="product">Product</th>
                          <th align='center' data-field="tech">Tech</th>
                          <th align='center' data-field="tech"></th> -->
                      </tr>
                  </thead>
                  <tbody>

                      <?php

                      $jsonIterator = new RecursiveIteratorIterator(
                          new RecursiveArrayIterator(array_values($decoded)[0]),
                          RecursiveIteratorIterator::SELF_FIRST);

                      foreach ($jsonIterator as $key => $val) {
                        if (is_array($val)) {



                          echo "<tr>";
                          echo "<td>$val[Name]</td>";
                          echo "<td>$val[Tagline]</td>";
                          echo "<td align='center'><input type='checkbox' name='selected[]' value='$val[Id]'/></td>";

                          // if ($val[Biz] == "0") {
                          //
                          // }

                          // else {
                          //     echo "<td></td>";
                          // }
                          // if ($val[Product] == "0") {
                          //     echo "<td align='center'><input type='radio' name='$val[Id]' value='product'/></td>";
                          // } else {
                          //     echo "<td></td>";
                          // }
                          // if ($val[Tech] == "0") {
                          //     echo "<td align='center'><input type='radio' name='$val[Id]' value='tech'/></td>";
                          // } else {
                          //     echo "<td></td>";
                          // }

                          //echo "<td><input type='button' class='btn btn-default btn-sm' value='Clear' onclick='clearRadioGroup(\"$val[Id]\")'></td>";
                          // echo "<td><button type='button' class='btn btn-default btn-sm custom' onclick='clearRadioGroup(\"$val[Id]\")'>Clear</button></td>";

                          echo "</tr>";

                        }
                      }
                      ?>
                  </tbody>

              </table>

              <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
              <input type="hidden" name="expertise" value="<?php echo $_POST['expertise']; ?>">

              <?php include 'startup_choice_footer.php'; ?>

              <!-- <button type="submit" class="btn btn-primary center-block" style="">Submit</button> -->
            </form>
          </div>
        </div>

    </div>

    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script type="text/javascript" src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/bootstrap-tokenfield.js"></script>


    <script>
    function clearRadioGroup(GroupName)
    {
      var ele = document.getElementsByName(GroupName);
    	for(var i=0;i<ele.length;i++)
        ele[i].checked = false;
    }
    </script>

    <!--counter update js-->
    <script type="text/javascript" src="js/eval-counter.js"></script>


</body>

</html>
