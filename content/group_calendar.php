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
            <div class="row">
               
                <div class="col-xs-6">
                    <?php
                        echo "<font size=\"7\">*Groupname* Calendar</font>";
                    ?>
                </div>
                
                <div class="col-xs-6" id="groups">
                    <button class="btn btn-success special-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Groups
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/index.php">Group1</a>
                        <a class="dropdown-item" href="/content/calendar.php">Group2</a>
                        <a class="dropdown-item" href="#">Group3</a>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="calendarspacing">
                        <div class="totallyacalendar" align="center">
                            <?php
                                include('../php/load_group.php');
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Group Tasks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Do the project</td>
                            </tr>
                            <tr>
                                <td>Make it not incomplete</td>
                            </tr>
                            <tr>
                                <td>Meetings etc</td>
                            </tr>
                            <tr>
                                <td>Group things</td>
                            </tr>
                        </tbody>
                    </table>

                    <br>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Completed Tasks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>I did the project</td>
                            </tr>
                            <tr>
                                <td>I made it not incomplete</td>
                            </tr>
                            <tr>
                                <td>Firetruck</td>
                            </tr>
                            <tr>
                                <td>Rocks</td>
                            </tr>
                        </tbody>
                    </table>
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