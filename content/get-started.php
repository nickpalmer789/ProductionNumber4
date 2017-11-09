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

        <div class="container-fluid">
            <form action="../php/new_accountHandler.php" method="post">
                <div class="imgcontainer">
                    <img src="../assets/icons/planiticon.png" alt="Planit" class="img-small">
                    <h2>Create a new account to use planit!</h2>
                </div>
                <div class="row featurette">
                    <div class="col-md-12">
                        <label for="usr"><b>First Name</b></label>
                        <input type="text" class="form-control" placeholder="Enter First Name" name="firstname" required>

                        <label for="usr"><b>Last Name</b></label>
                        <input type="text" class="form-control" placeholder="Enter Last Name" name="lastname" required>

                        <label for="usr"><b>Email</b></label>
                        <input type="email" class="form-control" placeholder="Enter Email" name="email" required>

                        <label for="usr"><b>Username</b></label>
                        <input type="text" class="form-control" placeholder="Enter Username" name="username" required>

                        <label for="pwd"><b>Password</b></label>
                        <input type="password" class="form-control" placeholder="Enter Password" name="password" required>

                        <label for="pwd"><b>Password</b></label>
                        <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" required>
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="login">Create Account</button>
                    </div>
                </div>
            </form>


            <?php
                include('../templates/footerCopy.php');
            ?>

        </div>
        <?php
            include('../templates/footerScripts.php');
        ?>
</body>

</html>
