<?php include('resources/config.php'); ?>
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
$startupnumber = $_POST["startupnum"];
$industry = $_POST["industry"];
$tags = $_POST["tags"];
$email = $_POST["email"];
$data =  array(expertise => $expertise, industry => $industry, tags => $tags);
$objectData = json_encode($data);
// echo $objectData;

//TODO pass all variables in session
session_start();
// echo $industry;
$_SESSION["industry"] = $industry;


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

?>

<?php include('header.php'); ?>
<body>

    <style>
    /*button that appears only on row hover*/
      button.custom{visibility:hidden}
      tr:hover button.custom{visibility:visible}
    </style>

    <!-- Navigation -->
    <?php include 'navbar.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-10 col-md-push-1 text-center">
                <h1>Select startups to evaluate</h1>
                <p class="lead">They're ordered by proximity to your field of expertise</p>
            </div>
        </div>

        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <p class="lead"><?php echo $first ?></p>
            <form action="submit.php" method="post">
              <table class="table table-hover" id="startuptable">
                  <thead>

                      <tr>
                          <th data-field="proximity">Proximity score</th>
                          <th data-field="name">Name</th>
                          <th data-field="tagline">Tagline</th>
                          <th data-field="selected">Selected</th>
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
                          echo "<td><label for='$val[Id]'>$val[FitScore]</label></td>";
                          echo "<td><label for='$val[Id]'>$val[Name]</label></td>";
                          echo "<td><label for='$val[Id]'>$val[Tagline]</label></td>";
                          echo "<td align='center'><input type='checkbox' name='selected[]' value='$val[Id]' id='$val[Id]'/></td>";
                          echo "</tr>";


                        }
                      }
                      ?>
                  </tbody>

              </table>

              <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
              <input type="hidden" name="expertise" value="<?php echo $_POST['expertise']; ?>">
              <input type="hidden" name="tags" value="<?php echo $_POST['tags']; ?>">

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
    <script type="text/javascript">var toteval = "<?php echo $_POST['startupnum'] ?>";</script>
    <script type="text/javascript" src="js/eval-counter.php"></script>


</body>

</html>
