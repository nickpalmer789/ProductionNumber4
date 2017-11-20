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
    ?>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8" col>
                    <h2 class="text-center">Planit Login</h2>
                    <form action="../php/loginHandler.php" method="post">
                        <div class="imgcontainer">
                            <img src="../assets/icons/planiticon.png" alt="Planit" class="avatar">
                            <h2>Incorrect username or password!</h2>
                            <h3>Please try again</h3>
                        </div>

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
                        <span class="psw">Forgot <a href="#">password?</a></span>
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
