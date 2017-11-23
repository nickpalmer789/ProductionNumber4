<!DOCTYPE html>
<html lang="en">

<head>
    <?php
      //Include the header content
      include('../templates/headercontent.php')
    ?>
</head>

<body>
    <?php
      //Include the navbar content
        include('../templates/navbar.php');
        include('../php/session.php');
    ?>
        <div class="container-fluid">
            <h1 align="left">
                <font size="7">My Calendar</font>
            </h1>

            <div class="row">
                <div class="col-sm-8" align="center">
                    <div class="calendarspacing">
                        <div class="totallyacalendar">
                            <?php
                                include('../php/load_calendar.php');
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4" align="center">
                    <?php
                        include('../php/taskHandler.php');
                    ?>
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
