<!DOCTYPE html>
<html>

<head>
  	<link rel="stylesheet" type="text/css" href="../css/settings.css">
	<?php
        //Include the header content
        include('../templates/headercontent.php');
        include('../php/session.php');
        include('../templates/navbar.php');
        $connection = mysqli_connect('localhost', 'root', 'password', 'planit');
        if(mysqli_connect_errno()){
            echo "<h4>Failed to connect to MySQL:</h4>".mysqli_connect_error();
        } 
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
        <div class="container-fluid">
            <h1 class="text-center">
                <font size="7" id = "c1">Add User to Group!</font>
            </h1>
            <h2>
                Select Group
            </h2>
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle group-btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Select Group
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <?php
                        //Get the group names
                        $getGroupNames = "SELECT group_name FROM (SELECT group_id FROM groups_join_users WHERE username = '{$_SESSION['login_user']}') as current_user_groups JOIN groups ON current_user_groups.group_id = groups.group_id";
                        
                        $groupNames = mysqli_query($db, $getGroupNames);
                        
                        echo "<a class=\"dropdown-item\" name=\"group\" href=\"/content/group_calendar.php\">No Group Selected</a>";

                        //Print out all other group names as links
                        while($row = mysqli_fetch_array($groupNames, MYSQLI_NUM)) {
                            echo "<a class=\"dropdown-item\" name = \"group\" href=\"/php/group_calendar_handler.php?id=$row[0]\">$row[0]</a>";
                        }
                    ?>
                </div>
            </div>
    </div>
        <div class="container">
            
                </div>
                <div id="change_everything" class="col-md-6">
		<?php
            echo "<h2 >Add User </h2>";
		?>
            <div class="col-md-12">
				<form action="../php/new_groupmemberHandler.php" method="post">
                    <input type="text" class="form-control" placeholder="Enter New User Username" name="newusername1">
                    <input type="text" class="form-control" placeholder="Confirm New User Username" name="newusername2">
				    <button class="btn-success btn-lg btn-block" type="submit" data-toggle="modal" data-target="#colorModal" >Add User</button>
                </form>
                    </div>
    </div>
			
    
</body>

</html>


