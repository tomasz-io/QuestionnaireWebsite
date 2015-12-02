<?php include('config.php'); ?>

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
    <link href="<?php echo CSS_URL; ?>/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo CSS_URL; ?>/custom.css" rel="stylesheet">
    </style>

</head>

<body>

    <!-- Navigation -->
    <?php include 'navbar.php'; ?>

    <!-- Page Content -->
    <div class="container jumbotron">
        <div class="row">
            <div class="col-lg-12 text-center">
              <p class="lead">We didn't recognise this email address. <br> Please try a different one or get in touch with <a href="mailto:tomasz.s@numa.co">tomasz.s@numa.co</a></p>
              <br>
              <button class="btn btn-primary btn-lg" onclick="history.go(-2);">Back</button></div>
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


</body>

</html>
