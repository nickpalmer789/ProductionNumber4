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
	include('../templates/navbar.php');	
        include('../php/session.php');
    ?>
        <div class="container">
            <h1 class="text-center">
                <font size="7">Settings</font>
            </h1>
            <hr>
            <div class="row">
                <div class="col-md-3">
			<div class="child">
				<h3><a href="#" id="show_change_username">Change Username</a></h3>
			</div>
			<div class="child">
				<h3><a href="#c2">Change Password</a></h3>
			</div>
			<div class="child">
				<h3><a href=#c3">Visibility Settings</a></h3>
			</div>
			<div class="child">
				<h3><a href="#c4">Other Settings</a></h3>
			</div>

                </div>
                <div id="change_username" class="col-md-6">
                	<h2>Change Username</h2>
                	<div class="col-md-9">
				<input type="text" class="form-control" placeholder="Enter New Username" name="newusername1" required>
                               	<input type="text" class="form-control" placeholder="Confirm New Username" name="newusername2" required>
				<button class="btn-success btn-lg btn-block" type="submit">Update Username</button>

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


