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
    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <link href="css/bootstrap.min.css" rel="stylesheet">

</head>

<body>


    <!-- Navigation -->
    <?php include 'navbar.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Hello</h1>
            </div>
        </div>

        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <form action="handle_f6s_login.php" method="post">
              <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Enter you email address">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Enter your password">
              </div>
              <button type="submit" class="btn btn-primary">Next</button>
            </form>


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
      $('#tokenfield').tokenfield({
        autocomplete: {
          source: ['UX','UI','IoT','mobile','social','tourism','algorithms','B2B','B2C'],
          delay: 100
        },
        showAutocompleteOnFocus: true
      })
    </script>



</body>

</html>
