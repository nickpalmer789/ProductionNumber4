<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <!-- Check if logged in, adjust buttons as needed -->
<?php
    session_start();
    if(isset($_SESSION["login_user"])) 
    {
        echo "
            <a class=\"navbar-brand\" href=\"../content/dashboard.php\">Planit</a>
            <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\" aria-controls=\"navbarCollapse\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
    
            <div class=\"collapse navbar-collapse\" id=\"navbarCollapse\">
                <ul class=\"navbar-nav mr-auto\">
           
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"../content/calendar.php\">Calendar</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"../content/group_calendar.php\">Group Calendar</a>
                </li>
                </ul>
                
                
                <form action=\"../content/settings.php\" method=\"post\">
                    <button type=\"submit\" class=\"btn btn-outline-danger\">SETTINGS</button>          
		        </form>
        
                <form action=\"../php/logout.php\" method=\"post\">
                    <button type=\"submit\" class=\"btn btn-outline-success my-2 my-sm-0\">LOG OUT</button>
                </form>
            </div>";
    }
    else
    {
        echo "
                <a class=\"navbar-brand\" href=\"../index.php\">Planit</a>
                <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\" aria-controls=\"navbarCollapse\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                    <span class=\"navbar-toggler-icon\"></span>
                </button>
                <ul class=\"navbar-nav mr-auto\">
                </ul>
                <button type=\"button\" class=\"btn btn-outline-success my-2 my-sm-0\" data-toggle=\"modal\" data-target=\"#loginModal\">Log In</button>";
    }
?>

        <!-- The login modal -->
        <div class="modal fade" id="loginModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="/php/loginHandler.php" method="post">
                            <div class="imgcontainer">
                                <img src="../assets/icons/planiticon.png" alt="Planit" class="avatar">
                                <h2>Planit Login</h2>
                            </div>

                            <label for="usr"><b>Username</b></label>
                            <input type="text" class="form-control" placeholder="Enter Username" name="username" required>

                            <label for="pwd"><b>Password</b></label>

                            <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
                            <button class="btn-success btn-lg btn-block" type="submit">Login</button>


                            <br>
                            <button type="button" class="btn-danger btn-lg btn-block" data-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

</nav>
