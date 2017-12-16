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
            <h2 class="text-center">New User</h2>
            <div class="imgcontainer">
                <img src="../assets/icons/planiticon.png" alt="Planit" class="img-small">
                <h2>Create a new account to use planit!</h2>
            </div>
            <div class="row featurette">
                <div class="col-md-12">
                    <form action="../php/new_accountHandler.php" method="post">
                        <label for="usr"><b>First Name</b></label>
                        <input type="text" class="form-control" placeholder="Enter First Name" name="firstname" required>

                        <label for="usr"><b>Last Name</b></label>
                        <input type="text" class="form-control" placeholder="Enter Last Name" name="lastname" required>

                        <label for="usr"><b>Email</b></label>
                        <input type="email" class="form-control" placeholder="Enter Email" name="email" required>

                        <label for="usr"><b>Username</b></label>
                        <input type="text" class="form-control" placeholder="Enter Username" id="usname" name="username" required>

                        <label for="pwd"><b>Password</b></label>
                        <input type="password" class="form-control" placeholder="Enter Password" id="pass" name="password" required>

                        <label for="pwd"><b>Re-enter Password</b></label>
                        <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" required>
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="login">Create Account</button>
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
