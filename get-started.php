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
   
	
    ?>

        <div class="container-fluid">
            <form action="php/new_accountHandler.php" method="post">
                <div class="imgcontainer">
                    <img src="assets/icons/planiticon.png" alt="Planit" class="avatar img-small">
                    <h2>This can change to a create account page since there is a login modal built into the navbar. Maybe have a note that says existing users login at the top, new users fill this stuff in etc</h2>
                </div>

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
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="login">Login</button>
            </form>



        </div>
        <?php
            include('templates/footerCopy.php');
        ?>
            <?php
            include('templates/footerScripts.php');
        ?>
</body>

</html>