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
            <form action="/action_page.php" method="post">
                <div class="imgcontainer">
                    <img src="assets/icons/planiticon.png" alt="Planit" class="avatar">
                    <h2>Planit Login</h2>
                </div>

                <label for="usr"><b>Username</b></label>
                <input type="text" class="form-control" placeholder="Enter Username" name="uname" required>

                <label for="pwd"><b>Password</b></label>
                <input type="password" class="form-control" placeholder="Enter Password" name="psw" required>

                <button class="btn-success btn-lg btn-block" type="submit">Login</button>
                <input type="checkbox" checked="checked"> Remember me

                <br>
                <button type="button" class="btn-danger btn-lg">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>

            </form>

            <?php
            include('templates/footerCopy.php');
            ?>
        </div>

        <?php
        include('templates/footerScripts.php');
        ?>
</body>

</html>
