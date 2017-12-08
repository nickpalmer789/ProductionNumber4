<!DOCTYPE html>
<html>

<head>
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
        include('../php/session.php');
        include('../templates/navbar.php');
    
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
    
    $query = "SELECT default_avatar_color FROM user_settings WHERE username = '{$_SESSION['login_user']}'";
    $result = mysqli_query($connection,$query);
    $avatar_color = mysqli_fetch_row($result);
    ?>
        <div class="container">
            <h1 class="text-center">
                <font size="7" id = "c1">Add User to Group!</font>
            </h1>
            <hr>
            
                </div>
                <div id="change_everything" class="col-md-6">
		<?php
            echo "<h2 >Change Username (";
            echo $_SESSION['login_user'];
            echo ")</h2>";
		?>
            <div class="col-md-12">
				<form action="../php/new_groupmemberHandler.php" method="post">
                    <input type="text" class="form-control" placeholder="Enter New User Username" name="newusername1">
                    <input type="text" class="form-control" placeholder="Confirm New User Username" name="newusername2">
				    <button class="btn-success btn-lg btn-block" type="submit" data-toggle="modal" data-target="#colorModal" >Update Username</button>
                </form>
                    </div>
    </div>
			
    
</body>

</html>


