<!DOCTYPE html>
<html>
    <head>
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

        <p id="welcome">Welcome, <?php echo $_SESSION['login_user'];  ?></p>
        <?php
            include('../templates/footerCopy.php');
        ?>
        <?php
            include('../templates/footerScripts.php');
        ?>
    </body>
</html>
