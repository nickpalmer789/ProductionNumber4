<!DOCTYPE html>
<html lang="en">

<head>
    <?php
      //Include the header content
      include('../templates/headercontent.php')
    ?>
</head>

<body>
    <?php
      //Include the navbar content
        include('../templates/navbar.php');       
    
        //if logged in already, go to dashboard
        //session_start();
        if(isset($_SESSION["login_user"])) 
        {
            header("location: /content/dashboard.php");
        }
    ?>

        <div class="container">
            <h2 class="text-center">Planit Login</h2>
            <div class="imgcontainer">
                <img src="../assets/icons/planiticon.png" alt="Planit" class="img-small">
                <h2>Incorrect username or password!</h2>
                <h3>Please try again</h3>
            </div>
            <div class="row featurette">
                <div class="col-md-12" col>
                    <form action="../php/loginHandler.php" method="post">
                        <label for="usr"><b>Username</b></label>
                        <input type="text" class="form-control" placeholder="Enter Username" name="username" required>

                        <label for="pwd"><b>Password</b></label>
                        <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
                        <input type="checkbox" checked="checked"> Remember me
                        <button class="btn-success btn-lg btn-block" type="submit">Login</button>

                        <br>
                    </form>

                    <form action="../index.php">
                        <button type="submit" class="btn-danger btn-lg btn-block">Cancel</button>                       
                    </form>
                </div>
            </div>


            <?php
                include('../templates/footerCopy.php');
            ?>

        </div>

        <?php
            include('../templates/footerScripts.php');
        ?>
</body>

</html>
