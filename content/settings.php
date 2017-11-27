<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
	<link rel="stylesheet" type="text/css" href="../css/settings.css">
	<?php
            //Include the header content
            include('../templates/headercontent.php')
	?>

	<script type="text/javascript">
	$(document).ready(function() {
	  $("show_change_username").click(function() {
	    $('#change_username').toggle();
	      return false;
	    });
	});
	</script>

</head>

<body>
    <?php
	   include('../php/loginHandler.php');
	   include('../templates/navbar.php');	
        include('../php/session.php');
    $connection = mysqli_connect('localhost', 'root', 'password', 'planit');

    if(mysqli_connect_errno()){
        echo "<h4>Failed to connect to MySQL:</h4>".mysqli_connect_error();
    } 

    $query = "SELECT phone_number FROM users WHERE username = '{$_SESSION['login_user']}'";
    $result = mysqli_query($connection,$query);
    $phone = mysqli_fetch_row($result);

    $query = "SELECT email FROM users WHERE username = '{$_SESSION['login_user']}'";
    $result = mysqli_query($connection,$query);
    $email = mysqli_fetch_row($result);
    
    $query = "SELECT friend_visible FROM user_settings WHERE username = '{$_SESSION['login_user']}'";
    $result = mysqli_query($connection,$query);
    $friend = mysqli_fetch_row($result);
    
    $query = "SELECT public_visible FROM user_settings WHERE username = '{$_SESSION['login_user']}'";
    $result = mysqli_query($connection,$query);
    $public = mysqli_fetch_row($result);
    
    $query = "SELECT username_viewable FROM user_settings WHERE username = '{$_SESSION['login_user']}'";
    $result = mysqli_query($connection,$query);
    $user = mysqli_fetch_row($result);

    ?>
        <div class="container">
            <h1 class="text-center">
                <font size="7">Settings</font>
            </h1>
            <hr>
            <div class="row">
                <div class="col-md-3">
		   <div id="parent" class="affix">
			<div class="child">
				<h3><a href="#c1" id="show_change_username">Change Username</a></h3>
			</div>
			<div class="child">
				<h3><a href="#c2">Change Password</a></h3>
			</div>
			<div class="child">
				<h3><a href="#c3">Visibility Settings</a></h3>
			</div>
			<div class="child">
				<h3><a href="#c4">Other Settings</a></h3>
			</div>
		   </div>
                </div>
                <div id="change_everything" class="col-md-6">
		<?php
            echo "<h2 id=\"c1\">Change Username (";
            echo $_SESSION['login_user'];
            echo ")</h2>";
		?>
            <div class="col-md-12">
				<form action="../php/settingsHandlers/settingsHandlerUsername.php" method="post">
                    <input type="text" class="form-control" placeholder="Enter New Username" name="newusername1">
                    <input type="text" class="form-control" placeholder="Confirm New Username" name="newusername2">
				    <button class="btn-success btn-lg btn-block" type="submit">Update Username</button>
                </form>
			</div>
			<hr>
			<h2 id="c2">Change Password</h2>
            <div class="col-md-12">
				<form action="../php/settingsHandlers/settingsHandlerPassword.php" method="post">
				    <input type="text" class="form-control" placeholder="Enter New Password" name="newpassword1">
                    <input type="text" class="form-control" placeholder="Confirm New Password" name="newpassword2">
				    <label>We need your current password in order to confirm your changes:</label>
				    <input type="text" class="form-control" placeholder="Enter Old Password" name="oldpassword">
				    <button class="btn-success btn-lg btn-block" type="submit">Update Password</button>
                </form>
			</div>
			<hr>
			<h2 id="c3">Change Visibility Settings</h2>
                	<div class="col-md-12">
				    <h4>Username Viewable</h4>
                    <form action="../php/settingsHandlers/settingsHandlerVisibility.php" method="post">
                    
                    <?php
                        if($user[0]==TRUE){
                            echo "<input type=\"radio\" name=\"username_visible\" checked=\"checked\" value=\"True\">Yes &emsp;";
  						    echo "<input type=\"radio\" name=\"username_visible\" value=\"False\">No<br>";
                        }else{
                            echo "<input type=\"radio\" name=\"username_visible\" value=\"True\">Yes &emsp;";
  						    echo "<input type=\"radio\" name=\"username_visible\" checked=\"checked\" value=\"False\">No<br>";
                        }
                    ?>
                    
				<br><h4>Visible to Friends</h4>
                    <?php
                        if($friend[0]==TRUE){
                            echo "<input type=\"radio\" name=\"friend_visible\" checked=\"checked\" value=\"True\">Yes &emsp;";
  						    echo "<input type=\"radio\" name=\"friend_visible\" value=\"False\">No<br>";
                        }else{
                            echo "<input type=\"radio\" name=\"friend_visible\" value=\"True\">Yes &emsp;";
  						    echo "<input type=\"radio\" name=\"friend_visible\" checked=\"checked\" value=\"False\">No<br>";
                        }
                    ?>    
				<br><h4>Visible to Public</h4>                        
                  <?php
                        if($public[0]==TRUE){
                            echo "<input type=\"radio\" name=\"public_visible\" checked=\"checked\" value=\"True\">Yes &emsp;";
  						    echo "<input type=\"radio\" name=\"public_visible\" value=\"False\">No<br>";
                        }else{
                            echo "<input type=\"radio\" name=\"public_visible\" value=\"True\">Yes &emsp;";
  						    echo "<input type=\"radio\" name=\"public_visible\" checked=\"checked\" value=\"False\">No<br>";
                        }
                    ?>
				<br><button class="btn-success btn-lg btn-block" type="submit">Update Visibility Settings</button>
                        </form>
			</div>
			<hr>
			<h2 id="c4">Other Settings</h2>
                	<div class="col-md-12">
                    <form action="../php/settingsHandlers/settingsHandlerPhone.php" method="post">                        
        <?php
            echo "<h4>Update Public Phone Number (";
            echo substr($phone[0], 0, 3).'-'.substr($phone[0], 3, 3).'-'.substr($phone[0],6);
            echo ")</h4>";
		?>
				
					<input type="text" class="form-control" placeholder="Enter New Phone Number" name="newphone1" >
                    <input type="text" class="form-control" placeholder="Confirm New Phone Number" name="newphone2" >
					<button class="btn-success btn-lg btn-block" type="submit">Update Phone Number</button>
                        </form>
                        <br>
				
                <?php
                    echo "<h4>Update Email (";
                    echo $email[0];
                    echo ")</h4>";
                ?>        
                    <form action="../php/settingsHandlers/settingsHandlerEmail.php" method="post">                        
                        
                <input type="text" class="form-control" placeholder="Enter New Email" name="newemail1">
                               	<input type="text" class="form-control" placeholder="Confirm New Email" name="newemail2">
				<button class="btn-success btn-lg btn-block" type="submit">Update Email</button>

                        </form>
			</div>

			

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


