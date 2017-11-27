<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="../content/dashboard.php">Planit</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <!--<li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="../content/calendar.php">Calendar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../content/group_calendar.php">Group Calendar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../content/settings.php">Settings</a>
            </li>
 
        </ul>

       <!-- Check if logged in, adjust button as needed -->
        <?php
            if(!isset($_SESSION["login_user"])) 
            //if($logged_in) 
            {
                echo "<form action=\"../php/logout.php\" method=\"post\">";
		echo "<button type=\"submit\" class=\"btn btn-outline-success my-2 my-sm-0\">LOG OUT</button>";                
		echo "</form>";
            }
            else
            {
                echo "<button type=\"button\" class=\"btn btn-outline-success my-2 my-sm-0\" data-toggle=\"modal\" data-target=\"#loginModal\">Log In</button>";
            }

        ?>
            

            <!-- The login modal -->
            <div class="modal fade" id="loginModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form action="/php/settingsHandler.php" method="post">
                                <div class="imgcontainer">
                                    <img src="../assets/icons/planiticon.png" alt="Planit" class="avatar">
                                    <h2>Planit Login</h2>
                                </div>

                                <label for="usr"><b>Username</b></label>

                                <input type="text" class="form-control" placeholder="Enter Username" name="username" required>

                                <label for="pwd"><b>Password</b></label>

                                <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
                                <input type="checkbox" checked="checked"> Remember me
                                <button class="btn-success btn-lg btn-block" type="submit">Login</button>


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
