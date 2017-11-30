<!DOCTYPE html>
<html lang="en">

<head>
    <?php
      //Include the header content
      include('templates/headercontent.php')
    ?>
</head>

<body>
   <?php
      //Include the navbar content
        include('templates/navbar.php');
        
        //if logged in already, go to dashboard
        session_start();
        if(isset($_SESSION["login_user"])) 
        {
            header("location: /content/dashboard.php");
        }
    
    ?>

    
    <div class="jumbotron">
        <div class="container">
            <h1 class="text-center">Welcome to Planit</h1>
            <h2 class="text-center">Planit is a productivity app that helps you keep track of it all.</h2>
            <h2 class="text-center">Open your schedule, stop having it be closed.</h2>
            <h2 class="text-center">Track your goals. Get stuff done. Planit.</h2>

            <div class="row">
                <div class="col-12 text-center">
                    <a class="btn btn-lg btn-success" href="/content/new_user.php" role="button">Get Started!</a>
                </div>
            </div>
        </div>
    </div>


    <div class="container marketing">
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading align-middle">Your calendar and to-do list meet.</h2>
                <p class="lead align-middle">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" src="http://via.placeholder.com/500x500" alt="Generic placeholder image">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Track your goals. Get more done.</h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="featurette-image img-fluid mx-auto" src="http://via.placeholder.com/500x500" alt="Generic placeholder image">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Do more with your time.</h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" src="http://via.placeholder.com/500x500" alt="Generic placeholder image">
            </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->


        <?php
            include('templates/footerCopy.php');
          ?>
    </div>
    <!-- /.container -->

    <?php
      include('templates/footerScripts.php');
    ?>
</body>

</html>
