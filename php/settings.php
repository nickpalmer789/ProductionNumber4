<!DOCTYPE html>
<html>

<head>
		<link rel="stylesheet" type="text/css" href="../css/settings.css">

    <?php
            //Include the header content
            include('../templates/headercontent.php')
        ?>
</head>

<body>
    <?php
		    include('../templates/navbar.php');	
            include('../php/session.php');
	    ?>
        <div class="container">
            <h1 class="text-center">
                <font size="7">User Settings</font>
            </h1>
            <hr>
            <div class="row">
                <div id ="parent"class="col-xs-4">
			<div class="child">
				<h3>Change Username</h3>
			</div>
			<div class="child">
				<h3>Change Password</a></h3>
			</div>
			<div class="child">
				<h3>Visibility Settings</h3>
			</div>
			<div class="child">
				<h3>Other</h3>
			</div>
		</div>

		<div id="info" class="col-md-4 col-md-push-8">
			<h3>Change Username</h3>
	                <input type="text" class="form-control" placeholder="Enter New Username" name="newusername1" required>
                        <input type="text" class="form-control" placeholder="Confirm New Username" name="newusername2" required>
						
		</div>
</body>

</html>
