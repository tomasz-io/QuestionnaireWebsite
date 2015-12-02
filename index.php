<?php include('resources/config.php'); ?>
<?php include('header.php'); ?>

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
            <form action="email_check.php" method="post">
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

</body>

</html>
