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

        <div class="container marketing">
            <form action="/action_page.php">
                <div class="imgcontainer">
                    <img src="assets/icons/planiticon.png" alt="Planit" class="avatar">
                    <h2>Planit Login</h2>
                </div>

                <div class="container">
                    <label><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>

                    <label><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>

                    <button class="loginBtn" type="submit">Login</button>
                    <input type="checkbox" checked="checked"> Remember me
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" class="cancelbtn">Cancel</button>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
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