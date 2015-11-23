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
    <div class="container jumbotron">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Let's start!</h1>
            </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-md-offset-3 text-center">
            <p class="lead">Thanks for your help, it means a lot to us!<br> 
            First, we'll check that you're in our database</p>
          </div>
        </div>

        <br>

        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <form action="your_expertise.php" method="post">
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control" name="email" placeholder="Your email">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary" type="button" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">Start</button>
                </span>
                </div>
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




</body>

</html>
