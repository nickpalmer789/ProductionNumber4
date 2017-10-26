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
                    <h2>This can change to a create account page since there is a login modal built into the navbar. Maybe have a note that says existing users login at the top, new users fill this stuff in etc</h2>
                </div>

                <label for="usr"><b>Create Username</b></label>
                <input type="text" class="form-control" placeholder="Enter Username" name="uname" required>

                <label for="pwd"><b>Create Password</b></label>
                <input type="password" class="form-control" placeholder="Enter Password" name="psw" required>
                <label for="pwd"><b>Re-enter Password</b></label>
                <input type="password" class="form-control" placeholder="Enter Password" name="psw" required>
                
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