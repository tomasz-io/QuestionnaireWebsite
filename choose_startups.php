<?php include('resources/config.php'); ?>
<?php
$url = 'https://api.parse.com/1/functions/getStartups';

$expertise = $_POST["expertise"];
$startupnumber = $_POST["startupnum"];
$industry = $_POST["industry"];
$new_tags = $_POST["new_tags"];
$old_tags = $_POST["old_tags"];
$tags = $old_tags . ',' . $new_tags;


$data =  array(expertise => $expertise, industry => $industry, tags => $tags);
$objectData = json_encode($data);
// echo $objectData;

session_start();
$_SESSION["industry"] = $industry;
$email = $_SESSION["email"];

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
              <input type="hidden" name="expertise" value="<?php echo $expertise; ?>">
              <input type="hidden" name="tags" value="<?php echo $tags; ?>">

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


</body>

</html>
