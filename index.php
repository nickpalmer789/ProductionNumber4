<!DOCTYPE html>
<html lang="en">

<head>
    <?php
      //Include the header content
      include('templates/headercontent.php')
    ?>
</head>

<body>
    <!-- Navbar but the code -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Planit</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">           
        </ul>

        <button type="button" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#loginModal">Log In</button>

        <!-- The login modal (until it gets its own file again, maybe) -->
        <div class="modal fade" id="loginModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="php/loginHandler.php" method="post">
                            <div class="imgcontainer">
                                <img src="assets/icons/planiticon.png" alt="Planit" class="avatar">
                                <h2>Planit Login</h2>
                            </div>

                            <label for="usr"><b>Username</b></label>
                            <p>&nbsp;
                                <input type="text" class="form-control" placeholder="Enter Username" name="username" required></p>

                            <label for="pwd"><b>Password</b></label>
                            <p>&nbsp;
                                <input type="password" class="form-control" placeholder="Enter Password" name="password" required></p>
                            <input type="checkbox" checked="checked"> Remember me
                            <button class="btn-success btn-lg btn-block" type="submit">Login&nbsp;</button>


                            <br>
                            <button type="button" class="btn-danger btn-lg btn-block" data-dismiss="modal">Cancel</button>
                            <span class="psw">Forgot <a href="#">password?</a></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

    </div>
</nav>
    
    <!-- End Navbar -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="text-center">Welcome to Planit</h1>
            <h2 class="text-center">Planit is a productivity app that helps you keep track of it all.</h2>
            <h2 class="text-center">Open your schedule, stop having it be closed.</h2>
            <h2 class="text-center">Track your goals. Get stuff done. Planit.</h2>

            <div class="row">
                <div class="col-12 text-center">
                    <a class="btn btn-lg btn-success" href="/content/get-started.php" role="button">Get Started!</a>
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